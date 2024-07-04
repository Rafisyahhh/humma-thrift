@extends('layouts.home')
@section('title', 'Checkout')
@push('style')
@endpush
@section('content')
    <section class="blog about-blog pb-5">
        <div class="container">
            <div class="blog-heading about-heading">
                <h1 class="heading">Checkout</h1>
            </div>
        </div>
    </section>
    <section class="checkout product footer-padding py-5">
        <div class="container">
            <div class="checkout-section">
                <form class="row gy-5">
                    <div class="col-lg-8">
                        <div class="checkout-wrapper">
                            <div class="account-section billing-section">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="wrapper-heading">Alamat Saya</h5>
                                    <button class="shop-btn openModalAddress" type="button" style="width: 25rem;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z" />
                                        </svg>
                                        Tambah Alamat Baru
                                    </button>
                                </div>
                                <hr>
                                <p style="font-size: 1.9rem">Alamat</p>
                                <div class="order-summery">
                                    <div class="subtotal product-total">
                                        <div class="mx-5" style="width: 77.5rem;">
                                            <div class="radio-container" style="margin-bottom: 10px; width: 77.5rem;">
                                                <input type="radio" id="option1" name="option" value="option1"
                                                    class="custom-radio">
                                                <label for="option1" class="radio-label"
                                                    style="display: flex; flex-direction: column; width: 77.5rem;">
                                                    <div
                                                        style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                                                        <p class="mb-1" style="font-size: 17px; margin: 0;">
                                                            <b style="font-size: 17px;"></b> |
                                                            +
                                                        </p>
                                                        <button type="button" class="openModalUpdate"
                                                            data-modal-id="updateModal"
                                                            style="color: blue; background: none; border: none; padding: 0; cursor: pointer; margin-left: 10px;">
                                                            Ubah
                                                        </button>
                                                    </div>
                                                    <p style="font-size: 15px; margin: 5px 0;">

                                                    </p>
                                                </label>
                                            </div>
                                            <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-wrapper">
                            <div class="account-section billing-section" style="margin-top: 2.5rem;">
                                <h5 class="wrapper-heading">Daftar Order</h5>
                                <div class="order-summery">
                                    <hr>
                                    <div class="subtotal product-total">
                                        <ul class="product-list">
                                            <li>
                                                <div class="d-flex gap-3">
                                                    <img src="{{ asset('storage/') }}" width="40" />
                                                    <div class="mt-1">
                                                        <h5 class="wrapper-heading"></h5>
                                                        <p class="paragraph"></p>
                                                    </div>
                                                </div>
                                                <div class="price mt-3">
                                                    <h5 class="wrapper-heading">
                                                    </h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="checkout-wrapper">
                            <div class="account-section billing-section">
                                <h5 class="wrapper-heading">Ringkasan Belanja</h5>
                                <div class="order-summery">
                                    <div class="subtotal product-total">
                                        <h5 class="wrapper-heading">Total Harga</h5>
                                        <h5 class="wrapper-heading">Rp
                                        </h5>
                                    </div>
                                    <div class="subtotal total">
                                        <h5 class="wrapper-heading">Total Belanja</h5>
                                        <h5 class="wrapper-heading price">
                                            Rp</h5>
                                    </div>
                                    <button type="button" class="shop-btn openModalPay" data-bs-toggle="modal"
                                        data-bs-target="#PayModal">Pilih Pembayaran</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
