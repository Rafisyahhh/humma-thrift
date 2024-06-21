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
            'title' => ['required', $this->product_type == 'bid' ? 'unique:product_auctions,title' : 'unique:products,title'],
            'description' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_galery.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'brand_id' => 'required',
            'size' => 'required',
            'price' => 'required_if:open_bid,0|nullable|numeric',
            'bid_price_start' => ['required_if:open_bid,1', 'nullable', 'numeric', "max:$this->bid_price_end"],
            'bid_price_end' => ['required_if:open_bid,1', 'nullable', 'numeric'],
            // 'bid_price_end' => ['required_if:open_bid,1', 'nullable', 'numeric', "min:$this->bid_price_start"],
            'category_id' => 'required|array',
            'category_id.*' => 'integer|exists:product_categories,id',
        ];
    }

    public function messages(): array {
        return [
            'title.required' => 'Nama produk Wajib Diisi',
            'title.unique' => 'Nama produk sudah digunakan.',
            'image_galery.required' => 'cover Wajib Diisi',
            'image_galery.image' => 'Masukan harus berupa cover',
            'image_galery.mimes' => 'cover harus berupa file jpeg,png,jpg',
            'image_galery.max' => 'Ukuran cover harus kurang 2MB',
            'brand_id.required' => 'Nama produk Wajib Diisi',
            'size.required' => 'Nama size Wajib Diisi',
            'bid_price_start.max' => 'Harga awal tidak boleh lebh besar dari harga akhir',

        ];
    }
}