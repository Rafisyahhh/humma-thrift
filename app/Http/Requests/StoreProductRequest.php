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
            'title' => ['required', "unique:$this->product_type,title"],
            'description' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_galery' => 'required|array|max:4',
            'image_galery.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'brand_id' => 'required',
            'size' => 'required',
            'price' => 'required_if:product_type,products|nullable|numeric',
            'bid_price_start' => ['required_if:product_type,product_auctions', 'nullable', 'numeric', "max:$this->bid_price_end"],
            'bid_price_end' => ['required_if:product_type,product_auctions', 'nullable', 'numeric'],
            // 'bid_price_end' => ['required_if:product_type,1', 'nullable', 'numeric', "min:$this->bid_price_start"],
            'category_id' => 'required|array',
            'category_id.*' => 'integer|exists:product_categories,id',
        ];
    }

    public function messages(): array {
        return [
            'title.required' => 'Nama produk Wajib Diisi',
            'title.unique' => 'Nama produk sudah digunakan.',
            'description.required' => 'Deskripsi produk Wajib Diisi',
            'description.string' => 'Deskripsi harus berupa teks',
            'thumbnail.required' => 'Thumbnail Wajib Diisi',
            'thumbnail.image' => 'Masukan harus berupa thumbnail',
            'thumbnail.mimes' => 'Thumbnail harus berupa file jpeg,png,jpg',
            'thumbnail.max' => 'Ukuran thumbnail harus kurang 2MB',
            'image_galery.required' => 'Gambar galeri Wajib Diisi',
            'image_galery.max' => 'Gambar tidak boleh melebihi 4',
            'image_galery.*.image' => 'Masukan harus berupa gambar galeri',
            'image_galery.*.mimes' => 'Gambar galeri harus berupa file jpeg,png,jpg',
            'image_galery.*.max' => 'Ukuran gambar galeri harus kurang 2MB',
            'brand_id.required' => 'Nama produk Wajib Diisi',
            'size.required' => 'Nama size Wajib Diisi',
            'price.required_if' => 'Harga harus diisi jika produk bukan lelang',
            'price.numeric' => 'Harga harus berupa angka',
            'bid_price_start.max' => 'Harga awal tidak boleh lebih besar dari harga akhir',
            'bid_price_end.required_if' => 'Harga akhir harus diisi jika produk lelang',
            'bid_price_end.numeric' => 'Harga akhir harus berupa angka',
            'category_id.required' => 'Kategori produk Wajib Diisi',
            'category_id.array' => 'Kategori harus berupa array',
            'category_id.*.integer' => 'ID kategori harus berupa angka',
            'category_id.*.exists' => 'ID kategori tidak ditemukan',
        ];
    }
}