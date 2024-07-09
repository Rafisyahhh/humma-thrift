<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('user_stores', 'username')->ignore($this->route('id')),
            ],
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'description' => 'required|string',
            'open' => 'required',
            'close' => 'required',
            'store_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'store_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'phone.required' => 'Nomor telepon wajib diisi',
            'address.required' => 'Alamat wajib diisi',
            'description.required' => 'Deskripsi wajib diisi',
            'open.required' => 'Jam Buka Toko wajib diisi',
            'close.required' => 'Jam Tutup Toko  wajib diisi',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah terdaftar',
            'username.max' => 'Username maksimal 255 karakter',
            'username.alpha_dash' => 'Username hanya boleh berisi huruf, angka, strip, dan garis bawah',
            'store_logo.image' => 'Logo harus berupa file gambar',
            'store_logo.mimes' => 'Logo harus berupa file dengan tipe: jpeg, png, jpg, gif, svg',
            'store_logo.max' => 'Ukuran Logo maksimal 2MB',
            'store_cover.image' => 'Cover harus berupa file gambar',
            'store_cover.mimes' => 'Cover harus berupa file dengan tipe: jpeg, png, jpg, gif, svg',
            'store_cover.max' => 'Ukuran Cover maksimal 2MB',
        ];
    }
}
