@php
        $data = [
            'hari' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            'penjualan_hari' => [20000, 35000, 40000, 30000, 45000, 60000, 50000],
            'minggu' => ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
            'penjualan_minggu' => [150000, 175000, 125000, 200000],
            'bulan' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
            'penjualan_bulan' => [1000000, 800000, 200000, 350000, 800000, 1100000, 3000000],
        ];
    @endphp


@extends('layouts.panel')

@section('content')
<section>
    <div class="container">
        <div>
            <div>
                <h5 class="heading">Data Penjualan/Hari</h5>
            </div>
            <div class="profile-section">
                <canvas id="penjualan-harian" width="400" height="200"></canvas>
            </div>
            <br><br>
            <div>
                <h5 class="heading">Data Penjualan/Minggu</h5>
            </div>
            <div class="profile-section">
                <canvas id="penjualan-mingguan" width="400" height="200"></canvas>
            </div>
            <br><br>
            <div>
                <h5 class="heading">Data Penjualan/Bulan</h5>
            </div>
            <div class="profile-section">
                <canvas id="penjualan-bulanan" width="400" height="200"></canvas>
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
                label: 'Penjualan per Hari',
                data: @json($data['penjualan_hari']),
                backgroundColor: 'rgba(126, 163, 219, 0.40)',
                borderColor: 'rgba(28, 56, 121, 1)',
                borderWidth: 1
            }]
        };

        const dataMingguan = {
            labels: @json($data['minggu']),
            datasets: [{
                label: 'Penjualan per Minggu',
                data: @json($data['penjualan_minggu']),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
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

        new Chart($('#penjualan-mingguan'), {
            type: 'line',
            data: dataMingguan,
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
