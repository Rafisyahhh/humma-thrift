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
            'icon' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Nama Kategori Wajib Diisi',
            'title.unique' => 'Nama Kategori sudah digunakan.',
            'icon.required' => 'Icon Wajib Diisi',
            'icon.image' => 'Masukan harus berupa Icon',
            'icon.mimes' => 'Icon harus berupa file jpeg,png,jpg',
            'icon.max' => 'Ukuran Logo harus kurang 2MB',
        ];
    }
}
