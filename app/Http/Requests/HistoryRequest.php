<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Sesuaikan dengan kebutuhan authorization Anda
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'star' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:1000'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array {
        return [
            'product_id.required' => 'Product ID wajib diisi.',
            'product_id.exists' => 'Product ID tidak valid.',
            'star.required' => 'Isi rating terlebih dahulu.',
            'star.integer' => 'Rating bintang harus berupa angka.',
            'star.between' => 'Rating bintang harus antara 1 hingga 5.',
            'comment.required' => 'Komentar wajib diisi.',
            'comment.string' => 'Komentar harus berupa teks.',
            'comment.max' => 'Komentar tidak boleh lebih dari 1000 karakter.',
        ];
    }
}
