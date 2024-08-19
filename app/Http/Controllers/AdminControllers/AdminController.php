<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Enums\WithdrawalStatusEnum;
use App\Models\AdminFee;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductAuction;
use App\Models\TransactionOrder;
use App\Models\User;
use App\Models\UserStore;
use App\Models\Withdrawal;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {

    private TransactionOrder $_transactions;
    private Withdrawal $_withdrawal;

    public function __construct(TransactionOrder $transactions, Withdrawal $withdrawal) {
        $this->_transactions = $transactions;
        $this->_withdrawal = $withdrawal;
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $countproduct = Product::count();
        $countproductauction = ProductAuction::count();
        $countseller = UserStore::count();
        $countuser = User::count();
        $biaya = AdminFee::all();
        $biayaAdmin = $biaya->first()->biaya_admin;
        // $transactions = TransactionOrder::select(DB::raw("DAYOFWEEK(paid_at) as day_of_week"), DB::raw("SUM(total_harga * 0.05) as total"))
        //     ->groupBy(DB::raw('DAYOFWEEK(paid_at)'))
        //     ->get();

        // $months = [
        //     'January', 'February', 'March', 'April', 'May', 'June',
        //     'July', 'August', 'September', 'October', 'November', 'December'
        // ];

        // $data = array_fill(0, 12, 0);
        // $totalBalance = 0;

        // foreach ($transactions as $transaction) {
        //     $data[$transaction->month - 1] = $transaction->total;
        //     $totalBalance += $transaction->total;
        // }

        $user = Auth::user();
        $currentDate = now();
        $driver = DB::getDriverName();

        // Gunakan eager loading untuk mengurangi jumlah query
        $transactionsQuery = $this->_transactions->with(['order.product.userstore'])
            ->latest();

        $transactionData = $transactionsQuery->get();
        $transactions = $transactionsQuery->paginate(12);

        $transactionTotal = $transactionsQuery->where('status', 'PAID')->sum('total');

        // Hitung pendapatan bersih (10% dari setiap transaksi)
        $netIncome = $transactionData->filter(function ($query) {
            return $query->status === 'PAID' && $query->delivery_status === 'selesai';
        })->sum(function ($query) {
            return $query->biaya_admin; // 10% dari setiap transaksi
        });



        $withdrawalTotal = $this->_withdrawal
            ->where('status', WithdrawalStatusEnum::COMPLETED)
            ->where('user_id', $user->id)
            ->sum('amount');

        $accountBalance = $netIncome - $withdrawalTotal;



        $currentDate = Carbon::now();
        $lastOfMonth = $currentDate->endOfMonth();
        $rawDailySales = $this->_transactions
            ->where('status', 'PAID')
            ->where('delivery_status', 'selesai')
            ->selectRaw('DATE(created_at) as date, SUM(total) as total, SUM(biaya_admin) as biaya')
            ->whereMonth('created_at', $currentDate->month)
            ->groupByRaw('DATE(created_at)')
            ->get();

            $dailySales = collect(range(1, (int) $lastOfMonth->format('d')))->map(function ($day) use ($rawDailySales, $currentDate) {
                $salesDate = $currentDate->format('Y-m-') . str_pad($day, 2, '0', STR_PAD_LEFT);
                $sales = $rawDailySales->firstWhere('date', $salesDate);
                return $sales ? $sales->biaya : 0;
            });

        $dailyGrossSales = collect(range(1, (int) $lastOfMonth->format('d')))->map(function ($day) use ($rawDailySales, $currentDate) {
            $salesDate = $currentDate->format('Y-m-') . str_pad($day, 2, '0', STR_PAD_LEFT);
            $sales = $rawDailySales->firstWhere('date', $salesDate);
            return $sales ? $sales->total : 0;
        });

        // Grafik bulanan
        $months = collect(range(1, 12))->map(function ($month) use ($currentDate) {
            return $currentDate->format('Y-') . str_pad($month, 2, '0', STR_PAD_LEFT);
        })->toArray();

        $monthlySalesQuery = $this->_transactions
            ->where('status', 'PAID')
            ->where('delivery_status', 'selesai')
            ->whereYear('created_at', $currentDate->year);

            if ($driver === 'sqlite') {
                $monthlySalesQuery->selectRaw('strftime("%m", created_at) as month, SUM(total) as total, SUM(biaya_admin) as biaya')
                    ->groupBy(\DB::raw('strftime("%m", created_at)'));
            } elseif ($driver === 'mysql') {
                $monthlySalesQuery->selectRaw('MONTH(created_at) as month, SUM(total) as total, SUM(biaya_admin) as biaya')
                    ->groupBy(\DB::raw('MONTH(created_at)'));
            }


        $monthlySales = $monthlySalesQuery->get()->keyBy('month');


        $monthlyNetIncome = collect(range(1, 12))->map(function ($month) use ($monthlySales) {
            return $monthlySales->get($month, ['biaya' => 0])['biaya']; 
        })->toArray();

        $monthlyGrossSales = collect(range(1, 12))->map(function ($month) use ($monthlySales) {
            return $monthlySales->get($month, ['total' => 0])['total'];
        })->toArray();


        // dd($accountBalance);
        return view('admin.index', compact('countproduct', 'countproductauction', 'countseller', 'countuser', 'months', 'transactions', 'transactionTotal', 'netIncome', 'monthlyNetIncome', 'dailySales', 'dailyGrossSales', 'monthlyGrossSales', 'accountBalance','biayaAdmin','biaya'));
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
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
