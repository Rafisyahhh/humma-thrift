@extends('layouts.panel')

@section('title', 'Beranda Panel')

@push('style')
    <style>
        .card-summary {
            flex-direction: row;
            gap: 1.75rem;
            align-items: center;
            border-radius: 1.25rem;
            padding: 1.25rem;
            border-color: #1c3879;
            transition: all .2s;
        }

        .card-summary:hover {
            border-color: #1c3879;
        }

        .card-summary .icon-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 5rem;
            height: 5rem;
            border-radius: 0.5rem;
            background-color: #f0f0f0;
            transition: all .2s;
        }

        .card-summary .icon-wrapper i {
            font-size: 2rem !important;
        }

        .card-summary:hover .icon-wrapper {
            background-color: #1c3879;
            color: white;
        }

        .product-details table {
            width: 100%;
            border-collapse: collapse;
            /* Menghilangkan jarak antar sel */
        }

        .product-details th,
        .product-details td {
            text-align: left;
            padding: 10px;
            color: rgba(0, 0, 0, 0.4);
            /* Warna teks abu-abu */
        }

        .product-details th {
            font-weight: normal;
            font-size: 19px;
        }

        .product-details .inner-text {
            font-size: 18px;
            color: rgba(0, 0, 0, 0.7);
            /* Warna teks sedikit lebih gelap untuk kontras */
        }

        .table-wrapper-center .table-heading {
            color: white;
            /* Sets text color to white */
        }
    </style>
@endpush

{{-- @php
    $data = [
        'bulan' => [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ],
        'pengeluaran' => [20000, 35000, 40000, 30000, 45000, 60000, 50000, 70000, 20000, 20000, 30000, 40000],
    ];
@endphp --}}

