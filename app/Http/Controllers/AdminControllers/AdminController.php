<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Enums\WithdrawalStatusEnum;
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

        $transactionTotal = $transactionsQuery->where('status', 'PAID')->sum('total_harga');

        // Hitung pendapatan bersih (10% dari setiap transaksi)
        $netIncome = $transactionData->filter(function ($query) {
            return $query->status === 'PAID' && $query->delivery_status === 'selesai';
        })->sum(function ($query) {
            return $query->total * 0.1; // 10% dari setiap transaksi
        });


        $orderR = Order::with('product')
        ->orderBy('transaction_order_id')
        ->get()
        ->groupBy('transaction_order_id');

        $orderL = Order::with('product_auction')
        ->orderBy('transaction_order_id')
        ->get()
        ->groupBy('transaction_order_id');

        $hargaBeli = $orderR->sum(function ($orders) {
            return $orders->sum(function ($order) {
                return $order->product->start_price ?? 0;
            });
        });

        $hargaBeliL = $orderL->sum(function ($orders) {
            return $orders->sum(function ($order) {
                return $order->product_auction->start_price ?? 0;
            });
        });

        $saldo = ($transactionTotal - ($hargaBeli + $hargaBeliL)) * 0.1;

        $withdrawalTotal = $this->_withdrawal
            ->where('status', WithdrawalStatusEnum::COMPLETED)
            ->where('user_id', $user->id)
            ->sum('amount');

        $accountBalance = $saldo - $withdrawalTotal;

        $chartR = $orderR->groupBy(function ($order) {
            return $order->first()->created_at->format('Y-m-d');
        })->map(function ($orders) {
            return $orders->sum(function ($order) {
                return $order->sum(function ($orderItem) {
                    return $orderItem->product->start_price ?? 0;
                });
            });
        });

        $chartL = $orderL->groupBy(function ($order) {
            return $order->first()->created_at->format('Y-m-d');
        })->map(function ($orders) {
            return $orders->sum(function ($order) {
                return $order->sum(function ($orderItem) {
                    return $orderItem->product_auction->start_price ?? 0;
                });
            });
        });


        $currentDate = Carbon::now();
        $lastOfMonth = $currentDate->endOfMonth();
        $rawDailySales = $this->_transactions
            ->where('status', 'PAID')
            // ->where('delivery_status', 'selesai')
            ->selectRaw('DATE(created_at) as date, SUM(total_harga) as total')
            ->whereMonth('created_at', $currentDate->month)
            ->groupByRaw('DATE(created_at)')
            ->get();

            $dailySales = collect(range(1, (int) $lastOfMonth->format('d')))->map(function ($day) use ($rawDailySales, $currentDate, $chartR, $chartL) {
                $salesDate = $currentDate->format('Y-m-') . str_pad($day, 2, '0', STR_PAD_LEFT);
                $sales = $rawDailySales->firstWhere('date', $salesDate);
                return $sales ? ($sales->total - ($chartR->get($salesDate, 0) + $chartL->get($salesDate, 0))) * 0.1 : 0; // Subtract (selling price - purchase price) and take 10%

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
            // ->where('delivery_status', 'selesai')
            ->whereYear('created_at', $currentDate->year);

        if ($driver === 'sqlite') {
            $monthlySalesQuery->selectRaw('strftime("%m", created_at) as month, SUM(total_harga) as total')
                ->groupBy(DB::raw('strftime("%m", created_at)'));
        } elseif ($driver === 'mysql') {
            $monthlySalesQuery->selectRaw('MONTH(created_at) as month, SUM(total_harga) as total')
                ->groupBy(DB::raw('MONTH(created_at)'));
        }

        $monthlySales = $monthlySalesQuery->get()->keyBy('month');


        $monthlyChartR = $orderR->groupBy(function ($order) {
            return $order->first()->created_at->format('Y-m');
        })->map(function ($orders) {
            return $orders->sum(function ($order) {
                return $order->sum(function ($orderItem) {
                    return $orderItem->product->start_price ?? 0;
                });
            });
        });

        $monthlyChartL = $orderL->groupBy(function ($order) {
            return $order->first()->created_at->format('Y-m');
        })->map(function ($orders) {
            return $orders->sum(function ($order) {
                return $order->sum(function ($orderItem) {
                    return $orderItem->product_auction->start_price ?? 0;
                });
            });
        });


        $monthlyNetIncome = collect(range(1, 12))->map(function ($month) use ($monthlySales, $monthlyChartR, $monthlyChartL, $currentDate) {
            $monthKey = $currentDate->format('Y-') . str_pad($month, 2, '0', STR_PAD_LEFT);
            $totalSales = $monthlySales->get($month, ['total' => 0])['total'];
            $totalPurchases = ($monthlyChartR->get($monthKey, 0) + $monthlyChartL->get($monthKey, 0));
            return ($totalSales - $totalPurchases) * 0.1;
        })->toArray();

        $monthlyGrossSales = collect(range(1, 12))->map(function ($month) use ($monthlySales) {
            return $monthlySales->get($month, ['total' => 0])['total'];
        })->toArray();


        // dd($accountBalance);
        return view('admin.index', compact('countproduct', 'countproductauction', 'countseller', 'countuser', 'months', 'transactions', 'transactionTotal', 'netIncome', 'monthlyNetIncome', 'dailySales', 'dailyGrossSales', 'monthlyGrossSales', 'accountBalance'));
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
