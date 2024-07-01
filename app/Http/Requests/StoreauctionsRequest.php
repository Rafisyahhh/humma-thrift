<?php

namespace App\Http\Requests;

use App\Models\ProductAuction;
use Illuminate\Foundation\Http\FormRequest;

class StoreauctionsRequest extends FormRequest
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
            'auction_price' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'auction_price.required' => 'bid lelang Wajib Diisi',
            // 'auction_price.after' => 'bid lelang lebih dari harga awal',
            // 'auction_price.before' => 'bid lelang kurang dari harga akhir',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $product = ProductAuction::find($this->product_id);

            if ($product) {
                if ($this->auction_price <= $product->bid_price_start) {
                    $validator->errors()->add('auction_price', 'Auction price must be greater than the starting bid price.');
                }

                if ($this->auction_price >= $product->bid_price_end) {
                    $validator->errors()->add('auction_price', 'Auction price must be less than the ending bid price.');
                }
            }
        });
    }
}
