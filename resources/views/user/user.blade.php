@extends('layouts.panel')

@section('title', 'Beranda Panel')

@push('style')
    <style>
        .card-summary {
            flex-direction: row;
            gap: 1.75rem;
            align-items: center;
            border-radius: 1.25rem;
            padding: 1.25rem;
            border-color: #1c3879;
            transition: all .2s;
        }

        .card-summary:hover {
            border-color: #1c3879;
        }

        .card-summary .icon-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 5rem;
            height: 5rem;
            border-radius: 0.5rem;
            background-color: #f0f0f0;
            transition: all .2s;
        }

        .card-summary .icon-wrapper i {
            font-size: 2rem !important;
        }

        .card-summary:hover .icon-wrapper {
            background-color: #1c3879;
            color: white;
        }
    </style>
@endpush

@section('content')
    <section id="quick-links" class=" pb-4 mb-4 border-bottom">
        <h5 class="mb-4">Dasbor</h5>

        <div class="row gy-4 gx-4 mb-4">
            <div class="col-md-4">
                <a href="javascript:void(0)" class="card card-summary card-body">
                    <div class="icon-wrapper">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div>
                        <h5>30</h5>
                        <p class="mb-0">Harus Dibayar</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="javascript:void(0)" class="card card-summary card-body">
                    <div class="icon-wrapper">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div>
                        <h5>27</h5>
                        <p class="mb-0">Pesanan Dikirim</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="javascript:void(0)" class="card card-summary card-body">
                    <div class="icon-wrapper">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div>
                        <h5>8</h5>
                        <p class="mb-0">Daftar Keinginan</p>
                    </div>
                </a>
            </div>
        </div>

        {{-- @dd(!auth()->user()->hasVerifiedEmail()) --}}
        @if(!auth()->user()->hasVerifiedEmail())
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size: 0.9rem;">
            <p>Akun anda belum terverifikasi. Silahkan verifikasikan akun anda dari tautan yang sudah kami kirim ke
                surel anda.</p> <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
        @endif
    </section>

    <section id="my-orders">
        <h5 class="mb-4">Pesanan Saya</h5>

        <div class="table-responsive">
            <table class="table table-striped">
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
                                    <img src="https://humma-thrift.dev.id/template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp"
                                        alt="img">
                                </div>
                                <div class="wrapper-content">
                                    <h5 class="heading">Classic Design Skirt</h5>
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
                                    <button type="button" class="shop-btn" data-bs-toggle="modal"
                                        data-bs-target="#detailModal">
                                        Detail
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- Tambahkan baris dummy lain sesuai kebutuhan -->
                    <tr class="table-row ticket-row">
                        <td class="table-wrapper wrapper-product">
                            <div class="wrapper">
                                <div class="wrapper-img">
                                    <img src="https://humma-thrift.dev.id/template-assets/front/assets/images/homepage-one/product-img/product-img-2.webp"
                                        alt="img">
                                </div>
                                <div class="wrapper-content">
                                    <h5 class="heading">Modern Jacket</h5>
                                </div>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="heading">$50.00</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="heading">Dikirim</h5>
                            </div>
                        </td>
                        <td class="table-wrapper wrapper-total">
                            <div class="table-wrapper-center">
                                <h5 class="heading">$50.00</h5>
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
        </div>
    </section>
@endsection
