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
                font-size: 1.25rem;
                /* Increase font size */
                padding: 0.75rem;
                /* Increase padding */
                border-radius: 0.5rem;
                /* Rounded corners */
            }

            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                background-color: #f5f5f5;
            }

            .container {
                max-width: 800px;
                margin: auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1,
            h2,
            h3 {
                color: #333;
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
                                style="width: 200px;">
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
                                        <div class="review-form m-0" style="height: 80%; width: 135rem;">
                                            <div class="text-end mb-4">
                                                <div class="close-btn">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                            </div>
                                            <section class="product product-info" style="width:125rem; height:60%;">
                                                <div class="row ">
                                                    <div class="col-md-3">
                                                        <div class="product-info-img" data-aos="fade-right">
                                                            <div class="swiper product-top"
                                                                style="height:20rem; width:20rem;">
                                                                <div class="swiper-wrapper"
                                                                    style="object-fit:cover; width:100%; height:100%;">
                                                                    <div class="swiper-slide slider-top-img">
                                                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                                                            alt="img">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="product-info-content" data-aos="fade-left">
                                                            <h5>Classic Design Skart</h5>
                                                            <div class="product-details">
                                                                <p>Kategori : <span class="inner-text">Dress</span></p>
                                                                <p>Brand : <span class="inner-text">Adidas</span></p>
                                                                   
                                                            </div>
                                                            <hr>
                                                            <div class="price">
                                                                <p>Harga : </p>
                                                                <span>Rp.140.000,00</span>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-6" style="align-items: center; justify-content:center;">
                                                        <table>
                                                            <tr>
                                                                <th>nama pembeli</th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table>
                                                            <tr></tr>
                                                        </table>
                                                    </div>
                                                    {{-- <table>
                                                        <tr>
                                                            <div>Informasi Pesanan</div>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama Pesanan</th>
                                                            <td>hilma schaefer</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nomor Pesanan</th>
                                                            <td>123456</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tanggal Pemesanan</th>
                                                            <td>24 Juni 2024</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Status Pesanan</th>
                                                            <td>Diproses</td>
                                                        </tr>
                                                        <tr>
                                                            <div>Informasi Pelanggan</div>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama Pelanggan</th>
                                                            <td>hilma schaefer</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Alamat Pengiriman</th>
                                                            <td>Jl. Merdeka No. 123, Jakarta</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nomor Telepon</th>
                                                            <td>08123456789</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email</th>
                                                            <td>hilmaschaefer@gmail.com</td>
                                                        </tr>


                                                        <tr>
                                                            <div>Ringkasan Harga</div>
                                                        </tr>
                                                        <tr>
                                                            <th>Subtotal</th>
                                                            <td>Rp 250.000</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Biaya Pengiriman</th>
                                                            <td>Rp 20.000</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pajak</th>
                                                            <td>Rp 10.000</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Diskon</th>
                                                            <td>Rp 0</td>
                                                        </tr>
                                                        <tr class="total">
                                                            <th>Total Keseluruhan</th>
                                                            <td>Rp 280.000</td>
                                                        </tr>



                                                        <tr>
                                                            <div>Metode Pembayaran</div>
                                                        </tr>
                                                        <tr>
                                                            <th>Jenis Pembayaran</th>
                                                            <td>Kartu Kredit</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Status Pembayaran</th>
                                                            <td>Sudah Dibayar</td>
                                                        </tr>

                                                        <tr>
                                                            <div>Informasi Pengiriman</div>
                                                        </tr>
                                                        <tr>
                                                            <th>Nomor Resi</th>
                                                            <td>ABC123456789</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Perkiraan Waktu Pengiriman</th>
                                                            <td>3-5 Hari Kerja</td>
                                                        </tr>
                                                    </table> --}}
                                                </div>


                                        </div>

    </section>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="tab-pane fade" id="nav-lelang" role="tabpanel" aria-labelledby="nav-lelang-tab" tabindex="0">
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
                                        data-bs-target="#lelangModal">
                                        Detail
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- Detail --}}
            <div class="modal fade" id="lelangModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                                <p class="fs-2">Kategori : <span class="inner-text">Dress</span></p>
                                                <p class="fs-2">Brand : <span class="inner-text">Adidas</span></p>
                                                <p class="fs-2">Ukuran : <span class="inner-text">XL</span></p>
                                                <p class="fs-2">Stok : <span class="inner-text">2</span>
                                                </p>
                                                <p class="fs-2">Deskripsi : <span class="inner-text">Lorem ipsum dolor
                                                        sit
                                                        amet
                                                        consectetur adipisicing elit. Eveniet cumque
                                                        perferendis libero nesciunt
                                                        minima odio autem ratione quia, eligendi
                                                        temporibus!</span></p>
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
    </div>
    </div>
    </div>

    </div>
    </section>
@endsection
