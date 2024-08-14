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

@section('title', 'Penghasilanku')

@push('style')
    <style>
        #incomeData {
            border-bottom: 0;
            gap: .5rem;
        }

        #incomeData li {
            border: none;
            padding: 0;
            gap: 0;
            width: unset;
        }

        #incomeData .nav-link {
            border-radius: .75rem !important;
            border: none;
            padding: 1rem 1.5rem;
        }

        #incomeData .nav-link.active {
            background-color: #1c3879;
            color: white;
        }
    </style>

    <style>
        #trx-section {
            margin-top: 2rem;
        }

        #trx-section .heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        #trx-section .form-group {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        #trx-section .form-group .form-control {
            font-size: 14px !important;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            border: 1px solid #ced4da;
        }

        #trx-section .form-group .btn {
            padding: 0.5rem 1rem;
            font-size: 14px !important;
            border-radius: .25rem !important;
            border: none;
        }

        #trx-section .form-group .btn-primary {
            background-color: #1c3879;
            color: #fff;
            cursor: pointer;
        }

        #trx-section .form-group .btn-primary:hover {
            background-color: #1c3879;
        }
    </style>

    <style>
        .table-view {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
            gap: .5rem;
            display: flex;
            flex-direction: column;
        }

        .table-header,
        .table-body {
            display: flex;
            width: 100%;
            background-color: #f8f9fa;
        }

        .table-header {
            background-color: #1c3879;
            color: #fff;
            font-weight: bold;
            border-radius: .5rem;
        }

        .table-header .table-item,
        .table-body .table-item {
            flex: 1;
            padding: 1rem 1.5rem;
            font-size: 14px !important;
        }

        .table-body {
            background-color: #fff;
            transition: all .2s;
            border: 1px solid #eee;
            border-radius: .5rem;
        }

        .table-body .table-item {
            color: #212529;
        }

        .table-body .table-item a {
            font-size: 14px;
        }

        .table-body:hover {
            background-color: #f8f9fa;
        }
    </style>

    <style>
        .custom-card {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: row;
            padding: 1.25rem;
            font-size: 16px;
        }

        .custom-card-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
            width: 5rem;
            height: 5rem;
            margin-right: 1rem;
            color: #fff;
            background-color: #1c3879;
            border-radius: .5rem;
        }

        .custom-card-content {
            margin-left: 1rem;
        }

        .custom-card-content .mb-0 {
            margin-bottom: 0;
        }
    </style>
@endpush

@section('content')
    <section id="chart-graphic" class="mb-5">
        <div class="d-flex justify-content-between">
            <h5 class="heading">Data Penjualanku</h5>
            <ul class="nav nav-tabs" id="incomeData" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="daily-income-tab" data-bs-toggle="tab" data-bs-target="#daily-income"
                        type="button" role="tab" aria-controls="daily-income" aria-selected="true">Harian</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="monthly-income-tab" data-bs-toggle="tab" data-bs-target="#monthly-income"
                        type="button" role="tab" aria-controls="monthly-income" aria-selected="false">Bulanan</button>
                </li>
            </ul>
        </div>
        <div class="tab-content mt-5" id="myTabContent">
            <div class="tab-pane fade show active" id="daily-income" role="tabpanel" aria-labelledby="daily-income-tab">
                <div class="monthly-income-section">
                    <canvas id="penjualan-harian" width="400" height="200"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="monthly-income" role="tabpanel" aria-labelledby="monthly-income-tab">
                <div class="monthly-income-section">
                    <canvas id="penjualan-bulanan" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </section>

    <section id="income">
        <div class="row">
            <div class="col-md-4">
                <div class="card custom-card">
                    <div class="custom-card-icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="custom-card-content">
                        <div class="mb-0">Total Transaksi</div>
                        <div class="mb-0">@currency($transactionTotal)</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card custom-card">
                    <div class="custom-card-icon">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="custom-card-content">
                        <div class="mb-0">Transaksi Bersih</div>
                        <div class="mb-0">@currency($saldo)</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card custom-card">
                    <div class="custom-card-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="custom-card-content">
                        <div class="mb-0">Saldo Saya</div>
                        <div class="mb-0">@currency($accountBalance)</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5" id="trx-section">
        <div class="heading">
            <h5>Data Transaksi</h5>

            <form action="{{ url()->current() }}" class="form-group">
                <input type="date" id="date-range" class="form-control" name="date"
                    value="{{ old('date', request()->get('date')) }}" style="font-size: 1rem" />
                <input type="text" id="trx-id" name="trx" class="form-control"
                    value="{{ old('trx', request()->get('trx')) }}" placeholder="Misal: TRX-00001"
                    style="font-size: 1rem" />
                <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>

        <div class="table-view">
            <div class="table-header">
                <div class="table-item">#</div>
                <div class="table-item">Tanggal Kadaluarsa</div>
                <div class="table-item">Tanggal Dibayar</div>
                <div class="table-item">Status</div>
            </div>

            @forelse ($transactions as $transaction)
                <div class="table-body">
                    <div class="table-item flex-column d-flex">
                        <a
                            href="{{ route('seller.transaction.detail', $transaction->id) }}">{{ $transaction->transaction_id }}</a>
                        <span class="text-muted">@currency($transaction->total)</span>
                    </div>
                    <div class="table-item">{{ $transaction->expired_at->locale('id')->isoFormat('D MMMM YYYY') }}</div>
                    <div class="table-item">
                        {{ $transaction->paid_at ? $transaction->paid_at->locale('id')->isoFormat('D MMMM YYYY') : '-' }}
                    </div>
                    <div class="table-item">
                        <span
                            class="badge bg-{{ $transaction->getTransactionEnum()->color() }}">{{ $transaction->getTransactionEnum()->label() }}</span>
                    </div>
                </div>
            @empty
                <tr class="table-row ticket-row" style="height:12px;">
                    <td colspan="6"
                        class="text-center no-data-message d-flex justify-content-center align-items-center">
                        <div class="m-auto">
                            <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong"
                                style="width: 200px; height: 200px;">
                            <p class="mt-3 text-center">Tidak ada data</p>
                        </div>
                    </td>
                </tr>
            @endforelse

            {{ $transactions->links() }}
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('additional-assets/chart.js-4.4.3/chart.umd.js') }}"></script>

    <script>
        const ctxBulanan = document.getElementById('penjualan-bulanan').getContext('2d');
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
            const ctxHarian = document.getElementById('penjualan-harian').getContext('2d');
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
@endsection
