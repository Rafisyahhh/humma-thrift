<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'method' => 'required|string',
            'addressOption' => 'required|integer|exists:user_addresses,id',
            'product_id' => 'required|integer|exists:products,id',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages()
    {
        return [
            'method.required' => 'Metode pembayaran harus diisi.',
            'method.string' => 'Metode pembayaran harus berupa string.',
            'addressOption.required' => 'Alamat pengiriman harus diisi.',
            'addressOption.integer' => 'Alamat pengiriman tidak valid.',
            'addressOption.exists' => 'Alamat pengiriman tidak ditemukan.',
            'product_id.required' => 'Produk harus diisi.',
            'product_id.integer' => 'Produk tidak valid.',
            'product_id.exists' => 'Produk tidak ditemukan.',
        ];
    }
}
