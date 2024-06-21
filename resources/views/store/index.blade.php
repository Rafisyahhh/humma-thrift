@extends('layouts.home')

@section('title', "Toko {$store->name}")

@push('style')
    <style>
        .banner-wrapper .banner-cover {
            height: 250px;
            position: relative;
            overflow: hidden;
            border-radius: 0 0 2rem 2rem;
        }

        .banner-wrapper .banner-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .banner-wrapper .avatar-cover {
            margin-top: -10rem;
            position: relative;
            overflow: hidden;
            border-radius: 50%;
            border: 5px solid #fff;
            aspect-ratio: 1 / 1;
            height: 200px;
            width: 200px;
            margin-left: 5rem;
        }

        @media screen and (max-width: 768px) {
            .banner-wrapper .avatar-cover {
                margin-left: auto;
                margin-right: auto;
            }
        }

        .banner-wrapper .avatar-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-content {
            margin-left: calc(200px + 5rem + 2rem);
            margin-top: -7.5rem;
            padding-bottom: 5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .product-cart-items span {
            background: white;
            border-radius: 50%;
            padding: 0.2rem;
            width: 5rem;
            height: 5rem;
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

        .profile-content {
            display: flex;
            align-items: center;
        }

        .location {
            display: flex;
            align-items: center;
            margin-top: 10px;
            color: gray;
            font-size: 1.2em;
            gap: .325rem;
        }

        .location i {
            margin-right: 5px;
            color: gray;
            font-size: 1.5em;
        }

        .profile-info-detail-wrapper {
            display: flex;
            justify-content: space-around;
            align-items: start;
            margin-top: 20px;
        }

        .profile-info-detail-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0 28px;
            border-right: 1px solid #ddd;
        }

        .profile-info-detail-content:last-child {
            border-right: none;
        }

        .profile-icon {
            font-size: 24px;
            color: #555;
            margin-bottom: 8px;
        }

        .profile-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 4px;
        }

        .profile-subtitle {
            font-size: 14px;
            color: #777;
        }
    </style>
@endpush

@section('content')
    <section class="section-banner">
        <div class="container border-bottom">
            <div class="banner-wrapper">
                <div class="banner-cover"> <img
                        src="{{ asset($store->store_cover ? "storage/{$store->store_cover}" : 'template-assets/front/assets/images/homepage-one/sallers-cover.png') }}"
                        alt="upload" class="responsive-img" id="responsive-img" /> </div>
                <div class="profile-wrapper">
                    <div class="avatar-cover"> <img
                            src="{{ asset($store->store_logo ? "storage/{$store->store_logo}" : 'template-assets/front/assets/images/homepage-one/sallers-cover.png') }}" />
                    </div>
                    <div class="profile-content">
                        <div class="profile-name-wrapper">
                            <h5 class="profile-name mb-2">{{ $store->name }}</h5>
                            <p class="profile-description opacity-75 mb-0">{{ '@' . $store->username }}</p>
                            <div class="location mt-3">
                                <i class="fas fa-map-marker-alt"></i>
                                <span style="font-size: 16px;">Karangploso, Malang</span>
                            </div>
                        </div>

                        <div class="profile-info-detail-wrapper">
                            <div class="profile-info-detail-content">
                                <div class="profile-icon">
                                    <i class="fas fa-box"></i>
                                </div>
                                <div class="profile-title">50+</div>
                                <div class="profile-subtitle">Produk</div>
                            </div>
                            <div class="profile-info-detail-content">
                                <div class="profile-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="profile-title">4.87 / 5.0</div>
                                <div class="profile-subtitle">Ulasan Toko</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="location mt-2"> &nbsp;&nbsp;<span class="location mt-2">Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit. Reprehenderit nesciunt aut ea omnis molestias laudantium explicabo
                            ipsum corporis voluptates, optio harum quasi officia similique iste labore at eius praesentium
                            nemo nostrum sed saepe accusantium? Sapiente, vitae quod. Possimus modi repudiandae eum
                            voluptate inventore eligendi doloribus molestiae, consectetur vero alias esse, reiciendis
                            perferendis officia perspiciatis ratione.</span> </div>
                </div>
            </div> <br> <br>

            @if (!$store->verified_at)
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size: 0.9rem;">
                    <p>Toko anda belum terverifikasi. Silahkan verifikasikan toko anda dari tautan yang sudah kami kirim ke
                        surel anda.</p> <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
        </div>
    </section>

    <section class="product mt-5 pt-0 mb-5">
        <div class="container">
            <div class="section-title">
                <h5>Daftar Produk</h5>
            </div>
            <div class="arrival-section">
                <div class="row g-5">
                    @for ($i = 0; $i < 10; $i++)
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
                                    <a href="/user/keranjang" class="product-btn">Masukkan keranjang</a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>
@endsection
