@extends('layouts.home')

@section('tittle', 'User')

@section('content')
<style>
    .product-cart-items span {
            background: white;
            border-radius: 50%;
            padding: 0.2rem;
            width: 4.5rem;
            height: 4.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .2s;
        }

        .product-cart-items span:hover {
            background: #1c3879;
            color: white;
        }

        .product-cart-items span i {
            font-size: 1.25em;
        }
</style>
    <section id="hero" class="hero">
        <div class="swiper hero-swiper">
        <div class="swiper-wrapper hero-wrapper">
            @foreach ($event as $key => $even)
            <div id="slide{{ $key }}" class="swiper-slide hero-slider-one "
                style="background-image: url('{{ asset("storage/{$even->foto}") }}');">
                <div class="hero-slider-one"
                style="background-color: rgba(2, 17, 36, 0.39); position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                </div>
                <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="position-absolute" data-aos="fade-up">
                        <div class="wrapper-info">
                        <h5 style="color:white;">{{ $even->subjudul }}</h5>
                        <h1 style="color:white;">{{ $even->judul }}</h1>
                        <a href="product-sidebar.html" class="shop-btn">Belanja Sekarang</a>
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
    <br>
    <br>
    <br>
    <br>
    <section class="product-category">
        <div class="container">
            <div class="section-title">
                <h5>Semua Kategori</h5>
                <a href="/user/shop" class="view">Lihat Semua</a>
            </div>
            @foreach ( $categories as $kategori )
            <div class="category-section">
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                    <div class="wrapper-img">
                        <img src="{{ asset("storage/{$kategori->icon}") }}"
                            alt="dress">
                    </div>
                    <div class="wrapper-info">
                        <a href="product-sidebar.html" class="wrapper-details">{{$kategori->title}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>


    <section class="product brand" data-aos="fade-up">
        <div class="container">
            <div class="section-title">
                <h5>Brand Produk</h5>
                <a href="/user/shop" class="view">Lihat Semua</a>
            </div>
            @foreach ($brands as $brand)
            <div class="brand-section">
                <div class="product">
                    <div class="wrapper-img">
                        <a href="product-sidebar.html">
                            <img src="{{ asset("storage/{$brand->logo}") }}"
                                alt="img">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>


    <section class="product mt-5 pt-0 mb-5">
        <div class="container">
            <div class="section-title">
                <h5>TERBARU</h5>
                <a href="/user/shop" class="view">Lihat Semua</a>
            </div>
            <div class="arrival-section">
                <div class="row g-5">
                        <div class="col-lg-3 col-sm-6">
                            <div class="product-wrapper" data-aos="fade-up">
                                <div class="product-img">
                                    <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                        alt="product-img">
                                    <div class="product-cart-items">
                                        <a href="/user/wishlist" class="favourite cart-item">
                                            <span>
                                                <i class="fas fa-heart"></i>
                                            </span>
                                        </a>
                                        <a href="/user/wishlist" class="favourite cart-item">
                                            <span>
                                                <i class="fas fa-shopping-cart"></i>
                                            </span>
                                        </a>
                                        <a href="/user/keranjang" class="compaire cart-item">
                                            <span>
                                                <i class="fas fa-share"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-description">
                                        <a href="/user/detailproduct" class="product-details">
                                            Nama Produk
                                        </a>
                                        <div class="price">
                                            <span class="new-price">Harga</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-cart-btn">
                                    <a href="/user/checkout" class="product-btn">Beli Sekarang</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="product arrival mt-4">
        <div class="container">
            <div class="section-title">
                <h5>TERBARU</h5>
                <a href="/user/shop" class="view">Lihat Semua</a>
            </div>
            <div class="arrival-section">
                <div class="row g-5">
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                    alt="product-img">
                                <div class="product-cart-items">
                                    <a href="/user/wishlist" class="favourite cart-item">
                                        <span>
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </a>
                                    <a href="/user/wishlist" class="favourite cart-item">
                                        <span>
                                            <i class="fas fa-heart"></i>
                                        </span>
                                    </a>
                                    <a href="/user/keranjang" class="compaire cart-item">
                                        <span>
                                            <i class="fas fa-shopping-cart"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a href="/user/detailproduct" class="product-details">Rainbow Sequin Dress
                                    </a>
                                    <div class="price">
                                        <span class="new-price">Rp 6.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="/user/checkout" class="product-btn">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <section class="product top-selling">
        <div class="container">
            <div class="section-title">
                <h5>SESI LELANG</h5>
                <a href="/user/shop" class="view">Lihat Semua</a>
            </div>
            <div class="top-selling-section">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right">
                            <div class="product-img">
                                <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-5.webp') }}"
                                    alt="product-img">
                                    <div class="product-cart-items">
                                        <a href="/user/wishlist" class="favourite cart-item">
                                            <span>
                                                <i class="fas fa-heart"></i>
                                            </span>
                                        </a>
                                        <a href="/user/wishlist" class="favourite cart-item">
                                            <span>
                                                <i class="fas fa-shopping-cart"></i>
                                            </span>
                                        </a>
                                        <a href="/user/keranjang" class="compaire cart-item">
                                            <span>
                                                <i class="fas fa-share"></i>
                                            </span>
                                        </a>
                                    </div>
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a href="/user/detailproduct" class="product-details">Leather Dress Shoes
                                    </a>
                                    <div class="price">
                                        <span class="new-price">Rp 13.99</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="cart.html" class="product-btn">Ikuti Lelang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>

@endsection
