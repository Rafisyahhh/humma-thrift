@extends('layouts.panel')

@section('title', 'Transaksi')

@section('css')

    <head>
        <style>
            .filter {
                margin-left: auto;
                padding: 10px;
            }

            .table-row.ticket-row:hover {
                background: rgba(167, 146, 119, 0.40) !important;
            }

            .table-row .table-wrapper .table-heading {
                font-size: 1.5rem;
                font-weight: 500;
                color: #fff;
            }
        </style>
    </head>
@endsection
@section('content')

    <section class="product-description">
        <div class="container">
            <div class="product-detail-section">
                <h5 class="mb-4">Data Transaksi
                    <div class="filter float-end">
                        <form action="{{route('seller.transaction.detail.update', $code)}}" method="POST">
                            @csrf
                            <select class="form-select form-select-lg" aria-label="Default select example"
                                style="width: 200px;border-color: #1c3879" name="status"
                                onchange="this.form.submit()">
                                <option value="dikemas" {{ $status->delivery_status == 'dikemas' ? 'selected' : '' }}>Dikemas</option>
                                <option value="diantar" {{ $status->delivery_status == 'diantar' ? 'selected' : '' }}>Diantar</option>
                                <option value="diterima" {{ $status->delivery_status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                            </select>
                        </form>
                    </div>
                </h5>
            </div>
            <div class="row">
                <div class="cart-section wishlist-section">
                    <table>
                        <tbody>
                            <tr class="table-row table-top-row">
                                <td class="table-wrapper">
                                    <div class="table-wrapper-center">
                                        <h5 class="table-heading">TANGGAL</h5>
                                    </div>
                                </td>
                                <td class="table-wrapper">
                                    <div class="table-wrapper-center">
                                        <h5 class="table-heading">PEMBELI</h5>
                                    </div>
                                </td>
                                <td class="table-wrapper">
                                    <div class="table-wrapper-center">
                                        <h5 class="table-heading">EMAIL</h5>
                                    </div>
                                </td>
                                <td class="table-wrapper">
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
                            </tr>
                            @foreach ($transactions as $item)
                                <tr class="table-row ticket-row">
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="heading">
                                                {{ $item->created_at->format('d F Y') }}</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="heading">{{ $item->user->username }}</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="heading">{{ $item->user->email }}</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper wrapper-product">
                                        <div class="wrapper">
                                            <div class="wrapper-img">
                                                <img src="{{ asset('storage/' . $item->Product->thumbnail) }}"
                                                    alt="img" class="object-fit-cover" style="border-radius: 0%">
                                            </div>
                                            <div class="wrapper-content">
                                                <h5 class="heading">{{ $item->Product->title }}</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="heading">Rp.
                                                {{ number_format($item->Product->price, null, null, '.') }}</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            @if ($item->status == 'UNPAID')
                                                <h5 class="heading text-danger">Belum Bayar</h5>
                                            @elseif ($item->status == 'PAID')
                                                <h5 class="heading text-success">Pembayaran Berhasil</h5>
                                            @elseif ($item->status == 'EXPIRED')
                                                <h5 class="heading text-danger">Pembayaran Kadaluarsa</h5>
                                            @elseif ($item->status == 'REFUND')
                                                <h5 class="heading text-warning">Produk Dikembalikan</h5>
                                            @elseif ($item->status == 'FAILED')
                                                <h5 class="heading text-danger">Pembayaran Gagal</h5>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="table-row ticket-row">
                                <td class="table-wrapper">

                                </td>
                                <td class="table-wrapper">

                                </td>
                                <td class="table-wrapper">

                                </td>
                                <td class="table-wrapper" style="position: relative;">
                                    <div class="table-wrapper-center"
                                        style="position: absolute; right:0; display: flex; justify-content: flex-end; align-items: center; transform: translateY(-50%);">
                                        <h5 class="heading">Total : </h5>
                                    </div>
                                </td>

                                <td class="table-wrapper">
                                    <div class="table-wrapper-center">
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($transactions as $item)
                                            @php
                                                $total += $item->Product->price;
                                            @endphp
                                        @endforeach
                                        <h5 class="heading" style="color: red;">Rp.
                                            {{ number_format($total, null, null, '.') }}</h5>
                                    </div>
                                </td>
                                <td class="table-wrapper">

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
