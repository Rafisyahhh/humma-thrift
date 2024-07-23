<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutRequest extends FormRequest
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
            // 'title' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            // 'description' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            // 'title.required' => 'judul Wajib Diisi',
            // 'image.required' => 'gambar Wajib Diisi',
            // 'image.image' => 'Masukan harus berupa gambar',
            // 'image.mimes' => 'gambar harus berupa file jpeg,png,jpg',
            // 'image.max' => 'Ukuran gambar harus kurang 2MB',
            // 'description.required' => 'Deskripsi Wajib Diisi',
        ];
    }
}
