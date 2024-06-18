@extends('layouts.panel')
@section('tittle', 'Penghasilan')
@section('css')
<style>
    .table-row.ticket-row:hover {
    background: rgba(167, 146, 119, 0.40)!important;
    }
</style>
@endsection
@section('content')
<div class="tab-content nav-content" id="v-pills-tabContent" style="flex: 1 0%;">
<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
    <div class="user-profile">
        <div class="user-title">
            <h5 class="heading">Data Penghasilan</h5>
        </div>
        <div class="profile-section">
            <div class="row g-5">
                <div class="col-lg-4 col-sm-6">
                    <div class="product-wrapper">
                        <canvas class="wrapper-img" id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="
https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js
"></script>
    <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
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