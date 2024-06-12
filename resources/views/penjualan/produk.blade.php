@extends('penjualan.layouts.app')
@section('tittle', 'Produk')
@section('content')
    <div class="cart-section">
        <table>
            <tbody>

                <div class="col-lg-6">
                    <a href="tambahproduk" class="shop-btn" onclick="modalAction('.submit')">Tambah Produk</a>

                    {{-- <div class="modal-wrapper submit">
                                                <div onclick="modalAction('.submit')" class="anywhere-away"></div>
                                                <div class="login-section account-section modal-main">
                                                    <div class="review-form">
                                                        <div class="review-content">
                                                            <h5 class="comment-title">Add Your Address</h5>
                                                            <div class="close-btn">
                                                                <img src="./assets/images/homepage-one/close-btn.png"
                                                                    onclick="modalAction('.submit')" alt="close-btn">
                                                            </div>
                                                        </div>
                                                        <div class=" account-inner-form">
                                                            <div class="review-form-name">
                                                                <label for="firstname" class="form-label">First
                                                                    Name*</label>
                                                                <input type="text" id="firstname"
                                                                    class="form-control" placeholder="First Name">
                                                            </div>
                                                            <div class="review-form-name">
                                                                <label for="lastname" class="form-label">Last
                                                                    Name*</label>
                                                                <input type="text" id="lastname"
                                                                    class="form-control" placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                        <div class=" account-inner-form">
                                                            <div class="review-form-name">
                                                                <label for="useremail" class="form-label">Email*</label>
                                                                <input type="email" id="useremail"
                                                                    class="form-control" placeholder="user@gmail.com">
                                                            </div>
                                                            <div class="review-form-name">
                                                                <label for="userphone" class="form-label">Phone*</label>
                                                                <input type="tel" id="userphone"
                                                                    class="form-control" placeholder="+880388**0899">
                                                            </div>
                                                        </div>
                                                        <div class="review-form-name address-form">
                                                            <label for="useraddress" class="form-label">Address*</label>
                                                            <input type="text" id="useraddress"
                                                                class="form-control" placeholder="Enter your Address">
                                                        </div>
                                                        <div class=" account-inner-form city-inner-form">
                                                            <div class="review-form-name">
                                                                <label for="usercity" class="form-label">Town /
                                                                    City*</label>
                                                                <select id="usercity" class="form-select">
                                                                    <option>Choose...</option>
                                                                    <option>Newyork</option>
                                                                    <option>Dhaka</option>
                                                                    <option selected>London</option>
                                                                </select>
                                                            </div>
                                                            <div class="review-form-name">
                                                                <label for="usernumber" class="form-label">Postcode /
                                                                    ZIP*</label>
                                                                <input type="number" id="usernumber"
                                                                    class="form-control" placeholder="0000">
                                                            </div>
                                                        </div>
                                                        <div class="login-btn text-center">
                                                            <a href="#" onclick="modalAction('.submit')"
                                                                class="shop-btn">Add Address</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}

                </div>

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
                            <h5 class="table-heading">JUMLAH</h5>
                        </div>
                    </td>
                    <td class="table-wrapper wrapper-total">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">TOTAL</h5>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">ACTION</h5>
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
                            <div class="quantity">
                                <span class="minus">
                                    -
                                </span>
                                <span class="number">1</span>
                                <span class="plus">
                                    +
                                </span>
                            </div>
                        </div>
                    </td>
                    <td class="table-wrapper wrapper-total">
                        <div class="table-wrapper-center">
                            <h5 class="heading">$40.00</h5>
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
@endsection
