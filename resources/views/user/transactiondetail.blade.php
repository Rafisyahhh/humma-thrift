@extends('layouts.home')
@section('title', 'Detail Transaksi')
@push('style')
@endpush
@section('content')
    <section class="blog about-blog pb-5">
        <div class="container">
            <div class="blog-heading about-heading">
                <h1 class="heading">Detail Transaksi</h1>
            </div>
        </div>
    </section>
    <section class="checkout product footer-padding py-5">
        <div class="container">
            <div class="checkout-section">
                <div class="row gy-5">
                    <div class="col-lg-8">
                        <div class="checkout-wrapper">
                            <div class="account-section billing-section">
                                <h5 class="wrapper-heading fs-1" style="color: #1c3879"><i class="fa-solid fa-shirt"></i>
                                    Daftar Order</h5>
                                <div class="order-summery">
                                    <hr />
                                    <div class="subtotal product-total">
                                        <ul class="product-list">
                                            @foreach ($order as $item)
                                                @if ($item->product)
                                                    <li>
                                                        <div class="d-flex gap-3">
                                                            <img src="{{ asset('storage/' . $item->product->thumbnail) }}"
                                                                width="60" />
                                                            <div class="mt-1">
                                                                <a href="{{ route('store.product.detail', ['store' => $item->product->userStore->username, 'product' => $item->product->slug]) }}"
                                                                    class="wrapper-heading" style="font-size: 20px">
                                                                    {{ $item->product->title }}</a>
                                                                <p class="paragraph">{{ $item->product->brand->title }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="price mt-3">
                                                            <h5 class="wrapper-heading" style="font-size: 20px">
                                                                Rp{{ number_format($item->product->price, null, null, '.') }}
                                                            </h5>
                                                        </div>
                                                    </li>
                                                @elseif($item->product_auction)
                                                    <li>
                                                        <div class="d-flex gap-3">
                                                            <img src="{{ asset('storage/' . $item->product_auction->thumbnail) }}"
                                                                width="60" />
                                                            <div class="mt-1">
                                                                <a href="{{ route('store.product.detail', ['store' => $item->product_auction->userStore->username, 'product' => $item->product_auction->slug]) }}"
                                                                    class="wrapper-heading" style="font-size: 20px">
                                                                    {{ $item->product_auction->title }}</a>
                                                                <p class="paragraph">
                                                                    {{ $item->product_auction->brand->title }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="price mt-3">
                                                            <h5 class="wrapper-heading" style="font-size: 20px">
                                                                Rp{{ number_format($item->product_auction->price, null, null, '.') }}
                                                            </h5>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-wrapper mt-4">
                            <div class="account-section billing-section">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="wrapper-heading fs-1" style="color: #1c3879">
                                            <i class="fa-solid fa-location-dot"></i> Alamat Pengirim
                                        </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="wrapper-heading fs-1" style="color: #1c3879">
                                            <i class="fa-solid fa-location-arrow"></i> Alamat Tujuan
                                        </h5>
                                    </div>
                                </div>
                                <div class="order-summary mt-4">
                                    <div class="subtotal product-total">
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                @php
                                                    $firstOrder = $transaction_order->order->first();
                                                    if ($firstOrder->product !== null) {
                                                        $userstore = $firstOrder->product->userstore;
                                                    } elseif ($firstOrder->product_auction !== null) {
                                                        $userstore = $firstOrder->product_auction->userstore;
                                                    }
                                                @endphp
                                                <p class="fw-bold" style="font-size: 17px; margin: 0"
                                                    id="selected-username">
                                                    {{ $userstore->name }} |
                                                    {{ $userstore->user->phone }}
                                                </p>
                                                <p style="font-size: 17px;" id="selected-address">
                                                    {{ $userstore->address }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="fw-bold" style="font-size: 17px; margin: 0"
                                                    id="selected-username">
                                                    {{ $transaction_order->user->name }} |
                                                    {{ $transaction_order->user->phone }}
                                                </p>
                                                <p style="font-size: 17px;" id="selected-address">
                                                    {{ $transaction_order->UserAddress->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-wrapper mt-4">
                            <div class="account-section billing-section">
                                <h5 class="wrapper-heading fs-1" style="color:#1c3879">
                                    <i class="fa-brands fa-shopify"></i> Ringkasan Belanja
                                    @if ($transaction_order->status == 'UNPAID')
                                        <span class="badge text-bg-danger float-end">Belum Bayar</span>
                                    @elseif ($transaction_order->status == 'PAID')
                                        <span class="badge text-bg-success float-end">Pembayaran Berhasil</span>
                                    @elseif ($transaction_order->status == 'EXPIRED')
                                        <span class="badge text-bg-danger float-end">Pembayaran Kadaluarsa</span>
                                    @elseif ($transaction_order->status == 'REFUND')
                                        <span class="badge text-bg-warning float-end">Produk Dikembalikan</span>
                                    @elseif ($transaction_order->status == 'FAILED')
                                        <span class="badge text-bg-danger float-end">Pembayaran Gagal</span>
                                    @endif
                                </h5>
                                </h5>
                                <div class="order-summery">
                                    <div class="subtotal product-total">
                                        <h5 class="wrapper-heading fs-3">No Reference</h5>
                                        <h5 class="wrapper-heading fs-3">
                                            <div class="d-flex gap-3" id="selected-payment-method">
                                                <p>#{{ $transaction_order->reference_id }}</p>
                                            </div>
                                        </h5>
                                    </div>
                                    <div class="subtotal product-total">
                                        <h5 class="wrapper-heading" style="font-size: 17px;">Bayar Menggunakan</h5>
                                        <h5 class="wrapper-heading" style="font-size: 17px;">
                                            <div class="d-flex gap-3" id="selected-payment-method">
                                                <p>{{ $detail->payment_name }}</p>
                                            </div>
                                        </h5>
                                    </div>
                                    <div class="subtotal product-total">
                                        <h5 class="wrapper-heading" style="font-size: 17px;">Total Harga</h5>
                                        <h5 class="wrapper-heading" style="font-size: 17px;">
                                            Rp.{{ number_format($detail->amount_received, null, null, '.') }}
                                        </h5>
                                    </div>
                                    <div class="subtotal product-total">
                                        <h5 class="wrapper-heading" style="font-size: 17px;">Biaya Admin</h5>
                                        <h5 class="wrapper-heading" style="font-size: 17px;" id="admin-fee">
                                            Rp.{{ number_format($detail->total_fee, null, null, '.') }}</h5>
                                    </div>
                                    <div class="subtotal total">
                                        <h5 class="wrapper-heading">Total Belanja</h5>
                                        <h5 class="wrapper-heading price" id="total-belanja">
                                            Rp.{{ number_format($detail->amount, null, null, '.') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="checkout-wrapper">
                            <div class="account-section billing-section">
                                <h5 class="wrapper-heading fs-1" style="color:#1c3879">
                                    <i class="fa-solid fa-money-bill"></i> Instruksi Pembayaran
                                </h5>
                                <div class="order-summery">
                                    <div class="accordion accordion-flush mt-3" id="accordionFlushExample">
                                        @foreach ($detail->instructions as $item)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fs-3 fw-bold" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapse{{ $loop->iteration }}"
                                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                                        {{ $item->title }}
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse{{ $loop->iteration }}"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            @foreach ($item->steps as $step)
                                                                <li class="fs-4">{{ $loop->iteration }}.
                                                                    {!! $step !!}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
    </section>
@endsection

@push('script')
@endpush
