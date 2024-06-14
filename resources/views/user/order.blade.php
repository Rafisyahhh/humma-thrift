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
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">STATUS</h5>
                        </div>
                    </td>
                    <td class="table-wrapper wrapper-total">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">TOTAL</h5>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">DETAIL ORDER</h5>
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
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <h5 class="heading">Dikemas</h5>
                        </div>
                    </td>
                    <td class="table-wrapper wrapper-total">
                        <div class="table-wrapper-center">
                            <h5 class="heading">$40.00</h5>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <div class="wrapper-btn">
                                <a href="#" class="shop-btn" onclick="modalAction('.cart')">Detail</a></a>
                            </div>
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
                        <div class="wrapper-content">
                            <h5 class="heading">Classic Party Dress</h5>
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
                        <h5 class="heading">Selesai</h5>
                    </div>
                </td>
                <td class="table-wrapper wrapper-total">
                    <div class="table-wrapper-center">
                        <h5 class="heading">$40.00</h5>
                    </div>
                </td>

                <td class="table-wrapper">
                    <div class="table-wrapper-center">
                        <button class="shop-btn">
                            Detail
                        </button>
                    </div>
                </td>
            </tr> --}}
            </tbody>
        </table>
        {{-- Detail --}}
        <div class="modal-wrapper cart ">
            <div onclick="modalAction('.cart')" class="anywhere-away"></div>
            <div class="login-section account-section modal-main">
                <div class="review-form">
                    <div class="review-content">
                        <h5 class="comment-title">Detail Produk</h5>
                        <div class="close-btn">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                alt="close-btn" onclick="modalAction('.cart')"></button>
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
                                        <p class="fs-2">Deskripsi : <span class="inner-text">Lorem ipsum dolor sit amet
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
@endsection
