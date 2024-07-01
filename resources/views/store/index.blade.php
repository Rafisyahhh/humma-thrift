@extends('layouts.home')

@section('title', "Toko {$store->name}")

@push('link')
    <link rel="stylesheet" href="{{ asset('additional-assets/star-rating/dist/star-rating.min.css') }}" />
@endpush

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
            border-right: 1px solid rgba(126, 163, 219, 0.40);
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

        .rating {
            display: flex;
            position: relative;
            justify-content: center;
            margin-bottom: 10px;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 20px;
            color: #ddd;
            cursor: pointer;
            padding: 0 5px;
            transition: color 0.2s;
        }

        .rating input:checked~label,
        .rating input:checked~label~label {
            color: #f5b301;
        }

        .rating label:hover,
        .rating label:hover~label {
            color: #f5b301;
        }

        .row-rating span {
            width: unset;
            height: unset;
            background: unset;
            border-radius: unset;
            background-size: unset;
        }

        .row-rating span:hover {
            background: unset;
        }

        .row-rating .gl-star-rating {
            position: absolute;
            left: 0;
        }

        .row-rating .gl-star-rating--stars[class*=" s"]>span {
            background-size: unset;
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
                                <span style="font-size: 16px;">{{ $store->address }}</span>
                            </div>
                        </div>

                        <div class="profile-info-detail-wrapper">
                            <div class="profile-info-detail-content">
                                <div class="profile-icon" style="color: #1c3879">
                                    <i class="fas fa-box"></i>
                                </div>
                                <div class="profile-title">50+</div>
                                <div class="profile-subtitle">Produk</div>
                            </div>
                            <div class="profile-info-detail-content">
                                <div class="profile-icon">
                                    <i class="fas fa-star" style="color: #ffbb28"></i>
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
                    <div class="location mt-2"> &nbsp;&nbsp;<span class="location mt-2">{!! $store->description !!}</span>
                    </div>
                </div>
            </div> <br> <br>

            @if (!$store->verified_at && auth()->id() === $store->user_id)
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
            <ul class="nav nav-underline mb-3">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="lelang-tab" data-bs-toggle="tab" data-bs-target="#lelang-tab-pane"
                        type="button" role="tab" aria-controls="lelang-tab-pane" aria-selected="false">Lelang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ulasan-tab" data-bs-toggle="tab" data-bs-target="#ulasan-tab-pane"
                        type="button" role="tab" aria-controls="ulasan-tab-pane" aria-selected="false">Ulasan</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div class="arrival-section">
                        <div class="row g-5">
                            @forelse ($isProduct as $item)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="product-wrapper" data-aos="fade-up">
                                        <div class="product-img">
                                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="product-img"
                                                class="object-fit-cover">
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
                                                <a href="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                                                    class="product-details">
                                                    {{ $item->title }}
                                                </a>
                                                <div class="price">
                                                    <span
                                                        class="new-price">Rp.{{ number_format($item->price, 2, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-btn">
                                            <a href="/user/keranjang" class="product-btn">Beli Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <h3 class="text-center">Produk Masih Kosong</h3>
                                    <p class="text-center">Maaf ya, kami masih belum menambahkan produknya. Tapi dalam
                                        waktu dekat kami
                                        akan
                                        menambahkan beberapa produk untukmu, stay tune.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="lelang-tab-pane" role="tabpanel" aria-labelledby="lelang-tab"
                    tabindex="0">
                    <div class="arrival-section">
                        <div class="row g-5">
                            @forelse ($isProductAuction as $item)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="product-wrapper" data-aos="fade-up">
                                        <div class="product-img">
                                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="product-img"
                                                class="object-fit-cover">
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
                                                <a href="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                                                    class="product-details">
                                                    {{ $item->title }}
                                                </a>
                                                <div class="price">
                                                    <span
                                                        class="new-price">Rp.{{ number_format($item->bid_price_start, 2, ',', '.') }}
                                                        - Rp.{{ number_format($item->bid_price_end, 2, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-btn">
                                            <a href="/user/keranjang" class="product-btn">Ikuti Lelang</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <h3 class="text-center">Produk Lelang Masih Kosong</h3>
                                    <p class="text-center">Maaf ya, kami masih belum menambahkan produknya. Tapi dalam
                                        waktu dekat kami
                                        akan
                                        menambahkan beberapa produk untukmu, stay tune.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="ulasan-tab-pane" role="tabpanel" aria-labelledby="ulasan-tab"
                    tabindex="0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex mt-5" style="height: 20rem">
                            <div style="width: 30rem;">
                                <img src="https://placehold.co/400" class="img-fluid rounded mb-2"
                                    style="width: 7.5rem" />
                                <h5>Tinta original</h5>
                                <p>Warna: pink</p>
                            </div>
                            <div class="w-100">
                                <div class="d-flex position-relative mb-4">
                                    <img src="https://placehold.co/400" class="img-fluid"
                                        style="width: 6rem; border-radius: 50%" />
                                    <div class="ms-4 w-100">
                                        <div class="d-flex position-relative">
                                            <h5>Akbar</h5>
                                            <p class="position-absolute opacity-75" style="right: 0;">2 hari yang lalu</p>
                                        </div>
                                        <div class="row-rating">
                                            <div class="rating">
                                                <select class="star-rating" name="product_rating"
                                                    data-options="{&quot;clearable&quot;:false, &quot;tooltip&quot;:false}">
                                                    <option value="1">Buruk</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Baik</option>
                                                    <option value="4" selected>Sangat Baik</option>
                                                    <option value="5">Luar Biasa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p style="min-height: 5rem">Aku lupa aku siapa</p>
                            </div>
                        </li>
                        <li class="list-group-item d-flex mt-5" style="height: 20rem">
                            <div style="width: 30rem;">
                                <img src="https://placehold.co/400" class="img-fluid rounded" style="width: 7.5rem" />
                                <h5>Tinta original</h5>
                                <p>Warna: pink</p>
                            </div>
                            <div class="w-100">
                                <div class="d-flex position-relative mb-4">
                                    <img src="https://placehold.co/400" class="img-fluid"
                                        style="width: 6rem; border-radius: 50%" />
                                    <div class="ms-4 w-100">
                                        <div class="d-flex position-relative">
                                            <h5>Akbar</h5>
                                            <p class="position-absolute opacity-75" style="right: 0;">2 hari yang lalu</p>
                                        </div>
                                        <div class="row-rating">
                                            <div class="rating">
                                                <select class="star-rating" name="product_rating"
                                                    data-options="{&quot;clearable&quot;:false, &quot;tooltip&quot;:false}">
                                                    <option value="1">Buruk</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Baik</option>
                                                    <option value="4" selected>Sangat Baik</option>
                                                    <option value="5">Luar Biasa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p style="min-height: 5rem">Aku lupa aku siapa</p>
                            </div>
                        </li>
                        <li class="list-group-item d-flex mt-5" style="height: 20rem">
                            <div style="width: 30rem;">
                                <img src="https://placehold.co/400" class="img-fluid rounded" style="width: 7.5rem" />
                                <h5>Tinta original</h5>
                                <p>Warna: pink</p>
                            </div>
                            <div class="w-100">
                                <div class="d-flex position-relative mb-4">
                                    <img src="https://placehold.co/400" class="img-fluid"
                                        style="width: 6rem; border-radius: 50%" />
                                    <div class="ms-4 w-100">
                                        <div class="d-flex position-relative">
                                            <h5>Akbar</h5>
                                            <p class="position-absolute opacity-75" style="right: 0;">2 hari yang lalu</p>
                                        </div>
                                        <div class="row-rating">
                                            <div class="rating">
                                                <select class="star-rating" name="product_rating"
                                                    data-options="{&quot;clearable&quot;:false, &quot;tooltip&quot;:false}">
                                                    <option value="1">Buruk</option>
                                                    <option value="2">Cukup</option>
                                                    <option value="3">Baik</option>
                                                    <option value="4" selected>Sangat Baik</option>
                                                    <option value="5">Luar Biasa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p style="min-height: 5rem">Aku lupa aku siapa</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('additional-assets/star-rating/dist/star-rating.min.js') }}"></script>

    <script>
        var stars = new StarRating('.star-rating');
    </script>
@endpush