@section('content')
    <section id="quick-links" class=" pb-4 mb-4 border-bottom">
        <h5 class="mb-4">Dasbor</h5>

        <div class="row gy-4 gx-4 mb-4">
            <div class="col-md-3">
                <a href="javascript:void(0)" class="card card-summary card-body">
                    <div class="icon-wrapper">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div>
                        <h5>{{ $countUnpaid }}</h5>
                        <p class="mb-0">Harus Dibayar</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0)" class="card card-summary card-body">
                    <div class="icon-wrapper">
                        <i class="fa-solid fa-check-to-slot"></i>
                    </div>
                    <div>
                        <h5>{{ $countDelivery }}</h5>
                        <p class="mb-0">Pesanan Selesai</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0)" class="card card-summary card-body">
                    <div class="icon-wrapper">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div>
                        <h5>{{ $countFavorite }}</h5>
                        <p class="mb-0">Favorite</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0)" class="card card-summary card-body">
                    <div class="icon-wrapper">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <div>
                        <h5>{{ $countcart }}</h5>
                        <p class="mb-0">Keranjang</p>
                    </div>
                </a>
            </div>
        </div>

        {{-- @dd(!auth()->user()->hasVerifiedEmail()) --}}
        @if (!auth()->user()->hasVerifiedEmail())
            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size: 0.9rem;">
                <p>Akun anda belum terverifikasi. Silahkan verifikasikan akun anda dari tautan yang sudah kami kirim ke
                    surel anda.</p> <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif
    </section>

    <section id="my-orders">
        <h5 class="mb-4">Pesanan Saya</h5>
        <div class="table-responsive">
            <table>
                <tbody>
                    <tr class="table-row table-top-row custom-table-header" style="text-color:#fff;">
                        <td class="table-wrapper wrapper-product">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">PRODUK</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">HARGA</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">STATUS</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">DETAIL ORDER</h5>
                            </div>
                        </td>
                    </tr>


                    @forelse ($order as $item)
                        @if ($item->transaction_order->user_id == auth()->user()->id && $item->transaction_order->delivery_status != 'selesai')
                            @if ($item->product !== null)
                                <tr class="table-row ticket-row">
                                    <td class="table-wrapper wrapper-product" style="width: 35%; ">
                                        <div class="wrapper">
                                            <div class="wrapper-img">
                                                <img src="{{ asset('storage/' . $item->product->thumbnail) }}"
                                                    alt="img">
                                            </div>
                                            <div class="wrapper-content">
                                                <h5 class="heading">{{ $item->product->title }}</h5>
                                                <p style="color: #636363">{{ $item->product->brand->title }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="heading">Rp.
                                                {{ number_format($item->product->price, null, null, '.') }}</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            @if ($item->transaction_order->delivery_status == 'diterima')
                                                <form
                                                    action="{{ route('user.order.update', $item->transaction_order->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" value="selesai">
                                                    <div class="table-wrapper-center">
                                                        <button type="submit" class="shop-btn m-0"
                                                            style="font-size: 15px;">
                                                            Konfirmasi telah diterima
                                                        </button>
                                                    </div>
                                                </form>
                                            @elseif($item->transaction_order->delivery_status == 'selesai')
                                                <div class="table-wrapper-center">
                                                    <span class="badge text-bg-success">
                                                        <h5 class="heading text-light">
                                                            {{ $item->transaction_order->delivery_status }}</h5>
                                                    </span>
                                                </div>
                                            @elseif($item->transaction_order->delivery_status == 'dikemas')
                                                <div class="table-wrapper-center">
                                                    <span class="badge text-bg-warning">
                                                        <h5 class="heading text-light">
                                                            {{ $item->transaction_order->delivery_status }}</h5>
                                                    </span>
                                                </div>
                                            @elseif($item->transaction_order->delivery_status == 'diantar')
                                                <div class="table-wrapper-center">
                                                    <span class="badge text-bg-warning">
                                                        <h5 class="heading text-light">
                                                            {{ $item->transaction_order->delivery_status }}</h5>
                                                    </span>
                                                </div>
                                            @elseif($item->transaction_order->delivery_status == 'selesaikan pesanan')
                                                <div class="table-wrapper-center">
                                                    <span class="badge text-bg-danger">
                                                        <h5 class="heading text-light">
                                                            {{ $item->transaction_order->delivery_status }}</h5>
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <div class="wrapper-btn">
                                                <a href="{{ route('user.transaction.show', ['reference' => $item->transaction_order->reference_id]) }}"
                                                    class="shop-btn">
                                                    Detail
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @elseif ($item->product_auction !== null)
                                <tr class="table-row ticket-row">
                                    <td class="table-wrapper wrapper-product" style="width: 35%; ">
                                        <div class="wrapper">
                                            <div class="wrapper-img">
                                                <img src="{{ asset('storage/' . $item->product_auction->thumbnail) }}"
                                                    alt="img">
                                            </div>
                                            <div class="wrapper-content">
                                                <h5 class="heading">{{ $item->product_auction->title }}</h5>
                                                <p style="color: #636363">{{ $item->product_auction->brand->title }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="table-wrapper" style="text-align:center;">
                                        <p style="color: #989797; font-size: 14px">Rp.
                                            {{ number_format($item->product_auction->bid_price_start, null, null, '.') }}
                                            - Rp.
                                            {{ number_format($item->product_auction->bid_price_end, null, null, '.') }}
                                        </p>
                                        <p class="heading">Rp.
                                            {{ number_format($item->product_auction->price, null, null, '.') }}
                                        </p>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            @if ($item->transaction_order->delivery_status == 'diterima')
                                                <form
                                                    action="{{ route('user.order.update', $item->transaction_order->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" value="selesai">
                                                    <div class="table-wrapper-center">
                                                        <button type="submit" class="shop-btn m-0"
                                                            style="font-size: 15px;">
                                                            Konfirmasi telah diterima
                                                        </button>
                                                    </div>
                                                </form>
                                            @elseif($item->transaction_order->delivery_status == 'selesai')
                                                <div class="table-wrapper-center">
                                                    <span class="badge text-bg-success">
                                                        <h5 class="heading text-light">
                                                            {{ $item->transaction_order->delivery_status }}</h5>
                                                    </span>
                                                </div>
                                            @elseif($item->transaction_order->delivery_status == 'dikemas')
                                                <div class="table-wrapper-center">
                                                    <span class="badge text-bg-warning">
                                                        <h5 class="heading text-light">
                                                            {{ $item->transaction_order->delivery_status }}</h5>
                                                    </span>
                                                </div>
                                            @elseif($item->transaction_order->delivery_status == 'diantar')
                                                <div class="table-wrapper-center">
                                                    <span class="badge text-bg-warning">
                                                        <h5 class="heading text-light">
                                                            {{ $item->transaction_order->delivery_status }}</h5>
                                                    </span>
                                                </div>
                                            @elseif($item->transaction_order->delivery_status == 'selesaikan pesanan')
                                                <div class="table-wrapper-center">
                                                    <span class="badge text-bg-danger">
                                                        <h5 class="heading text-light">
                                                            {{ $item->transaction_order->delivery_status }}</h5>
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <div class="wrapper-btn">
                                                <a href="{{ route('user.transaction.show', ['reference' => $item->transaction_order->reference_id]) }}"
                                                    class="shop-btn">
                                                    Detail
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                {{-- @else
                            <tr class="table-row ticket-row" style="height:12px;">
                                <td colspan="6" class="text-center no-data-message" >
                                    <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;">
                                    <p>Tidak ada data</p>
                                </td>
                            </tr> --}}
                            @endif
                            {{-- @else
                            <tr class="table-row ticket-row" style="height:12px;">
                                <td colspan="6" class="text-center no-data-message" >
                                    <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;">
                                    <p>Tidak ada data</p>
                                </td>
                            </tr> --}}
                        @endif
                    @empty
                        <tr class="table-row ticket-row" style="height:12px;">
                            <td colspan="6" class="text-center no-data-message">
                                <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong"
                                    style="width: 200px; height: 200px;">
                                <p>Tidak ada data</p>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            {{-- Detail --}}
            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true" style="height: 99%;">
                <div class="modal-dialog" style="margin-left: auto;">
                    <div class="login-section account-section p-0">
                        <div class="review-form m-0" style="height: 80%; width: 95rem;">
                            <div class="text-end mb-4">
                                <div class="close-btn">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                            <section class="product product-info" style="width:85rem; height:60%;">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="product-info-img" data-aos="fade-right">
                                            <div class="swiper product-top" style="height:50rem;">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide slider-top-img">
                                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                                            alt="img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="product-info-content" data-aos="fade-left">
                                            <h5>Classic Design Skart</h5>
                                            <div class="price">
                                                <span class="new-price">Rp.100.000,00 - 200.000,00</span>
                                            </div>
                                            <hr>
                                            <div class="product-details">
                                                <table>
                                                    <tr>
                                                        <th>Kategori</th>
                                                        <td><span class="inner-text">Dress</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Brand</th>
                                                        <td><span class="inner-text">Adidas</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Ukuran</th>
                                                        <td><span class="inner-text">XL</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Stok</th>
                                                        <td><span class="inner-text">2</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"><span class="inner-text">Lorem ipsum dolor sit
                                                                amet consectetur adipisicing elit. Eveniet cumque
                                                                perferendis libero nesciunt minima odio autem ratione quia,
                                                                eligendi temporibus!</span></th>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 2rem">Status</td>
                                                        <td style="justify-content:right; align-items:right;"><span
                                                                class="inner-status">
                                                                Diterima</span></td>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="margin-top: 50px;">
        <div class="container">
            <div>
                <div>
                    <h5 class="heading">Data Pengeluaran/Bulan</h5>
                </div>
                <div class="profile-section">
                    <canvas id="pengeluaran" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('additional-assets/chart.js-4.4.3/chart.umd.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctxBulanan = document.getElementById('pengeluaran').getContext('2d');
            const gradientBulanan = ctxBulanan.createLinearGradient(0, 0, 0, 250);
            gradientBulanan.addColorStop(0, 'rgba(25, 56, 121, 0.25)');
            gradientBulanan.addColorStop(1, 'rgba(25, 56, 121, 0.0)');

            const monthlyLabels = @json($months);
            const monthlyGrossSales = @json($monthlyGrossData);

            const dataBulanan = {
                labels: monthlyLabels,
                datasets: [{
                        label: 'Pengeluaran Kotor per Bulan',
                        data: monthlyGrossSales,
                        backgroundColor: gradientBulanan,
                        borderColor: 'rgba(25, 56, 121, 1)',
                        borderWidth: 3,
                        fill: true
                    }

                ]
            };

            const monthlyOptions = {
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
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
                options: monthlyOptions
            });
        });
    </script>


    {{-- <script>
        var labels = @json($months);
        var data = @json($datas);

        var ctx = document.getElementById('pengeluaran').getContext('2d');
        var pengeluaran = new Chart(ctx, {
            type: 'line', // Jenis chart
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pengeluaran per bulan',
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

    {{-- <script>
        $(document).ready(function() {
            const dataBulanan = {
                labels: @json($data['bulan']),
                datasets: [{
                    label: 'Penjualan per Bulan',
                    data: @json($data['pengeluaran']),
                    backgroundColor: 'rgba(66, 91, 176, 0.4)',
                    borderColor: 'rgba(28, 56, 151, 1)',
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

            new Chart($('#pengeluaran'), {
                type: 'bar',
                data: dataBulanan,
                options: options
            });
        });
    </script> --}}
@endsection
