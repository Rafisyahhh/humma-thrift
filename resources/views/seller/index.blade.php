{{-- @php
    $data = [
        'hari' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
        'penghasilan_kotor' => [20000, 35000, 40000, 30000, 45000, 60000, 50000],
        'penghasilan_bersih' => [15000, 30000, 35000, 25000, 40000, 55000, 45000],
        'bulan' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
        'penjualan_bulan' => [1000000, 800000, 200000, 350000, 800000, 1100000, 3000000],
    ];
@endphp --}}

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
                    <h5 class="heading" style="font-size: 3rem">PROFIL ANDA</h5>
                </div>
                <div class="profile-section">
                    <div class="row g-5 summary-icons">
                        <div class="col-lg-3 col-sm-4">
                            <div class="product-wrapper"
                                style="height: 230px;padding: 11.5px;align-items:center;text-align:center;">
                                <div class="wrapper-img mt-5">
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
                                    <h3 class="mb-0 paragraph">@currency($accountBalance)</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <div class="product-wrapper"
                                style="height: 230px;padding: 11.5px;align-items:center;text-align:center;">
                                <div class="wrapper-img mt-5">
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
                                    <h3 class="mb-0 paragraph">{{$countnewOrder}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <div class="product-wrapper"
                                style="height: 230px;padding: 11.5px;align-items:center;text-align:center;">
                                <div class="wrapper-img mt-5">
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
                                    <h3 class="mb-0 paragraph">{{$countendOrder}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <div class="product-wrapper"
                                style="height: 230px;padding: 11.5px;align-items:center;text-align:center;">
                                <div class="wrapper-img mt-5">
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
                                    <h3 class="mb-0 paragraph">{{ $countProduct }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="info-section">
                                <div class="row w-100">
                                    <div class="col-lg-6">
                                        <div class="seller-info">
                                            <h5 class="heading" style="color: white;">Informasi pribadi</h5>
                                            <div class="info-list">
                                                <div class="info-title">
                                                    <p class="white-text">Nama: <strong
                                                            class="info-text">{{ auth()->user()->name }}</strong></p>
                                                    <p class="white-text">Email: <strong
                                                            class="info-text">{{ auth()->user()->email }}</strong></p>
                                                    <p class="white-text">No Telepon: <strong
                                                            class="info-text">+{{ auth()->user()->phone }}</strong></p>
                                                    @foreach ($address as $stores)
                                                        @if ($stores->status)
                                                            <p class="white-text">Alamat: <strong
                                                                    class="info-text">{{ $stores->address }}</strong></p>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="devider"></div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="shop-info">
                                            <h5 class="heading" style="color: white;">Informasi Toko</h5>
                                            <div class="info-list">
                                                <div class="info-title">
                                                    @foreach ($store as $store)
                                                        @if ($store->user_id == auth()->id())
                                                            <p class="white-text">Nama: <strong
                                                                    class="info-text">{{ $store->name }}</strong></p>
                                                            <p class="white-text">Email: <strong
                                                                    class="info-text">{{ $store->user->email }}</strong>
                                                            </p>
                                                            <p class="white-text">No Telepon: <strong
                                                                    class="info-text">+{{ $store->user->phone }}</strong>
                                                            </p>
                                                            <p class="white-text">Alamat: <strong
                                                                    class="info-text">{{ $store->address }}</strong></p>
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
                    {{-- <div class="profile-section">
                        <canvas id="penjualan-harian" height="200"></canvas>
                    </div> --}}
                    <div id="totalRevenueChart" class="profile-section">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="heading">Data Penjualan/Bulan</h5>
                    </div>
                    <div class="profile-section">
                        <canvas id="bulanan" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection

@section('script')
    <script src="{{ asset('additional-assets/chart.js-4.4.3/chart.umd.js') }}"></script>

    {{-- <script>
        var labels = @json($days);
        var grossData = @json($grossData);
        var netData = @json($netData);

        var ctx = document.getElementById('revenueChart').getContext('2d');
        var revenueChart = new Chart(ctx, {
            type: 'line', // Jenis chart
            data: {
                labels: labels,
                datasets: [{
                        label: 'Penghasilan Kotor per Hari',
                        data: grossData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Penghasilan Bersih per Hari',
                        data: netData,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var labels = @json($months);
        var data = @json($datas);

        var ctx = document.getElementById('bulanan').getContext('2d');
        var bulanan = new Chart(ctx, {
            type: 'line', // Jenis chart
            data: {
                labels: labels,
                datasets: [{
                    label: 'Penghasilan kotor per bulan',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script> --}}

    <script>
        const ctxBulanan = document.getElementById('bulanan').getContext('2d');
        const gradientBulanan = ctxBulanan.createLinearGradient(0, 0, 0, 250);
        gradientBulanan.addColorStop(0, 'rgba(25, 56, 121, 0.25)');
        gradientBulanan.addColorStop(1, 'rgba(25, 56, 121, 0.0)');

        var labels = [
            @foreach ($months as $month)
                '{{ $month }}',
            @endforeach
        ];

        const dataBulanan = {
            labels: labels,
            datasets: [{
                    label: 'Penghasilan Kotor per Bulan',
                    data: @json($monthlyGrossData),
                    backgroundColor: gradientBulanan,
                    borderColor: 'rgba(25, 56, 121, 1)',
                    borderWidth: 3,
                    borderCapStyle: 'round',
                    borderJoinStyle: 'round',
                    pointBackgroundColor: 'rgba(25, 56, 121, 1)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointHoverBackgroundColor: 'rgba(25, 56, 121, 1)',
                    pointHoverBorderColor: '#fff',
                    pointHoverBorderWidth: 2,
                    fill: true
                },
                {
                    label: 'Penghasilan Bersih per Bulan',
                    data: @json($monthlySalesData),
                    backgroundColor: 'rgb(222, 255, 249)',
                    borderColor: 'rgb(136, 215, 219)',
                    borderWidth: 3,
                    borderCapStyle: 'round',
                    borderJoinStyle: 'round',
                    pointBackgroundColor: 'rgb(136, 215, 219)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointHoverBackgroundColor: 'rgb(136, 215, 219)',
                    pointHoverBorderColor: '#fff',
                    pointHoverBorderWidth: 2,
                    fill: true
                }
            ]
        };

        var options = {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    },
                    ticks: {
                        display: false
                    },
                    border: {
                        display: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        display: false
                    },
                    border: {
                        display: false
                    }
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    display: true
                },
                tooltip: {
                    enabled: true
                }
            }
        };

        new Chart(ctxBulanan, {
            type: 'line',
            data: dataBulanan,
            options: options
        });
    </script>

    @php
        $currentDate = new DateTime();
        $currentMonth = $currentDate->format('m');
        $daysInMonth = $currentDate->format('t');
        $dates = [];
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $dates[] = $currentDate->format('Y-m-') . str_pad($i, 2, '0', STR_PAD_LEFT);
        }
    @endphp
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctxHarian = document.getElementById('revenueChart').getContext('2d');
            const gradientHarian = ctxHarian.createLinearGradient(0, 0, 0, 250);
            gradientHarian.addColorStop(0, 'rgba(25, 56, 121, 0.25)');
            gradientHarian.addColorStop(1, 'rgba(25, 56, 121, 0.0)');

            var labels = [
                @foreach ($dates as $date)
                    '{{ $date }}',
                @endforeach
            ];

            const dataHarian = {
                labels: labels,
                datasets: [{
                        label: 'Penghasilan Kotor per Hari',
                        data: @json($dailyGross),
                        backgroundColor: gradientHarian,
                        borderColor: 'rgba(25, 56, 121, 1)',
                        borderWidth: 3,
                        pointBackgroundColor: 'rgba(25, 56, 121, 1)',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        pointHoverBackgroundColor: 'rgba(25, 56, 121, 1)',
                        pointHoverBorderColor: '#fff',
                        pointHoverBorderWidth: 2,
                        fill: false, // Tidak mengisi area di bawah garis
                        tension: 0.1 // Garis lurus
                    },
                    {
                        label: 'Penghasilan Bersih per Hari',
                        data: @json($dailySales),
                        backgroundColor: 'rgb(222, 255, 249)',
                        borderColor: 'rgb(136, 215, 219)',
                        borderWidth: 3,
                        pointBackgroundColor: 'rgb(136, 215, 219)',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        pointHoverBackgroundColor: 'rgb(136, 215, 219)',
                        pointHoverBorderColor: '#fff',
                        pointHoverBorderWidth: 2,
                        fill: true,
                        tension: 0.1 // Garis lurus
                    }
                ]
            };

            var options = {
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        },
                        ticks: {
                            display: false
                        },
                        border: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            display: false
                        },
                        border: {
                            display: false
                        }
                    }
                },
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            };

            new Chart(ctxHarian, {
                type: 'line',
                data: dataHarian,
                options: options
            });
        });
    </script>

    {{-- <script>
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
    </script> --}}
@endsection
