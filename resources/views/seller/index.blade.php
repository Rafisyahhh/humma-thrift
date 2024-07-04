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
        .summary-icons .wrapper-img>span {
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

        .summary-icons .wrapper-img>span svg {
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
                                            <p>Nama: {{auth()->user()->name}}</p>
                                            <p>Email: {{auth()->user()->email}}</p>
                                            <p>No Telepon: +{{auth()->user()->phone}}</p>
                                            @foreach ($address as $stores ) 
                                            <p>Alamat: {{ $stores->address }}</p>
                                            @endforeach
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="devider"></div>
                                <div class="shop-info">
                                    <h5 class="heading">Informasi Toko</h5>
                                    <div class="info-list">
                                        <div class="info-title">
                                            @foreach ($store as $store)
                                            @if ($store->user_id == auth()->id())
                                            <p>Nama: {{$store->name}}</p>
                                            <p>Email: {{$store->user->email}}</p>
                                            <p>No Telepon: {{$store->user->phone}}</p>
                                            <p>Alamat: {{$store->address}}</p>
                                            @endif
                                            @endforeach
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
                        <canvas id="penjualan-harian" height="200"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="heading">Data Penjualan/Bulan</h5>
                    </div>
                    <div class="profile-section">
                        <canvas id="penjualan-bulanan" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('additional-assets/chart.js-4.4.3/chart.umd.js') }}"></script>

    <script>
        $(document).ready(function() {
            const dataHarian = {
                labels: @json($data['hari']),
                datasets: [{
                        label: 'Penghasilan Kotor per Hari',
                        data: @json($data['penghasilan_kotor']),
                        backgroundColor: 'rgba(255, 0, 0, 0.2)',
                        borderColor: 'rgba(255, 0, 0, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Penghasilan Bersih per Hari',
                        data: @json($data['penghasilan_bersih']),
                        backgroundColor: 'rgba(126, 163, 219, 0.40)',
                        borderColor: 'rgba(28, 56, 121, 1)',
                        borderWidth: 1
                    }
                ]
            };

            const dataBulanan = {
                labels: @json($data['bulan']),
                datasets: [{
                    label: 'Penjualan per Bulan',
                    data: @json($data['penjualan_bulan']),
                    backgroundColor: 'rgba(66, 91, 176, 0.4)',
                    borderColor: 'rgba(28, 56, 151, 1)',
                    borderWidth: 1
                }]
            };

            const options = {
                maintainAspectRatio: false,
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
