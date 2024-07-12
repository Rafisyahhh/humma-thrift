@extends('layouts.panel')

@section('title', 'Transaksi')

@section('css')

    <head>
        <style>
            .table-row.ticket-row:hover {
                background: rgba(167, 146, 119, 0.40) !important;
            }

            .table-row .table-wrapper .table-heading {
                font-size: 1.5rem;
                font-weight: 500;
                color: #fff;
            }
        </style>
    </head>
@endsection
@section('content')

    <section class="product-description">
        <div class="container">
            <div class="product-detail-section">
                <h5 class="mb-4">Data Transaksi</h5>

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" style="border:none;" role="tablist">
                        <button class="nav-link active me-2" id="nav-produk-tab" data-bs-toggle="tab" data-bs-target="#nav-produk"
                            type="button" role="tab" aria-controls="nav-produk" aria-selected="true">
                            Produk
                        </button>
                        <button class="nav-link" id="nav-lelang-tab" data-bs-toggle="tab" data-bs-target="#nav-lelang"
                            type="button" role="tab" aria-controls="nav-lelang" aria-selected="false">
                            Lelang
                        </button>
                    </div>
                </nav>
                <div class="tab-content tab-item" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-produk" role="tabpanel" aria-labelledby="nav-produk-tab"
                        tabindex="0" data-aos="fade-up">
                        <div class="produk">
                            <div class="cart-section wishlist-section">

                                <div class="profile-section">
                                    <div class="row g-5">
                                        @foreach ($transaction as $item)
                                        @php
                                            $transactionGrouped = $transaction->groupBy(function ($value) {
                                                return $value->transaction_id;
                                            })->mapWithKeys(function ($group, $key) {
                                                return [$key => $group->count()];
                                            });
                                        @endphp
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="product-wrapper" style="border: 1px solid; height: 17rem;">
                                                <div class="wrapper-content" style="position: relative; height:13rem;">
                                                    <p class="paragraph mt-4 ms-4 fw-bold" style="font-size: 15px;">{{ $item->user->name }}</p>
                                                    <p class="paragraph mt-4 ms-4 p-0" style="font-size: 15px;">Jumlah produk : {{ $transactionGrouped[$item->transaction_id] ?? 0 }}</p>
                                                    <p class="paragraph ms-4 p-0" style="font-size: 15px;">Status : {{ $item->delivery_status }}</p>
                                                    <p class="paragraph ms-4 p-0" style="font-size: 15px;">Total Harga : {{ 'Rp. ' . number_format($item->total, 0, ',', '.') }}</p>
                                                    <a href="{{ route('seller.transaction.detail',$item->transaction_id) }}">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Transaksi"
                                                        style="position: absolute; bottom: 10px; right: 10px; display: flex; justify-content: right; align-items: right; margin-bottom: 10px; border-radius: 50%; border:1px solid;">
                                                        <svg style="display: flex; justify-content: center; align-items:center;" class="mt-1 me-1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m13.692 17.308l-.707-.72l4.088-4.088H5v-1h12.073l-4.088-4.088l.707-.72L19 12z"/></svg>
                                                    </span></a>
                                                    <p class="bottom-left mt-4 ms-2"
                                                        style="position: absolute; left: 10px; display: flex; justify-content: left; align-items: left;">
                                                        {{ $item->created_at->format('d F Y') }}
                                                        </p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-lelang" role="tabpanel" aria-labelledby="nav-lelang-tab"
                        tabindex="0">
                        <div class="wishlist">
                            <div class="cart-section wishlist-section">
                                <table style="width: 100rem;">
                                    <tbody>
                                        <tr class="table-row table-top-row custom-table-header" style="color:#fff;">
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
                                                    <h5 class="heading" style="color: red;">Dibayar</h5>
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
        </div>
    </section>
@endsection
