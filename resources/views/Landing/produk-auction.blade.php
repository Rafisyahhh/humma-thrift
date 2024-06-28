@extends('layouts.home')

@section('title', 'Product')

@section('content')
    <section class="product product-sidebar footer-padding">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3">
                    <div class="sidebar" data-aos="fade-right">
                        <div class="sidebar-section">
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Kategori Produk</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        @foreach ($categories as $item)
                                            <li>
                                                <input type="checkbox" id="{{ $item->id }}" name="category[]" />
                                                <label for="{{ $item->id }}">{{ $item->title }}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper sidebar-range">
                                <h5 class="wrapper-heading">Kisaran harga</h5>
                                <div class="price-slide range-slider">
                                    <div class="price">
                                        <div class="range-slider style-1">
                                            <div id="slider-tooltips" class="slider-range mb-3"></div>
                                            <span class="example-val" id="slider-margin-value-min"></span>
                                            <span>-</span>
                                            <span class="example-val" id="slider-margin-value-max"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Brands</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        @foreach ($brands as $item)
                                            <li>
                                                <input type="checkbox" id="brands-{{ $item->id }}" name="brands[]" />
                                                <label for="brands-{{ $item->id }}">{{ $item->title }}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Warna</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        <li>
                                            <input type="checkbox" id="red" name="red">
                                            <label for="red">Merah</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="blue" name="blue">
                                            <label for="blue">Biru</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="navy" name="navy">
                                            <label for="navy">Navy</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Ukuran</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        <li>
                                            <input type="checkbox" id="small" name="small">
                                            <label for="small">Kecil</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="medium" name="medium">
                                            <label for="medium">Sedang</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="large" name="large">
                                            <label for="large">Besar</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="xl" name="xl">
                                            <label for="xl">XL</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="2xl" name="2xl">
                                            <label for="2xl">2XL</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="product-sidebar-section" data-aos="fade-up">
                        <div class="row g-5">
                            <div class="col-lg-12">
                                <div class="product-sorting-section">
                                    <div class="result">
                                        <p>Menampilkan
                                            {{ $product_auction->firstItem() ?? 0 }}–{{ $product_auction->lastItem() ?? 0 }}
                                            dari {{ $product_auction->total() ?? 0 }} hasil</p>
                                    </div>
                                </div>
                            </div>


                            @forelse ($product_auction as $item)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-wrapper" data-aos="fade-up">
                                        <div class="product-img">
                                            <img src="{{ asset("storage/$item->thumbnail") }}" alt="product-img"
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
                                                    class="product-details">{{ $item->title }}
                                                </a>
                                                <div class="price">
                                                    <span
                                                        class="new-price">Rp{{ number_format($item->bid_price_start, null, null, '.') }}
                                                        -
                                                        Rp{{ number_format($item->bid_price_end, null, null, '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-btn">
                                            <a data-id="{{ $item->id }}" class="product-btn openModal">Ikuti
                                                Lelang</a>
                                        </div>

                                        <div id="reviewModal" class="modal">
                                            <div class="modal-content">
                                                <button class="close"
                                                    style="float: right; text-align: end;">&times;</button>
                                                <h4 style="text-align: center;">Bid Lelang</h4>
                                                <form action="{{ route('user.auctions.store', ['id' => $item->id]) }}"
                                                    method="post" class="mt-5">
                                                    @csrf
                                                    <label for="auction_price" class="form-label"
                                                        style="font-size: 18px;">Bid Lelang :</label> <br>
                                                    <input type="number" name="auction_price" class="form-control"
                                                        placeholder="Masukkan Bid Lelang anda" style="font-size: 17px;"
                                                        required>
                                                    <button type="submit" class="shop-btn"
                                                        style="margin-left: 22rem;">Kirim Bid Anda</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <h3 class="text-center">Produk Lelang Masih Kosong</h3>
                                    <p class="text-center">Maaf ya, kami masih belum menambahkan produknya. Tapi dalam
                                        waktu dekat kami
                                        akan menambahkan beberapa produk untukmu, stay tune.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
