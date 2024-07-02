<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBrandRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'title' => ["required", "unique:brands,title," . $this->brand->id],
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages(): array {
        return [
            'title.required' => 'Nama Brand Wajib Diisi',
            'title.unique' => 'Nama Brand sudah digunakan.',
            'logo.image' => 'Masukan harus berupa Logo',
            'logo.mimes' => 'Logo harus berupa file jpeg,png,jpg',
            'logo.max' => 'Ukuran Logo harus kurang 2MB',];
    }
}