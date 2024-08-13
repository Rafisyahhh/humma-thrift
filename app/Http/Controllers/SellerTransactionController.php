<?php

namespace App\Http\Controllers;

use App\Enums\WithdrawalStatusEnum;
use App\Models\TransactionOrder;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SellerTransactionController extends Controller {
    private TransactionOrder $_transactions;
    private Withdrawal $_withdrawal;

    public function __construct(TransactionOrder $transactions, Withdrawal $withdrawal) {
        $this->_transactions = $transactions;
        $this->_withdrawal = $withdrawal;
    }

    /**
     * Showing the list of trx data
     */
    public function index(Request $request) {
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

        $monthlySales = $this->_transactions
            ->where('status', 'PAID')
            ->where('delivery_status', 'selesai')
            ->whereHas('order.product', function ($query) use ($userStoreId) {
                $query->where('store_id', $userStoreId);
            })
            ->selectRaw('strftime("%m", created_at) as month, SUM(total) as total')
            ->whereYear('created_at', $currentDate->year)
            ->groupBy(\DB::raw('strftime("%m", created_at)'))
            ->get()
            ->keyBy('month');

        $monthlySalesData = collect(range(1, 12))->map(fn($month) => $monthlySales->get($month)->total ?? 0)->toArray();

        $monthlyGross = $this->_transactions
            ->where('status', 'PAID')
            ->where('delivery_status', 'selesai')
            ->whereHas('order.product', function ($query) use ($userStoreId) {
                $query->where('store_id', $userStoreId);
            })
            ->selectRaw('strftime("%m", created_at) as month, SUM(total) as total')
            ->whereYear('created_at', $currentDate->year)
            ->groupBy(\DB::raw('strftime("%m", created_at)'))
            ->get()
            ->keyBy('month');

        $monthlyGrossData = collect(range(1, 12))->map(fn($month) => $monthlyGross->get($month)->total ?? 0)->toArray();

        return view('seller.penghasilan', compact('transactions', 'transactionTotal', 'netIncome', 'dailySales', 'dailyGross', 'months', 'monthlySalesData', 'monthlyGrossData', 'accountBalance'));
    }
}