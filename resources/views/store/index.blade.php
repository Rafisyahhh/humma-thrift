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
            align-items: flex-start;
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
            pointer-events: none !important;
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

        .gl-star-rating--stars[class*=" s"]>span {
            background-size: 78% !important;
        }

        .badge {
            font-size: 15px;
            /* Ubah ukuran teks */
            padding: 0.5em 1em;
            /* Ubah padding */
        }

        .profile-header {
            display: flex;
            align-items: center;
        }

        .profile-wrapper .avatar {
            position: relative;
            width: fit-content
        }

        .profile-wrapper .avatar .online-status {
            position: absolute;
            bottom: 1.25rem;
            right: 1.25rem;
            height: 4rem;
            width: 4rem;
            border: .5rem solid #fff;
            border-radius: 50%;
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


        .circular-image {
            width: 50px;
            height: 50px;
            border-radius: 100%;
            overflow: hidden;
            display: block;
            margin-left: auto;
            margin-right: auto;
            object-fit: cover;
            object-position: center;
        }
    </style>
@endpush

@section('content')
    <section class="section-banner">
        <div class="container border-bottom">
            <div class="banner-wrapper">
                <div class="banner-cover">
                    <img src="{{ asset($store->store_cover ? "storage/{$store->store_cover}" : 'template-assets/front/assets/images/homepage-one/sallers-cover.png') }}"
                        alt="upload" class="responsive-img" id="responsive-img" />
                </div>
                <div class="profile-wrapper">
                    <div class="avatar">
                        <div class="avatar-cover">
                            <img
                                src="{{ asset($store->store_logo ? "storage/{$store->store_logo}" : 'template-assets/front/assets/images/homepage-one/sallers-cover.png') }}" />
                        </div>
                        @if (!$store->cuti)
                            <span
                                class="badge online-status bg-{{ Cache::has('user-is-online-' . $store->user_id) ? 'success' : 'danger' }}">&nbsp;</span>
                        @endif
                    </div>
                    <div class="profile-content">
                        <div class="profile-name-wrapper">
                            <div class="profile-header">
                                <h5 class="profile-name mb-2">{{ $store->name }}</h5>
                            </div>
                            <p class="profile-description opacity-75 mb-0">{{ '@' . $store->username }}</p>
                            <div class="location mt-3">
                                <i class="fas fa-map-marker-alt"></i>
                                <span style="font-size: 16px;">{{ $store->address ?? 'Alamat Belum Diatur' }}</span>
                            </div>

                            @php
                                // Get current hours
                                $openInstance = \Carbon\Carbon::parse($store->open);
                                $closeInstance = \Carbon\Carbon::parse($store->close);
                                // Get current hours
                                $now = \Carbon\Carbon::now();
                            @endphp
                            <p class="profile-description opacity-75 mt-3 mb-0">
                                @if ($store->cuti)
                                    <span class="badge text-bg-warning me-2">Cuti</span>
                                @elseif($now->between($openInstance, $closeInstance) && Cache::has('user-is-online-' . $store->user_id))
                                    <span class="badge text-bg-success me-2">Buka</span>
                                @else
                                    <span class="badge text-bg-danger me-2">Tutup</span>
                                @endif

                                @if (!$store->cuti)
                                    {{ $openInstance->format('H:i') }} - {{ $closeInstance->format('H:i') }}
                                @endif

                            </p>

                            <span class="location mt-5">{!! $store->description !!}</span>
                        </div>

                        <div class="profile-info-detail-wrapper">
                            <div class="profile-info-detail-content">
                                <div class="profile-icon" style="color: #1c3879">
                                    <i class="fas fa-box"></i>
                                </div>
                                <div class="profile-title">{{ count($isProduct) + count($isProductAuction) }}</div>
                                <div class="profile-subtitle">Produk</div>
                            </div>
                            <div class="profile-info-detail-content">
                                <div class="profile-icon">
                                    <i class="fas fa-star" style="color: #ffbb28"></i>
                                </div>
                                <div class="profile-title">{!! $store->getAverageRating() !!}/5.0</div>
                                <div class="profile-subtitle">Ulasan Toko</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($store->cuti)
                <div class="alert alert-warning mt-3 alert-dismissible fade show" role="alert" style="font-size: 0.9rem;">
                    <p>Toko kami saat ini sedang Cuti. Kami mohon maaf atas ketidaknyamanan ini. Toko akan buka kembali
                        sesuai dengan jadwal yang telah ditentukan. Terima kasih atas pengertian Anda. Silakan cek kembali
                        nanti untuk informasi lebih lanjut.</p>
                </div>
            @endif

            @if (!$store->verified_at && auth()->id() === $store->user_id)
                <div class="alert alert-warning mt-3 alert-dismissible fade show" role="alert" style="font-size: 0.9rem;">
                    <p>Toko anda belum terverifikasi. Silahkan verifikasikan toko anda dari tautan yang sudah kami kirim ke
                        surel anda.</p> <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
        </div>
    </section>
    <section class="product mt-5 pt-0 mb-5">
        <div class="container">
            <ul class="nav nav-underline mb-3"
                style="display:flex; justify-content: left; margin-bottom: 5rem; margin-left:4rem;">
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

            <div class="tab-content" id="myTabContent" style="margin-left:4rem;">
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
                                                    <a data-id="{{ $item->id }}"
                                                        class="compare item-cart openShareModal">
                                                        <span>
                                                            <i class="fas fa-share"></i>
                                                        </span>
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}" class="favourite cart-item">
                                                        <span>
                                                            <i class="fas fa-heart"></i>
                                                        </span>
                                                    </a>
                                                @endauth
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
                                            <a href="{{ route('user.checkout') }}" class="product-btn">Beli Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="shareModal-{{ $item->id }}" class="modal"
                                    style="display: none; z-index:999;">
                                    <div class="modal-content">
                                        <button class="close" style="float: right; text-align: end;"
                                            onclick="closeModal2('#shareModal-{{ $item->id }}')">&times;</button>
                                        <div class="align-items-center gap-3 justify-content-center py-3"
                                            style="position: relative;">
                                            <p class="fs-2 mb-0 text-center fw-bold">Bagikan ke:</p>
                                            <div class="d-flex gap-2 align-items-center justify-content-center mt-2">
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
                                <div class="col-lg-12 d-flex flex-column align-items-center">
                                    <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong"
                                        style="width: 200px; height: 200px;">
                                    <h5 class="text-center" style="color: #000000">Produk Masih Kosong</h5>
                                    <p class="text-center" style="color: #000000">Maaf ya, kami masih belum menambahkan
                                        produknya. Tapi dalam
                                        waktu dekat kami akan menambahkan beberapa produk untukmu, stay tune.</p>
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
                                                <a data-id="{{ $item->id }}auction"
                                                    class="compare item-cart openShareModal">
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
                                <div id="shareModal-{{ $item->id }}auction" class="modal"
                                    style="display: none; z-index:999;">
                                    <div class="modal-content">
                                        <button class="close" style="float: right; text-align: end;"
                                            onclick="closeModal2('#shareModal-{{ $item->id }}')">&times;</button>
                                        <div class="align-items-center gap-3 justify-content-center py-3"
                                            style="position: relative;">
                                            <p class="fs-2 mb-0 text-center fw-bold">Bagikan ke:</p>
                                            <div class="d-flex gap-2 align-items-center justify-content-center mt-2">
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

                                <div class="col-lg-12 d-flex flex-column align-items-center">
                                    <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong"
                                        style="width: 200px; height: 200px;">
                                    <h5 class="text-center" style="color: #000000">Produk Lelang Masih Kosong</h5>
                                    <p class="text-center" style="color: #000000">Maaf ya, kami masih belum menambahkan
                                        produknya. Tapi dalam
                                        waktu dekat kami akan menambahkan beberapa produk untukmu, stay tune.</p>
                                </div>

                                {{-- <div class="col-lg-12">
                                    <h3 class="text-center">Produk Lelang Masih Kosong</h3>
                                    <p class="text-center">Maaf ya, kami masih belum menambahkan produknya. Tapi dalam
                                        waktu dekat kami
                                        akan
                                        menambahkan beberapa produk untukmu, stay tune.</p>
                                </div> --}}
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade mt-5" id="ulasan-tab-pane" role="tabpanel" aria-labelledby="ulasan-tab"
                    tabindex="0">
                    <ul class="list-group list-group-flush" style="height: unset;">
                        <section class="about-feedback product ">
                            <div class="container p-0">
                                <div class="position-relative px-5">
                                    <div class="swiper about-swiper">
                                        <div class="swiper-wrapper d-flex flex-row">
                                            @forelse ($reviews as $item)
                                                <div class="swiper-slide testimonial-wrapper">
                                                    <div class="blockquote w-100">
                                                        <span class="d-flex flex-row position-relative">
                                                            <svg width="38" height="30" viewBox="0 0 38 30"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M7.82644 11.9446C8.29006 9.03034 11.9328 5.91742 14.7808 5.85119C14.9795 5.85119 15.1782 5.78496 15.3107 5.65249C15.4431 5.58626 15.5756 5.52003 15.6418 5.32133C16.6353 3.46683 16.1055 2.00972 14.4497 0.817536C12.5289 -0.573341 9.48225 0.817536 7.9589 2.07595C4.11743 5.2551 0.20973 10.7523 0.408427 15.9847C-0.253896 19.4951 -0.121431 23.2703 0.872052 26.3832C1.53437 28.3702 3.45511 29.3636 5.44208 29.4961C7.42905 29.6287 11.5354 30.2247 13.3237 29.0326C15.112 27.8403 15.2445 25.5222 15.4431 23.5353C15.6418 21.3496 16.2379 17.2431 14.3834 15.5211C12.5289 13.8653 7.23035 15.6536 7.82644 11.9446Z"
                                                                    fill="#f6f6f6" />
                                                                <path
                                                                    d="M29.683 11.9446C30.1466 9.03034 33.7893 5.91742 36.6374 5.85119C36.8361 5.85119 37.0348 5.78496 37.1673 5.65249C37.2998 5.58626 37.4322 5.52003 37.4985 5.32133C38.492 3.46683 37.9622 2.00972 36.3064 0.817536C34.3856 -0.573341 31.3389 0.817536 29.8155 2.07595C25.974 5.2551 22.0663 10.7524 22.265 15.9847C21.6027 19.4951 21.7351 23.2703 22.7285 26.3832C23.3908 28.3702 25.3116 29.3636 27.2987 29.4961C29.2856 29.6287 33.392 30.2247 35.1803 29.0326C36.9685 27.8403 37.101 25.5222 37.2997 23.5353C37.4984 21.3496 38.0945 17.2431 36.24 15.5211C34.3855 13.8653 29.0207 15.6536 29.683 11.9446Z"
                                                                    fill="#f6f6f6" />
                                                            </svg>
                                                        </span>
                                                        {{-- <div class="mt-2 position-absolute" style="top:0; right: 45px;">
                                                            <tr class="table-row ticket-row store-header"
                                                                style="border: 1px solid #e6d5d593; background-color: #ffffff; width:100%;">
                                                                <td class="table-wrapper wrapper-product"
                                                                    style="display: flex; align-items: center;">
                                                                    <div class="form-check"
                                                                        style="display: flex; align-items: center; margin-left: 1rem;">
                                                                        <i class="fa-solid fa-store"
                                                                            style="margin-left: -3rem; color: #215791; font-size: 1.75rem;"></i>
                                                                        <a href="{{ route('store.profile', ['store' => $item->product->userStore->username]) }}"
                                                                            style="font-weight: bold; margin-left: 1rem; font-size: 1.55rem; color: gray;">{{ $item->product->userStore->name }}</a>
                                                                    </div>
                                                                </td><br>
                                                            </tr>
                                                        </div> --}}
                                                    </div>
                                                    <div style="width: 30rem; margin-bottom: 30px; ">
                                                        <img src="{{ asset("storage/{$item->product->thumbnail}") }}"
                                                            class="img-fluid rounded float-start me-5"
                                                            style="width: 7.5rem; margin-top:50px;" />
                                                        <div class="h-50"></div>
                                                        <h5 class="text-start">{{ $item->product->title }}</h5>
                                                        <p class="text-start">Warna: {{ $item->product->color }}</p>
                                                    </div>
                                                    <p class="testimonial-details">{{ $item->comment }}
                                                    </p>
                                                    <div class="ratings d-flex gap-2 align-items-center">
                                                        <select class="star-rating" name="product_rating"
                                                            data-options="{&quot;clearable&quot;:false, &quot;tooltip&quot;:false}">
                                                            @foreach (['1', '2', '3', '4', '5'] as $rating)
                                                                <option value="{{ $rating }}"
                                                                    @selected($rating == $item->star)></option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="divider"></div>
                                                    <div class="testimonial-info">
                                                        <div class="testimonial-img">
                                                            <img class="circular-image img-fluid fit-center"
                                                                src="{{ asset(isset($item->user->avatar) ? "storage/{$item->user->avatar}" : 'template-assets/front/assets/images/homepage-one/aurthor-img-1.webp') }}">
                                                        </div>

                                                        <div class="testimonial-info-details">
                                                            <h5 class="testimonial-name">{{ $item->user->name }}</h5>
                                                            <p class="testimonial-title">{{ $item->created_at }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="col-lg-12 d-flex flex-column align-items-center">
                                                    <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong"
                                                        style="width: 200px; height: 200px;">
                                                    <h5 class="text-center" style="color: #000000">Upss..</h5>
                                                    <p class="text-center" style="color: #000000">Maaf, saat ini masih
                                                        belum ada ulasan</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </section>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')
    <script src="{{ asset('additional-assets/star-rating/dist/star-rating.min.js') }}"></script>
    <script src="{{ asset('additional-assets/blobinator-latest/blobinator.js') }}"></script>

    <script>
        var stars = new StarRating('.star-rating');
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




{{--
                            <li class="list-group-item d-flex mt-5 rounded pt-3 w-100"
                                style="height: 20rem; background-color: rgba(202, 202, 202, 0.2); position: unset; transform: translateY(-25%)">
                                <div style="width: 30rem;">
                                    <img src="{{ asset("storage/{$item->product->thumbnail}") }}"
                                        class="img-fluid rounded mb-2 float-start" style="width: 7.5rem" />
                                    <div class="h-50"></div>
                                    <h5 class="text-start">{{ $item->product->title }}</h5>
                                    <p class="text-start">Warna: {{ $item->product->color }}</p>
                                </div>
                                <div class="w-100">
                                    <div class="d-flex position-relative mb-4">
                                        <img src="{{ asset(isset($item->user->avatar) ? "storage/{$item->user->avatar}" : 'template-assets/front/assets/images/homepage-one/aurthor-img-1.webp') }}"
                                            class="img-fluid" style="width: 6rem; border-radius: 50%" />
                                        <div class="ms-3 w-100">
                                            <div class="d-flex position-relative">
                                                <h5>{{ $item->user->name }}</h5>
                                                <p class="position-absolute opacity-75" style="right: 0;">
                                                    {{ $item->created_at }}</p>
                                            </div>
                                            <div class="row-rating">
                                                <div class="rating">
                                                    <select class="star-rating" name="product_rating"
                                                        data-options="{&quot;clearable&quot;:false, &quot;tooltip&quot;:false}">
                                                        @foreach (['1', '2', '3', '4', '5'] as $rating)
                                                            <option value="{{ $rating }}"
                                                                @selected($rating == $item->star)></option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="border-top pt-2 text-start" style="min-height: 5rem">{{ $item->comment }}
                                    </p>
                                </div>
                            </li> --}}
