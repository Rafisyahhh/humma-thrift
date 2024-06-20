@extends('layouts.home')

@section('tittle', 'User')

@section('content')
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


    <section class="product arrival mt-4">
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
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect width="40" height="40" rx="20" fill="#1C3879" />
                                                <path
                                                    d="M14.6928 12.3935C13.5057 12.54 12.512 13.0197 11.671 13.8546C10.9155 14.6016 10.4615 15.3926 10.201 16.4216C9.73957 18.2049 10.0745 19.9626 11.1835 21.6141C11.8943 22.6723 12.8135 23.6427 14.4993 25.1221C15.571 26.0632 18.8422 28.8096 19.0022 28.9011C19.1511 28.989 19.2069 29 19.5232 29C19.8395 29 19.8953 28.989 20.0442 28.9011C20.2042 28.8096 23.4828 26.0595 24.5471 25.1221C26.2404 23.6354 27.1521 22.6687 27.8629 21.6141C28.9719 19.9626 29.3068 18.2049 28.8454 16.4216C28.5849 15.3926 28.1309 14.6016 27.3754 13.8546C26.6237 13.1113 25.8199 12.6828 24.7667 12.4631C24.2383 12.3533 23.2632 12.3423 22.8018 12.4448C21.5142 12.7194 20.528 13.3529 19.6274 14.4808L19.5232 14.609L19.4227 14.4808C18.5333 13.3749 17.562 12.7414 16.3228 12.4631C15.9544 12.3789 15.1059 12.3423 14.6928 12.3935ZM15.9357 13.5104C16.9926 13.6935 17.9044 14.294 18.6263 15.2864C18.7491 15.4585 18.9017 15.6636 18.9613 15.7478C19.2367 16.1286 19.8098 16.1286 20.0851 15.7478C20.1447 15.6636 20.2973 15.4585 20.4201 15.2864C21.4062 13.9315 22.7795 13.2944 24.2755 13.4958C25.9352 13.7191 27.2303 14.8616 27.7252 16.5424C28.116 17.8717 27.9448 19.2668 27.234 20.5228C26.6386 21.5738 25.645 22.676 23.9145 24.203C23.0772 24.939 19.5567 27.9198 19.5232 27.9198C19.486 27.9198 15.9804 24.95 15.1319 24.203C12.4711 21.8557 11.4217 20.391 11.1686 18.6736C11.0049 17.5641 11.2393 16.3703 11.8087 15.4292C12.6646 14.0121 14.3318 13.2358 15.9357 13.5104Z"
                                                    fill="#000" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="/user/keranjang" class="compaire cart-item">
                                        <span>
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect width="40" height="40" rx="20" fill="white" />
                                                <g transform="translate(7.7, 7.7)">
                                                    <path fill="currentColor"
                                                        d="M9 8V6h6v2zM7 22q-.825 0-1.412-.587T5 20t.588-1.412T7 18t1.413.588T9 20t-.587 1.413T7 22m10 0q-.825 0-1.412-.587T15 20t.588-1.412T17 18t1.413.588T19 20t-.587 1.413T17 22M1 4V2h3.275l4.25 9h7l3.9-7H21.7l-4.975 9H8.1L7 15h12v2H3.625L6.6 11.6L3 4z" />
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="share-icons">
                                        <a href="#" class="share-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 1024 1024">
                                                <path fill="currentColor"
                                                    d="M33.935 942.336c.336 0 .72 0 1.088-.031c16.193-.529 26.4-13.088 27.777-29.216C63.888 901.217 95.775 614 544.048 614.305l1.008 183.664c0 12.368 7.12 23.664 18.335 28.944c11.088 5.312 24.432 3.68 33.968-4.224l414.976-343.776a31.864 31.864 0 0 0 11.681-24.784c-.032-9.6-4.336-18.687-11.776-24.752L597.28 88.817c-9.569-7.807-22.785-9.311-33.937-4.095c-11.152 5.311-18.288 16.56-18.288 28.91l-1.008 179.633c-185.952 5.887-329.968 65.712-423.328 174.96C-31.217 646 2.69 904.385 4.287 915.137c2.368 15.68 13.872 27.199 29.649 27.199zm543.121-392.527h-.063c-320.208.192-442.591 108.32-512.464 203.824c10.224-76.496 40.064-168.72 105.008-244.031c86.336-100.096 225.44-152.848 407.536-152.848c17.68 0 32-14.32 32-32V180.978l332.433 273.344l-332.448 275.904v-148.4a31.953 31.953 0 0 0-9.409-22.656a31.96 31.96 0 0 0-22.592-9.36z" />
                                            </svg>
                                        </a>
                                    </div>
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
    </section>


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
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect width="40" height="40" rx="20" fill="#1C3879" />
                                                <path
                                                    d="M14.6928 12.3935C13.5057 12.54 12.512 13.0197 11.671 13.8546C10.9155 14.6016 10.4615 15.3926 10.201 16.4216C9.73957 18.2049 10.0745 19.9626 11.1835 21.6141C11.8943 22.6723 12.8135 23.6427 14.4993 25.1221C15.571 26.0632 18.8422 28.8096 19.0022 28.9011C19.1511 28.989 19.2069 29 19.5232 29C19.8395 29 19.8953 28.989 20.0442 28.9011C20.2042 28.8096 23.4828 26.0595 24.5471 25.1221C26.2404 23.6354 27.1521 22.6687 27.8629 21.6141C28.9719 19.9626 29.3068 18.2049 28.8454 16.4216C28.5849 15.3926 28.1309 14.6016 27.3754 13.8546C26.6237 13.1113 25.8199 12.6828 24.7667 12.4631C24.2383 12.3533 23.2632 12.3423 22.8018 12.4448C21.5142 12.7194 20.528 13.3529 19.6274 14.4808L19.5232 14.609L19.4227 14.4808C18.5333 13.3749 17.562 12.7414 16.3228 12.4631C15.9544 12.3789 15.1059 12.3423 14.6928 12.3935ZM15.9357 13.5104C16.9926 13.6935 17.9044 14.294 18.6263 15.2864C18.7491 15.4585 18.9017 15.6636 18.9613 15.7478C19.2367 16.1286 19.8098 16.1286 20.0851 15.7478C20.1447 15.6636 20.2973 15.4585 20.4201 15.2864C21.4062 13.9315 22.7795 13.2944 24.2755 13.4958C25.9352 13.7191 27.2303 14.8616 27.7252 16.5424C28.116 17.8717 27.9448 19.2668 27.234 20.5228C26.6386 21.5738 25.645 22.676 23.9145 24.203C23.0772 24.939 19.5567 27.9198 19.5232 27.9198C19.486 27.9198 15.9804 24.95 15.1319 24.203C12.4711 21.8557 11.4217 20.391 11.1686 18.6736C11.0049 17.5641 11.2393 16.3703 11.8087 15.4292C12.6646 14.0121 14.3318 13.2358 15.9357 13.5104Z"
                                                    fill="#000" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="/user/keranjang" class="compaire cart-item">
                                        <span>
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect width="40" height="40" rx="20" fill="white" />
                                                <g transform="translate(7.7, 7.7)">
                                                    <path fill="currentColor"
                                                        d="M9 8V6h6v2zM7 22q-.825 0-1.412-.587T5 20t.588-1.412T7 18t1.413.588T9 20t-.587 1.413T7 22m10 0q-.825 0-1.412-.587T15 20t.588-1.412T17 18t1.413.588T19 20t-.587 1.413T17 22M1 4V2h3.275l4.25 9h7l3.9-7H21.7l-4.975 9H8.1L7 15h12v2H3.625L6.6 11.6L3 4z" />
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="share-icons">
                                        <a href="#" class="share-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 1024 1024">
                                                <path fill="currentColor"
                                                    d="M33.935 942.336c.336 0 .72 0 1.088-.031c16.193-.529 26.4-13.088 27.777-29.216C63.888 901.217 95.775 614 544.048 614.305l1.008 183.664c0 12.368 7.12 23.664 18.335 28.944c11.088 5.312 24.432 3.68 33.968-4.224l414.976-343.776a31.864 31.864 0 0 0 11.681-24.784c-.032-9.6-4.336-18.687-11.776-24.752L597.28 88.817c-9.569-7.807-22.785-9.311-33.937-4.095c-11.152 5.311-18.288 16.56-18.288 28.91l-1.008 179.633c-185.952 5.887-329.968 65.712-423.328 174.96C-31.217 646 2.69 904.385 4.287 915.137c2.368 15.68 13.872 27.199 29.649 27.199zm543.121-392.527h-.063c-320.208.192-442.591 108.32-512.464 203.824c10.224-76.496 40.064-168.72 105.008-244.031c86.336-100.096 225.44-152.848 407.536-152.848c17.68 0 32-14.32 32-32V180.978l332.433 273.344l-332.448 275.904v-148.4a31.953 31.953 0 0 0-9.409-22.656a31.96 31.96 0 0 0-22.592-9.36z" />
                                            </svg>
                                        </a>
                                    </div>
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
