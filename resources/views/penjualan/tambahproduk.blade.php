@extends('penjualan.layouts.app')
@section('tittle', 'Home')
@section('content')

    <div class="col-lg-9 justify-content-center">
        <div class="review-form">
            <div class="account-inner-form">
                <div class="row">
                    <div class="col-md-6 mb-3">
                    <div class="review-form-name">
                        <label for="title" class="form-label">Nama Produk</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Nama Produk">
                    </div>
                    </div>
                    <div class="col-md-6 mb-3">

                    <div class="review-form-name">
                        <label for="brand" class="form-label">Brand</label>
                        <select id="brand" class="form-select">
                            <option>Pilih Brand</option>
                            <option>Brand 1</option>
                            <option>Brand 2</option>
                            <option>Brand 3</option>
                        </select>
                    </div>
                    </div>
                </div>
            </div>
            <div class="account-inner-form">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="review-form-name">
                                    <label for="Stok" class="form-label">Stok</label>
                                    <input type="number" id="Stok" class="form-control" placeholder="Masukkan stok">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="review-form-name">
                                    <label for="Size" class="form-label">Size</label>
                                    <input type="number" id="Size" class="form-control" placeholder="Masukkan Ukuran">
                                </div>
                            </div>
                        </div>

                    </div>
                <div class="col-md-6 mb-3">
                    <div class="review-form-name">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select id="kategori" class="form-select">
                            <option>Pilih Kategori</option>
                            <option>Kategori 1</option>
                            <option>Kategori 2</option>
                            <option>Kategori 3</option>
                        </select>
                    </div>
                </div>
                </div>
            </div>

            <div class="row">
                <div class="review-form-name">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea id="deskripsi" class="form-control" placeholder="Masukkan Deskripsi"></textarea>
                </div>
            </div>

            <div class="account-inner-form city-inner-form">
                <div class="row">
                <div class="col-md-6 mb-3">
                <div class="review-form-name">
                    <label for="teritory" class="form-label">Town / City*</label>
                    <select id="teritory" class="form-select">
                        <option>Choose...</option>
                        <option>Newyork</option>
                        <option>Dhaka</option>
                        <option selected>London</option>
                    </select>
                </div>
                </div>
                <div class="col-md-6 mb-3">
                <div class="review-form-name">
                    <label for="post" class="form-label">Postcode / ZIP*</label>
                    <input type="number" id="post" class="form-control" placeholder="0000">
                </div>
                </div>
            </div>
            </div>

            <div class="submit-btn">
                <a href="#" class="shop-btn cancel-btn">Cancel</a>
                <a href="#" class="shop-btn update-btn">Update Profile</a>
            </div>
        </div>
    </div>



@endsection
