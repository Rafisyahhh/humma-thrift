@php
    $data = [
        'hari' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
        'penghasilan_kotor' => [20000, 35000, 40000, 30000, 45000, 60000, 50000],
        'penghasilan_bersih' => [15000, 30000, 35000, 25000, 40000, 55000, 45000],
        'bulan' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
        'penjualan_bulan' => [1000000, 800000, 200000, 350000, 800000, 1100000, 3000000],
    ];
@endphp

@extends('layouts.panel')

@section('title', 'Home')

@push('style')
    <style>
        .summary-icons .wrapper-img > span {
            background: white;
            border-radius: 1rem;
            padding: 1rem;
            height: 62px;
            width: 62px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1c3879;
        }

        .summary-icons .wrapper-img > span svg {
            fill: currentColor;
            stroke: currentColor;
        }
    </style>
@endpush

@section('content')
    <section>
        <div class="tab-content nav-content" id="v-pills-tabContent" style="flex: 1 0%;">
            <div class="user-profile">
                <div class="user-title">
                    <h5 class="heading" style="font-size: 45px">PROFIL ANDA </h5>
                </div>
                <div class="profile-section">
                    <div class="row g-5 summary-icons">
                        <div class="col-lg-3 col-sm-4">
                            <div class="product-wrapper"
                                style="height: 230px;padding: 11.5px;align-items:center;text-align:center;">
                                <div class="wrapper-img">
                                    <span>
                                        <svg width="48" height="48">
                                            <use
                                                xlink:href="{{ asset('images/seller-home-sprites.svg') }}#hugeicons-coins-dollar">
                                            </use>
                                        </svg>
                                        </span>
                                    </span>
                                </div>
                                <div class="wrapper-content">
                                    <p class="paragraph">Saldo Anda</p>
                                    <h3 class="mb-0 paragraph">Rp 1.000.000</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <div class="product-wrapper"
                                style="height: 230px;padding: 11.5px;align-items:center;text-align:center;">
                                <div class="wrapper-img">
                                    <span>
                                        <svg width="48" height="48">
                                            <use
                                                xlink:href="{{ asset('images/seller-home-sprites.svg') }}#hugeicons-shopping-basket-check-in-02">
                                            </use>
                                        </svg>
                                    </span>
                                </div>
                                <div class="wrapper-content">
                                    <p class="paragraph">Pesanan baru</p>
                                    <h3 class="mb-0 paragraph">656</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <div class="product-wrapper"
                                style="height: 230px;padding: 11.5px;align-items:center;text-align:center;">
                                <div class="wrapper-img">
                                    <span>
                                        <svg width="48" height="48">
                                            <use
                                                xlink:href="{{ asset('images/seller-home-sprites.svg') }}#hugeicons-shopping-basket-done-03">
                                            </use>
                                        </svg>
                                    </span>
                                </div>
                                <div class="wrapper-content">
                                    <p class="paragraph">Pengiriman Selesai</p>
                                    <h3 class="mb-0 paragraph">99783</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <div class="product-wrapper"
                                style="height: 230px;padding: 11.5px;align-items:center;text-align:center;">
                                <div class="wrapper-img">
                                    <span>
                                        <svg width="48" height="48">
                                            <use
                                                xlink:href="{{ asset('images/seller-home-sprites.svg') }}#hugeicons-delivery-box-01">
                                            </use>
                                        </svg>
                                    </span>
                                </div>
                                <div class="wrapper-content">
                                    <p class="paragraph">Jumlah Produk</p>
                                    <h3 class="mb-0 paragraph">09</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="info-section">
                                <div class="seller-info">
                                    <h5 class="heading">Informasi pribadi</h5>
                                    <div class="info-list">
                                        <div class="info-title">
                                            <p>Nama:</p>
                                            <p>Email:</p>
                                            <p>No Telepon:</p>
                                            <p>Kota/Kabupaten:</p>
                                            <p>Zip:</p>
                                        </div>
                                        <div class="info-details">
                                            <p>Sajjad</p>
                                            <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                    data-cfemail="492d2c24262c24282025092e24282025672a2624">[email&#160;protected]</a>
                                            </p>
                                            <p>023 434 54354</p>
                                            <p>Haydarabad, Rord 34</p>
                                            <p>3454</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="devider"></div>
                                <div class="shop-info">
                                    <h5 class="heading">Informasi Toko</h5>
                                    <div class="info-list">
                                        <div class="info-title">
                                            <p>Nama:</p>
                                            <p>Email:</p>
                                            <p>No Telepon:</p>
                                            <p>Kota/Kabupaten:</p>
                                            <p>Zip:</p>
                                        </div>
                                        <div class="info-details">
                                            <p>ShopUs Super-Shop</p>
                                            <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                    data-cfemail="afcbcac2c0cac2cec6c3efc8c2cec6c381ccc0c2">[email&#160;protected]</a>
                                            </p>
                                            <p>023 434 54354</p>
                                            <p>Haydarabad, Rord 34</p>
                                            <p>3454</p>
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
    <br><br>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="heading">Data Penjualan/Hari</h5>
                    </div>
                    <div class="profile-section">
                        <canvas id="penjualan-harian" width="400" height="200"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="heading">Data Penjualan/Bulan</h5>
                    </div>
                    <div class="profile-section">
                        <canvas id="penjualan-bulanan" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script>
        $(document).ready(function() {
            const dataHarian = {
                labels: @json($data['hari']),
                datasets: [{
                        label: 'Penghasilan Kotor per Hari',
                        data: @json($data['penghasilan_kotor']),
                        backgroundColor: 'rgba(126, 163, 219, 0.40)',
                        borderColor: 'rgba(28, 56, 121, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Penghasilan Bersih per Hari',
                        data: @json($data['penghasilan_bersih']),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }
                ]
            };

            const dataBulanan = {
                labels: @json($data['bulan']),
                datasets: [{
                    label: 'Penjualan per Bulan',
                    data: @json($data['penjualan_bulan']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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

            new Chart($('#penjualan-harian'), {
                type: 'line',
                data: dataHarian,
                options: options
            });

            new Chart($('#penjualan-bulanan'), {
                type: 'line',
                data: dataBulanan,
                options: options
            });
        });
    </script>


@endsection
