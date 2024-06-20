<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest {
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
            'title' => 'required|unique:products,title',
            'description' => 'required|string',
            'cover_image.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'brand_id' => 'required',
            'size' => 'required',
            'price' => 'required_if:open_bid,0|nullable|numeric',
            'bid_price_start' => 'required_if:open_bid,1|nullable|numeric',
            'bid_price_end' => 'required_if:open_bid,1|nullable|numeric',
            'category_ids' => 'required|array',
            'category_ids.*' => 'integer|exists:product_categories,id',
        ];
    }

    public function messages(): array {
        return [
            'title.required' => 'Nama produk Wajib Diisi',
            'title.unique' => 'Nama produk sudah digunakan.',
            'cover_image.required' => 'cover Wajib Diisi',
            'cover_image.image' => 'Masukan harus berupa cover',
            'cover_image.mimes' => 'cover harus berupa file jpeg,png,jpg',
            'cover_image.max' => 'Ukuran cover harus kurang 2MB',
            'brand_id.required' => 'Nama produk Wajib Diisi',
            'size.required' => 'Nama size Wajib Diisi',

        ];
    }
}