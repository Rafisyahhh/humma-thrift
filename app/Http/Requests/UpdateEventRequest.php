<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judul_update' => 'required',
            'subjudul_update' => 'required',
            'foto_update' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'judul_update.required' => 'Judul Event Wajib Diisi',
            'subjudul_update.required' => 'Keterangan Event Wajib Diisi',
            'foto_update.required' => 'foto Wajib Diisi',
            'foto_update.image' => 'Masukan harus berupa foto',
            'foto_update.mimes' => 'foto harus berupa file jpeg,png,jpg',
            'foto_update.max' => 'Ukuran foto harus kurang 2MB',
        ];
    }
}
