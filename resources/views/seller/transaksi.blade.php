@extends('layouts.panel')

@section('tittle', 'Transaksi')

@section('css')

    <head>
        <style>
            .table-row.ticket-row:hover {
                background: rgba(167, 146, 119, 0.40) !important;
            }

            .nav-tabs {
                border-bottom: none;
            }

            .nav-tabs .nav-item.show .nav-link,
            .nav-tabs .nav-link.active {
                color: var(--bs-nav-tabs-link-active-color);
                background-color: #ff0000;
                border-color: var(--bs-nav-tabs-link-active-border-color);
            }
        </style>
    </head>
@endsection
@section('content')

    <section class="product product-description">
        <div class="container">
            <div class="product-detail-section">
                <h5 class="mb-4">Data Transaksi</h5>

                <nav>
                    <div class="nav nav-tabs  " id="nav-tab" style="border:none;" role="tablist">
                        <button class="nav-link active" id="nav-produk-tab" data-bs-toggle="tab" data-bs-target="#nav-produk"
                            type="button" role="tab" aria-controls="nav-produk" aria-selected="true">
                            <p> Produk </p>
                        </button>
                        <button class="nav-link" id="nav-lelang-tab" data-bs-toggle="tab" data-bs-target="#nav-lelang"
                            type="button" role="tab" aria-controls="nav-lelang" aria-selected="false">
                            <p> Lelang </p>
                        </button>
                    </div>
                </nav>
                <div class="tab-content tab-item" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-produk" role="tabpanel" aria-labelledby="nav-produk-tab"
                        tabindex="0" data-aos="fade-up">
                        <div class="wishlist">
                            <div class="cart-section wishlist-section">

                                <div class="profile-section">
                                    <div class="row g-5">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="product-wrapper" style="border: 1px solid; height: 14rem;">
                                                {{-- <div class="wrapper-img" style="height: 28rem;">
                                                    <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                                        alt="img"
                                                        style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); object-fit: cover; width:100%; height:100%;">
                                                </div> --}}
                                                <div class="wrappxer-content" style="position: relative; height:13rem;">
                                                    <p class="paragraph mt-4 ms-4" style="font-size: 20px;"><b>Hilma yumma</b></p>
                                                    <p class="mt-2 ms-4">Jumlah produk : <b>2</b></p>
                                                    <a href="" data-bs-toggle="modal" data-bs-target="#detailModal">
                                                    <span class="bottom-right" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Transaksi"
                                                        style="position: absolute; bottom: 10px; right: 10px; display: flex; justify-content: right; align-items: right; margin-bottom: 10px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="m14 18l-1.4-1.45L16.15 13H4v-2h12.15L12.6 7.45L14 6l6 6z" />
                                                        </svg>
                                                    </span></a>
                                                    <p class="bottom-right mb-3 ms-2"
                                                        style="position: absolute; bottom: 10px; left: 10px; display: flex; justify-content: left; align-items: left; margin-bottom: 10px;">
                                                        19 Juni 2024
                                                        </h5p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-lelang" role="tabpanel" aria-labelledby="nav-lelang-tab"
                        tabindex="0">
                        <div class="wishlist">
                            <h5 class="mb-4">Lelang</h5>
                            <div class="cart-section wishlist-section">
                                <table style="width: 100rem;">
                                    <tbody>
                                        <tr class="table-row table-top-row">
                                            <td class="table-wrapper wrapper-product" style="width: 15%;">
                                                <h5 class="table-heading">TANGGAL</h5>
                                            </td>
                                            <td class="table-wrapper wrapper-product" style="width: 15%;">
                                                <h5 class="table-heading">PEMBELI</h5>
                                            </td>
                                            <td class="table-wrapper wrapper-product" style="width: 15%;">
                                                <h5 class="table-heading">EMAIL</h5>
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
                                            <td class="table-wrapper" style="width: 8%;">
                                                <div class="table-wrapper-center">
                                                    <h5 class="heading">19 Juni 2024</h5>
                                                </div>
                                            </td>
                                            <td class="table-wrapper" style="width: 15%;">
                                                <div class="table-wrapper-center">
                                                    <h5 class="heading">Hilma yumma</h5>
                                                </div>
                                            </td>
                                            <td class="table-wrapper" style="width: 15%;">
                                                <div class="table-wrapper-center">
                                                    <h5 class="heading">hilmaymm@gmail.com</h5>
                                                </div>
                                            </td>
                                            <td class="table-wrapper wrapper-product" style="width: 30%;">
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
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
