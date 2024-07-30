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
use Illuminate\Support\Facades\DB;

class UserStoreController extends Controller
{
    private TransactionOrder $_transactions;
    private Withdrawal $_withdrawal;

    public function __construct(TransactionOrder $transactions, Withdrawal $withdrawal)
    {
        $this->_transactions = $transactions;
        $this->_withdrawal = $withdrawal;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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
        if (Auth::check()) {
            $store = UserStore::all();
            $address = UserAddress::all();
            $user = User::all();
            $count = Product::where('user_id', auth()->id())->count();
            $count += ProductAuction::where('user_id', auth()->id())->count();
            $userId = Auth::id();

            $transactionsbulan = TransactionOrder::select(DB::raw("MONTH(paid_at) as month"), DB::raw("SUM(total_harga) as total"))
            ->join('orders', 'transaction_orders.id', '=', 'orders.transaction_order_id')
            // ->join('products', 'orders.product_id', '=', 'products.id')
            // ->where('products.user_id', $userId)
            ->leftJoin('products', 'orders.product_id', '=', 'products.id')
            ->leftJoin('product_auctions', 'orders.product_auction_id', '=', 'product_auctions.id')
            ->where(function($query) use ($userId) {
                $query->where('products.user_id', $userId)
                      ->orWhere('product_auctions.user_id', $userId);
            })
            ->whereYear('paid_at', date('Y'))
                ->groupBy(DB::raw("MONTH(paid_at)"))
                ->orderBy(DB::raw("MONTH(paid_at)"))
                ->get();

            $months = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            $countnewOrder = TransactionOrder::where('delivery_status','selesaikan pembayaran')->count();
            $countendOrder = TransactionOrder::where('delivery_status','selesai')->count();
            $countProduct = Product::where('id', auth()->id())->count();

            $datas = array_fill(0, 12, 0); // Initialize data array with zeroes
            foreach ($transactionsbulan as $transaction) {
                $datas[$transaction->month - 1] = $transaction->total;
            }

            // Ambil data transaksi per hari untuk bulan ini
            // $transactions = TransactionOrder::select(DB::raw("DAYOFWEEK(paid_at) as day_of_week"), DB::raw("SUM(total) as total"))
            // ->whereYear('paid_at', date('Y'))
            // ->whereMonth('paid_at', date('m')) // Mengambil data untuk bulan ini
            // ->groupBy(DB::raw("DAYOFWEEK(paid_at)"))
            // ->orderBy(DB::raw("DAYOFWEEK(paid_at)"))
            // ->get();


            // $days = [
            //     'Minggu','Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
            // ];


            // $data = array_fill(0, 7, 0); // Inisialisasi array data dengan nol
            // foreach ($transactions as $transaction) {
            //     $data[$transaction->day_of_week - 1] = $transaction->total;
            // }


            $transactions = TransactionOrder::select(DB::raw("DAYOFWEEK(paid_at) as day_of_week"), DB::raw("SUM(total_harga) as total"))
            ->join('orders', 'transaction_orders.id', '=', 'orders.transaction_order_id')
            // ->join('products', 'orders.product_id', '=', 'products.id')
            // ->where('products.user_id', $userId)
            ->leftJoin('products', 'orders.product_id', '=', 'products.id')
            ->leftJoin('product_auctions', 'orders.product_auction_id', '=', 'product_auctions.id')
            ->where(function($query) use ($userId) {
                $query->where('products.user_id', $userId)
                      ->orWhere('product_auctions.user_id', $userId);
            })
            ->whereYear('paid_at', date('Y'))
            ->whereMonth('paid_at', date('m')) // Mengambil data untuk bulan ini
            ->groupBy(DB::raw("DAYOFWEEK(paid_at)"))
            ->orderBy(DB::raw("DAYOFWEEK(paid_at)"))
            ->get();

        $days = [
            'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
        ];

        $grossData = array_fill(0, 7, 0); // Inisialisasi array data penghasilan kotor dengan nol
        $netData = array_fill(0, 7, 0); // Inisialisasi array data penghasilan bersih dengan nol

        foreach ($transactions as $transaction) {
            $grossData[$transaction->day_of_week - 1] = $transaction->total;
            $netData[$transaction->day_of_week - 1] = $transaction->total * 0.95; // Hitung penghasilan bersih (95% dari total)
        }


        } else {
            return redirect()->route('login')->with('error', 'Anda harus masuk untuk melihat informasi toko.');
        }

        return view('seller.index', compact('store', 'address', 'user', 'count','grossData','netData','days','transactions','transactionsbulan','months','datas','countnewOrder','countendOrder','countProduct','accountBalance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserStore $userStore)
    {
        $store = UserStore::where('user_id', auth()->user()->id)->first();
        return view('seller.profil', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserStore $userStore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserStoreRequest $request, UserStore $id)
    {
        // dd($request->all());
        if(isset($request->gif)) {
            $id->update(['cuti'=>!$id->cuti]);
            if($request->cuti){
                return redirect()->back()->with("warning","Anda memasuki masa Cuti");
            }else{
                return redirect()->back()->with("success","Anda tidak dalam masa Cuti");

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
    public function destroy(UserStore $userStore)
    {
        //
    }

    public function cuti(UserStore $userStore){

        $userStore->update(['status' => !$userStore->status]);

        return redirect()->route('seller.profile')->with("warning", "Anda Memasuki mode c");
    }
}
