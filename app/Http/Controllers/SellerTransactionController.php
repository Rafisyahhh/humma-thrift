<?php

namespace App\Http\Controllers;

use App\Models\TransactionOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SellerTransactionController extends Controller
{
    private TransactionOrder $transactions;

    public function __construct(TransactionOrder $transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * Showing the list of trx data
     */
    public function index(Request $request)
    {
        $userStoreId = Auth::user()->getAttribute('store')->id;
        $trxSearch = $request->get('trx');
        $dateSearch = $request->get('date');
        $storeId = Auth::user()->store->id;

        $transactionsQuery = $this->transactions->latest()
            ->whereHas('order.product', function ($query) use ($userStoreId) {
                $query->where('store_id', $userStoreId);
            })
            ->whereHas('order.product.userstore', fn(mixed $item) => $item->where('store_id', $storeId))
            ->when($trxSearch, function (Builder $query) use ($trxSearch) {
                $query->where('transaction_id', 'like', '%' . $trxSearch . '%')
                    ->orWhere('reference_id', 'like', '%' . $trxSearch . '%');
            })
            ->when($dateSearch, function (Builder $query) use ($dateSearch) {
                $query->whereDate('created_at', $dateSearch);
            });

        $transactions = $transactionsQuery->paginate(12);

        $transactionTotal = $transactionsQuery->where('status', 'PAID')->sum('total');
        $netIncome = $transactions->sum(fn(Model $query) => $query->total - ($query->total * 0.1));

        // Showing the order chart
        $lastOfMonth = Carbon::now()->endOfMonth();
        $rawDailySales = $this->transactions
            ->where('status', 'PAID')
            ->whereHas('order.product.userstore', fn(mixed $item) => $item->where('store_id', $storeId))
            ->selectRaw('DATE(created_at) as date, SUM(total) as total')
            ->whereMonth('created_at', now()->month)
            ->groupByRaw('DATE(created_at)')
            ->get();

        $dailySales = collect(range(1, (int) $lastOfMonth->format('d')))->map(function ($day) use ($rawDailySales) {
            $sales = $rawDailySales->firstWhere('date', now()->format('Y-m-') . str_pad($day, 2, '0', STR_PAD_LEFT));
            return $sales ? $sales->total : 0;
        });

        // Monthly chart
        $currentDate = now();
        $months = collect(range(1, 12))->map(fn($month) => $currentDate->format('Y-') . str_pad($month, 2, '0', STR_PAD_LEFT))->toArray();

        $monthlySales = $this->transactions
            ->where('status', 'PAID')
            ->whereHas('order.product.userstore', fn(mixed $item) => $item->where('store_id', $storeId))
            ->selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->whereYear('created_at', $currentDate->year)
            ->groupBy(\DB::raw('MONTH(created_at)'))
            ->get()
            ->keyBy('month');

        $monthlySalesData = collect(range(1, 12))->map(fn($month) => $monthlySales->get($month)->total ?? 0)->toArray();

        return view('seller.penghasilan', compact('transactions', 'transactionTotal', 'netIncome', 'dailySales', 'months', 'monthlySales', 'monthlySalesData'));
    }
}
