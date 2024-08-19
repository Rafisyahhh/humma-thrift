<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminFeeRequest extends FormRequest
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
            'biaya_admin' => 'required|numeric|min:0|max:10000'
        ];
    }

    public function messages(): array
    {
        return [
            'biaya_admin.required' => 'biaya admin harus diisi',
            'biaya_admin.min' => 'biaya admin tidak bisa minus',
            'biaya_admin.max' => 'biaya admin maksimal Rp. 10.000'
        ];
    }
}
