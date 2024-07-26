@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="template-assets/admin/assets/vendor/libs/apex-charts/apex-charts.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-users"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $countuser }}</h4>
                        <p class="ms-3 mb-0">Pengguna</p>
                    </div>
                    {{-- <p>Pengguna</p> --}}
                    {{-- <p class="mb-0">
                        <span class="fw-medium me-1">+18.2%</span>
                        <small class="text-muted">than last week</small>
                    </p> --}}
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-warning">
                                <i class='fas fa-store'></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $countseller }}</h4>
                        <p class="ms-3 mb-0">Seller</p>
                    </div>
                    {{-- <p class="mb-1">Seller</p> --}}
                    {{-- <p class="mb-0">
                        <span class="fw-medium me-1">-8.7%</span>
                        <small class="text-muted">than last week</small>
                    </p> --}}
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-danger"><i class='ti ti-box'></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $countproduct }}</h4>
                        <p class="ms-3 mb-0">Produk</p>

                    </div>
                    {{-- <p class="mb-1">Produk</p> --}}
                    {{-- <p class="mb-0">
                        <span class="fw-medium me-1">+4.3%</span>
                        <small class="text-muted">than last week</small>
                    </p> --}}
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-info">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-info"><i class='ti ti-gavel'></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $countproductauction }}</h4>
                        <p class="ms-3 mb-0">Produk Lelang</p>
                    </div>
                    {{-- <p class="mb-1">Produk Lelang</p> --}}
                    {{-- <p class="mb-0">
                        <span class="fw-medium me-1">-2.5%</span>
                        <small class="text-muted">than last week</small>
                    </p> --}}
                </div>
            </div>
        </div>

        <!-- Revenue Report -->
        <div class="col-12 col-xl-8 mb-4 col-xl-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row row-bordered g-0">
                        <div class="col-md-12 position-relative p-4">
                            <div class="card-header d-inline-block p-0 text-wrap position-absolute">
                                <h5 class="m-0 card-title">Data Pendapatan</h5>
                            </div>
                            <div class="saldo-container position-absolute top-0 end-0 p-4">
                                <h5>Saldo: Rp.{{ number_format($totalBalance, 2, ',', '.') }}</h5>
                            </div>
                           {{-- <div id="totalRevenueChart" class="mt-n1"></div> --}}
                           <div class="card-body mt-5">
                            <canvas id="adminchart" class="chartjs" style="display: block; box-sizing: border-box; "></canvas>
                            </div>

                        </div>
                        {{-- <div cla   ss="col-md-4 p-4">
                            <div class="text-center mt-4">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                        id="budgetId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="budgetId">
                                        <a class="dropdown-item prev-year1" href="javascript:void(0);">
                                            <script>
                                                document.write(new Date().getFullYear() - 1)
                                            </script>
                                        </a>
                                        <a class="dropdown-item prev-year2" href="javascript:void(0);">
                                            <script>
                                                document.write(new Date().getFullYear() - 2)
                                            </script>
                                        </a>
                                        <a class="dropdown-item prev-year3" href="javascript:void(0);">
                                            <script>
                                                document.write(new Date().getFullYear() - 3)
                                            </script>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-center pt-4 mb-0">$25,825</h3>
                            <p class="mb-4 text-center"><span class="fw-medium">Budget: </span>56,800</p>
                            <div class="px-3">
                                <div id="budgetChart"></div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-primary">Increase Budget</button>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!--/ Revenue Report -->
    </div>
@endsection

@section('scripts')
<script src="template-assets/admin/assets/vendor/libs/chartjs/chartjs.js"></script>
<script src="template-assets/admin/assets/js/main.js"></script>
<script src="template-assets/admin/assets/js/charts-chartjs.js"></script>
    <script src="{{ asset('template-assets/admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="template-assets/admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    {{-- <script src="template-assets/admin/assets/js/app-ecommerce-dashboard.js"></script> --}}
@endsection
@section('js')
{{-- <script>
    var labels = @json($months);
    var data = @json($data);

    var ctx = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(ctx, {
        type: 'line', // Jenis chart
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Transaksi per Bulan',
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
    var labels = @json($months);
    var data = @json($data);

    var ctx = document.getElementById('adminchart').getContext('2d');
    var adminchart = new Chart(ctx, {
        type: 'line', // Jenis chart
        data: {
            labels: labels,
            datasets: [{
                label: 'Pendapatan per bulan',
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
</script>
@endsection
