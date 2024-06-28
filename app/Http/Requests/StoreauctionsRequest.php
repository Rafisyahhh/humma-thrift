<?php

namespace App\Http\Requests;

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
        ];
    }
}
