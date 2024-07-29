<?php

namespace App\Http\Requests;

use App\Enums\WithdrawalStatusEnum;
use App\Models\TransactionOrder;
use App\Models\Withdrawal;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class WithdrawalUserIssueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' => ['required', 'numeric', 'min:1', function($attribute, $value, $fail) {
                $user = Auth::user();
                $storeId = $user->getAttribute('store')->id;
                $netIncome = (int) TransactionOrder::whereHas('order.product.userstore', fn(mixed $item) => $item->where('store_id', $storeId))
                    ->where('status', 'PAID')
                    ->where('delivery_status', 'selesai')
                    ->sum('total');

                $withdrawalTotal = (int) Withdrawal::where('user_id', $user->id)
                    ->where('status', WithdrawalStatusEnum::COMPLETED)
                    ->sum('amount');

                $accountBalance = $netIncome - $withdrawalTotal;

                if ((int) $value > $accountBalance) {
                    $fail('The withdrawal amount exceeds the available account balance.');
                }
            }]
        ];
    }
}
