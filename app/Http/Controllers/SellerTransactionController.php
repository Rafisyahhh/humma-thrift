<?php

namespace App\Http\Controllers;

use App\Models\TransactionOrder;
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
        $transactions = $this->transactions->whereHas('order', function ($query) {
            $query->whereHas('product', function ($query) {
                $query->where('store_id', Auth::user()->getAttribute('store')->id);
            });
        })->when($request->get('trx'), function (Builder $query) {
            $query->where('transaction_id', 'like', '%' . request('trx') . '%')
                ->orWhere('reference_id', 'like', '%' . request('trx') . '%');
        })->when(request('date'), function(Builder $query) {
            $query->whereDate('created_at', request('date'));
        })->paginate(12);

        $transactionTotal = $this->transactions->where('status', 'PAID')->sum('total');
        $netIncome = $transactions->map(function(Model $query) {
            return $query->getAttribute('total') - ($query->getAttribute('total') * 0.1);
        })->sum();

        return view('seller.penghasilan', compact('transactions', 'transactionTotal', 'netIncome'));
    }
}
