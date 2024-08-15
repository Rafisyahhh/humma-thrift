<?php

namespace App\Http\Controllers;

use App\Enums\WithdrawalStatusEnum;
use App\Models\Order;
use App\Models\TransactionOrder;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SellerTransactionController extends Controller
{
    private TransactionOrder $_transactions;
    private Withdrawal $_withdrawal;

    public function __construct(TransactionOrder $transactions, Withdrawal $withdrawal)
    {
        $this->_transactions = $transactions;
        $this->_withdrawal = $withdrawal;
    }

    /**
     * Showing the list of trx data
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

        $transactionTotal = $transactionsQuery->where('status', 'PAID')->sum('total_harga');
        // $transactionTotalAwal = $transactionsQuery->where('status', 'PAID')->sum('order.product.start_price');

        // More efficient net income calculation
        $netIncome = $transactionData->filter(function ($query) {
            return $query->status === 'PAID' && $query->delivery_status === 'selesai';
        })->sum(function ($query) {
            return $query->total * 0.9; // 0.9 is equivalent to 90% after deducting 10%
        });
        // Formula: start_price + ((total - start_price) * 0.9)
        //     $startPrice = $query->order->product->start_price;
        //     $total = $query->total;
        //     return $startPrice + (($total - $startPrice) * 0.9);
        // });

        $orderR = Order::with('product.userstore')
            ->orderBy('transaction_order_id')
            ->get()
            ->groupBy('transaction_order_id');

        $orderL = Order::with('product_auction.userstore')
            ->orderBy('transaction_order_id')
            ->get()
            ->groupBy('transaction_order_id');


        // You need to handle collections when accessing nested properties
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

        $saldo = ($hargaBeli + $hargaBeliL) + (($transactionTotal - ($hargaBeli + $hargaBeliL)) * 0.9);

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

        // Showing the order chart
        $lastOfMonth = Carbon::now()->endOfMonth();
        $rawDailySales = $this->_transactions
            ->where('status', 'PAID')
            // ->where('delivery_status', 'selesai')
            ->whereHas('order.product', function ($query) use ($userStoreId) {
                $query->where('store_id', $userStoreId);
            })
            ->selectRaw('DATE(created_at) as date, SUM(total_harga) as total') // 0.9 is equivalent to 90% after deducting 10%
            ->whereMonth('created_at', $currentDate->month)
            ->groupByRaw('DATE(created_at)')
            ->get();

        $dailySales = collect(range(1, (int) $lastOfMonth->format('d')))->map(function ($day) use ($rawDailySales, $currentDate, $chartR, $chartL) {
            $salesDate = $currentDate->format('Y-m-') . str_pad($day, 2, '0', STR_PAD_LEFT);
            $sales = $rawDailySales->firstWhere('date', $salesDate);
            return $sales ? ($chartR->get($salesDate, 0) + $chartL->get($salesDate, 0) + ($sales->total - (($chartR->get($salesDate, 0) + $chartL->get($salesDate, 0)))) * 0.9) : 0;
        });

        $rawDailyGross = $this->_transactions
            ->where('status', 'PAID')
            // ->where('delivery_status', 'selesai')
            ->whereHas('order.product', function ($query) use ($userStoreId) {
                $query->where('store_id', $userStoreId);
            })
            ->selectRaw('DATE(created_at) as date, SUM(total_harga) as total') // 0.9 is equivalent to 90% after deducting 10%
            ->whereMonth('created_at', $currentDate->month)
            ->groupByRaw('DATE(created_at)')
            ->get();


        $dailyGross = collect(range(1, (int) $lastOfMonth->format('d')))->map(function ($day) use ($rawDailyGross, $currentDate) {
            $salesDate = $currentDate->format('Y-m-') . str_pad($day, 2, '0', STR_PAD_LEFT);
            $sales = $rawDailyGross->firstWhere('date', $salesDate);
            return $sales ? $sales->total : 0;
        });

        // Group orders by month
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

        $months = collect(range(1, 12))->map(fn($month) => $currentDate->format('Y-') . str_pad($month, 2, '0', STR_PAD_LEFT))->toArray();

        $driver = \DB::getDriverName();

        $monthlySalesQuery = $this->_transactions
            ->where('status', 'PAID')
            // ->where('delivery_status', 'selesai')
            // ->whereHas('order.product', function ($query) use ($userStoreId) {
            //     $query->where('store_id', $userStoreId);
            // })
            // ->selectRaw('MONTH(created_at) as month, SUM(total_harga) as total')
            // ->whereYear('created_at', $currentDate->year)
            // ->groupBy(\DB::raw('MONTH(created_at)'))
            // ->get()
            // ->keyBy('month');
            ->whereYear('created_at', $currentDate->year);

            if ($driver === 'sqlite') {
                $monthlySalesQuery->selectRaw('strftime("%m", created_at) as month, SUM(total_harga) as total')
                    ->groupBy(\DB::raw('strftime("%m", created_at)'));
            } elseif ($driver === 'mysql') {
                $monthlySalesQuery->selectRaw('MONTH(created_at) as month, SUM(total_harga) as total')
                    ->groupBy(\DB::raw('MONTH(created_at)'));
            }

            $monthlySales = $monthlySalesQuery->get()->keyBy('month');

        $monthlySalesData = collect(range(1, 12))->map(function ($month) use ($monthlySales, $monthlyChartR, $monthlyChartL, $currentDate) {
            $monthKey = $currentDate->format('Y-') . str_pad($month, 2, '0', STR_PAD_LEFT);
            $totalSales = $monthlySales->get($month, ['total' => 0])['total'];
            $totalPurchases = ($monthlyChartR->get($monthKey, 0) + $monthlyChartL->get($monthKey, 0));
            return ($totalPurchases + (($totalSales - $totalPurchases) * 0.9));
        })->toArray();



        // Calculate monthly gross
        $monthlyGrossQuery = $this->_transactions
            ->where('status', 'PAID')
            // ->where('delivery_status', 'selesai')
            ->whereHas('order.product', function ($query) use ($userStoreId) {
                $query->where('store_id', $userStoreId);
            })
            // ->selectRaw('MONTH(created_at) as month, SUM(total_harga) as total')
            // ->whereYear('created_at', $currentDate->year)
            // ->groupBy(\DB::raw('MONTH(created_at)'))
            // ->get()
            // ->keyBy('month');
            ->whereYear('created_at', $currentDate->year);

            if ($driver === 'sqlite') {
                $monthlyGrossQuery->selectRaw('strftime("%m", created_at) as month, SUM(total_harga) as total')
                    ->groupBy(\DB::raw('strftime("%m", created_at)'));
            } elseif ($driver === 'mysql') {
                $monthlyGrossQuery->selectRaw('MONTH(created_at) as month, SUM(total_harga) as total')
                    ->groupBy(\DB::raw('MONTH(created_at)'));
            }

            $monthlyGross = $monthlyGrossQuery->get()->keyBy('month');

        $monthlyGrossData = collect(range(1, 12))->map(fn($month) => $monthlyGross->get($month)->total ?? 0)->toArray();

        return view('seller.penghasilan', compact('transactions', 'transactionTotal', 'netIncome', 'dailySales', 'dailyGross', 'months', 'monthlySalesData', 'monthlyGrossData', 'accountBalance', 'saldo'));
    }
}
