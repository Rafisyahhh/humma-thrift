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
            'judul' => 'required',
            'subjudul' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul Event Wajib Diisi',
            'subjudul.required' => 'Keterangan Event Wajib Diisi',
            'foto.required' => 'foto Wajib Diisi',
            'foto.image' => 'Masukan harus berupa foto',
            'foto.mimes' => 'foto harus berupa file jpeg,png,jpg',
            'foto.max' => 'Ukuran foto harus kurang 2MB',
        ];
    }
}
