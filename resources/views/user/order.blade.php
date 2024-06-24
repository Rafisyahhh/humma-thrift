@extends('layouts.panel')

@section('css')
<head>
    <style>
        .table-row.ticket-row:hover {
            background-color: rgba(28, 56, 121, 0.1) !important;
        }
    .filter {
        margin-left: auto;
        padding: 10px;
    }
    .form-select {
        font-size: 1.25rem; /* Increase font size */
        padding: 0.75rem;   /* Increase padding */
        border-radius: 0.5rem; /* Rounded corners */
    }
    </style>
</head>
@endsection
@section('content')
    <section class="product-description">
        <div class="container">
            <div class="product-detail-section">
                <nav class="d-flex justify-content-between align-items-center">
                    <div class="nav nav-tabs" id="nav-tab" style="border:none;" role="tablist">
                        <button class="nav-link active me-2" id="nav-produk-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-produk" type="button" role="tab" aria-controls="nav-produk"
                            aria-selected="true" style="border-radius:1rem;">
                            Produk
                        </button>
                        <button class="nav-link" id="nav-lelang-tab" data-bs-toggle="tab" data-bs-target="#nav-lelang"
                            type="button" role="tab" aria-controls="nav-lelang" aria-selected="false"
                            style="border-radius:1rem;">
                            Lelang
                        </button>
                    </div>

                    <div class="filter">
                        <form action="" method="POST">
                            <select class="form-select form-select-lg" aria-label="Default select example" style="width: 200px;">
                                <option selected>Semua</option>
                                <option value="1">Dikemas</option>
                                <option value="2">Diantar</option>
                                <option value="3">Diterima</option>
                                <option value="4">Selesai</option>
                              </select>
                        </form>
                    </div>
                </nav>
                <div class="tab-content tab-item" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-produk" role="tabpanel" aria-labelledby="nav-produk-tab"
                        tabindex="0" data-aos="fade-up">
                        <div class="cart-section">
                            <table>
                                <tbody>
                                    <tr class="table-row table-top-row">
                                        <td class="table-wrapper wrapper-product">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">PRODUK</h5>
                                            </div>
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

                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">DETAIL ORDER</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-row ticket-row">
                                        <td class="table-wrapper wrapper-product" style="width: 35%; ">
                                            <div class="wrapper">
                                                
                                            </div>
                                            <div class="wrapper">
                                                <div class="wrapper-img">
                                                    <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                                        alt="img">
                                                </div>
                                                <div class="wrapper-content">
                                                    <h5 class="heading">Classic Design Skart</h5>
                                                    <p class="mb-2" style="color: #636363;">Dress</p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <p>Rp. 200.000,00</p>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">Dikemas</h5>
                                            </div>
                                        </td>

                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <div class="wrapper-btn">
                                                    <button type="button" class="shop-btn" data-bs-toggle="modal"
                                                        data-bs-target="#detailModal">
                                                        Detail
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- Detail --}}
                            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true" style="height: 99%;">
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
                                                                <p class="fs-2">Kategori : <span
                                                                        class="inner-text">Dress</span></p>
                                                                <p class="fs-2">Brand : <span
                                                                        class="inner-text">Adidas</span></p>
                                                                <p class="fs-2">Ukuran : <span
                                                                        class="inner-text">XL</span></p>
                                                                <p class="fs-2">Stok : <span class="inner-text">2</span>
                                                                </p>
                                                                <p class="fs-2">Deskripsi : <span
                                                                        class="inner-text">Lorem ipsum dolor sit
                                                                        amet
                                                                        consectetur adipisicing elit. Eveniet cumque
                                                                        perferendis libero nesciunt
                                                                        minima odio autem ratione quia, eligendi
                                                                        temporibus!</span></p>
                                                                <b>
                                                                    <p class="fs-2">Status : <span
                                                                            class="inner-text">Diterima</span>
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
                    </div>
                    <div class="tab-pane fade" id="nav-lelang" role="tabpanel" aria-labelledby="nav-lelang-tab"
                        tabindex="0">
                        <div class="cart-section">
                            <table>
                                <tbody>
                                    <tr class="table-row table-top-row">
                                        <td class="table-wrapper wrapper-product">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">PRODUK</h5>
                                            </div>
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

                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">DETAIL ORDER</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-row ticket-row">
                                        <td class="table-wrapper wrapper-product" style="width: 35%; " >
                                            <div class="wrapper">
                                                <div class="wrapper-img">
                                                    <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                                        alt="img">
                                                </div>
                                                <div class="wrapper-content">
                                                    <h5 class="heading">Classic Design Skart</h5>
                                                    <p style="color: #636363">Dress</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-wrapper" style="text-align:center;">
                                                <p style="color: #989797; font-size: 14px">Rp. 120.000,00 - 200.000,00</p>
                                                <p class="heading">Rp. 200.000,00</p>
                                        </td>
                                        <td class="table-wrapper" >
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">Dikemas</h5>
                                            </div>
                                        </td>

                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <div class="wrapper-btn">
                                                    <button type="button" class="shop-btn" data-bs-toggle="modal"
                                                        data-bs-target="#detailModal">
                                                        Detail
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- Detail --}}
                            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true" style="height: 99%;">
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
                                                                <p class="fs-2">Kategori : <span
                                                                        class="inner-text">Dress</span></p>
                                                                <p class="fs-2">Brand : <span
                                                                        class="inner-text">Adidas</span></p>
                                                                <p class="fs-2">Ukuran : <span
                                                                        class="inner-text">XL</span></p>
                                                                <p class="fs-2">Stok : <span class="inner-text">2</span>
                                                                </p>
                                                                <p class="fs-2">Deskripsi : <span
                                                                        class="inner-text">Lorem ipsum dolor sit
                                                                        amet
                                                                        consectetur adipisicing elit. Eveniet cumque
                                                                        perferendis libero nesciunt
                                                                        minima odio autem ratione quia, eligendi
                                                                        temporibus!</span></p>
                                                                <b>
                                                                    <p class="fs-2">Status : <span
                                                                            class="inner-text">Diterima</span>
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
                    </div>
                </div>
            </div>
            <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" style="margin-left: auto;">
                    {{-- <div class="modal-content"> --}}
                    <div class="login-section account-section p-0">
                        <div class="review-form m-0" style="height: 80%; width: 120rem;">
                            <div class="text-end mb-4">
                                <div class="close-btn">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                            <table style="width:110rem;">
                                <tbody>
                                    <tr class="table-row table-top-row">
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">TANGGAL</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">PEMBELI</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">EMAIL</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="table-heading">PRODUK</h5>
                                            </div>
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
                                    </tr>
                                    <tr class="table-row ticket-row">
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">19 Juni 2024</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">Hilma yumma</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">Hilma@gmail.com</h5>
                                            </div>
                                        </td>
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
                                                <h5 class="heading">Rp.120.000,00</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                            <h5 class="heading">Dibayar</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-row ticket-row">
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">19 Juni 2024</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">Hilma yumma</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">Hilma@gmail.com</h5>
                                            </div>
                                        </td>
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
                                                <h5 class="heading">Rp.100.000,00</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                            <h5 class="heading">Dibayar</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-row ticket-row">
                                        <td class="table-wrapper">

                                        </td>
                                        <td class="table-wrapper">

                                        </td>
                                        <td class="table-wrapper">

                                        </td>
                                        <td class="table-wrapper" style="position: relative;">
                                            <div class="table-wrapper-center"  style="position: absolute; right:0; display: flex; justify-content: flex-end; align-items: center; transform: translateY(-50%);">
                                                <h5 class="heading">Total : </h5>
                                            </div>
                                        </td>

                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">Rp.220.000,00</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
