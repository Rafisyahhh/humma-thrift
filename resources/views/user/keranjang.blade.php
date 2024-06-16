@extends('layouts.panel')

@section('content')
    <div class="cart-section">
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
                    <td class="table-wrapper wrapper-total">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">TOTAL</h5>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">DETAIL PRODUK
                            </h5>
                        </div>
                    </td>
                </tr>
                <tr class="table-row ticket-row">
                    <td class="table-wrapper wrapper-product">
                        <div class="wrapper">
                            <div class="wrapper-img">
                                <img src="template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp"
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
                    <td class="table-wrapper wrapper-total">
                        <div class="table-wrapper-center">
                            <h5 class="heading">$40.00</h5>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <button type="button" class="shop-btn" data-bs-toggle="modal" data-bs-target="#detailModal">
                                Detail
                            </button>
                        </div>
                    </td>
                </tr>

                {{-- <tr class="table-row ticket-row">
                <td class="table-wrapper wrapper-product">
                    <div class="wrapper">
                        <div class="wrapper-img">
                            <img src="template-assets/front/assets/images/homepage-one/product-img/product-img-4.webp"
                                alt="img">
                        </div>
                    </td>
                    <td class="table-wrapper wrapper-total">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">TOTAL</h5>
                        </div>
                    </div>
                </td>
                <td class="table-wrapper">
                    <div class="table-wrapper-center">
                        <h5 class="heading">$20.00</h5>
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
            </tr> --}}
            </tbody>
        </table>
        {{-- Detail --}}
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="height: 99%;">
            <div class="modal-dialog" style="margin-left: auto;">
                <div class="login-section account-section p-0">
                    <div class="review-form m-0" style="height: 80%; width: 95rem;">
                        <div class="text-end mb-4">
                            <div class="close-btn">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        <section class="product product-info" style="width:85rem; height:60%;">
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="product-info-img" data-aos="fade-right">
                                        <div class="swiper product-top" style="height:50rem;">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide slider-top-img">
                                                    <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                                        alt="img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="product-info-content" data-aos="fade-left">
                                        <h5>Classic Design Skart</h5>
                                        <div class="price">
                                            <span class="new-price">Rp.100.000,00 - 200.000,00</span>
                                        </div>
                                        <hr>
                                        <div class="product-details">
                                            <p class="fs-2">Kategori : <span class="inner-text">Dress</span></p>
                                            <p class="fs-2">Brand : <span class="inner-text">Adidas</span></p>
                                            <p class="fs-2">Ukuran : <span class="inner-text">XL</span></p>
                                            <p class="fs-2">Stok : <span class="inner-text">2</span></p>
                                            <p class="fs-2">Deskripsi : <span class="inner-text">Lorem ipsum dolor sit
                                                    amet
                                                    consectetur adipisicing elit. Eveniet cumque perferendis libero nesciunt
                                                    minima odio autem ratione quia, eligendi temporibus!</span></p>
                                            <b>
                                                <p class="fs-2">Status : <span class="inner-text">Diterima</span>
                                                </p>
                                            </b>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
