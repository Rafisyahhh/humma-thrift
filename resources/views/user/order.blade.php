@extends('layouts.panel')

@section('style')

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
                font-size: 1.25rem;
                padding: 0.75rem;
                border-radius: 0.5rem;
            }

            .section {
                margin-bottom: 20px;
            }

            .section-title {
                margin-bottom: 10px;
                font-size: 18px;
                border-bottom: 1px solid #ddd;
                padding-bottom: 5px;
            }

            .details-table {
                width: 100%;
                border-collapse: collapse;
            }

            .details-table th,
            .details-table td {
                padding: 10px;
                border: 1px solid #ddd;
                text-align: left;
            }

            .details-table th {
                background-color: #f0f0f0;
            }

            .total {
                font-size: 18px;
                font-weight: bold;
                text-align: right;
            }

            button {
                font-size: 15px;
            }

            .product-details table {
                width: 100%;
                border-collapse: collapse;
                /* Menghilangkan jarak antar sel */
            }

            .product-details th,
            .product-details td {
                text-align: left;
                padding: 10px;
                color: rgba(0, 0, 0, 0.4);
                /* Warna teks abu-abu */
            }

            .product-details th {
                font-weight: normal;
                font-size: 17px;
            }

            .product-details .inner-text {
                font-size: 17px;
                color: rgba(0, 0, 0, 0.7);
                /* Warna teks sedikit lebih gelap untuk kontras */
            }

            .table-wrapper-center .table-heading {
                color: white;
                /* Sets text color to white */
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
                            <select class="form-select form-select-lg" aria-label="Default select example"
                                style="width: 200px;border-color:#1c3879">
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
                                    <tr class="table-row table-top-row custom-table-header" style="text-color:#fff;">
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
                                    @foreach ($transaction as $item)
                                        <tr class="table-row ticket-row">
                                            <td class="table-wrapper wrapper-product" style="width: 35%; ">
                                                <div class="wrapper">

                                                </div>
                                                <div class="wrapper">
                                                    <div class="wrapper-img">
                                                        <img src="{{ asset('storage/' . $item->Product->thumbnail) }}"
                                                            alt="img">
                                                    </div>
                                                    <div class="wrapper-content">
                                                        <h5 class="heading">{{ $item->Product->title }}</h5>
                                                        <p class="mb-2" style="color: #636363;">
                                                            {{ $item->Product->brand->title }}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <p>Rp. {{ number_format($item->total, null, null, '.') }}</p>
                                                </div>
                                            </td>
                                            <td class="table-wrapper">
                                                @if ($item->delivery_status == 'diterima')
                                                    <form action="{{ route('user.order.update', $item->transaction_id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="status" value="selesai">
                                                        <div class="table-wrapper-center">
                                                            <button type="submit" class="shop-btn m-0"
                                                                style="font-size: 15px;">
                                                                Konfirmasi telah diterima
                                                            </button>
                                                        </div>
                                                    </form>
                                                @elseif($item->delivery_status == 'selesai')
                                                    <div class="table-wrapper-center">
                                                        <span class="badge text-bg-success">
                                                            <h5 class="heading text-light">{{ $item->delivery_status }}</h5>
                                                        </span>
                                                    </div>
                                                @elseif($item->delivery_status == 'dikemas')
                                                    <div class="table-wrapper-center">
                                                        <span class="badge text-bg-warning">
                                                            <h5 class="heading text-light">{{ $item->delivery_status }}</h5>
                                                        </span>
                                                    </div>
                                                @elseif($item->delivery_status == 'diantar')
                                                    <div class="table-wrapper-center">
                                                        <span class="badge text-bg-warning">
                                                            <h5 class="heading text-light">{{ $item->delivery_status }}</h5>
                                                        </span>
                                                    </div>
                                                @elseif($item->delivery_status == 'selesaikan pesanan')
                                                    <div class="table-wrapper-center">
                                                        <span class="badge text-bg-danger">
                                                            <h5 class="heading text-light">{{ $item->delivery_status }}</h5>
                                                        </span>
                                                    </div>
                                                @endif
                                            </td>

                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <div class="wrapper-btn">
                                                        <a href="{{ route('user.transaction.show', ['reference' => $item->reference_id]) }}"
                                                            class="shop-btn">
                                                            Detail
                                                        </a>
                                                        {{-- <button type="button" class="shop-btn" data-bs-toggle="modal"
                                                            data-bs-target="#detailModal">
                                                            Detail
                                                        </button> --}}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- Detail --}}
                            {{-- <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true" style="height: 99%;">
                                <div class="modal-dialog" style="margin-left: auto;">
                                    <div class="login-section account-section p-0">
                                        <div class="review-form m-0" style="height: 75%; width: 105rem;">
                                            <div class="text-end mb-4">
                                                <div class="close-btn">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                            </div>

                                            <section class="product product-info" style="width:95rem; height:60%;">
                                                <div class="row ">
                                                    <div class="col-md-4">
                                                        <div class="product-info-img" data-aos="fade-right">
                                                            <div class="swiper product-top"
                                                                style="height:35rem; width:35rem;">
                                                                <div class="swiper-wrapper"
                                                                    style="object-fit:cover; width:100%; height:100%;">
                                                                    <div class="swiper-slide slider-top-img">
                                                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                                                            alt="img">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper product-bottom" style="z-index:2">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide slider-bottom-img">
                                                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-16.png') }}"
                                                                            alt="img">
                                                                    </div>
                                                                    <div class="swiper-slide slider-bottom-img">
                                                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-17.png') }}"
                                                                            alt="img">
                                                                    </div>
                                                                    <div class="swiper-slide slider-bottom-img">
                                                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-slider-img-2.webp') }}"
                                                                            alt="img">
                                                                    </div>
                                                                    <div class="swiper-slide slider-bottom-img">
                                                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-slider-img-2.webp') }}"
                                                                            alt="img">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-7">
                                                        <div class="product-info-content" data-aos="fade-left">
                                                            <h5>Classic Design Skart</h5>
                                                            <div class="product-details mt-2">
                                                                <table style="font-size: 16px;">
                                                                    <tr>
                                                                        <th>
                                                                            Kategori
                                                                        </th>
                                                                        <td style="padding: 8px 12px;">: </td>
                                                                        <td
                                                                            style="justify-content:right; align-items:right;">
                                                                            <span class="inner-text">
                                                                                Dress</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            Brand
                                                                        </th>
                                                                        <td style="padding: 8px 12px;">:
                                                                        </td>
                                                                        <td
                                                                            style="justify-content:right; align-items:right;">
                                                                            <span class="inner-text">
                                                                                Adidas</span>
                                                                        </td>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nama Toko</td>
                                                                        <td style="padding: 8px 12px;">: </td>
                                                                        <td
                                                                            style="justify-content:right; align-items:right;">
                                                                            <span class="inner-text">
                                                                                Humma_store</span>
                                                                        </td>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Tanggal Pemesanan</td>
                                                                        <td style="padding: 8px 12px;">: </td>
                                                                        <td
                                                                            style="justify-content:right; align-items:right;">
                                                                            <span class="inner-text">
                                                                                24 Juni 2024</span>
                                                                        </td>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Alamat Pengiriman</td>
                                                                        <td style="padding: 8px 12px;">: </td>
                                                                        <td
                                                                            style="justify-content:right; align-items:right;">
                                                                            <span class="inner-text">
                                                                                Jln. Kapten Sutadji, Malang</span>
                                                                        </td>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Status Pesanan</td>
                                                                        <td style="padding: 8px 12px;">: </td>
                                                                        <td
                                                                            style="justify-content:right; align-items:right;">
                                                                            <span class="inner-status"
                                                                                style="font-size: 12px; font-weight: bold;">
                                                                                Diproses</span>
                                                                        </td>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jenis Pembayaran</td>
                                                                        <td style="padding: 8px 12px;">: </td>
                                                                        <td
                                                                            style="justify-content:right; align-items:right;">
                                                                            <span class="inner-text">
                                                                                Kartu Kredit</span>
                                                                        </td>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <hr>
                                                                        <td>Harga</td>
                                                                        <td style="padding: 8px 12px;">: </td>
                                                                        <td
                                                                            style="justify-content:right; align-items:right; font-weight: bold; color: blue;">
                                                                            <span class="inner-text">
                                                                                Rp.140.000,00</span>
                                                                        </td>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Status Pembayaran</td>
                                                                        <td style="padding: 8px 12px;">: </td>
                                                                        <td
                                                                            style="justify-content:right; align-items:right;">
                                                                            <span class="inner-status"
                                                                                style="font-size: 12px; font-weight: bold;">
                                                                                Sudah Dibayar</span>
                                                                        </td>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
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
                                        <td class="table-wrapper wrapper-product" style="width: 35%; ">
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
                                                <h5 class="heading" style="color: red;">Dibayar</h5>
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
                                            <div class="table-wrapper-center" style="color: red;">
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
                                            <div class="table-wrapper-center"
                                                style="position: absolute; right:0; display: flex; justify-content: flex-end; align-items: center; transform: translateY(-50%);">
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
