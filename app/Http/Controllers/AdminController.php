<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAuction;
use App\Models\TransactionOrder;
use App\Models\User;
use App\Models\UserStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     */
        public function index()
        {
            $countproduct = Product::count();
            $countproductauction = ProductAuction::count();
            $countseller = UserStore::count();
            $countuser = User::count();

            $transactions = TransactionOrder::select(DB::raw("MONTH(paid_at) as month"), DB::raw("SUM(total_harga * 0.15) as total"))
                ->groupBy(DB::raw('MONTH(paid_at)'))
                ->get();

            $months = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];

            $data = array_fill(0, 12, 0); // Initialize data array with zeroes
            $totalBalance = 0;
            foreach ($transactions as $transaction) {
                $data[$transaction->month - 1] = $transaction->total;
                $totalBalance += $transaction->total; // Sum up the total balance

            }

            return view('admin.index', compact('countproduct', 'countproductauction', 'countseller', 'countuser', 'months', 'data','totalBalance'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
