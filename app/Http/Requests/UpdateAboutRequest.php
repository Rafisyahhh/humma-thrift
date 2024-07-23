<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutRequest extends FormRequest {
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
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required'
        ];
    }
    public function messages(): array {
        return [
            'title.required' => 'judul wajib diisi',
            'description.required' => 'Description Wajib Diisi',
            'images.image' => 'Masukan harus berupa gambar',
            'images.mimes' => 'gambar harus berupa file jpeg,png,jpg',
            'images.max' => 'Ukuran gambar harus kurang 2MB',
        ];
    }
}
