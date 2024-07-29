@php
    $url = url()->current();
    $text = $isProductAuction ? $isProductAuction->title : ($isProduct ? $isProduct->title : 'Undefined');
@endphp

@extends('layouts.home')

@section('title', 'Detail Product')

@section('style')
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 100%;
            max-width: 60rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <style>
        .ribbon-status {
            z-index: 100;
            position: absolute;
            width: 45rem;
            height: 5rem;
            top: 5rem;
            left: -14rem;
            padding: .25rem;
            transform: rotate(-45deg);
            font-size: 3.000rem;
            text-align: center;
            text-transform: uppercase;
        }

        .ribbon-status.danger {
            background: red;
            color: white;
        }

        .share-container {
            display: flex;
            align-items: center;
        }

        .share-buttons {
            display: flex;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .share-buttons li {
            margin-right: 10px;
        }

        .social-buttons {
            display: inline-block;
        }

        .header-bottom {
            z-index: 1;
            position: relative;
        }

        .text-gray {
            color: gray;
        }

        .row product-details {
            font-size: 10rem;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 100%;
            max-width: 60rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        @media screen and (min-width: 1440px) {
            .svg-container {
                position: absolute;
                top: 3%;
                left: 50%;
                width: 70%;
                height: 70%;
                z-index: 0;
            }
        }

        @media screen and (max-width: 1440px) and (min-width: 1200px) {
            .svg-container {
                position: absolute;
                top: 3%;
                left: 50%;
                width: 50%;
                height: 70%;
                z-index: 0;
            }
        }

        @media screen and (max-width: 1200px) and (max-width: 992px) {
            .svg-container {
                position: absolute;
                top: 3%;
                left: 50%;
                width: 50%;
                height: 70%;
                z-index: 0;
            }
        }

        @media screen and (max-width: 992px) and (max-width: 786px) {
            .svg-container {
                position: absolute;
                top: 3%;
                left: 50%;
                width: 50%;
                height: 70%;
                z-index: 0;
            }
        }

        .svg-container {
            position: absolute;
            top: 3%;
            left: 50%;
            width: 50%;
            height: 70%;
            z-index: 0;
        }
    </style>
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modals = document.querySelectorAll('.modal');
            var btns = document.querySelectorAll('.openModal');
            var spans = document.querySelectorAll('.close');

            btns.forEach(function(btn, index) {
                btn.onclick = function() {
                    var productId = btn.getAttribute('data-id');
                    var modal = document.getElementById('reviewModal-' + productId);
                    var auctionForm = document.getElementById('auctionForm-' + productId);

                    if (auctionForm) {
                        auctionForm.querySelector('input[name="product_id"]').value = productId;
                    }

                    modal.style.display = 'flex';
                }
            });

            spans.forEach(function(span, index) {
                span.onclick = function() {
                    var modal = span.closest('.modal');
                    modal.style.display = 'none';
                }
            });

            window.onclick = function(event) {
                modals.forEach(function(modal) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                    }
                });
            }
        });
    </script>
