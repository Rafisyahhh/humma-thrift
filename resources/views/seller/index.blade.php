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

@section('content')
    <section>
        <div class="tab-content nav-content" id="v-pills-tabContent" style="flex: 1 0%;">
            <div class="user-profile">
                <div class="user-title">
                    <h5 class="heading" style="font-size: 45px">PROFIL ANDA </h5>
                </div>
                <div class="profile-section">
                    <div class="row g-5">
                        <div class="col-lg-3 col-sm-4">
                            <div class="product-wrapper" style="height: 230px;padding: 11.5px;align-items:center;text-align:center;">
                                <div class="wrapper-img">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 62 62">
                                            <rect width="62" height="62" rx="4" />
                                            <path
                                                d="M45.4473 20.0309C45.482 20.3788 45.5 20.7314 45.5 21.0883C45.5 26.919 40.7564 31.6625 34.9258 31.6625C29.0951 31.6625 24.3516 26.919 24.3516 21.0883C24.3516 20.7314 24.3695 20.3788 24.4042 20.0309H21.9805L21.0554 12.6289H13.7773V14.7438H19.1884L21.5676 33.7774H47.1868L48.8039 20.0309H45.4473Z" />
                                            <path
                                                d="M22.0967 38.0074H19.0648C17.3157 38.0074 15.8926 39.4305 15.8926 41.1797C15.8926 42.9289 17.3157 44.352 19.0648 44.352H19.2467C19.1293 44.6829 19.0648 45.0386 19.0648 45.4094C19.0648 47.1586 20.4879 48.5816 22.2371 48.5816C24.4247 48.5816 25.9571 46.4091 25.2274 44.352H35.1081C34.377 46.413 35.9157 48.5816 38.0985 48.5816C39.8476 48.5816 41.2707 47.1586 41.2707 45.4094C41.2707 45.0386 41.2061 44.6829 41.0888 44.352H43.3856V42.2371H19.0648C18.4818 42.2371 18.0074 41.7628 18.0074 41.1797C18.0074 40.5966 18.4818 40.1223 19.0648 40.1223H46.4407L46.9384 35.8926H21.8323L22.0967 38.0074Z" />
                                            <path
                                                d="M34.9262 29.5477C39.5907 29.5477 43.3856 25.7528 43.3856 21.0883C43.3856 16.4238 39.5907 12.6289 34.9262 12.6289C30.2616 12.6289 26.4668 16.4238 26.4668 21.0883C26.4668 25.7528 30.2617 29.5477 34.9262 29.5477ZM33.8688 17.916H35.9836V20.6503L37.7886 22.4554L36.2932 23.9508L33.8687 21.5262V17.916H33.8688Z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="wrapper-content">
                                    <p class="paragraph">Saldo Anda</p>
                                    <h3 class="paragraph">Rp 1.000.000</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <div class="product-wrapper" style="height: 230px;padding: 11.5px;align-items:center;text-align:center;">
                                <div class="wrapper-img">
                                    <span>
                                        <svg width="62" height="62" viewBox="0 0 62 62" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="62" height="62" rx="4" />
                                            <path
                                                d="M45.4473 20.0309C45.482 20.3788 45.5 20.7314 45.5 21.0883C45.5 26.919 40.7564 31.6625 34.9258 31.6625C29.0951 31.6625 24.3516 26.919 24.3516 21.0883C24.3516 20.7314 24.3695 20.3788 24.4042 20.0309H21.9805L21.0554 12.6289H13.7773V14.7438H19.1884L21.5676 33.7774H47.1868L48.8039 20.0309H45.4473Z" />
                                            <path
                                                d="M22.0967 38.0074H19.0648C17.3157 38.0074 15.8926 39.4305 15.8926 41.1797C15.8926 42.9289 17.3157 44.352 19.0648 44.352H19.2467C19.1293 44.6829 19.0648 45.0386 19.0648 45.4094C19.0648 47.1586 20.4879 48.5816 22.2371 48.5816C24.4247 48.5816 25.9571 46.4091 25.2274 44.352H35.1081C34.377 46.413 35.9157 48.5816 38.0985 48.5816C39.8476 48.5816 41.2707 47.1586 41.2707 45.4094C41.2707 45.0386 41.2061 44.6829 41.0888 44.352H43.3856V42.2371H19.0648C18.4818 42.2371 18.0074 41.7628 18.0074 41.1797C18.0074 40.5966 18.4818 40.1223 19.0648 40.1223H46.4407L46.9384 35.8926H21.8323L22.0967 38.0074Z" />
                                            <path
                                                d="M34.9262 29.5477C39.5907 29.5477 43.3856 25.7528 43.3856 21.0883C43.3856 16.4238 39.5907 12.6289 34.9262 12.6289C30.2616 12.6289 26.4668 16.4238 26.4668 21.0883C26.4668 25.7528 30.2617 29.5477 34.9262 29.5477ZM33.8688 17.916H35.9836V20.6503L37.7886 22.4554L36.2932 23.9508L33.8687 21.5262V17.916H33.8688Z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="wrapper-content">
                                    <p class="paragraph">Pesanan baru</p>
                                    <h3 class="paragraph">656</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <div class="product-wrapper" style="height: 230px;padding: 11.5px;align-items:center;text-align:center;">
                                <div class="wrapper-img">
                                    <span>
                                        <svg width="62" height="62" viewBox="0 0 62 62" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="62" height="62" rx="4" fill="white" />
                                            <path
                                                d="M45.2253 29.8816H44.4827L43.6701 26.3651C43.376 25.1043 42.2552 24.2217 40.9662 24.2217H36.8474V20.8453C36.8474 19.038 35.3764 17.5811 33.5831 17.5811H18.1724C16.4631 17.5811 15.0762 18.968 15.0762 20.6772V37.0967C15.0762 38.8058 16.4631 40.1928 18.1724 40.1928H19.2931C19.8955 42.1962 21.7448 43.6533 23.9304 43.6533C26.1159 43.6533 27.9792 42.1962 28.5816 40.1928C28.8455 40.1928 35.3459 40.1928 35.1942 40.1928C35.7966 42.1962 37.6459 43.6533 39.8315 43.6533C42.031 43.6533 43.8803 42.1962 44.4827 40.1928H45.2253C46.7663 40.1928 47.9992 38.9599 47.9992 37.4189V32.6555C47.9992 31.1145 46.7663 29.8816 45.2253 29.8816ZM23.9304 40.8513C22.7897 40.8513 21.8849 39.8969 21.8849 38.7918C21.8849 37.657 22.7956 36.7324 23.9304 36.7324C25.0652 36.7324 25.9898 37.657 25.9898 38.7918C25.9898 39.9151 25.0692 40.8513 23.9304 40.8513ZM28.9739 25.0622L24.799 28.3125C24.2023 28.7767 23.3035 28.6903 22.8236 28.0604L21.2125 25.9449C20.7361 25.3284 20.8622 24.4458 21.4787 23.9835C22.0811 23.5072 22.9637 23.6332 23.4401 24.2496L24.1966 25.2303L27.2507 22.8487C27.8531 22.3864 28.7357 22.4845 29.2121 23.1009C29.6884 23.7173 29.5763 24.586 28.9739 25.0622ZM39.8315 40.8513C38.6906 40.8513 37.7861 39.8969 37.7861 38.7918C37.7861 37.657 38.7107 36.7324 39.8315 36.7324C40.9662 36.7324 41.8909 37.657 41.8909 38.7918C41.8909 39.9166 40.9683 40.8513 39.8315 40.8513ZM37.618 27.0236H40.2798C40.6021 27.0236 40.8962 27.2337 41.0083 27.542L41.8629 30.0497C42.031 30.5541 41.6667 31.0724 41.1344 31.0724H37.618C37.1976 31.0724 36.8474 30.7222 36.8474 30.3019V27.7942C36.8474 27.3739 37.1976 27.0236 37.618 27.0236Z"
                                                fill="#FFBB38" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="wrapper-content">
                                    <p class="paragraph">Pengiriman Selesai</p>
                                    <h3 class="paragraph">99783</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <div class="product-wrapper" style="height: 230px;padding: 11.5px;align-items:center;text-align:center;">
                                <div class="wrapper-img">
                                    <svg width="62" height="62" viewBox="0 0 62 62" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="62" height="62" rx="4" fill="white" />
                                        <path d="M15 20 L31 10 L47 20 L31 30 Z" fill="#FFBB38" stroke="white"
                                            stroke-width="1" />
                                        <path d="M15 20 L31 30 L31 50 L15 40 Z" fill="#FFBB38" stroke="white"
                                            stroke-width="1" />
                                        <path d="M47 20 L31 30 L31 50 L47 40 Z" fill="#FFBB38" stroke="white"
                                            stroke-width="1" />
                                        <path d="M31 10 L31 30 M15 40 L31 50 L47 40 M15 20 L47 20" stroke="white"
                                            stroke-width="1" />
                                    </svg>
                                </div>
                                <div class="wrapper-content">
                                    <p class="paragraph">Jumlah Produk</p>
                                    <h3 class="paragraph">09</h3>
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
                datasets: [
                    {
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
