<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBrandRequest extends FormRequest
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
        $brandId = $this->route('brand');
        return [
            'title_update' => 'required|unique:brands,title',
            'title_update' => [
                'required',
                Rule::unique('brands', 'title')->ignore($brandId)
            ],
            'logo_update' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'title_update.required' => 'Nama Brand Wajib Diisi',
            'title_update.unique' => 'Nama Brand sudah digunakan.',
            'logo_update.image' => 'Masukan harus berupa Logo',
            'logo_update.mimes' => 'Logo harus berupa file jpeg,png,jpg',
            'logo_update.max' => 'Ukuran Logo harus kurang 2MB',        ];
    }
}