@endsection
@section('content')
    <section class="product product-info py-0">
        <div class="container">
            <div class="product-info-section">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="product-info-img" data-aos="fade-right">
                            <div class="swiper product-top" style="z-index:1">
                                <div class="swiper-wrapper">
                                    @if ($isProduct)
                                        @if ($isProduct->status != 'active')
                                            <div class="ribbon-status danger">
                                                {{ $isProduct->status }}
                                            </div>
                                        @endif
                                    @elseif ($isProductAuction)
                                        @if ($isProductAuction->status != 'active')
                                            <div class="ribbon-status danger">
                                                {{ $isProductAuction->status }}
                                            </div>
                                        @endif
                                    @endif
                                    @if ($isProduct)
                                        @if ($isProduct->status == 'active')
                                            @foreach ($isProduct->gallery as $item)
                                                <div class="swiper-slide slider-top-img">
                                                    <div class="ratio ratio-1x1 position-relative"
                                                        style="background-color:black">
                                                        <img src="{{ asset('storage/' . $item->image) }}"
                                                            class="object-fit-cover" alt="img">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @elseif ($isProduct->status != 'active')
                                            @foreach ($isProduct->gallery as $item)
                                                <div class="swiper-slide slider-top-img">
                                                    <div class="ratio ratio-1x1 position-relative"
                                                        style="background-color:black">
                                                        <img src="{{ asset('storage/' . $item->image) }}"
                                                            class="object-fit-cover" alt="img" @style(['opacity: 0.4;' => $item->status != 'active'])>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                    @if ($isProductAuction)
                                        @if ($isProductAuction->status == 'active')
                                            @foreach ($isProductAuction->gallery as $item)
                                                <div class="swiper-slide slider-top-img">
                                                    <div class="ratio ratio-1x1">
                                                        <img src="{{ asset('storage/' . $item->image) }}"
                                                            class="object-fit-cover" alt="img">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @elseif($isProductAuction->status != 'active')
                                            @foreach ($isProductAuction->gallery as $item)
                                                <div class="swiper-slide slider-top-img">
                                                    <div class="ratio ratio-1x1">
                                                        <img src="{{ asset('storage/' . $item->image) }}"
                                                            class="object-fit-cover" alt="img" @style(['opacity: 0.4;' => $item->status != 'active'])>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="swiper product-bottom" style="z-index:1">
                                <div class="swiper-wrapper">
                                    @if ($isProduct)
                                        @foreach ($isProduct->gallery as $item)
                                            <div class="swiper-slide slider-bottom-img p-0">
                                                <div class="ratio ratio-1x1">
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="img"
                                                        class="object-fit-cover" width="100%" style="border-radius: 10%">
                                                </div>
                                            </div>
                                        @endforeach
                                    @elseif ($isProductAuction)
                                        @foreach ($isProductAuction->gallery as $item)
                                            <div class="swiper-slide slider-bottom-img">
                                                <div class="ratio ratio-1x1">
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="img"
                                                        style="border-radius: 10%" class="object-fit-cover">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($isProduct)
                        <div class="col-md-6">
                            <div class="product-info-content" data-aos="fade-left">
                                <h5 style="z-index:1;position: relative;">{{ $isProduct->title }}</h5>
                                {{-- <a href="{{ route('product.detail', $isProduct->id) }}" style="z-index: 1; position: relative;">
                                    <h5>{{ $isProduct->title }}</h5>
                                </a> --}}
                                <div class="price">
                                    <span class="new-price fs-1" style="z-index:1">@currency($isProduct->price)</span>
                                </div>
                                <hr>
                                <div class="row product-details">
                                    <div class="col-3 py-2 my-2" style="z-index:1">
                                        <p class="fs-2 text-grey">Kategori</p>
                                        <p class="fs-2 text-grey">Brand</p>
                                        <p class="fs-2 text-grey">Ukuran</p>
                                        <p class="fs-2 text-grey">Warna</p>
                                    </div>
                                    <div class="col-9 py-2 my-2" style="z-index:1">
                                        <p class="fs-2 inner-text">:
                                            {{ implode(', ', $isProduct->categories->pluck('title')->toArray()) }}</p>
                                        <p class="fs-2 inner-text">: {{ $isProduct->brand->title }}</p>
                                        <p class="fs-2 inner-text">: {{ $isProduct->size }}</p>
                                        <p class="fs-2 inner-text">: {{ $isProduct->color }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    @if ($isProduct->status == 'active')
                                        <div class="product-quantity mt-0 col">
                                            <form action="{{ route('storecart', $isProduct->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="shop-btn"
                                                    style="display: flex; align-items: center; gap: 10px; z-index:1">
                                                    <span
                                                        style="width: 20rem; align-items: center; justify-content: center;">
                                                        <i class="fas fa-shopping-cart"></i>
                                                        Masukkan Keranjang
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col" style="--bs-gutter-y: 0">
                                            <form action="{{ route('user.checkout.process') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $isProduct->id }}" name="product_id[]">
                                                <button type="submit" class="shop-btn"
                                                    style="display: flex; align-items: center; gap: 10px; z-index:1">
                                                    <span
                                                        style="width: 20rem; align-items: center; justify-content: center;">
                                                        <i class="fas fa-arrow-right"></i>
                                                        Beli Sekarang
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <hr>

                                <hr>
                                <div class="product-seller-section py-2">
                                    <div class="review-wrapper">
                                        <div class="wrapper">
                                            <div class="wrapper-aurthor">
                                                <div class="wrapper-info">
                                                    <div class="author-details d-flex">
                                                        <h5 class="d-flex align-items-center"
                                                            style="font-size: 25px; z-index:1"><img
                                                                style="height: 45px; margin-left: 10px;"
                                                                src="{{ asset('storage/' . $isProduct->userStore->store_logo) }}"
                                                                alt="aurthor-img" class="me-2">
                                                            <div style="margin-left: 10px; z-index:1">
                                                                {{ $isProduct->userStore->name }} <div
                                                                    class="text-secondary"
                                                                    style="font-size: 16px; margin-left: 4px;">
                                                                    {{ $isProduct->userStore->address }}</div>
                                                            </div>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($isProductAuction)
                        <div class="col-md-6">
                            <div class="product-info-content" data-aos="fade-left">
                                <h5 style="z-index:1;position: relative;">{{ $isProductAuction->title }}</h5>
                                <div class="price">
                                    @php
                                        $auction = App\Models\Auctions::where('status', 1)
                                            ->where('product_auction_id', $isProductAuction->id)
                                            ->first();
                                    @endphp
                                    @if ($auction)
                                        <span class="new-price fs-1" style="z-index:1">@currency($isProductAuction->price)</span>
                                    @else
                                        <span class="new-price fs-1" style="z-index:1">@currency($isProductAuction->bid_price_start)
                                            -
                                            @currency($isProductAuction->bid_price_end)</span>
                                    @endif
                                </div>
                                <hr>
                                <div class="row product-details">
                                    <div class="col-3 py-2 my-2" style="z-index:1">
                                        <p class="fs-2">Kategori</p>
                                        <p class="fs-2">Brand</p>
                                        <p class="fs-2">Ukuran</p>
                                        <p class="fs-2">Warna</p>
                                    </div>
                                    <div class="col-9 py-2 my-2" style="z-index:1">
                                        <p class="fs-2 inner-text">:
                                            {{ implode(', ', $isProductAuction->categories->pluck('title')->toArray()) }}
                                        </p>
                                        <p class="fs-2 inner-text">: {{ $isProductAuction->brand->title }}</p>
                                        <p class="fs-2 inner-text">: {{ $isProductAuction->size }}</p>
                                        <p class="fs-2 inner-text">: {{ $isProductAuction->color }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="product-quantity mt-0 justify-content-start"
                                        style="display: flex; align-items: center; gap: 10px; z-index:1">
                                        {{-- <a href="#" style="width :10px" class="shop-btn"
                                            style="display: flex; align-items: center; gap: 10px; z-index:1">
                                            <span style="width: 37rem; align-items:center; justify-content:center;">
                                                <i class="fas fa-shopping-cart"></i>
                                                Masukkan Keranjang
                                            </span>
                                        </a> --}}

                                        @php
                                            $user = Auth::user();
                                            if ($user) {
                                                $existingAuction = App\Models\auctions::where('user_id', Auth::id())
                                                    ->where('product_auction_id', $isProductAuction->id)
                                                    ->first();
                                                $auctions = App\Models\Auctions::where('user_id', $user->id)
                                                    ->where('product_auction_id', $isProductAuction->id)
                                                    ->first();
                                            }
                                            $auctionproduct = App\Models\Auctions::where(
                                                'product_auction_id',
                                                $isProductAuction->id,
                                            )
                                                ->where('status', 1)
                                                ->first();
                                        @endphp

                                        <div style="width: 70%" class="align-items-center">
                                            @if ($user)
                                                @if ($existingAuction && $auctions->status === 1)
                                                    <form action="{{ route('user.checkout.process.auction') }}"
                                                        method="post">
                                                        @csrf
                                                        <div style="bottom:0;">
                                                            <input type="hidden" value="{{ $isProductAuction->id }}"
                                                                name="product_auction_id[]">
                                                            <button type="submit" class="shop-btn w-100"><span
                                                                    style="align-items:center; justify-content:center;">
                                                                    Beli sekarang</span></button>
                                                        </div>
                                                    </form>
                                                @elseif ($auctionproduct)
                                                    <a class="shop-btn flex-grow-0 openAuctionModal w-100"
                                                        data-id="{{ $isProductAuction->id }}"
                                                        style="display: flex; align-items: center; gap: 5px; z-index:1">
                                                        <span style="align-items:center; justify-content:center;">
                                                            Lelang Berakhir
                                                        </span>
                                                    </a>
                                                @else
                                                    <a class="shop-btn flex-grow-0 openAuctionModal"
                                                        data-id="{{ $isProductAuction->id }}"
                                                        style="width: 100%; display: flex; align-items: center; gap: 1rem; z-index:1;">
                                                        <span style="align-items:center; justify-content:center;"><i
                                                                class="fa-solid fa-plus"></i>
                                                            Ikuti Lelang</span>
                                                    </a>
                                                @endif
                                            @else
                                                <a href="{{ url('login') }}"
                                                    class="shop-btn flex-grow-0 openModal w-100"
                                                    style="display: flex; align-items: center; gap: 5px; z-index:1">
                                                    <span style="align-items:center; justify-content:center;">
                                                        <i class="fa-solid fa-plus"></i>
                                                        Ikuti Lelang
                                                    </span>
                                                </a>
                                            @endif
                                        </div>


                                        <div id="reviewModal-{{ $isProductAuction->id }}" class="modal"
                                            style="display: none; z-index:9999999; margin-top:0 !important; padding-top:0 !important;">
                                            <div class="modal-content">
                                                <button class="close"
                                                    style="float: right; text-align: end;">&times;</button>
                                                @if ($user)
                                                    @if ($existingAuction)
                                                        <p style="text-align: center; font-size :20px; font-weight:bold;">
                                                            Anda
                                                            sudah
                                                            mengikuti lelang</p>
                                                        <p style="text-align: center;">bid lelang anda :
                                                            {{ $auctions->auction_price }}</p>
                                                    @elseif ($auctionproduct)
                                                        <p
                                                            style="text-align: center; font-size :20px; font-weight:bold; margin-top: 2rem; margin-bottom:2rem;">
                                                            lelang sudah berakhir</p>
                                                    @else
                                                        <h4 style="text-align: center;">Bid Lelang</h4>
                                                        <form id="auctionForm-{{ $isProductAuction->id }}" method="post"
                                                            action="{{ route('user.auctions.store') }}" class="mt-5">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $isProductAuction->id }}">
                                                            <label for="auction_price" class="form-label"
                                                                style="font-size: 18px;">Bid
                                                                Lelang :</label>
                                                            <br>
                                                            <input type="number" name="auction_price"
                                                                class="form-control @error('auction_price') is-invalid @enderror"
                                                                placeholder="Masukkan Bid Lelang anda"
                                                                style="font-size: 17px;">
                                                            <p
                                                                style="margin-top: 5px;margin-left:6px;font-size:12px;color: #7c7c7c;">
                                                                Bid :
                                                                Rp{{ number_format($isProductAuction->bid_price_start, null, null, '.') }}
                                                                -
                                                                Rp{{ number_format($isProductAuction->bid_price_end, null, null, '.') }}
                                                            </p>
                                                            @error('auction_price')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <button type="submit" class="shop-btn"
                                                                style="margin-left: 22rem;">Kirim
                                                                Bid Anda</button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="product-seller-section py-2">
                                    <div class="review-wrapper">
                                        <div class="wrapper">
                                            <div class="wrapper-aurthor">
                                                <div class="wrapper-info">
                                                    <div class="author-details d-flex">
                                                        <h5 class="d-flex align-items-center" style="font-size: 25px;">
                                                            <img style="height: 45px; margin-left: 10px;"
                                                                src="{{ asset('storage/' . $isProductAuction->userStore->store_logo) }}"
                                                                alt="aurthor-img" class="me-2">
                                                            <div style="margin-left: 10px;">
                                                                {{ $isProductAuction->userStore->name }} <div
                                                                    class="text-secondary"
                                                                    style="font-size: 16px; margin-left: 4px;">
                                                                    {{ $isProductAuction->userStore->address }}</div>
                                                            </div>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <br>
    <div class="container">
        <div class="d-flex align-items-center gap-3 justify-content-star py-3" style="position: relative;">
            <div class="d-flex gap-2">
                <p class="fs-2 mb-0">Bagikan ke:</p>
                <span class="share-container share-buttons d-flex gap-3 ms-2" style="z-index:1;">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank"
                        class="social-buttons">
                        <i class="fa-brands fa-square-facebook fa-lg" style="color: #1c3879"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($text) }}"
                        target="_blank" class="social-buttons">
                        <i class="fa-brands fa-square-x-twitter fa-lg" style="color: #1c3879"></i>
                    </a>
                    <a href="https://t.me/share/url?url={{ urlencode($url) }}&text={{ urlencode($text) }}"
                        target="_blank" class="social-buttons">
                        <i class="fa-brands fa-telegram fa-lg" style="color: #1c3879"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($text . ' ' . $url) }}" target="_blank"
                        class="social-buttons">
                        <i class="fa-brands fa-whatsapp fa-lg" style="color: #1c3879"></i>
                    </a>
                </span>
            </div>
            <div class="line" style="border-left: 1px solid #dcdcdd; height: 30px; margin-left: 10px;"></div>
            <div class="share-icons" style="z-index:1;">
                @if ($isProduct)
                    <form action="{{ route('storesproduct', $isProduct->id) }}" method="POST">
                        @csrf
                        <button class="share-icon">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 24 24">
                                    <path fill="#1c3879"
                                        d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812T2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412t-2.625 2.963T13.45 19.7zm0-2.7q2.4-2.15 3.95-3.687t2.45-2.675t1.25-2.026T20 8.15q0-1.5-1-2.5t-2.5-1q-1.175 0-2.175.662T12.95 7h-1.9q-.375-1.025-1.375-1.687T7.5 4.65q-1.5 0-2.5 1t-1 2.5q0 .875.35 1.763t1.25 2.025t2.45 2.675T12 18.3m0-6.825" />
                                </svg>
                            </span>
                        </button>
                        {{-- @foreach ($isProduct as $item) --}}

                        <span style="margin-left:0.5px; font-size: 15px">Favorit</span>

                        <span style="margin-left:0.5px; font-size: 15px" countFavorite="{!! $countFavoriteProduct !!}">
                            @if ($countFavoriteProduct)
                                ({!! $countFavoriteProduct !!})
                            @endif
                        </span>

                        {{-- @endforeach --}}

                    </form>
                @else
                    <form action="{{ route('storesproduct', $isProductAuction->id) }}" method="POST">
                        @csrf
                        {{-- <button class="share-icon">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                  <path fill="#1c3879"
                    d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812T2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412t-2.625 2.963T13.45 19.7zm0-2.7q2.4-2.15 3.95-3.687t2.45-2.675t1.25-2.026T20 8.15q0-1.5-1-2.5t-2.5-1q-1.175 0-2.175.662T12.95 7h-1.9q-.375-1.025-1.375-1.687T7.5 4.65q-1.5 0-2.5 1t-1 2.5q0 .875.35 1.763t1.25 2.025t2.45 2.675T12 18.3m0-6.825" />
                </svg>
              </span>
            </button>
            <span style="margin-left:0.5px; font-size: 15px">Favorit</span>
            <span style="margin-left:0.5px; font-size: 15px">(3,8RB)</span>
          </form> --}}
                @endif
            </div>
        </div>
    </div>

    <section class="product product-description">
        <div class="container">
            <div class="product-detail-section">
                <nav>
                    <div class="nav nav-tabs nav-item" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">Deskripsi Produk</button>
                        <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review"
                            type="button" role="tab" aria-controls="nav-review"
                            aria-selected="false">Ulasan</button>
                    </div>
                </nav>
                <div class="tab-content tab-item" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                        tabindex="0" data-aos="fade-up">
                        <div class="product-intro-section">
                            <h5 class="intro-heading">Introduction</h5>
                            <p class="product-details">
                                @if ($isProduct)
                                    {{ $isProduct->description }}
                                @elseif ($isProductAuction)
                                    {{ $isProductAuction->description }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab"
                        tabindex="0">
                        <div class="product-review-section" data-aos="fade-up">
                            <h5 class="intro-heading">Reviews</h5>
                            <div class="review-wrapper">
                                @if ($ulasan)
                                    @foreach ($ulasan as $item)
                                        <div class="wrapper">
                                            <div class="wrapper-aurthor">
                                                <div class="wrapper-info">
                                                    <div class="aurthor-img">
                                                        <img src="{{ asset(isset($item->user->avatar) ? "storage/{$item->user->avatar}" : 'template-assets/front/assets/images/homepage-one/aurthor-img-1.webp') }}"
                                                            alt="aurthor-img">
                                                    </div>
                                                    <div class="author-details">
                                                        <h5>{{ $item->user->name }}</h5>
                                                        <p>{{ $item->created_at }}</p>
                                                    </div>
                                                </div>
                                                <div class="ratings">
                                                    <span>
                                                        <svg width="75" height="15" viewBox="0 0 75 15"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                                                                fill="#FFA800" />
                                                            <path
                                                                d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                                                                fill="#FFA800" />
                                                        </svg>
                                                    </span>
                                                    <span>{{ $item->star }}</span>
                                                </div>
                                            </div>

                                            <div class="wrapper-description">
                                                <p class="wrapper-details">{{ $item->comment }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                    <section class="product weekly-sale product-weekly footer-padding">
                        <div class="container">
                            <div class="section-title">
                                <h5>Produk Serupa</h5>
                                <a href="#" class="view">Lihat Semua</a>
                            </div>
                            <div class="weekly-sale-section">
                                <div class="row g-5">
                                    @if ($similarProduct)
                                        @forelse ($similarProduct as $item)
                                            <div class="col-lg-3 col-md-6">
                                                <div class="product-wrapper" data-aos="fade-up">
                                                    <div class="product-img">
                                                        <img src="{{ asset("storage/$item->thumbnail") }}"
                                                            alt="product-img" class="object-fit-cover">
                                                        <div class="product-cart-items">
                                                            <div class="product-cart-items">
                                                                @auth
                                                                    <form action="{{ route('storesproduct', $item->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button class="favourite cart-item">
                                                                            <span>
                                                                                <i class="fas fa-heart"
                                                                                    style="font-size: 18px;"></i>
                                                                            </span>
                                                                        </button>
                                                                    </form>
                                                                    <form action="{{ route('storecart', $item->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button class="favourite cart-item">
                                                                            <span>
                                                                                <i class="fas fa-shopping-cart"
                                                                                    style="font-size: 18px;"></i>
                                                                            </span>
                                                                        </button>
                                                                    </form>
                                                                    <a data-id="{{ $item->id }}"
                                                                        class="compare item-cart openShareModal">
                                                                        <span>
                                                                            <i class="fas fa-share"></i>
                                                                        </span>
                                                                    </a>
                                                                @else
                                                                    <a href="{{ route('login') }}"
                                                                        class="favourite cart-item">
                                                                        <span>
                                                                            <i class="fas fa-heart"></i>
                                                                        </span>
                                                                    </a>
                                                                    <a href="{{ route('login') }}"
                                                                        class="favourite cart-item">
                                                                        <span>
                                                                            <i class="fas fa-shopping-cart"></i>
                                                                        </span>
                                                                    </a>
                                                                    <a href="{{ route('login') }}"
                                                                        class="compaire cart-item">
                                                                        <span>
                                                                            <i class="fas fa-share"></i>
                                                                        </span>
                                                                    </a>
                                                                @endauth
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="product-description">
                                                            {{-- STORE --}}
                                                            <tr class="table-row ticket-row store-header"
                                                                style="border: 1px solid #e6d5d593; background-color: #ffffff; width:100%;">
                                                                <td class="table-wrapper wrapper-product"
                                                                    style="display: flex; align-items: center;">
                                                                    <div class="form-check"
                                                                        style="display: flex; align-items: center; margin-left: 1rem;">
                                                                        <i class="fa-solid fa-store"
                                                                            style="margin-left: -3rem; color: #215791; font-size: 1.75rem;"></i>
                                                                        <a href="{{ route('store.profile', ['store' => $item->userStore->username]) }}"
                                                                            style="font-weight: bold; margin-left: 1rem; font-size: 1.55rem; color: gray;">{{ $item->userStore->name }}</a>
                                                                    </div>
                                                                </td><br>
                                                            </tr>
                                                            <a href="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                                                                class="product-details" style="font-size: 1.85rem">
                                                                {{ $item->title }}
                                                            </a>
                                                            <div class="price">
                                                                <span class="new-price"
                                                                    style="font-size: 1.70rem">Rp{{ number_format($item->price, null, null, '.') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="{{ route('user.checkout.process') }}" method="post">
                                                        @csrf
                                                        <div class="product-cart-btn" style="bottom:0;">
                                                            <input type="hidden" value="{{ $item->id }}"
                                                                name="product_id[]">
                                                            <button type="submit" class="product-btn">Beli
                                                                sekarang</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            {{-- modal share --}}
                                            <div id="shareModal-{{ $item->id }}" class="modal"
                                                style="display: none; z-index:999; margin-top: 0 !important;padding-top:0 !important;">
                                                <div class="modal-content">
                                                    <button class="close" style="float: right; text-align: end;"
                                                        onclick="closeModal2('#shareModal-{{ $item->id }}')">&times;</button>
                                                    <div class="align-items-center gap-3 justify-content-center py-3"
                                                        style="position: relative;">
                                                        <p class="fs-2 mb-0 text-center fw-bold">Bagikan ke:</p>
                                                        <div
                                                            class="d-flex gap-2 align-items-center justify-content-center mt-2">
                                                            <span class="share-container share-buttons d-flex gap-3 ms-2"
                                                                style="z-index:1;">
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                                                                    target="_blank" class="social-buttons">
                                                                    <i class="fa-brands fa-square-facebook"
                                                                        style="color: #1c3879;font-size:4rem"></i>
                                                                </a>
                                                                <a href="https://twitter.com/intent/tweet?url={{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}&text={{ $item->title }}"
                                                                    target="_blank" class="social-buttons">
                                                                    <i class="fa-brands fa-square-x-twitter"
                                                                        style="color: #1c3879;font-size:4rem"></i>
                                                                </a>
                                                                <a href="https://t.me/share/url?url={{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}&text={{ $item->title }}"
                                                                    target="_blank" class="social-buttons">
                                                                    <i class="fa-brands fa-telegram"
                                                                        style="color: #1c3879;font-size:4rem"></i>
                                                                </a>
                                                                <a href="https://api.whatsapp.com/send?text={{ $item->title . ' ' . route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                                                                    target="_blank" class="social-buttons">
                                                                    <i class="fa-brands fa-whatsapp"
                                                                        style="color: #1c3879;font-size:4rem"></i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    @endif
                                    @if ($similarProductAuction)
                                        @forelse ($similarProductAuction as $item)
                                            <div class="col-lg-3 col-md-6">
                                                <div class="product-wrapper" style="height:49rem !important"
                                                    data-aos="fade-up">
                                                    <div class="product-img">
                                                        <img src="{{ asset("storage/$item->thumbnail") }}"
                                                            alt="product-img" class="object-fit-cover">
                                                        <div class="product-cart-items">
                                                            <div class="product-cart-items">
                                                                @auth
                                                                    <a data-id="{{ $item->id }}"
                                                                        class="compare item-cart openShareModal">
                                                                        <span>
                                                                            <i class="fas fa-share"></i>
                                                                        </span>
                                                                    </a>
                                                                @else
                                                                    <a href="{{ route('login') }}"
                                                                        class="compaire cart-item">
                                                                        <span>
                                                                            <i class="fas fa-share"></i>
                                                                        </span>
                                                                    </a>
                                                                @endauth
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="product-description">
                                                            {{-- STORE --}}
                                                            <tr class="table-row ticket-row store-header"
                                                                style="border: 1px solid #e6d5d593; background-color: #ffffff; width:100%;">
                                                                <td class="table-wrapper wrapper-product"
                                                                    style="display: flex; align-items: center;">
                                                                    <div class="form-check"
                                                                        style="display: flex; align-items: center; margin-left: 1rem;">
                                                                        <i class="fa-solid fa-store"
                                                                            style="margin-left: -3rem; color: #215791; font-size: 1.75rem;"></i>
                                                                        <a href="{{ route('store.profile', ['store' => $item->userStore->username]) }}"
                                                                            style="font-weight: bold; margin-left: 1rem; font-size: 1.55rem; color: gray;">{{ $item->userStore->name }}</a>
                                                                    </div>
                                                                </td><br>
                                                            </tr>
                                                            <a href="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                                                                class="product-details" style="font-size: 1.85rem">
                                                                {{ $item->title }}
                                                            </a>
                                                            <div class="price">
                                                                <span class="new-price"
                                                                    style="font-size: 1.70rem">Rp{{ number_format($item->bid_price_start, null, null, '.') }}
                                                                    -
                                                                    Rp{{ number_format($item->bid_price_end, null, null, '.') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php
                                                        $user = Auth::user();
                                                        if ($user) {
                                                            $existingAuction = App\Models\auctions::where(
                                                                'user_id',
                                                                Auth::id(),
                                                            )
                                                                ->where('product_auction_id', $item->id)
                                                                ->first();
                                                            $auctions = App\Models\Auctions::where('user_id', $user->id)
                                                                ->where('product_auction_id', $item->id)
                                                                ->first();
                                                        }
                                                        $auctionproduct = App\Models\Auctions::where(
                                                            'product_auction_id',
                                                            $item->id,
                                                        )
                                                            ->where('status', 1)
                                                            ->first();
                                                    @endphp

                                                    @if ($user)
                                                        @if ($existingAuction && $auctions->status === 1)
                                                            <form action="{{ route('user.checkout.process.auction') }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="product-cart-btn" style="bottom:0;">
                                                                    <input type="hidden" value="{{ $item->id }}"
                                                                        name="product_auction_id[]">
                                                                    <button type="submit" class="product-btn">Beli
                                                                        sekarang</button>
                                                                </div>
                                                            </form>
                                                        @elseif ($auctionproduct)
                                                            <div class="product-cart-btn">
                                                                <a data-id="{{ $item->id }}"
                                                                    class="product-btn openAuctionModal">
                                                                    Lelang Berakhir
                                                                </a>
                                                            </div>
                                                        @else
                                                            <div class="product-cart-btn">
                                                                <a data-id="{{ $item->id }}"
                                                                    class="product-btn openAuctionModal">
                                                                    Ikuti Lelang
                                                                </a>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="product-cart-btn">
                                                            <a href="{{ url('login') }}" class="product-btn">Ikuti
                                                                Lelang</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- SHARE MODAL --}}
                                            <div id="shareModal-{{ $item->id }}" class="modal"
                                                style="display: none; z-index:999;margin-top: 0 !important;padding-top:0 !important;">
                                                <div class="modal-content">
                                                    <button class="close" style="float: right; text-align: end;"
                                                        onclick="closeModal2('#shareModal-{{ $item->id }}')">&times;</button>
                                                    <div class="align-items-center gap-3 justify-content-center py-3"
                                                        style="position: relative;">
                                                        <p class="fs-2 mb-0 text-center fw-bold">Bagikan ke:</p>
                                                        <div
                                                            class="d-flex gap-2 align-items-center justify-content-center mt-2">
                                                            <span class="share-container share-buttons d-flex gap-3 ms-2"
                                                                style="z-index:1;">
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                                                                    target="_blank" class="social-buttons">
                                                                    <i class="fa-brands fa-square-facebook"
                                                                        style="color: #1c3879;font-size:4rem"></i>
                                                                </a>
                                                                <a href="https://twitter.com/intent/tweet?url={{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}&text={{ $item->title }}"
                                                                    target="_blank" class="social-buttons">
                                                                    <i class="fa-brands fa-square-x-twitter"
                                                                        style="color: #1c3879;font-size:4rem"></i>
                                                                </a>
                                                                <a href="https://t.me/share/url?url={{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}&text={{ $item->title }}"
                                                                    target="_blank" class="social-buttons">
                                                                    <i class="fa-brands fa-telegram"
                                                                        style="color: #1c3879;font-size:4rem"></i>
                                                                </a>
                                                                <a href="https://api.whatsapp.com/send?text={{ $item->title . ' ' . route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                                                                    target="_blank" class="social-buttons">
                                                                    <i class="fa-brands fa-whatsapp"
                                                                        style="color: #1c3879;font-size:4rem"></i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end share modal --}}
                                            {{-- lelang modal --}}
                                            <div id="reviewModal-{{ $item->id }}" class="modal"
                                                style="display: none;margin-top: 0 !important;padding-top:0 !important;">
                                                <div class="modal-content">
                                                    <button class="close" style="float: right; text-align: end;"
                                                        onclick="closeModal2('#reviewModal-{{ $item->id }}')">&times;</button>
                                                    @if ($user)
                                                        @if ($existingAuction)
                                                            <p
                                                                style="text-align: center; font-size :20px; font-weight:bold; margin-top:2rem;">
                                                                Anda
                                                                sudah
                                                                mengikuti lelang</p>
                                                            <p style="text-align: center; margin-bottom:2rem;">bid lelang
                                                                anda :
                                                                {{ $auctions->auction_price }}</p>
                                                        @elseif ($auctionproduct)
                                                            <p
                                                                style="text-align: center; font-size :20px; font-weight:bold; margin-top: 2rem; margin-bottom:2rem;">
                                                                lelang sudah berakhir</p>
                                                        @else
                                                            <h4 style="text-align: center;">Bid Lelang</h4>
                                                            <form id="auctionForm-{{ $item->id }}" method="post"
                                                                action="{{ route('user.auctions.store') }}"
                                                                class="mt-5">
                                                                @csrf
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $item->id }}">
                                                                <label for="auction_price" class="form-label"
                                                                    style="font-size: 18px;">Bid Lelang
                                                                    :</label> <br>
                                                                <input type="number" name="auction_price"
                                                                    class="form-control @error('auction_price') is-invalid @enderror"
                                                                    placeholder="Masukkan Bid Lelang anda"
                                                                    style="font-size: 17px;">
                                                                <p
                                                                    style="margin-top: 5px;margin-left:6px;font-size:12px;color: #7c7c7c;">
                                                                    Bid :
                                                                    Rp{{ number_format($item->bid_price_start, null, null, '.') }}
                                                                    -
                                                                    Rp{{ number_format($item->bid_price_end, null, null, '.') }}
                                                                </p>
                                                                @error('auction_price')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                <button type="submit" class="shop-btn"
                                                                    style="margin-left: 22rem;">Kirim Bid
                                                                    Anda</button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- end lelang modal --}}
                                        @empty
                                        @endforelse
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
            </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('additional-assets/jquery-3.7.1/jquery.min.js') }}"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    <script>
        function onUpdateWishlist() {
            $('[countFavorite]').text(`(${parseInt($('[countFavorite]').attr('countFavorite'))+1})`)
        }
    </script>
    <script>
        function openModal(modal) {
            $(modal).show();
        }

        function closeModal(modal) {
            $(modal).hide();
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.openAuctionModal').forEach(function(btn) {
                btn.onclick = function() {
                    var productId = btn.getAttribute('data-id');
                    var modal = document.getElementById('reviewModal-' + productId);
                    modal.style.display = 'flex';
                }
            });

            document.querySelectorAll('.openShareModal').forEach(function(btn) {
                btn.onclick = function() {
                    var productId = btn.getAttribute('data-id');
                    var modal = document.getElementById('shareModal-' + productId);
                    modal.style.display = 'flex';
                }
            });

            document.querySelectorAll('.close').forEach(function(span) {
                span.onclick = function() {
                    var modal = span.closest('.modal');
                    modal.style.display = 'none';
                }
            });

            window.onclick = function(event) {
                document.querySelectorAll('.modal').forEach(function(modal) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                    }
                });
            }
        });
    </script>
@endpush
