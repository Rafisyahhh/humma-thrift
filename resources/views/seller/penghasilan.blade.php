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
