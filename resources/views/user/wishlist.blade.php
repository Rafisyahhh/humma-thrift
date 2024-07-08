@extends('layouts.home')

@section('title', 'Wishlist')

@push('style')
    <style>
        a.wishlist-link {
            padding: 1rem 1.75rem;
            margin-right: auto;
        }

        .product-wrapper .product-cart-btn {
            left: 0;
            position: absolute;
            bottom: 1rem;
            right: 0;
            transition: all 0.4s;
            width: 100%;
            display: flex;
            justify-content: space-between;
            bottom: 0;
        }

    </style>
@endpush

@section('content')
    <section class="product product-sidebar footer-padding">
        <div class="container">
            <div class="row g-5">
                {{-- <div class="col-lg-3">
                    <div class="sidebar" data-aos="fade-right">
                        <h4 class="wrapper-heading">Semua Favorit</h4> <br><br>
                        <div class="sidebar-section">
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Kategori Produk</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        @foreach ($categories as $item)
                                            <li>
                                                <input type="checkbox" id="bags" name="bags">
                                                <label for="bags">{{ $item->title }}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Brands</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        @foreach ($brands as $item)
                                            <li>
                                                <input type="checkbox" id="bags" name="bags">
                                                <label for="bags">{{ $item->title }}</label>
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
                                        @foreach ($product as $item)
                                        <li>
                                            <input type="checkbox" id="navy" name="navy">
                                            <label for="navy">{{ $item->color }}</label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Ukuran</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        @foreach ($product as $item)
                                        <li>
                                            <input type="checkbox" id="2xl" name="2xl">
                                            <label for="2xl">{{ $item->size }}</label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col">
                    <div class="product-sidebar-section" data-aos="fade-up">
                        <div class="row g-5">
                            <div class="col-lg-12">
                                <div class="product-sorting-section p-0">
                                    <h4 class="wrapper-heading" style="">Semua Favorit</h4> <br><br>
                                    <div class="result ms-auto me-4">
                                        <h6 style="font-size: 1.5rem;">Urutkan</h6>
                                    </div>
                                    <div class= "btn-group mt-2">
                                        <div class="dropdown">
                                            <a class="css-71s6qs d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span>Terbaru Disimpan</span>
                                                <i class="fas fa-chevron-down"></i>
                                            </a>
                                            <div class="btn-group">
                                                <div class="dropdown">
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 20rem; text-align: center; font-size: 16px;">
                                                        <li><a class="dropdown-item" href="#" style="font-size: 16px;">Terbaru Disimpan</a></li><hr>
                                                        <li><a class="dropdown-item" href="#" style="font-size: 16px;">Terlama Disimpan</a></li><hr>
                                                        <li><a class="dropdown-item" href="#" style="font-size: 16px;">Ulasan Terbanyak</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="result mb-6">
                                    <p><strong style="font-size: 1.5rem">{{ $countFavorite }}</strong><span> Barang</span></p>
                                </div>
                                @forelse ($product_favorite as $item)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="product-wrapper" data-aos="fade-up">
                                        <div class="product-img">
                                            <img src="{{ asset("storage/".$item->product->thumbnail) }}" alt="product-img"
                                                class="object-fit-cover">
                                        </div>
                                        <div class="product-info">
                                            <div class="product-description">
                                                <a href="" class="product-details">{{ $item->product->title }}
                                                </a>
                                                <div class="price">
                                                    <span class="new-price">Rp {{ number_format($item->product->price, null, null, '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-btn">
                                            <div class="dropdown">
                                                <a class="wishlist-link" href="#" role="button" id="wishlistDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="wishlistDropdown">
                                                    <li><a class="dropdown-item" href="#">Hapus Favorit</a></li>
                                                    <hr>
                                                    <li><a class="dropdown-item" href="#">Batal</a></li>
                                                </ul>
                                            </div>

                                            <a href="/user/checkout" class="product-btn">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            @empty
                            <div class="col-lg-12">
                                <h3 class="text-center">Produk Masih Kosong</h3>
                                <p class="text-center">Maaf, anda masih belum menambahkan daftar favorit.</p>
                            </div>
                            @endforelse


                            <hr><h4>Lelang</h4>
                            @forelse ($product_auction as $item)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="product-wrapper" data-aos="fade-up">
                                        <div class="product-img">
                                            <img src="{{ asset("storage/".$item->productAuction->thumbnail) }}" alt="product-img"
                                                class="object-fit-cover">
                                        </div>
                                        <div class="product-info">
                                            <div class="product-description">
                                                <a href="" class="product-details">{{ $item->productAuction->title }}
                                                </a>
                                                <div class="price">
                                                    <span
                                                        class="new-price">Rp {{ number_format($item->productAuction->bid_price_start, null, null, '.') }}
                                                        - Rp {{ number_format($item->productAuction->bid_price_end, null, null, '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-btn">
                                            <div class="dropdown">
                                                <a class="wishlist-link" href="#" role="button" id="wishlistDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="wishlistDropdown">
                                                    <li><a class="dropdown-item" href="#">Hapus Favorit</a></li>
                                                    <hr>
                                                    <li><a class="dropdown-item" href="#">Batal</a></li>
                                                </ul>
                                            </div>

                                            <a href="/user/checkout" class="product-btn">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            <div class="col-lg-12">
                                <h3 class="text-center">Produk Lelang Masih Kosong</h3>
                                <p class="text-center">Maaf, anda masih belum menambahkan daftar favorit.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
