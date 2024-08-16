@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="template-assets/admin/assets/vendor/libs/apex-charts/apex-charts.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-lg-4 mb-4">
            <div class="card card-border-shadow-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-users"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $countuser }}</h4>
                        <p class="ms-3 mb-0">Pengguna</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4">
            <div class="card card-border-shadow-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class='ti ti-box'></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $countproduct }}</h4>
                        <p class="ms-3 mb-0">Produk</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4">
            <div class="card card-border-shadow-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-primary"><i
                                    class="fa-regular fa-money-bill-1"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0"> @currency($accountBalance ?? 0)</h4>
                        <p class="ms-3 mb-0">Saldo Admin</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4">
            <div class="card card-border-shadow-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-primary"><i class='fas fa-store'></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $countseller }}</h4>
                        <p class="ms-3 mb-0">Seller</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4">
            <div class="card card-border-shadow-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-primary"><i class='ti ti-gavel'></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $countproductauction }}</h4>
                        <p class="ms-3 mb-0">Produk Lelang</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4">
            <div class="card card-border-shadow-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-primary"><i
                                    class="fa-regular fa-credit-card"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $countproductauction }}</h4>
                        <div>
                            <p class="ms-3 mb-0">Biaya Admin</p>
                            <button type="button" class="btn btn-primary btn-sm ms-3" data-bs-toggle="modal"
                                data-bs-target="#basicModal">Atur Biaya
                                Admin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal biaya admin --}}
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Atur Biaya Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('admin.adminfee.store')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-4">
                                    <label for="nameBasic" class="form-label">Biaya Admin</label>
                                    <input type="number" name="biaya_admin" id="nameBasic" class="form-control"
                                        placeholder="Masukkan Biaya Admin">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal biaya admin --}}
    <div class="col-12 col-xl-8 mb-4 col-xl-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="row row-bordered g-0">
                    <div class="col-md-12 position-relative p-4">
                        <div class="d-flex justify-content-between me-5">
                            <h5>Data Penghasilan</h5>
                            <ul class="ms-auto nav nav-pills d-none d-md-flex me-3" id="incomeData" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" type="button" id="daily-income-tab"
                                        data-bs-toggle="tab" data-bs-target="#daily-income" type="button"
                                        role="tab" aria-controls="daily-income" aria-selected="true">Harian</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" type="button" id="monthly-income-tab" data-bs-toggle="tab"
                                        data-bs-target="#monthly-income" type="button" role="tab"
                                        aria-controls="monthly-income" aria-selected="false">Bulanan</button>
                                </li>
                            </ul>
                        </div>
                        <section>
                            <div class="tab-content mt-5" id="myTabContent">
                                <div class="tab-pane fade show active" id="daily-income" role="tabpanel"
                                    aria-labelledby="daily-income-tab">
                                    <div class="monthly-income-section">
                                        <canvas id="penjualan-harian" width="400" height="100"></canvas>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="monthly-income" role="tabpanel"
                                    aria-labelledby="monthly-income-tab">
                                    <div class="monthly-income-section">
                                        <canvas id="penjualan-bulanan" width="400" height="100"></canvas>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Revenue Report -->
    </div>
@endsection

@section('scripts')
    <script src="template-assets/admin/assets/vendor/libs/chartjs/chartjs.js"></script>
    <script src="template-assets/admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
@endsection

@section('js')
    <script>
        const ctxBulanan = document.getElementById('penjualan-bulanan').getContext('2d');
        const gradientBulanan = ctxBulanan.createLinearGradient(0, 0, 0, 250);
        gradientBulanan.addColorStop(0, 'rgba(25, 56, 121, 0.25)');
        gradientBulanan.addColorStop(1, 'rgba(25, 56, 121, 0.0)');

        var labels = [
            @if (isset($months))
                @foreach ($months as $month)
                    '{{ $month }}',
                @endforeach
            @endif
        ];

        const dataBulanan = {
            labels: labels,
            datasets: [{
                    label: 'Penghasilan Kotor per Bulan',
                    data: @if (isset($monthlyGrossSales))
                        @json($monthlyGrossSales)
                    @else
                        []
                    @endif ,
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
                    data: @if (isset($monthlyNetIncome))
                        @json($monthlyNetIncome)
                    @else
                        []
                    @endif ,
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
            const ctxHarian = document.getElementById('penjualan-harian').getContext('2d');
            const gradientHarian = ctxHarian.createLinearGradient(0, 0, 0, 250);
            gradientHarian.addColorStop(0, 'rgba(25, 56, 121, 0.25)');
            gradientHarian.addColorStop(1, 'rgba(25, 56, 121, 0.0)');

            var labels = [
                @if (isset($dates))
                    @foreach ($dates as $date)
                        '{{ $date }}',
                    @endforeach
                @endif
            ];

            const dataHarian = {
                labels: labels,
                datasets: [{
                        label: 'Penghasilan Kotor per Hari',
                        data: @if (isset($dailyGrossSales))
                            @json($dailyGrossSales)
                        @else
                            []
                        @endif ,
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
                        data: @if (isset($dailySales))
                            @json($dailySales)
                        @else
                            []
                        @endif ,
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
@endsection
