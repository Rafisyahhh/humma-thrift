<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductCategoryRequest extends FormRequest
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
            'title' => 'required',
            'icon' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'type' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Nama Kategori Wajib Diisi',
            'title.unique' => 'Nama Kategori sudah digunakan.',
            'icon.image' => 'Masukan harus berupa Logo',
            'icon.mimes' => 'Logo harus berupa file jpeg,png,jpg',
            'icon.max' => 'Ukuran Logo harus kurang 2MB',
            'type.required' => 'type harus ada',
        ];
    }
}
