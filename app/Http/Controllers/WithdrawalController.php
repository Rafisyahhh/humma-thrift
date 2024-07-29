<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use App\Http\Requests\StoreWithdrawalRequest;
use App\Http\Requests\UpdateWithdrawalRequest;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function indexUser(Request $request)
    {
        $user = $request->user();
        $withdrawals = Withdrawal::where('user_id', $user->id)->latest()->paginate(10);

        return view('withdrawals.index', compact('withdrawals'));
    }
}
