<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pbirth' => 'required|string|max:255',
            'dbirth' => 'required|date|before:-17 years',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Nama Pengguna wajib diisi',
            'name.required' => 'Nama wajib diisi',
            'phone.required' => 'Nomor telepon wajib diisi',
            'avatar.image' => 'Avatar harus berupa file gambar',
            'avatar.mimes' => 'Avatar harus berupa file dengan tipe: jpeg, png, jpg, gif, svg',
            'avatar.max' => 'Ukuran avatar maksimal 2MB',
            'pbirth.required' => 'Tempat lahir wajib diisi',
            'dbirth.required' => 'Tanggal lahir wajib diisi',
            'dbirth.date' => 'Tanggal lahir harus berupa tanggal',
            'dbirth.before' => 'Tanggal lahir harus menunjukan usia diatas 17 tahun',
        ];
    }
}
