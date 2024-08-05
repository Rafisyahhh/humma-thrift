<?php

namespace App\Http\Controllers;

use App\Enums\WithdrawalStatusEnum;
use App\Models\Withdrawal;
use App\Http\Requests\StoreWithdrawalRequest;
use App\Http\Requests\UpdateWithdrawalRequest;
use App\Http\Requests\WithdrawalUserIssueRequest;
use App\Models\Bank;
use App\Models\TransactionOrder;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Log;
use Str;

class WithdrawalController extends Controller {
    private Bank $_banks;
    private Withdrawal $_withdrawal;
    private TransactionOrder $_transaction;

    public function __construct(Bank $bank, Withdrawal $withdrawal, TransactionOrder $transaction) {
        $this->_banks = $bank;
        $this->_withdrawal = $withdrawal;
        $this->_transaction = $transaction;
    }

    public function indexUser(Request $request) {
        $user = $request->user();
        $withdrawals = $this->_withdrawal->where('user_id', $user->id)->latest()->paginate(10);

        return view('seller.withdrawals', compact('withdrawals'));
    }

    public function createUser(Request $request) {
        $user = $request->user();
        $banks = $this->_banks->all();

        $netIncome = $this->_transaction
            ->where('status', 'PAID')
            ->where('delivery_status', 'selesai')
            ->sum('total') * 0.9;

        $withdrawalTotal = $this->_withdrawal
            ->where('status', WithdrawalStatusEnum::COMPLETED)
            ->where('user_id', $user->id)
            ->sum('amount');

        $pendingWithdrawals = $this->_withdrawal
            ->where('user_id', $user->id)
            ->whereNotIn('status', [WithdrawalStatusEnum::COMPLETED, WithdrawalStatusEnum::FAILED])
            ->exists();

        $accountBalance = $netIncome - $withdrawalTotal;

        if ($pendingWithdrawals) {
            abort(403, "Kamu masih ada transaksi yang masih belum dicairkan");
        }

        return view('seller.withdrawals-create', compact('accountBalance', 'banks'));
    }

    public function detailUser(Withdrawal $withdrawal) {
        return view('seller.withdrawals-detail', compact('withdrawal'));
    }

    public function issueUser(WithdrawalUserIssueRequest $request) {
        try {
            $data = collect($request->validated());

            $transactionID = Str::random(16);

            $data->put('user_id', $request->user()->id);
            $data->put('user_store_id', $request->user()->store->id);
            $data->put('status', WithdrawalStatusEnum::PENDING);
            $data->put('transaction_id', Str::upper("WTH-{$transactionID}"));

            $this->_withdrawal->create($data->toArray());

            $users = User::where("role");
            foreach ($users as $user) {
                // $user->notify(new WithdrawalNotification($data));
                dd($user->getUserRoleInstance());
            }

            return redirect()->route('seller.withdraw.index')->with('success', 'Berhasil mengajukan pencairan dana.');
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), $th->getTrace());
            return redirect()->back()->with('error', $th->getMessage());
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}