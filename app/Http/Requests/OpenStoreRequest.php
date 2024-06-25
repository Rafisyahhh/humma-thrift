<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpenStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'store_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nic_owner' => 'required|string|max:16',
            'nic_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nama toko wajib diisi.',
            'store_logo.image' => 'Logo toko harus berupa gambar.',
            'nic_owner.required' => 'Nomor identitas wajib diisi.',
            'nic_photo.required' => 'Foto kartu identitas wajib diunggah.',
            'nic_photo.image' => 'Foto kartu identitas harus berupa gambar.',
        ];
    }
}
