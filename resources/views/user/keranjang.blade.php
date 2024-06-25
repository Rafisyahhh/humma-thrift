@extends('layouts.panel')


@section('content')
    <div class="cart-section">
        <div class="wishlist">
            <div>
                <h5 class="cart-heading mb-4">Keranjang</h5>
            </div>
            <div class="cart-section wishlist-section">
                <table>
                    <tbody>
                        <tr class="table-row ticket-row"  style="border: 1px solid #022346; background-color: #ffffff;">
                            <td class="table-wrapper wrapper-product">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckDefault" style="border-color: #022346;"> </div>
                            </td>
                        </tr>
                        <tr class="table-row ticket-row" style="border-color: #f8f3f3;">
                            <td class="table-wrapper wrapper-product">
                                <div class="wrapper">
                                    <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" style="border-color: #022346;"> </div>
                                    <div class="wrapper-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                            alt="img">
                                    </div>
                                    <div class="wrapper-content">
                                        <h5 class="heading" style="font-size: 18px;">Classic Design Skart</h5>
                                        <p style="color: #8b8b8b">Dress</p>
                                    </div>
                                </div>
                            </td>
                            <td class="table-wrapper" style="align-items: center;">
                            </td>
                            <td class="table-wrapper">
                                <div class="wrapper-content me-5" style="fl oat: right; text-align: end;">

                                    <p class="paragraph opacity-75 pt-1">
                                    </p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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

