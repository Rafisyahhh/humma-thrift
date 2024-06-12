<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductCategoryRequest extends FormRequest
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
            'title' => 'required|unique:product_categories,title',
            'color' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Nama Kategori Wajib Diisi',
            'title.unique' => 'Nama Kategori sudah digunakan.',
            'color.required' => 'Warna Kategori Wajib Diisi',
        ];
    }
}
