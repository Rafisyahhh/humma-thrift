<?php

namespace App\Http\Controllers;

use App\Models\TransactionOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        $transactions = $this->transactions->whereHas('order', function($query) {
            $query->whereHas('product', function($query) {
                $query->where('store_id', Auth::user()->getAttribute('store')->id);
            });
        })->paginate(12);
        $transactionTotal = $this->transactions->where('status', 'PAID')->sum('total');
        $netIncome = $transactionTotal > 0 ? $transactionTotal - ($transactionTotal * 0.05) : 0;

        return view('seller.penghasilan', compact('transactions', 'transactionTotal', 'netIncome'));
    }
}
