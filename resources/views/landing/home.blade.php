@extends('layouts.home')

@section('title', 'Beranda')

@section('content')
<style>
    .custom-margin-bottom {
  margin-bottom: 11rem;
  margin-left: 5rem; /* Sesuaikan nilai margin sesuai kebutuhan Anda */
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


    <section class="product-category mt-5">
        <div class="container">
            <div class="section-title">
                <h5>KATEGORI PAKAIAN</h5>
                <a href="product-sidebar.html" class="view">Lihat Semua</a>
            </div>
            <div class="category-section">
                @foreach ($categories as $kategori)
                    <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                        <div class="wrapper-img">
                            <img src="{{ asset("storage/{$kategori->icon}") }}" style="width:125px;hieght:125px;border-radius:20px;">
                        </div>
                        <div class="wrapper-info">
                            <a href="" class="wrapper-details">{{ $kategori->title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="product arrival mt-5">
        <div class="container">
            <div class="section-title">
                <h5>TERBARU!! </h5>
                <a href="product-sidebar.html" class="view">Lihat Semua</a>
            </div>
            <div class="arrival-section">
                <div class="row g-5">
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp"
                                    alt="product-img">
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
                                    <a href="/user/detailproduct" class="product-details"> Nama Produk
                                    </a>
                                    <div class="price">
                                        <span class="new-price">Harga</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="cart.html" class="product-btn">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="product flash-sale mt-5">
        <div class="container">
            <div class="section-title">
                <h5>SESI LELANG</h5>
                <a href="flash-sale.html" class="view">Lihat Semua</a>
            </div>
            <div class="flash-sale-section">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                            <div class="product-img">
                                <img src="template-assets/front/assets/images/homepage-one/product-img/product-img-5.webp"
                                    alt="product-img">
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
                                    <a href="/user/detailproduct" class="product-details">Nama Produk
                                    </a>
                                    <div class="price">
                                        <span class="new-price">Harga</span>
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

    <section class="product brand" data-aos="fade-up">
        <div class="container">
            <div class="section-title pt-5">
                <h5>BRAND PRODUK</h5>
                <a href="product-sidebar.html" class="view">Lihat Semua</a>
            </div>
            <div class="brand-section gap-3 pb-5">
                @foreach ($brands as $brand)
                    <div class="product py-0">
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
