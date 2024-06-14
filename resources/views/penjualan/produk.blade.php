@extends('penjualan.layouts.app')

@section('title', 'Produk')

@section('css')
    <style>
        .table-row.ticket-row:hover {
            background: rgba(167, 146, 119, 0.40) !important;
        }
    </style>
@endsection

@section('content')
    <div class="wishlist">
        <h5>Data Produk</h5>
            <a href="tambahproduk" class="shop-btn float-left mb-4" onclick="modalAction('.submit')">Tambah Produk</a>
        <div class="cart-section wishlist-section">
            <table>
                <tbody>
                    <tr class="table-row table-top-row">
                        <td class="table-wrapper wrapper-product">
                            <h5 class="table-heading">PRODUK</h5>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">HARGA</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">AKSI</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">STATUS</h5>
                            </div>
                        </td>
                    </tr>
                    <tr class="table-row ticket-row">
                        <td class="table-wrapper wrapper-product">
                            <div class="wrapper">
                                <div class="wrapper-img">
                                    <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                        alt="img">
                                </div>
                                <div class="wrapper-content">
                                    <h5 class="heading">Classic Design Skart</h5>
                                </div>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="heading">$20.00</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <span>
                                    <button type="button" class="shop-btn" data-bs-toggle="modal"
                                        data-bs-target="#detailModal">
                                        Detail
                                    </button>

                                    <button type="button" class="shop-btn" data-bs-toggle="modal"
                                        data-bs-target="#detailLelang">
                                        Lelang
                                    </button>
                                </span>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                            fill="#AAAAAA"></path>
                                    </svg>
                                </span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- <div class="wishlist-btn">
            <a href="#" class="clean-btn">Clean Wishlist</a>
            <a href="#" class="shop-btn">View Cards</a>
        </div> --}}
    </div>

{{-- DETAIL --}}
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="login-section account-section p-0">
                    <div class="review-form m-0">
                        <div class="text-end">
                            <div class="close-btn">
                                <img src="{{ asset('template-assets/front/assets/images/homepage-one/close-btn.png') }}"
                                    onclick="modalAction('.cart')" alt="close-btn">
                            </div>
                        </div>
                        <div class="review-content">
                            <h5 class="comment-title">Add New Card</h5>

                        </div>
                        <div class="review-form-name address-form">
                            <label for="cnumber" class="form-label">Card Number*</label>
                            <input type="number" id="cnumber" class="form-control" placeholder="*** *** ***">
                        </div>
                        <div class="review-form-name address-form">
                            <label for="holdername" class="form-label">Card Holder Name*</label>
                            <input type="text" id="holdername" class="form-control" placeholder="Demo Name">
                        </div>
                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="expirydate" class="form-label">Expiry Date*</label>
                                <input type="date" id="expirydate" class="form-control">
                            </div>
                            <div class="review-form-name">
                                <label for="cvv" class="form-label">CVV*</label>
                                <input type="number" id="cvv" class="form-control" placeholder="21232">
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <a href="#" onclick="modalAction('.cart')" class="shop-btn">Add Card</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- LELANG --}}
    <div class="modal fade" id="detailLelang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="login-section account-section p-0">
                    <div class="review-form m-0">
                        <div class="text-end">
                            <div class="close-btn">
                                <img src="{{ asset('template-assets/front/assets/images/homepage-one/close-btn.png') }}"
                                    onclick="modalAction('.cart')" alt="close-btn">
                            </div>
                        </div>
                        <div class="review-content">
                            <h5 class="comment-title">Add New Card</h5>

                        </div>
                        <div class="review-form-name address-form">
                            <label for="cnumber" class="form-label">Card Number*</label>
                            <input type="number" id="cnumber" class="form-control" placeholder="*** *** ***">
                        </div>
                        <div class="review-form-name address-form">
                            <label for="holdername" class="form-label">Card Holder Name*</label>
                            <input type="text" id="holdername" class="form-control" placeholder="Demo Name">
                        </div>
                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="expirydate" class="form-label">Expiry Date*</label>
                                <input type="date" id="expirydate" class="form-control">
                            </div>
                            <div class="review-form-name">
                                <label for="cvv" class="form-label">CVV*</label>
                                <input type="number" id="cvv" class="form-control" placeholder="21232">
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <a href="#" onclick="modalAction('.cart')" class="shop-btn">Add Card</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function modalAction(modalClass) {
            $(modalClass).toggleClass('active');
        }
    </script>
@endsection
