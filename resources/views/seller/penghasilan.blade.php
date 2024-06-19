@php
  $data = [
      'tahun' => ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'july'],
      'penghasilan' => [1_000_000, 800_000, 20_000, 35_000, 80_000, 110_000, 300_000],
  ];
@endphp

@extends('layouts.panel')

@section('content')
  <section>
    <div class="container">
      <div>
        <div>
          <h5 class="heading">Data Penghasilan</h5>
        </div>
        <div class="profile-section">
          <canvas class="w-100" id="data-penghasilan"></canvas>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
  <script>
    $(document).ready(function() {
      const canvas = $('#data-penghasilan');
      new Chart(canvas, {
        type: 'bar',
        data: {
          labels: @json($data['tahun']),
          datasets: [{
            label: 'Penghasilan',
            data: @json($data['penghasilan']),
            backgroundColor: 'rgba(126, 163, 219, 0.40)',
            borderColor: 'rgba(28, 56, 121, 1)',
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
    });
  </script>
@endsection
