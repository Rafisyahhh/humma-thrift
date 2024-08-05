@extends('layouts.panel')

@section('title', 'Transaksi')

@section('css')
    <style>
        .table-row.ticket-row:hover {
            background: rgba(167, 146, 119, 0.40) !important;
        }

        .table-row .table-wrapper .table-heading {
            font-size: 1.5rem;
            font-weight: 500;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <section class="product-description">
        <div class="container">
            <div class="product-detail-section">
                <h5 class="mb-4">Data Transaksi</h5>

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" style="border:none;" role="tablist">
                        <button class="nav-link active me-2" id="nav-produk-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-produk" type="button" role="tab" aria-controls="nav-produk"
                            aria-selected="true">
                            Produk
                        </button>
                        <button class="nav-link" id="nav-lelang-tab" data-bs-toggle="tab" data-bs-target="#nav-lelang"
                            type="button" role="tab" aria-controls="nav-lelang" aria-selected="false">
                            Lelang
                        </button>
                    </div>
                </nav>
                <div class="tab-content tab-item" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-produk" role="tabpanel" aria-labelledby="nav-produk-tab"
                        tabindex="0" data-aos="fade-up">
                        <div class="produk">
                            <div class="cart-section wishlist-section">

                                <div class="profile-section">
                                    <div class="row g-5">
                                        @foreach ($transaction as $item)
                                            {{-- @foreach ($orders[$item->id] as $ordr)
                                                @if ($ordr->product) --}}
                                            @php
                                                $firstOrder = $orders[$item->id]->first();
                                                $additionalProductsCount = $orders[$item->id]->count() - 1;

                                            @endphp
                                            @if ($firstOrder->product->userstore->user_id == auth()->user()->id)
                                                @if ($firstOrder && $firstOrder->product)
                                                    {{-- @foreach ($transaction as $item)
                                        @if ($orders) --}}
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="product-wrapper"
                                                            style="border: 1px solid; height: 41rem;">
                                                            <div class="wrapper-content"
                                                                style="position: relative; height:13rem;">
                                                                <img src="{{ asset('storage/' . $firstOrder->product->thumbnail) }}"
                                                                    alt="img" class="object-fit-cover"
                                                                    style="border-radius: 0%; height:20rem; width:100%;">
                                                                @if ($additionalProductsCount === 0)
                                                                    <p class="paragraph mt-4 ms-4 fw-bold"
                                                                        style="margin-bottom: 38px">
                                                                        {{ $firstOrder->product->title }}</p>
                                                                @else
                                                                    <p class="paragraph mt-4 ms-4 fw-bold">
                                                                        {{ $firstOrder->product->title }} dan
                                                                        {{ $additionalProductsCount }} produk lainnya</p>
                                                                @endif
                                                                {{-- @endif
                                                        @endforeach --}}


                                                                <p class="paragraph mt-4 ms-4 fw-bold"
                                                                    style="font-size: 15px;">
                                                                    {{ $item->user->name }}</p>
                                                                {{-- <p class="paragraph mt-4 ms-4 p-0" style="font-size: 15px;">
                                                            Jumlah
                                                            produk : {{ $item->order->count() }}
                                                        </p> --}}

                                                                @php
                                                                    $statusClasses = [
                                                                        'diterima' =>
                                                                            'badge  text-bg-primary text-light',
                                                                        'selesai' =>
                                                                            'badge  text-bg-success text-light',
                                                                        'dikemas' =>
                                                                            'badge  text-bg-warning text-light',
                                                                        'diantar' =>
                                                                            'badge  text-bg-warning text-light',
                                                                        'selesaikan pesanan' =>
                                                                            'badge  text-bg-danger text-light',
                                                                    ];
                                                                @endphp

                                                                <p class="paragraph ms-4 p-0 mb-4" style="font-size: 15px;">
                                                                    @currency($item->total)
                                                                </p>

                                                                @if (isset($statusClasses[$item->delivery_status]))
                                                                    <div class="ps-3">
                                                                        <div class="{{ $statusClasses[$item->delivery_status] }}"
                                                                            style="font-size: 15px">
                                                                            {{ $item->delivery_status }}
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                <a
                                                                    href="{{ route('seller.transaction.detail', $item->id) }}">
                                                                    <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Detail Transaksi"
                                                                        style="position: absolute;  right: 10px; display: flex; justify-content: right; align-items: right; margin-bottom: 10px; border-radius: 50%; border:1px solid;">
                                                                        <svg style="display: flex; justify-content: center; align-items:center;"
                                                                            class="mt-1 me-1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="32" height="32"
                                                                            viewBox="0 0 24 24">
                                                                            <path fill="currentColor"
                                                                                d="m13.692 17.308l-.707-.72l4.088-4.088H5v-1h12.073l-4.088-4.088l.707-.72L19 12z" />
                                                                        </svg>
                                                                    </span></a>
                                                                <p class="bottom-left mt-4 ms-2"
                                                                    style="position: absolute; left: 10px; display: flex; justify-content: left; align-items: left;">
                                                                    {{ $item->created_at->format('d F Y') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                        {{-- @endforeach --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-lelang" role="tabpanel" aria-labelledby="nav-lelang-tab"
                        tabindex="0">
                        <div class="wishlist">
                            <div class="cart-section wishlist-section">
                                <table style="width: 100rem;">
                                    <tbody>
                                        <tr class="table-row table-top-row custom-table-header" style="color:#fff;">
                                            <td class="table-wrapper wrapper-product" style="width: 15%;">
                                                <h5 class="table-heading">PRODUK</h5>
                                            </td>
                                            <td class="table-wrapper wrapper-product" style="width: 15%;">
                                                <h5 class="table-heading">PEMBELI</h5>
                                            </td>
                                            <td class="table-wrapper wrapper-product" style="width: 15%;">
                                                <h5 class="table-heading">EMAIL</h5>
                                            </td>
                                            <td class="table-wrapper">

                                                <h5 class="table-heading">HARGA</h5>
                            </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">PENGIRIMAN</h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">STATUS</h5>
                                </div>
                            </td>

                            </tr>
                            @forelse ($transaction as $item)
                                @foreach ($orderL[$item->id] as $ordr)
                                    @if ($ordr->product_auction)
                                        @if ($ordr->product_auction->userStore->user_id == auth()->user()->id)
                                            <tr class="table-row ticket-row">

                                                <td class="table-wrapper wrapper-product" style="width: 28%;">
                                                    <div class="wrapper">
                                                        <div class="wrapper-img">
                                                            <img src="{{ asset('storage/' . $ordr->product_auction->thumbnail) }}"
                                                                alt="img" style="border-radius:0.5rem;">
                                                        </div>
                                                        <div class="wrapper-content">
                                                            <p class="heading" style="color: #787878; font-size: 12px;">
                                                                {{ $item->created_at->format('d F Y') }}</p>
                                                            <h5 class="heading">{{ $ordr->product_auction->title }}</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper" style="width: 15%;">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="heading">{{ $item->user->name }}</h5>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper" style="width: 15%;">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="heading">{{ $item->user->email }}</h5>
                                                    </div>
                                                </td>
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        <h5 class="heading">
                                                            {{ 'Rp. ' . number_format($ordr->product_auction->price, 0, ',', '.') }}
                                                        </h5>
                                                    </div>
                                                </td>
                                                @php
                                                    $statusClasses = [
                                                        'diterima' => 'badge  text-bg-primary text-light',
                                                        'selesai' => 'badge  text-bg-success text-light',
                                                        'dikemas' => 'badge  text-bg-warning text-light',
                                                        'diantar' => 'badge  text-bg-warning text-light',
                                                        'selesaikan pesanan' => 'badge  text-bg-danger text-light',
                                                    ];
                                                @endphp
                                                @if (isset($statusClasses[$item->delivery_status]))
                                                    <td class="table-wrapper" style="width: 12%; font-size: 15px">
                                                        {{-- <div class="{{ $statusClasses[$item->delivery_status] }}"> --}}
                                                        {{-- {{ $item->delivery_status }} --}}
                                                        <form
                                                            action="{{ route('seller.transaction.detail.update', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <select class="form-select form-select-lg mx-2"
                                                                aria-label="Default select example"
                                                                style="width: 160px;border-color: #1c3879" name="status"
                                                                onchange="this.form.submit()">
                                                                <option value="dikemas"
                                                                    {{ $item->delivery_status == 'dikemas' ? 'selected' : '' }}>
                                                                    Dikemas</option>
                                                                <option value="diantar"
                                                                    {{ $item->delivery_status == 'diantar' ? 'selected' : '' }}>
                                                                    Diantar</option>
                                                                <option value="diterima"
                                                                    {{ $item->delivery_status == 'diterima' ? 'selected' : '' }}>
                                                                    Diterima</option>
                                                            </select>
                                                        </form>
                                                        {{-- </div> --}}
                                                    </td>
                                                @endif
                                                <td class="table-wrapper">
                                                    <div class="table-wrapper-center">
                                                        @if ($ordr->transaction_order->status == 'UNPAID')
                                                            <h5 class="heading text-danger">Belum Bayar</h5>
                                                        @elseif ($ordr->transaction_order->status == 'PAID')
                                                            <h5 class="heading text-success">Pembayaran Berhasil</h5>
                                                        @elseif ($ordr->transaction_order->status == 'EXPIRED')
                                                            <h5 class="heading text-danger">Pembayaran Kadaluarsa</h5>
                                                        @elseif ($ordr->transaction_order->status == 'REFUND')
                                                            <h5 class="heading text-warning">Produk Dikembalikan</h5>
                                                        @elseif ($ordr->transaction_order->status == 'FAILED')
                                                            <h5 class="heading text-danger">Pembayaran Gagal</h5>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
