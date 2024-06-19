<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'judul' => 'required',
            'subjudul' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul Event Wajib Diisi',
            'subjudul.required' => 'Keterangan Event Wajib Diisi',
            'logo.required' => 'Logo Wajib Diisi',
            'logo.image' => 'Masukan harus berupa Logo',
            'logo.mimes' => 'Logo harus berupa file jpeg,png,jpg',
            'logo.max' => 'Ukuran Logo harus kurang 2MB',
        ];
    }
}
