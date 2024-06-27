<?php

namespace App\Http\Requests;

use App\Rules\PasswordVerify;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdatePasswordRequest extends FormRequest {
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
            'old_password' => ["required", "string", "min:8", new PasswordVerify($this->old_password, $this->user()->password)],
            'password' => ["required", "string", "min:8", "confirmed", "different:old_password"],
            'password_confirmation' => 'required|string|min:8|same:password',
        ];
    }

    public function messages(): array {
        return [
            'old-password.required' => 'Password lama harus diisi.',
            'old-password.string' => 'Password lama harus berupa teks.',
            'old-password.min' => 'Password lama minimal 8 karakter.',
            'password.required' => 'Password baru harus diisi.',
            'password.string' => 'Password baru harus berupa teks.',
            'password.min' => 'Password baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
            'password.different' => 'Password baru tidak boleh sama dengan password lama.',
            'password_confirmation.required' => 'Konfirmasi password harus diisi.',
            'password_confirmation.string' => 'Konfirmasi password harus berupa teks.',
            'password_confirmation.min' => 'Konfirmasi password minimal 8 karakter.',
            'password_confirmation.same' => 'Konfirmasi password tidak cocok dengan password baru.'
        ];
    }
}