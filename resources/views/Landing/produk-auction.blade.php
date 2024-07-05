@extends('layouts.home')

@section('title', 'Product')
@section('style')
    <style>
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
    </style>
@endsection
@section('content')

    {{-- <p>Anda telah menjadi pemenang lelang untuk produk {{ $auctions->productauctions->title }} yang dibuat oleh {{ $auction->user->name }}.</p>
<p>Silakan <a href="{{ url('/product/auction' . $auctions->product_auction->id) }}">klik di sini</a> untuk melihat detail produk.</p>
<p>Terima kasih telah berpartisipasi dalam lelang kami.</p> --}}
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
                                        @php
                                            $user = Auth::user();
                                            if ($user) {
                                                $existingAuction = App\Models\auctions::where('user_id', Auth::id())
                                                ->where('product_auction_id', $item->id)
                                                ->first();
                                                $auctions = App\Models\Auctions::where('user_id', $user->id)->where('product_auction_id', $item->id)->first();
                                            }
                                            $auctionproduct = App\Models\Auctions::where('product_auction_id', $item->id)->where('status', 1)->first();

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
                                                <a data-id="{{ $item->id }}" class="product-btn openModal">
                                                    Lelang Berakhir</a>
                                            </div>
                                            @else
                                            <div class="product-cart-btn">
                                                <a data-id="{{ $item->id }}" class="product-btn openModal">Ikuti
                                                    Lelang</a>
                                            </div>
                                            @endif
                                        @else
                                        <div class="product-cart-btn">
                                            <a href="{{ url('login') }}" class="product-btn openModal">Ikuti
                                                Lelang</a>
                                        </div>
                                        @endif

                                        <div id="reviewModal-{{ $item->id }}" class="modal" style="display: none;">
                                            <div class="modal-content">
                                                <button class="close"
                                                    style="float: right; text-align: end;">&times;</button>
                                                    @if ($user)


                                                @if ($existingAuction)
                                                    <p style="text-align: center; font-size :20px; font-weight:bold; margin-top:2rem;">Anda sudah mengikuti lelang</p>
                                                    <p style="text-align: center; margin-bottom:2rem;">bid lelang anda : {{ $auctions->auction_price }}</p>
                                                @elseif ($auctionproduct)
                                                    <p style="text-align: center; font-size :20px; font-weight:bold; margin-top: 2rem; margin-bottom:2rem;">lelang sudah berakhir</p>
                                                @else
                                                    <h4 style="text-align: center;">Bid Lelang</h4>
                                                    <form id="auctionForm-{{ $item->id }}" method="post"
                                                        action="{{ route('user.auctions.store') }}" class="mt-5">
                                                        @csrf
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $item->id }}">
                                                        <label for="auction_price" class="form-label"
                                                            style="font-size: 18px;">Bid Lelang :</label> <br>
                                                        <input type="number" name="auction_price"
                                                            class="form-control @error('auction_price') is-invalid @enderror"
                                                            placeholder="Masukkan Bid Lelang anda"
                                                            style="font-size: 17px;">
                                                        <p style="margin-top: 5px;margin-left:6px;font-size:12px;color: #7c7c7c;">
                                                            Bid : Rp{{ number_format($item->bid_price_start, null, null, '.') }}
                                                            -
                                                            Rp{{ number_format($item->bid_price_end, null, null, '.') }}</p>
                                                        @error('auction_price')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <button type="submit" class="shop-btn"
                                                            style="margin-left: 22rem;">Kirim Bid Anda</button>
                                                    </form>
                                                @endif
                                                @endif

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
@section('script')

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
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
@endsection
