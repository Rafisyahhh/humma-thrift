@extends('layouts.home')

@section('title', 'Beranda')

@push('style')
    <style>
        .custom-margin-bottom {
            margin-bottom: 11rem;
            margin-left: 5rem;
            /* Sesuaikan nilai margin sesuai kebutuhan Anda */
        }

        .swiper-pagination-bullet-active {
            background-color: #f0f0f0;
        }

        body {
            position: relative;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .svg-container {
            position: absolute;
            z-index: -1;
            /* Menempatkan SVG di belakang elemen lain */
            overflow: hidden;
            /* Pastikan SVG tidak keluar dari container */
        }

        .svg-container svg {
            width: 100%;
            height: 50%;
            display: block;
            /* Mengatur masing-masing SVG menempati setengah layar */
        }

        .svg-container.second svg {
            transform: translateY(100%);
            /* Memindahkan SVG kedua ke bagian bawah */
        }
    </style>

    <style>
        .custom-margin-bottom {
            margin-bottom: 11rem;
            margin-left: 5rem;
            /* Sesuaikan nilai margin sesuai kebutuhan Anda */
        }
    </style>
@endpush
@section('content')
    <div class="svg-container first" style="top: 0;left: -35%;width: 200%;height: 100%;">
        <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 490" xmlns="http://www.w3.org/2000/svg"
            class="transition duration-300 ease-in-out delay-150">
            <path
                d="M 0,500 L 0,187 C 118.1531100478469,175.94736842105263 236.3062200956938,164.89473684210526 333,184 C 429.6937799043062,203.10526315789474 504.92822966507185,252.3684210526316 592,227 C 679.0717703349281,201.6315789473684 777.980861244019,101.63157894736841 862,107 C 946.019138755981,112.36842105263159 1015.1483253588517,223.10526315789474 1109,254 C 1202.8516746411483,284.89473684210526 1321.4258373205741,235.94736842105263 1440,187 L 1440,500 L 0,500 Z"
                stroke="none" stroke-width="0" fill="#798ED4" fill-opacity="1"
                class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 250)"></path>
        </svg>
    </div>
    <div class="svg-container second" style="top: -13%;left: 0;width: 20%;height: 50%;">
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path fill="#FF0066"
                d="M26.3,3.3C26.3,26.1,13.2,52.1,-7.9,52.1C-29,52.1,-58,26.1,-58,3.3C-58,-19.4,-29,-38.7,-7.9,-38.7C13.2,-38.7,26.3,-19.4,26.3,3.3Z"
                transform="translate(100 100)" />
        </svg>
    </div>
    <div class="svg-container third" style="top: 40%;left: -35%;width: 200%;height: 100%;">
        <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 490" xmlns="http://www.w3.org/2000/svg"
            class="transition duration-300 ease-in-out delay-150">
            <path
                d="M 0,500 L 0,187 C 138.42857142857142,144.375 276.85714285714283,101.75 394,121 C 511.14285714285717,140.25 606.9999999999999,221.375 713,285 C 819.0000000000001,348.625 935.1428571428573,394.75 1058,413 C 1180.8571428571427,431.25 1310.4285714285713,421.625 1440,412 L 1440,500 L 0,500 Z"
                stroke="none" stroke-width="0" fill="#798ED4" fill-opacity="1"
                class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 250)"></path>
        </svg>
    </div>
    <div class="svg-container fourth" style="top: 20%;left: -35%;width: 150%;height: 100%;">
        <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 390" xmlns="http://www.w3.org/2000/svg"
            class="transition duration-300 ease-in-out delay-150">
            <path
                d="M 0,400 L 0,225 C 107.28571428571428,266.9821428571429 214.57142857142856,308.9642857142857 323,280 C 431.42857142857144,251.03571428571428 540.9999999999999,151.125 669,124 C 797.0000000000001,96.87499999999999 943.4285714285713,142.53571428571428 1075,134 C 1206.5714285714287,125.46428571428572 1323.2857142857142,62.73214285714286 1440,0 L 1440,400 L 0,400 Z"
                stroke="none" stroke-width="0" fill="#798ED4" fill-opacity="1"
                class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
        </svg>
    </div>
    <section id="hero" class="hero" style="z-index: 100;position: relative;">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper hero-wrapper">
                @foreach ($event as $key => $even)
                    <div id="slide{{ $key }}" class="swiper-slide hero-slider-one "
                        style="background-image: url('{{ asset("storage/{$even->foto}") }}');">
                        <div class="hero-slider-one"
                            style="background-color: rgba(2, 17, 36, 0.39); position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
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

    <section class="product-category mt-5" style="z-index: 100;position: relative;">
        <div class="container">
            <div class="section-title">
                <h5>KATEGORI PAKAIAN</h5>
                <a href="product-sidebar.html" class="view">Lihat Semua</a>
            </div>
            <div class="category-section">
                @foreach ($categories as $kategori)
                    <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                        <div class="wrapper-img">
                            <img src="{{ asset("storage/{$kategori->icon}") }}"
                                style="width:125px;hieght:125px;border-radius:20px;">
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
                <h5>TERBARU!! </h5>
                <a href="/product" class="view">Lihat Semua</a>
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
                                            <a href="/user/wishlist" class="favourite cart-item">
                                                <span>
                                                    <i class="fas fa-heart"></i>
                                                </span>
                                            </a>
                                            <a href="/user/checkout" class="favourite cart-item">
                                                <span>
                                                    <i class="fas fa-shopping-cart"></i>
                                                </span>
                                            </a>
                                            <a href="#" class="compaire cart-item">
                                                <span>
                                                    <i class="fas fa-share"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-description">
                                        <a href="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                                            class="product-details"> {{ $item->title }}
                                        </a>
                                        <div class="price">
                                            <span
                                                class="new-price">Rp{{ number_format($item->price, null, null, '.') }}</span>
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
        {{-- <!-- Shape Start -->
    <div class="svg-container">
      <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path fill="rgba(136, 178, 240, 0.4)"
          d="M22.7,-37.4C30.6,-34.7,39.2,-31.1,43.2,-24.8C47.3,-18.4,46.7,-9.2,45.2,-0.9C43.7,7.4,41.1,14.8,40.9,27.8C40.6,40.7,42.7,59.1,36.3,65.8C29.8,72.6,14.9,67.6,2.2,63.8C-10.6,60.1,-21.2,57.6,-30.2,52.4C-39.1,47.1,-46.4,39.1,-56.7,29.9C-66.9,20.7,-80,10.3,-82.1,-1.2C-84.2,-12.8,-75.4,-25.6,-65.8,-36C-56.3,-46.4,-46.1,-54.3,-35.1,-55.2C-24,-56.1,-12,-50,-2.3,-46C7.4,-41.9,14.7,-40.1,22.7,-37.4Z"
          transform="translate(100 100)" />
      </svg>
    </div>
    <div class="svg-container">
      <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path fill="rgba(136, 178, 240, 0.4)"
          d="M30.5,-59.3C37,-49,38.2,-35.9,46.2,-25.5C54.1,-15.2,68.9,-7.6,75.3,3.7C81.7,15,79.8,30,70.2,37.5C60.6,45,43.3,45,30.3,48.4C17.3,51.9,8.7,58.8,-1.2,60.9C-11.1,63.1,-22.3,60.5,-35.3,57C-48.3,53.6,-63.2,49.3,-67.6,39.7C-72,30,-65.9,15,-59.8,3.5C-53.6,-8,-47.5,-15.9,-43.6,-26.4C-39.7,-36.9,-38,-49.9,-31.1,-60.1C-24.2,-70.2,-12.1,-77.5,-0.1,-77.4C11.9,-77.3,23.9,-69.7,30.5,-59.3Z"
          transform="translate(100 100)" />
      </svg>
    </div>
    <div class="svg-container">
      <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path fill="rgba(136, 178, 240, 0.4)"
          d="M34.4,-58.2C43.2,-54.6,47.9,-42.5,54.6,-31.4C61.3,-20.3,69.9,-10.1,67.6,-1.3C65.4,7.6,52.3,15.1,44.6,24.4C36.9,33.7,34.5,44.7,28,50.2C21.4,55.8,10.7,56,-1.1,58C-13,59.9,-26,63.7,-39,61.9C-52.1,60.1,-65.3,52.7,-67.9,41.4C-70.6,30.2,-62.7,15.1,-63.8,-0.6C-64.8,-16.3,-74.7,-32.6,-72.4,-44.4C-70.1,-56.2,-55.4,-63.4,-41.3,-64C-27.2,-64.5,-13.6,-58.4,-0.4,-57.7C12.8,-57,25.7,-61.9,34.4,-58.2Z"
          transform="translate(100 100)" />
      </svg>
    </div>
    <!-- Shape End --> --}}

        <div class="container">
            <div class="section-title" style="position: relative; z-index: 1;">
                <h5>SESI LELANG</h5>
                <a href="/product" class="view">Lihat Semua</a>
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
                                            <a href="/user/wishlist" class="favourite cart-item">
                                                <span>
                                                    <i class="fas fa-heart"></i>
                                                </span>
                                            </a>
                                            <a href="/user/checkout" class="favourite cart-item">
                                                <span>
                                                    <i class="fas fa-shopping-cart"></i>
                                                </span>
                                            </a>
                                            <a href="#" class="compaire cart-item">
                                                <span>
                                                    <i class="fas fa-share"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-description">
                                        <a href="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                                            class="product-details">{{ $item->title }}
                                        </a>
                                        <div class="price">
                                            <span
                                                class="new-price">Rp.{{ number_format($item->bid_price_start, null, null, '.') }}
                                                - Rp.{{ number_format($item->bid_price_end, null, null, '.') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-cart-btn">
                                    <a href="cart.html" class="product-btn">Ikuti Lelang</a>
                                </div>
                            </div>
                        </swiper-slide>
                    @endforeach
                </swiper-container>
            </div>
        </div>
    </section>

    <section class="product brand" style="position: relative; z-index: 100;" data-aos="fade-up">
        <div class="container" style="z-index: 1;">
            <div class="section-title pt-5" style="position: relative; z-index: 1;">
                <h5>BRAND PRODUK</h5>
                <a href="/brand" class="view">Lihat Semua</a>
            </div>
            <div class="brand-section gap-3 pb-5" style="position: relative; z-index: 1;">
                @foreach ($brands as $brand)
                    <div class="product py-0" style="box-shadow: rgb(18 106 195 / 20%) 0 8px 24px;border-radius: 20px;">
                        <div class="wrapper-img">
                            <a href="product-sidebar.html">
                                <img src="{{ asset("storage/{$brand->logo}") }}" alt="img"
                                    style="border-radius: 20px;">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('additional-assets/swiper-11/swiper-element.min.js') }}"></script>
@endpush

@push('js')
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
