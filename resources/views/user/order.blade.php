@extends('user.layouts.profile')

@section('profil')
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
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
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
                            <h5> DETAIL PESANAN
                            </h5>
                            <section class="product product-info">
                                <div class="container">
                                    <div class="product-info-section">
                                        <div class="row ">
                                            <div class="col-md-6">
                                                <div class="product-info-img" data-aos="fade-right">
                                                    <div class="swiper product-top">
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide slider-top-img">
                                                                <img src="{{asset('template-assets/front/assets/images/homepage-one/product-img/product-img-14.webp')}}"
                                                                    alt="img">
                                                            </div>
                                                            <div class="swiper-slide slider-top-img">
                                                                <img src="./assets/images/homepage-one/product-img/product-slider-img-1.webp"
                                                                    alt="img">
                                                            </div>
                                                            <div class="swiper-slide slider-top-img">
                                                                <img src="./assets/images/homepage-one/product-img/product-slider-img-2.webp"
                                                                    alt="img">
                                                            </div>
                                                            <div class="swiper-slide slider-top-img">
                                                                <img src="./assets/images/homepage-one/product-img/product-slider-img-3.webp"
                                                                    alt="img">
                                                            </div>
                                                            <div class="swiper-slide slider-top-img">
                                                                <img src="./assets/images/homepage-one/product-img/product-slider-img-1.webp"
                                                                    alt="img">
                                                            </div>
                                                            <div class="swiper-slide slider-top-img">
                                                                <img src="./assets/images/homepage-one/product-img/product-slider-img-2.webp"
                                                                    alt="img">
                                                            </div>
                                                            <div class="swiper-slide slider-top-img">
                                                                <img src="./assets/images/homepage-one/product-img/product-slider-img-3.webp"
                                                                    alt="img">
                                                            </div>
                                                            <div class="swiper-slide slider-top-img">
                                                                <img src="./assets/images/homepage-one/product-img/product-slider-img-1.webp"
                                                                    alt="img">
                                                            </div>
                                                            <div class="swiper-slide slider-top-img">
                                                                <img src="./assets/images/homepage-one/product-img/product-slider-img-2.webp"
                                                                    alt="img">
                                                            </div>
                                                            <div class="swiper-slide slider-top-img">
                                                                <img src="./assets/images/homepage-one/product-img/product-slider-img-3.webp"
                                                                    alt="img">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="product-info-content" data-aos="fade-left">
                                                    <span class="wrapper-subtitle">KATEGORI PRODUK</span>
                                                    <h5>Nama Produk
                                                    </h5>
                                                    <div class="price">
                                                        <span class="new-price">harga</span>
                                                    </div>
                                                    <p class="content-paragraph">Deskripsi Produk
                                                    <hr>
                                                    <div class="product-details">
                                                        <p class="category"> Ukuran : <span
                                                                class="inner-text">xxl</span></p>
                                                    </div>
                                                    <hr>
                                                    <div class="product-share">
                                                        <p>Share This:</p>
                                                        <div class="social-icons">
                                                            <a href="#">
                                                                <span class="facebook">
                                                                    <svg width="10" height="16"
                                                                        viewBox="0 0 10 16" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M3 16V9H0V6H3V4C3 1.3 4.7 0 7.1 0C8.3 0 9.2 0.1 9.5 0.1V2.9H7.8C6.5 2.9 6.2 3.5 6.2 4.4V6H10L9 9H6.3V16H3Z"
                                                                            fill="#3E75B2" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                            <a href="#">
                                                                <span class="pinterest">
                                                                    <svg width="16" height="16"
                                                                        viewBox="0 0 16 16" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M8 0C3.6 0 0 3.6 0 8C0 11.4 2.1 14.3 5.1 15.4C5 14.8 5 13.8 5.1 13.1C5.2 12.5 6 9.1 6 9.1C6 9.1 5.8 8.7 5.8 8C5.8 6.9 6.5 6 7.3 6C8 6 8.3 6.5 8.3 7.1C8.3 7.8 7.9 8.8 7.6 9.8C7.4 10.6 8 11.2 8.8 11.2C10.2 11.2 11.3 9.7 11.3 7.5C11.3 5.6 9.9 4.2 8 4.2C5.7 4.2 4.4 5.9 4.4 7.7C4.4 8.4 4.7 9.1 5 9.5C5 9.7 5 9.8 5 9.9C4.9 10.2 4.8 10.7 4.8 10.8C4.8 10.9 4.7 11 4.5 10.9C3.5 10.4 2.9 9 2.9 7.8C2.9 5.3 4.7 3 8.2 3C11 3 13.1 5 13.1 7.6C13.1 10.4 11.4 12.6 8.9 12.6C8.1 12.6 7.3 12.2 7.1 11.7C7.1 11.7 6.7 13.2 6.6 13.6C6.4 14.3 5.9 15.2 5.6 15.7C6.4 15.9 7.2 16 8 16C12.4 16 16 12.4 16 8C16 3.6 12.4 0 8 0Z"
                                                                            fill="#E12828" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                            <a href="#">
                                                                <span class="twitter">
                                                                    <svg width="18" height="14"
                                                                        viewBox="0 0 18 14" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M17.0722 1.60052C16.432 1.88505 15.7562 2.06289 15.0448 2.16959C15.7562 1.74278 16.3253 1.06701 16.5742 0.248969C15.8985 0.640206 15.1515 0.924742 14.3335 1.10258C13.6933 0.426804 12.7686 0 11.7727 0C9.85206 0 8.28711 1.56495 8.28711 3.48557C8.28711 3.7701 8.32268 4.01907 8.39382 4.26804C5.51289 4.12577 2.9165 2.73866 1.17371 0.604639C0.889175 1.13814 0.71134 1.70722 0.71134 2.34742C0.71134 3.5567 1.31598 4.62371 2.27629 5.26392C1.70722 5.22835 1.17371 5.08608 0.675773 4.83711V4.87268C0.675773 6.5799 1.88505 8.00258 3.48557 8.32268C3.20103 8.39382 2.88093 8.42938 2.56082 8.42938C2.34742 8.42938 2.09845 8.39382 1.88505 8.35825C2.34742 9.74536 3.62784 10.7768 5.15722 10.7768C3.94794 11.7015 2.45412 12.2706 0.818041 12.2706C0.533505 12.2706 0.248969 12.2706 0 12.2351C1.56495 13.2309 3.37887 13.8 5.37062 13.8C11.8082 13.8 15.3294 8.46495 15.3294 3.84124C15.3294 3.69897 15.3294 3.52113 15.3294 3.37887C16.0052 2.9165 16.6098 2.31186 17.0722 1.60052Z"
                                                                            fill="#3FD1FF" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
