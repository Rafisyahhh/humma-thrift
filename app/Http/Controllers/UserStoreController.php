<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserStore;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUserStoreRequest;
use App\Http\Requests\UpdateUserStoreRequest;
use App\Enums\WithdrawalStatusEnum;
use App\Models\Product;
use App\Models\ProductAuction;
use App\Models\Withdrawal;
use Illuminate\Database\Eloquent\Builder;
use App\Models\TransactionOrder;
use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserStoreController extends Controller {
    private TransactionOrder $_transactions;
    private Withdrawal $_withdrawal;

    public function __construct(TransactionOrder $transactions, Withdrawal $withdrawal) {
        $this->_transactions = $transactions;
        $this->_withdrawal = $withdrawal;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $countnewOrder = TransactionOrder::where('user_id', auth()->user()->id)->where('delivery_status', 'selesaikan pembayaran')->count();
        $countendOrder = TransactionOrder::where('user_id', auth()->user()->id)->where('delivery_status', 'selesai')->count();
        $countProduct = Product::where('user_id', auth()->id())->count() +
            ProductAuction::where('user_id', auth()->id())->count();
        $store = UserStore::all();
        $address = UserAddress::all();
        $count = Product::where('user_id', auth()->id())->count();
        $count += ProductAuction::where('user_id', auth()->id())->count();
        $userId = Auth::id();
        $user = Auth::user();
        $userStoreId = $user->store->id;
        $trxSearch = $request->get('trx');
        $dateSearch = $request->get('date');
        $currentDate = now();

        // Use eager loading to reduce the number of queries
        $transactionsQuery = $this->_transactions->with(['order.product.userstore'])
            ->latest()
            ->whereHas('order.product', function ($query) use ($userStoreId) {
                $query->where('store_id', $userStoreId);
            })
            ->when($trxSearch, function (Builder $query) use ($trxSearch) {
                $query->where('transaction_id', 'like', '%' . $trxSearch . '%')
                    ->orWhere('reference_id', 'like', '%' . $trxSearch . '%');
            })
            ->when($dateSearch, function (Builder $query) use ($dateSearch) {
                $query->whereDate('created_at', $dateSearch);
            });

        $transactionData = $transactionsQuery->get();
        $transactions = $transactionsQuery->paginate(12);

        $transactionTotal = $transactionsQuery->where('status', 'PAID')->sum('total');

        // More efficient net income calculation
        $netIncome = $transactionData->filter(function ($query) {
            return $query->status === 'PAID' && $query->delivery_status === 'selesai';
        })->sum(function ($query) {
            return $query->total * 0.9; // 0.9 is equivalent to 90% after deducting 10%
        });

        $withdrawalTotal = $this->_withdrawal
            ->where('status', WithdrawalStatusEnum::COMPLETED)
            ->where('user_id', $user->id)
            ->sum('amount');

        $accountBalance = $netIncome - $withdrawalTotal;

        // Showing the order chart
        $lastOfMonth = Carbon::now()->endOfMonth();
        $rawDailySales = $this->_transactions
            ->where('status', 'PAID')
            ->where('delivery_status', 'selesai')
            ->whereHas('order.product', function ($query) use ($userStoreId) {
                $query->where('store_id', $userStoreId);
            })
            ->selectRaw('DATE(created_at) as date, SUM(total) * 0.9 as total') // 0.9 is equivalent to 90% after deducting 10%
            ->whereMonth('created_at', $currentDate->month)
            ->groupByRaw('DATE(created_at)')
            ->get();

        $dailySales = collect(range(1, (int) $lastOfMonth->format('d')))->map(function ($day) use ($rawDailySales, $currentDate) {
            $salesDate = $currentDate->format('Y-m-') . str_pad($day, 2, '0', STR_PAD_LEFT);
            $sales = $rawDailySales->firstWhere('date', $salesDate);
            return $sales ? $sales->total : 0;
        });

        $rawDailyGross = $this->_transactions
            ->where('status', 'PAID')
            ->where('delivery_status', 'selesai')
            ->whereHas('order.product', function ($query) use ($userStoreId) {
                $query->where('store_id', $userStoreId);
            })
            ->selectRaw('DATE(created_at) as date, SUM(total) as total') // 0.9 is equivalent to 90% after deducting 10%
            ->whereMonth('created_at', $currentDate->month)
            ->groupByRaw('DATE(created_at)')
            ->get();

        $dailyGross = collect(range(1, (int) $lastOfMonth->format('d')))->map(function ($day) use ($rawDailyGross, $currentDate) {
            $salesDate = $currentDate->format('Y-m-') . str_pad($day, 2, '0', STR_PAD_LEFT);
            $sales = $rawDailyGross->firstWhere('date', $salesDate);
            return $sales ? $sales->total : 0;
        });

        // Monthly chart
        $months = collect(range(1, 12))->map(fn($month) => $currentDate->format('Y-') . str_pad($month, 2, '0', STR_PAD_LEFT))->toArray();

        $driver = DB::getDriverName();

        $monthlySalesQuery = $this->_transactions
            ->where('status', 'PAID')
            ->where('delivery_status', 'selesai')
            ->whereHas('order.product', function ($query) use ($userStoreId) {
                $query->where('store_id', $userStoreId);
            })
            ->whereYear('created_at', $currentDate->year);

        if ($driver === 'sqlite') {
            $monthlySalesQuery->selectRaw('strftime("%m", created_at) as month, SUM(total) as total')
                ->groupBy(DB::raw('strftime("%m", created_at)'));
        } elseif ($driver === 'mysql') {
            $monthlySalesQuery->selectRaw('MONTH(created_at) as month, SUM(total) as total')
                ->groupBy(DB::raw('MONTH(created_at)'));
        }

        $monthlySales = $monthlySalesQuery->get()->keyBy('month');

        $monthlySalesData = collect(range(1, 12))->map(fn($month) => $monthlySales->get($month)->total ?? 0)->toArray();

        $monthlyGrossQuery = $this->_transactions
            ->where('status', 'PAID')
            ->where('delivery_status', 'selesai')
            ->whereHas('order.product', function ($query) use ($userStoreId) {
                $query->where('store_id', $userStoreId);
            })
            ->whereYear('created_at', $currentDate->year);

        if ($driver === 'sqlite') {
            $monthlyGrossQuery->selectRaw('strftime("%m", created_at) as month, SUM(total) as total')
                ->groupBy(DB::raw('strftime("%m", created_at)'));
        } elseif ($driver === 'mysql') {
            $monthlyGrossQuery->selectRaw('MONTH(created_at) as month, SUM(total) as total')
                ->groupBy(DB::raw('MONTH(created_at)'));
        }

        $monthlyGross = $monthlyGrossQuery->get()->keyBy('month');

        $monthlyGrossData = collect(range(1, 12))->map(fn($month) => $monthlyGross->get($month)->total ?? 0)->toArray();

        return view('seller.index', compact('transactions', 'transactionTotal', 'netIncome', 'dailySales', 'dailyGross', 'months', 'monthlySalesData', 'monthlyGrossData', 'accountBalance', 'countnewOrder', 'countendOrder', 'countProduct', 'address', 'store', 'user', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserStoreRequest $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserStore $userStore) {
        $store = UserStore::where('user_id', auth()->user()->id)->first();
        return view('seller.profil', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserStore $userStore) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserStoreRequest $request, UserStore $id) {
        // dd($request->all());
        if (isset($request->gif)) {
            $id->update(['cuti' => !$id->cuti]);
            if ($request->cuti) {
                return redirect()->back()->with("warning", "Anda memasuki masa Cuti");
            } else {
                return redirect()->back()->with("success", "Anda tidak dalam masa Cuti");

            }

        }

        $data = collect($request->validated());

        // Proses unggah file avatar jika ada
        if ($request->hasFile('store_logo')) {
            // Hapus avatar lama jika ada
            if (Storage::disk('public')->exists($id->store_logo)) {
                Storage::disk('public')->delete($id->store_logo);
            }

            // Simpan avatar baru
            $data['store_logo'] = $request->file('store_logo')->store('store_logo', 'public');
        }

        if ($request->hasFile('store_cover')) {
            // Hapus avatar lama jika ada
            if ($id->store_cover !== null && Storage::disk('public')->exists($id->store_cover)) {
                Storage::disk('public')->delete($id->store_cover);
            }

            // Simpan cover baru
            $data['store_cover'] = $request->file('store_cover')->store('store_cover', 'public');
        }

        $id->update($data->except('phone')->toArray());

        # Update data user phone
        $user = $id->user;
        $user->update($data->only('phone')->toArray());

        // Redirect ke halaman profil
        return redirect()->route('seller.profile')->with("success", "Berhasil memperbaharui identitas dan profil lapak");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserStore $userStore) {
        //
    }

    public function cuti(UserStore $userStore) {

        $userStore->update(['status' => !$userStore->status]);

        return redirect()->route('seller.profile')->with("warning", "Anda Memasuki mode c");
    }
}