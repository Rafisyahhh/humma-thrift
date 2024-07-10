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

        .product-details table {
            width: 100%;
            border-collapse: collapse; /* Menghilangkan jarak antar sel */
        }

        .product-details th, .product-details td {
            text-align: left;
            padding: 10px;
            color: rgba(0, 0, 0, 0.4); /* Warna teks abu-abu */
        }

        .product-details th {
            font-weight: normal;
            font-size: 19px;
        }

        .product-details .inner-text {
            font-size: 18px;
            color: rgba(0, 0, 0, 0.7); /* Warna teks sedikit lebih gelap untuk kontras */
        }

        .table-wrapper-center .table-heading {
        color: white; /* Sets text color to white */
        }
    </style>
@endpush

@php
    $data = [
        'bulan' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        'pengeluaran' => [20000, 35000, 40000, 30000, 45000, 60000, 50000, 70000, 20000, 20000, 30000, 40000],
    ];
@endphp

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
                        <h5>{{ $countFavorite }}</h5>
                        <p class="mb-0">Favorite</p>
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
                </tbody>
            </table>
                 {{-- Detail --}}
                <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 99%;">
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
                                                <table>
                                                    <tr>
                                                        <th>Kategori</th>
                                                        <td><span class="inner-text">Dress</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Brand</th>
                                                        <td><span class="inner-text">Adidas</span></td>
                                                    </tr>
                                                    <tr>
                                                    <th>Ukuran</th>
                                                        <td><span class="inner-text">XL</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Stok</th>
                                                        <td><span class="inner-text">2</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"><span class="inner-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet cumque perferendis libero nesciunt minima odio autem ratione quia, eligendi temporibus!</span></th>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 2rem">Status</td>
                                                        <td style="justify-content:right; align-items:right;"><span class="inner-status">
                                                            Diterima</span></td>
                                                        </td>
                                                    </tr>
                                                </table>
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
    </section>
    <section style="margin-top: 50px;"                                                      >
        <div class="container">
            <div>
                <div>
                    <h5 class="heading">Data Pengeluaran/Bulan</h5>
                </div>
                <div class="profile-section">
                    <canvas id="pengeluaran" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
     </section>
@endsection

@section('script')
    <script src="{{ asset('additional-assets/chart.js-4.4.3/chart.umd.js') }}"></script>

    <script>
        $(document).ready(function() {
            const dataBulanan = {
                labels: @json($data['bulan']),
                datasets: [{
                    label: 'Penjualan per Bulan',
                    data: @json($data['pengeluaran']),
                    backgroundColor: 'rgba(66, 91, 176, 0.4)',
                    borderColor: 'rgba(28, 56, 151, 1)',
                    borderWidth: 1
                }]
            };

            const options = {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false
                }
            };

            new Chart($('#pengeluaran'), {
                type: 'bar',
                data: dataBulanan,
                options: options
            });
        });
    </script>
@endsection
