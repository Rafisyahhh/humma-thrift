@extends('layouts.home')

@section('title', 'Beranda')

@push('style')
    <style>
        .hero#hero {
            z-index: 10;
        }

        .shape-decoration-wrapper {
            position: absolute;
            z-index: -1;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            margin-top: 70rem;
        }

        .shape-decoration-wrapper .svg-container {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
        }

        .shape-decoration-wrapper .svg-container:first-child {
            top: 0;
            left: 0;
            z-index: 1;
            margin-top: -32rem;
        }

        .shape-decoration-wrapper .svg-container:nth-child(7) {
            top: 0;
            left: 0;
            margin-top: -7.5rem;
            margin-left: 5rem;
            height: 50rem;
            width: 50rem;
            z-index: 2;
        }

        .shape-decoration-wrapper .svg-container:nth-child(8) {
            top: 0;
            right: 0;
            left: unset;
            margin-top: 5rem;
            margin-right: 36rem;
            height: 25rem;
            width: 25rem;
            z-index: 2;
        }

        .shape-decoration-wrapper .svg-container:nth-child(9) {
            top: 0;
            right: 0;
            left: unset;
            margin-top: 12rem;
            margin-right: 36rem;
            height: 40rem;
            width: 40rem;
            z-index: 2;
        }

        .shape-decoration-wrapper .svg-container:nth-child(6) {
            top: 40rem;
            right: 0;
            left: 0;
            margin-top: 0;
            margin-right: 36rem;
            height: unset;
            width: 100%;
            z-index: 2;
        }

        .shape-decoration-wrapper .svg-container:nth-child(5) {
            top: 90rem;
            right: 0;
            left: 0;
            margin-top: 0;
            margin-right: 36rem;
            height: unset;
            width: 100%;
            z-index: 2;
        }

        @media screen and (max-width: 1600px) and (min-width: 1200px) {
            .shape-decoration-wrapper .svg-container:nth-child(5) {
                top: 75rem;
            }
        }

        .shape-decoration-wrapper .svg-container:nth-child(4) {
            bottom: 0;
            left: -5rem;
            top: unset;
            height: 50rem;
            z-index: 3;
            width: 50rem;
        }

        .shape-decoration-wrapper .svg-container:nth-child(3) {
            bottom: -125rem;
            left: 36rem;
            z-index: 2;
            top: unset;
            height: 50rem;
            width: 50rem;
        }

        .shape-decoration-wrapper .svg-container:nth-child(2) {
            bottom: -50rem;
            right: 69rem;
            top: unset;
            height: 25rem;
            width: 25rem;
            z-index: 7;
            left: unset;
        }

        .shape-decoration-wrapper .svg-container:nth-child(10) {
            bottom: -150rem;
            left: -40rem;
            z-index: 2;
            top: unset;
            height: 125rem;
            width: 125rem;
        }

        .shape-decoration-wrapper .svg-container:nth-child(11) {
            bottom: -65rem;
            right: 36rem;
            z-index: 2;
            top: unset;
            height: 50rem;
            width: 50rem;
            left: unset;
        }

        @media screen and (max-width: 1600px) and (min-width: 1200px) {
            .shape-decoration-wrapper .svg-container:nth-child(7) {
                margin-top: -5rem;
                margin-left: -7.5rem;
            }

            .shape-decoration-wrapper .svg-container:nth-child(8) {
                margin-right: 20rem;
            }

            .shape-decoration-wrapper .svg-container:nth-child(9) {
                margin-top: 10rem;
                margin-right: 24rem;
                height: 40rem;
            }
        }

        @media screen and (max-width: 1600px) and (min-width: 1200px) {
            .shape-decoration-wrapper .svg-container:nth-child(11) {
                bottom: -50rem;
            }

            .shape-decoration-wrapper .svg-container:nth-child(2) {
                bottom: -30rem;
            }
        }

        .product-category {
            margin-top: 5rem;
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
    </style>
@endpush

@section('content')
    <section id="hero" class="hero" style="position: relative;">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper hero-wrapper">
                @foreach ($event as $key => $even)
                    <div id="slide{{ $key }}" class="swiper-slide hero-slider-one "
                        style="background-image: url('{{ asset("storage/{$even->foto}") }}');">
                        <div class="hero-slider-one" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                        </div>
                        <div class="container custom-margin-bottom">
                            <div class="row custom-margin-bottom">
                                <div class="col-lg-2">
                                    <div class="position-absolute" data-aos="fade-up">
                                        <div class="wrapper-section">
                                            <h5 class="wrapper-details" style="color:white;">
                                                {{ $even->subjudul }}
                                            </h5>
                                            <h1 class="wrapper-details" style="color:white;">{{ $even->judul }}</h1>
                                            <a href="product-sidebar.html" class="shop-btn mt-3">Belanja Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <div class="content-wrapper">
        <div class="shape-decoration-wrapper">
            <div class="svg-container">
                <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 490" xmlns="http://www.w3.org/2000/svg"
                    class="transition duration-300 ease-in-out delay-150">
                    <path
                        d="M 0,500 L 0,187 C 118.1531100478469,175.94736842105263 236.3062200956938,164.89473684210526 333,184 C 429.6937799043062,203.10526315789474 504.92822966507185,252.3684210526316 592,227 C 679.0717703349281,201.6315789473684 777.980861244019,101.63157894736841 862,107 C 946.019138755981,112.36842105263159 1015.1483253588517,223.10526315789474 1109,254 C 1202.8516746411483,284.89473684210526 1321.4258373205741,235.94736842105263 1440,187 L 1440,500 L 0,500 Z"
                        stroke="none" stroke-width="0" fill="#BACAFF" fill-opacity="1"
                        class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 250)">
                    </path>
                </svg>
            </div>
            <div class="svg-container">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#798ED4"
                        d="M26.3,3.3C26.3,26.1,13.2,52.1,-7.9,52.1C-29,52.1,-58,26.1,-58,3.3C-58,-19.4,-29,-38.7,-7.9,-38.7C13.2,-38.7,26.3,-19.4,26.3,3.3Z"
                        transform="translate(100 100)" />
                </svg>
            </div>
            <div class="svg-container">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#798ED4"
                        d="M26.3,3.3C26.3,26.1,13.2,52.1,-7.9,52.1C-29,52.1,-58,26.1,-58,3.3C-58,-19.4,-29,-38.7,-7.9,-38.7C13.2,-38.7,26.3,-19.4,26.3,3.3Z"
                        transform="translate(100 100)" />
                </svg>
            </div>
            <div class="svg-container">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#798ED4"
                        d="M26.3,3.3C26.3,26.1,13.2,52.1,-7.9,52.1C-29,52.1,-58,26.1,-58,3.3C-58,-19.4,-29,-38.7,-7.9,-38.7C13.2,-38.7,26.3,-19.4,26.3,3.3Z"
                        transform="translate(100 100)" />
                </svg>
            </div>
            <div class="svg-container">
                <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 490" xmlns="http://www.w3.org/2000/svg"
                    class="transition duration-300 ease-in-out delay-150">
                    <path
                        d="M 0,500 L 0,187 C 138.42857142857142,144.375 276.85714285714283,101.75 394,121 C 511.14285714285717,140.25 606.9999999999999,221.375 713,285 C 819.0000000000001,348.625 935.1428571428573,394.75 1058,413 C 1180.8571428571427,431.25 1310.4285714285713,421.625 1440,412 L 1440,500 L 0,500 Z"
                        stroke="none" stroke-width="0" fill="#BACAFF" fill-opacity="1"
                        class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 250)">
                    </path>
                </svg>
            </div>
            <div class="svg-container">
                <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 390" xmlns="http://www.w3.org/2000/svg"
                    class="transition duration-300 ease-in-out delay-150">
                    <path
                        d="M 0,400 L 0,225 C 107.28571428571428,266.9821428571429 214.57142857142856,308.9642857142857 323,280 C 431.42857142857144,251.03571428571428 540.9999999999999,151.125 669,124 C 797.0000000000001,96.87499999999999 943.4285714285713,142.53571428571428 1075,134 C 1206.5714285714287,125.46428571428572 1323.2857142857142,62.73214285714286 1440,0 L 1440,400 L 0,400 Z"
                        stroke="none" stroke-width="0" fill="#BACAFF" fill-opacity="1"
                        class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
                </svg>
            </div>
            <div class="svg-container">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#798ED4"
                        d="M26.3,3.3C26.3,26.1,13.2,52.1,-7.9,52.1C-29,52.1,-58,26.1,-58,3.3C-58,-19.4,-29,-38.7,-7.9,-38.7C13.2,-38.7,26.3,-19.4,26.3,3.3Z"
                        transform="translate(100 100)" />
                </svg>
            </div>
            <div class="svg-container">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#798ED4"
                        d="M26.3,3.3C26.3,26.1,13.2,52.1,-7.9,52.1C-29,52.1,-58,26.1,-58,3.3C-58,-19.4,-29,-38.7,-7.9,-38.7C13.2,-38.7,26.3,-19.4,26.3,3.3Z"
                        transform="translate(100 100)" />
                </svg>
            </div>
            <div class="svg-container">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#798ED4"
                        d="M26.3,3.3C26.3,26.1,13.2,52.1,-7.9,52.1C-29,52.1,-58,26.1,-58,3.3C-58,-19.4,-29,-38.7,-7.9,-38.7C13.2,-38.7,26.3,-19.4,26.3,3.3Z"
                        transform="translate(100 100)" />
                </svg>
            </div>
            <div class="svg-container">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#798ED4"
                        d="M26.3,3.3C26.3,26.1,13.2,52.1,-7.9,52.1C-29,52.1,-58,26.1,-58,3.3C-58,-19.4,-29,-38.7,-7.9,-38.7C13.2,-38.7,26.3,-19.4,26.3,3.3Z"
                        transform="translate(100 100)" />
                </svg>
            </div>
            <div class="svg-container">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#798ED4"
                        d="M26.3,3.3C26.3,26.1,13.2,52.1,-7.9,52.1C-29,52.1,-58,26.1,-58,3.3C-58,-19.4,-29,-38.7,-7.9,-38.7C13.2,-38.7,26.3,-19.4,26.3,3.3Z"
                        transform="translate(100 100)" />
                </svg>
            </div>
        </div>

        <section class="product-category mt-5" style="z-index: 100;position: relative;">
            <div class="container">
                <div class="section-title">
                    <h5>KATEGORI PAKAIAN</h5>
                    <a href="product-sidebar.html" class="view">Lihat Semua</a>
                </div>
                <div class="category-section">
                    @foreach ($categories as $kategori)
                        <div class="product-wrapper p-0" data-aos="fade-right" data-aos-duration="100">
                            <div class="wrapper-img p-0">
                                <img src="{{ asset("storage/{$kategori->icon}") }}"
                                    style="width:125px;hieght:125px;border-radius:20px;" class="h-100">
                            </div>
                            <div class="wrapper-info">
                                <a href="" class="wrapper-details">{{ $kategori->title }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="product arrival mt-5" style="z-index: 100;position: relative;">
            <div class="container">
                <div class="section-title">
                    <h5>TERBARU!</h5>
                    <a href="{{ url('/product/regular') }}" class="view">Lihat Semua</a>
                </div>
                <div class="arrival-section">
                    <swiper-container slides-per-view="4" loop="true" navigation="true" space-between="30"
                        autoplay-delay="10000" autoplay-disable-on-interaction="false">
                        @foreach ($product as $item)
                            <swiper-slide id="cardButton"
                                data-route="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <img src="{{ asset("storage/$item->thumbnail") }}" alt="product-img"
                                            class="object-fit-cover">
                                        <div class="product-cart-items">
                                            <div class="product-cart-items">
                                                @auth
                                                    <form action="{{ route('storesproduct', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button class="favourite cart-item">
                                                            <span>
                                                                <i class="fas fa-heart" style="font-size: 18px;"></i>
                                                            </span>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('storecart', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button class="favourite cart-item">
                                                            <span>
                                                                <i class="fas fa-shopping-cart" style="font-size: 18px;"></i>
                                                            </span>
                                                        </button>
                                                    </form>
                                                    <a href="#" class="compaire cart-item">
                                                        <span>
                                                            <i class="fas fa-share" style="font-size: 19px;"></i>
                                                        </span>
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}" class="favourite cart-item">
                                                        <span>
                                                            <i class="fas fa-heart"></i>
                                                        </span>
                                                    </a>
                                                    <a href="{{ route('login') }}" class="favourite cart-item">
                                                        <span>
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </span>
                                                    </a>
                                                    <a href="{{ route('login') }}" class="compaire cart-item">
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
                                            <a href="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                                                class="product-details" style="font-size: 2rem"> {{ $item->title }}
                                            </a>
                                            <div class="price">
                                                <span
                                                    class="new-price" style="font-size: 1.8rem">Rp{{ number_format($item->price, null, null, '.') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-cart-btn">
                                        <a href="/user/checkout" class="product-btn">Beli Sekarang</a>
                                    </div>
                                </div>
                            </swiper-slide>
                        @endforeach
                    </swiper-container>
                </div>
            </div>
        </section>

        <section class="product flash-sale mt-5">
            <div class="container">
                <div class="section-title" style="position: relative; z-index: 1;">
                    <h5>SESI LELANG</h5>
                    <a href="{{ url('/product/auction') }}" class="view">Lihat Semua</a>
                </div>
                <div class="flash-sale-section" style="position: relative; z-index: 1;">
                    <swiper-container slides-per-view="4" loop="true" navigation="true" space-between="30"
                        autoplay-delay="10000" autoplay-disable-on-interaction="false">
                        @foreach ($product_auction as $item)
                            <swiper-slide id="cardButton"
                                data-route="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}">
                                <div class="product-wrapper" style="z-index: 1;" data-aos="fade-right"
                                    data-aos-duration="100">
                                    <div class="product-img">
                                        <img src="{{ asset("storage/$item->thumbnail") }}" alt="product-img"
                                            class="object-fit-cover">
                                        <div class="product-cart-items">
                                            <div class="product-cart-items">
                                                @auth
                                                    <form action="{{ route('storesproductAuction', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button class="favourite cart-item">
                                                            <span>
                                                                <i class="fas fa-heart" style="font-size: 18px;"></i>
                                                            </span>
                                                        </button>
                                                    </form>
                                                    {{-- <form action="{{ route('storecart', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button class="favourite cart-item">
                                                            <span>
                                                                <i class="fas fa-shopping-cart" style="font-size: 18px;"></i>
                                                            </span>
                                                        </button>
                                                    </form> --}}
                                                    <a href="#" class="compaire cart-item">
                                                        <span>
                                                            <i class="fas fa-share" style="font-size: 19px;"></i>
                                                        </span>
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}" class="favourite cart-item">
                                                        <span>
                                                            <i class="fas fa-heart"></i>
                                                        </span>
                                                    </a>
                                                    <a href="{{ route('login') }}" class="favourite cart-item">
                                                        <span>
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </span>
                                                    </a>
                                                    <a href="{{ route('login') }}" class="compaire cart-item">
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
                                            <a href="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                                                class="product-details" style="font-size: 2rem">{{ $item->title }}
                                            </a>
                                            <div class="price">
                                                <span
                                                    class="new-price" style="font-size: 1.8rem">Rp{{ number_format($item->bid_price_start, null, null, '.') }}
                                                    - Rp{{ number_format($item->bid_price_end, null, null, '.') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                    $user = Auth::user();
                                    if ($user) {
                                        $existingAuction = App\Models\auctions::where('user_id', Auth::id())
                                        ->where('product_auction_id', $item->id)
                                        ->first();
                                        $auctions = App\Models\Auctions::where('user_id', $user->id)->where('product_auction_id', $item->id)->first();
                                    }
                                    $auctionproduct = App\Models\Auctions::where('product_auction_id', $item->id)->where('status', 1)->first();

                                        @endphp


                                    @if ($user)
                                        @if ($existingAuction && $auctions->status === 1)
                                        <form action="{{ route('user.checkout') }}" method="post">
                                            @csrf
                                            <div class="product-cart-btn" style="bottom:0;">
                                                <input type="hidden" value="{{ $item->id }}" name="product_id">
                                                <button type="submit" class="product-btn">Beli sekarang</button>
                                            </div>
                                        </form>
                                        @elseif ($auctionproduct)
                                        <div class="product-cart-btn">
                                            <a data-id="{{ $item->id }}" class="product-btn openModal">Lelang Berakhir</a>
                                        </div>
                                        @else
                                        <div class="product-cart-btn">
                                            <a data-id="{{ $item->id }}" class="product-btn openModal">Ikuti Lelang</a>
                                        </div>
                                        @endif
                                    @else
                                    <div class="product-cart-btn">
                                        <a href="{{ url('login') }}" class="product-btn">Ikuti Lelang</a>
                                    </div>
                                    @endif
                                </div>
                            </swiper-slide>
                            <div id="reviewModal-{{ $item->id }}" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <button class="close"
                                        style="float: right; text-align: end;">&times;</button>
                                    @if ($user)
                                    @if ($existingAuction)
                                        <p style="text-align: center; font-size :20px; font-weight:bold;">Anda sudah mengikuti lelang</p>
                                        <p style="text-align: center;">bid lelang anda : {{ $auctions->auction_price }}</p>
                                    @elseif ($auctionproduct)
                                        <p style="text-align: center; font-size :20px; font-weight:bold; margin-top: 2rem; margin-bottom:2rem;">lelang sudah berakhir</p>
                                    @else
                                        <h4 style="text-align: center;">Bid Lelang</h4>
                                        <form id="auctionForm-{{ $item->id }}" method="post"
                                            action="{{ route('user.auctions.store') }}" class="mt-5">
                                            @csrf
                                            <input type="hidden" name="product_id"
                                                value="{{ $item->id }}">
                                            <label for="auction_price" class="form-label"
                                                style="font-size: 18px;">Bid Lelang :</label> <br>
                                            <input type="number" name="auction_price"
                                                class="form-control @error('auction_price') is-invalid @enderror"
                                                placeholder="Masukkan Bid Lelang anda"
                                                style="font-size: 17px;">
                                            <p style="margin-top: 5px;margin-left:6px;font-size:12px;color: #7c7c7c;">
                                                Bid : Rp{{ number_format($item->bid_price_start, null, null, '.') }}
                                                -
                                                Rp{{ number_format($item->bid_price_end, null, null, '.') }}</p>
                                            @error('auction_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <button type="submit" class="shop-btn"
                                                style="margin-left: 22rem;">Kirim Bid Anda</button>
                                        </form>
                                    @endif
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </swiper-container>
                </div>
            </div>
        </section>


        <section class="product brand" style="position: relative; z-index: 100;" data-aos="fade-up">
            <div class="container" style="z-index: 101;">
                <div class="section-title pt-5" style="position: relative; z-index: 102;">
                    <h5>BRAND PRODUK</h5>
                    <a href="/brand" class="view">Lihat Semua</a>
                </div>
                <swiper-container slides-per-view="6" loop="true" navigation="false" space-between="30"
                    autoplay-delay="1000" autoplay-disable-on-interaction="false">
                    @foreach ($brands as $brand)
                        <swiper-slide class="product p-0"
                            style="box-shadow: rgb(18 106 195 / 20%) 0 8px 24px;border-radius: 20px;">
                            <div class="wrapper-img p-0">
                                {{-- <a href="product-sidebar.html"> --}}
                                    <img src="{{ asset("storage/{$brand->logo}") }}" alt="img" class="w-100 h-100"
                                        style="border-radius: 20px;">
                                {{-- </a> --}}
                            </div>
                        </swiper-slide>
                    @endforeach
                </swiper-container>
            </div>
        </section>
    </div>
@endsection

@push('script')
    <script src="{{ asset('additional-assets/swiper-11/swiper-element.min.js') }}"></script>
@endpush

@push('js')
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
    <script>
        $("[data-route]").click(function({
            target: {
                tagName
            }
        }) {
            if (!["A", "I"].includes(tagName)) window.location.href = $(this).data("route");
        });
    </script>
@endpush
