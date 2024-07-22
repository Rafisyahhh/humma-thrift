@extends('layouts.home')

@section('title', 'Beranda')

@push('style')
    <style>
        .hero#hero {
            z-index: 10;
        }

        .content-wrapper {
            position: relative;
        }

        .shape-wrapper {
            overflow: hidden;
        }

        .shape-wrapper .svg-container {
            width: 100%;
            position: absolute;
            margin-top: -10rem;
            z-index: 3;
        }

        .shape-wrapper .circle-shape {
            position: absolute;
            z-index: 2;
            width: 50rem;
            height: 50rem;
            margin-top: 10rem;
            border-radius: 50%;
        }

        .shape-wrapper .circle-shape:nth-child(2) {
            top: 0;
            left: 0;
            margin-left: -25rem;
            background: #1c3879;
        }

        .shape-wrapper .circle-shape:nth-child(3) {
            top: 0;
            right: 0;
            margin-left: 0;
            width: 32rem;
            height: 32rem;
            margin-top: 15rem;
            background: #1c3879;
            margin-right: -15rem;
            z-index: 3;
        }

        .product-category {
            background: #bacaff;
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        .product-category h5,
        .product-category a.view,
        .product.arrival h5,
        .product.arrival a.view {
            color: white;
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

        .custom-shape-divider-bottom-1720696250 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .custom-shape-divider-bottom-1720696250 svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 58px;
        }

        .custom-shape-divider-bottom-1720696250 .shape-fill {
            fill: #1C3879;
        }

        .custom-shape-divider-bottom-1720697255 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .custom-shape-divider-bottom-1720697255 svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 58px;
        }

        .custom-shape-divider-bottom-1720697255 .shape-fill {
            fill: #EEEEEE;
        }

        .grid {
            justify-content: center;
        }

        .grid:after {
            content: '';
            display: block;
            clear: both;
        }

        .grid-sizer,
        .grid-item {
            width: 14.285714285714286%;
        }

        .grid-item {
            flex-shrink: 0;
            aspect-ratio: 1 / 1;
            float: left;
            border: 2px solid #ffffff;
            /* margin: 0 5px 5px; */
            background-color: #ffffff73;
            margin: 0 5px 10px;
            /* Tambahkan margin jika perlu */

        }

        .grid-item img {
            border-radius: 5px;
            display: block;
            width: 100%;
            max-width: 100%;
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
                                    <div class="position-absolute" data-aos="fade-up" style="top:35%;">
                                        <div class="wrapper-section">
                                            <h5 class="wrapper-details" style="color:#1c3879;">
                                                {{ $even->subjudul }}
                                            </h5>
                                            <h1 class="wrapper-details" style="color:#1c3879;">{{ $even->judul }}</h1>
                                            <a href="product-sidebar.html" class="shop-btn mt-3"
                                                style="color: #1c3879;">Belanja Sekarang</a>
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

    <section class="product-category" style="z-index: 100;position: relative;">
        <div class="container">
            <div class="section-title">
                <h5 style="color: #1c3879;">KATEGORI PAKAIAN</h5>
                <a href="product-sidebar.html" class="view" style="color: #1c3879;">Lihat Semua</a>
            </div>
            <ul class="nav nav-underline mb-3" style="display:flex; justify-content: center;">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="lelang-tab" data-bs-toggle="tab" data-bs-target="#lelang-tab-pane"
                        type="button" role="tab" aria-controls="lelang-tab-pane" aria-selected="false">Atasan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ulasan-tab" data-bs-toggle="tab" data-bs-target="#ulasan-tab-pane"
                        type="button" role="tab" aria-controls="ulasan-tab-pane" aria-selected="false">Bawahan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ulasan-tab" data-bs-toggle="tab" data-bs-target="#ulasan-tab-pane"
                        type="button" role="tab" aria-controls="ulasan-tab-pane" aria-selected="false">Longdress</a>
                </li>
            </ul>
            {{-- <div class="category-section">
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
            </div> --}}

            <div class="grid mt-4 ">
                <div class="grid-sizer"></div>
                @foreach ($categories as $kategori)
                    <div class="grid-item">
                        <img src="{{ asset("storage/{$kategori->icon}") }}"
                            style="width:125px;hieght:125px;border-radius:20px;" class="h-100 w-100">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="content-wrapper">
        <div class="shape-wrapper">
            <div class="svg-container">
                <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 490" xmlns="http://www.w3.org/2000/svg"
                    class="transition duration-300 ease-in-out delay-150">
                    <path
                        d="M 0,500 L 0,187 C 118.1531100478469,175.94736842105263 236.3062200956938,164.89473684210526 333,184 C 429.6937799043062,203.10526315789474 504.92822966507185,252.3684210526316 592,227 C 679.0717703349281,201.6315789473684 777.980861244019,101.63157894736841 862,107 C 946.019138755981,112.36842105263159 1015.1483253588517,223.10526315789474 1109,254 C 1202.8516746411483,284.89473684210526 1321.4258373205741,235.94736842105263 1440,187 L 1440,500 L 0,500 Z"
                        stroke="none" stroke-width="0" fill="#bacaff" fill-opacity="1"
                        class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 250)">
                    </path>
                </svg>
            </div>

            <div class="circle-shape"></div>
            <div class="circle-shape"></div>
        </div>

        <section class="product arrival mt-5" style="z-index: 100;position: relative;">
            <div class="container">
                <div class="section-title">
                    <h5 style="color: #1c3879;">TERBARU!</h5>
                    <a href="{{ url('/product/regular') }}" class="view" style="color: #1c3879;">Lihat Semua</a>
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
                                                class="product-details" style="font-size: 1.85rem"> {{ $item->title }}
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
                                            <input type="hidden" value="{{ $item->id }}" name="product_id[]">
                                            <button type="submit" class="product-btn">Beli sekarang</button>
                                        </div>
                                    </form>
                                </div>
                            </swiper-slide>
                        @endforeach
                    </swiper-container>
                </div>
            </div>
        </section>

        <section class="product flash-sale mt-5">
            <div class="container pb-5 mb-5">
                <div class="section-title" style="position: relative; z-index: 11;">
                    <h5>SESI LELANG</h5>
                    <a href="{{ url('/product/auction') }}" class="view">Lihat Semua</a>
                </div>
                <div class="flash-sale-section" style="position: relative; z-index: 11;">
                    <swiper-container slides-per-view="4" loop="true" navigation="true" space-between="30"
                        autoplay-delay="10000" autoplay-disable-on-interaction="false">
                        @foreach ($product_auction as $item)
                            <swiper-slide id="cardButton"
                                data-route="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}">
                                <div class="product-wrapper" style="z-index: 11;" data-aos="fade-right"
                                    data-aos-duration="100">
                                    <div class="product-img">
                                        <img src="{{ asset("storage/$item->thumbnail") }}" alt="product-img"
                                            class="object-fit-cover">
                                        <div class="product-cart-items">
                                            <div class="product-cart-items">
                                                @auth
                                                    {{-- <form action="{{ route('storesproductAuction', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="favourite cart-item">
                                                            <span>
                                                                <i class="fas fa-heart" style="font-size: 18px;"></i>
                                                            </span>
                                                        </button>
                                                    </form> --}}
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
                                                    {{-- <a href="{{ route('login') }}" class="favourite cart-item">
                                                        <span>
                                                            <i class="fas fa-heart"></i>
                                                        </span>
                                                    </a> --}}
                                                    {{-- <a href="{{ route('login') }}" class="favourite cart-item">
                                                        <span>
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </span>
                                                    </a> --}}
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
                                                <a href="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                                                    class="product-details" style="font-size: 1.85rem">{{ $item->title }}
                                                </a>
                                                <div class="price">
                                                    <span class="new-price"
                                                        style="font-size: 1.70rem">Rp{{ number_format($item->bid_price_start, null, null, '.') }}
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
                                            $auctions = App\Models\Auctions::where('user_id', $user->id)
                                                ->where('product_auction_id', $item->id)
                                                ->first();
                                        }
                                        $auctionproduct = App\Models\Auctions::where('product_auction_id', $item->id)
                                            ->where('status', 1)
                                            ->first();
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
                                                <a data-id="{{ $item->id }}" class="product-btn openModal">Lelang
                                                    Berakhir</a>
                                            </div>
                                        @else
                                            <div class="product-cart-btn">
                                                <a data-id="{{ $item->id }}" class="product-btn openModal">Ikuti
                                                    Lelang</a>
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
                                    <button class="close" style="float: right; text-align: end;">&times;</button>
                                    @if ($user)
                                        @if ($existingAuction)
                                            <p style="text-align: center; font-size :20px; font-weight:bold;">Anda sudah
                                                mengikuti lelang</p>
                                            <p style="text-align: center;">bid lelang anda :
                                                {{ $auctions->auction_price }}</p>
                                        @elseif ($auctionproduct)
                                            <p
                                                style="text-align: center; font-size :20px; font-weight:bold; margin-top: 2rem; margin-bottom:2rem;">
                                                lelang sudah berakhir</p>
                                        @else
                                            <h4 style="text-align: center;">Bid Lelang</h4>
                                            <form id="auctionForm-{{ $item->id }}" method="post"
                                                action="{{ route('user.auctions.store') }}" class="mt-5">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                <label for="auction_price" class="form-label"
                                                    style="font-size: 18px;">Bid Lelang :</label>
                                                <br>
                                                <input type="number" name="auction_price"
                                                    class="form-control @error('auction_price') is-invalid @enderror"
                                                    placeholder="Masukkan Bid Lelang anda" style="font-size: 17px;">
                                                <p style="margin-top: 5px;margin-left:6px;font-size:12px;color: #7c7c7c;">
                                                    Bid : Rp{{ number_format($item->bid_price_start, null, null, '.') }}
                                                    -
                                                    Rp{{ number_format($item->bid_price_end, null, null, '.') }}</p>
                                                @error('auction_price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <button type="submit" class="shop-btn" style="margin-left: 22rem;">Kirim
                                                    Bid Anda</button>
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
        <div class="custom-shape-divider-bottom-1720697255">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                    opacity=".25" class="shape-fill"></path>
                <path
                    d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                    opacity=".5" class="shape-fill"></path>
                <path
                    d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </div>

    <section class="product brand" style="position: relative; z-index: 100;background: #eee;">
        <div class="container pb-5 mb-5" style="z-index: 101;">
            <div class="section-title pt-5" style="position: relative; z-index: 102;">
                <h5>BRAND PRODUK</h5>
                <a href="/brand" class="view">Lihat Semua</a>
            </div>
            <swiper-container slides-per-view="6" loop="true" navigation="false" space-between="30"
                autoplay-delay="1000" autoplay-disable-on-interaction="false">
                @foreach ($brands as $brand)
                    <swiper-slide class="product p-0 border" style="border-radius: 20px;" data-aos="fade-up">
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
        <div class="custom-shape-divider-bottom-1720696250">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                    opacity=".25" class="shape-fill"></path>
                <path
                    d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                    opacity=".5" class="shape-fill"></path>
                <path
                    d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </section>
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
    <script>
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-sizer'
            }
        });
        $grid.imagesLoaded().progress(function() {
            $grid.isotope('layout');
        });
    </script>
@endpush
