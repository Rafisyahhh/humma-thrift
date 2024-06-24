@php
    $data = [
        'tahun' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
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

@section('head')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script>
        $(document).ready(function() {
            const ctx = $('#data-penghasilan')[0].getContext('2d');

            // Create gradient for the bars
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(75, 192, 192, 1)');
            gradient.addColorStop(1, 'rgba(153, 102, 255, 1)');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($data['tahun']),
                    datasets: [{
                        label: 'Penghasilan',
                        data: @json($data['penghasilan']),
                        backgroundColor: gradient,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        hoverBackgroundColor: 'rgba(75, 192, 192, 0.7)',
                        hoverBorderColor: 'rgba(75, 192, 192, 1)',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + value.toLocaleString();
                                },
                                stepSize: 200000
                            },
                            title: {
                                display: true,
                                text: 'Penghasilan (Rp)'
                            },
                            grid: {
                                display: false // Remove grid lines
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Bulan'
                            },
                            grid: {
                                display: false // Remove grid lines
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let value = context.raw;
                                    return 'Rp ' + value.toLocaleString();
                                }
                            }
                        },
                        legend: {
                            labels: {
                                font: {
                                    family: 'Inter' // Apply Inter font to legend
                                }
                            }
                        }
                    },
                    animation: {
                        duration: 1000,
                        easing: 'easeInOut'
                    }
                }
            });
        });
    </script>
@endsection
