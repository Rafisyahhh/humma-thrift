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

        /* Include the CSS styles here */
        .dropdown-menu {
            background-color: #ffffff;
            /* border: 1px solid #ffffff; */
            /* border-radius: 0.25rem;
                                    padding: 0.5rem 0; */
        }

        .dropdown-menu .dropdown-item {
            padding: 0.5rem 1rem;
            color: #333;
            text-decoration: none;
        }

        .dropdown-menu .dropdown-item:hover,
        .dropdown-menu .dropdown-item:focus {
            background-color: #f0f0f0;
            color: #000;
        }

        .dropdown-menu .dropdown-item[style="color: red;"] {
            color: red;
        }

        .dropdown-menu hr {
            margin: 0.5rem 0;
            border: 0;
            border-top: 1px solid #ffffff;
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
                                    <h4 class="wrapper-heading">Semua Favorit</h4> <br><br>
                                    <div class="result ms-auto me-4">
                                        <h6 style="font-size: 1.5rem;">Urutkan</h6>
                                    </div>
                                    <div class= "btn-group mt-2">
                                        <div class="dropdown">
                                            <a class="css-71s6qs d-flex align-items-center gap-2" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span>Terbaru Disimpan</span>
                                                <i class="fas fa-chevron-down"></i>
                                            </a>
                                            <div class="btn-group">
                                                <div class="dropdown">
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                        style="width: 20rem; text-align: center; font-size: 16px;">
                                                        <li><a class="dropdown-item" href="#"
                                                                style="font-size: 16px;">Terbaru Disimpan</a></li>
                                                        <hr>
                                                        <li><a class="dropdown-item" href="#"
                                                                style="font-size: 16px;">Terlama Disimpan</a></li>
                                                        <hr>
                                                        <li><a class="dropdown-item" href="#"
                                                                style="font-size: 16px;">Ulasan Terbanyak</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="result mb-6">
                                <p><strong style="font-size: 1.5rem">({{ $countFavorite }})</strong><span> Barang</span></p>
                            </div>
                            @forelse ($product_favorite as $item)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="product-wrapper" data-aos="fade-up">
                                        <div class="product-img position-relative">
                                            <img src="{{ asset('storage/' . $item->product->thumbnail) }}" alt="product-img"
                                                class="object-fit-cover">
                                            <div class="dropdown position-absolute" style="right: 0; top: 0;">
                                                <a class="wishlist-link" href="#" role="button" id="wishlistDropdown"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h" style="color: #1c3879; font-size: 35px;"></i>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="wishlistDropdown">
                                                    <li>
                                                        <form action="{{ route('destroyProduct.destroy', $item->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirmDeletion('Apakah anda yakin ingin menghapus produk ini dari daftar favorit?', { cancel: () => event.preventDefault() })">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a role="button" type="submit" class="dropdown-item"
                                                                onclick="$(this).closest('form').submit()"
                                                                style="color: red;">Hapus Favorit</a>
                                                        </form>
                                                    </li>
                                                    <hr>
                                                    <li><a class="dropdown-item" href="#">Batal</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-description">
                                                <a href="" class="product-details"
                                                    style="font-size: 2rem">{{ $item->product->title }}
                                                </a>
                                                <div class="price">
                                                    <span class="new-price"
                                                        style="font-size: 1.8rem">Rp{{ number_format($item->product->price, null, null, '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-btn">
                                            <div></div>
                                            <form action="{{ route('storecart', $item->product->id) }}" method="POST">
                                                @csrf
                                                <button class="product-btn" type="submit">
                                                    <span>
                                                        <i class="fas fa-shopping-cart"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <h5 class="text-center" style="color: #a5a3ae">Produk Masih Kosong</h5>
                                    <p class="text-center" style="color: #a5a3ae">Maaf, anda masih belum menambahkan daftar
                                        favorit.</p>
                                </div>
                            @endforelse

                            {{-- <hr>
              <h4>Lelang</h4>
              @forelse ($product_auction as $item)
                <div class="col-lg-3 col-sm-6">
                  <div class="product-wrapper" data-aos="fade-up">
                    <div class="product-img position-relative">
                      <img src="{{ asset('storage/' . $item->productAuction->thumbnail) }}" alt="product-img"
                        class="object-fit-cover">
                      <div class="dropdown position-absolute" style="top: 0; right: 0;">
                        <a class="wishlist-link" href="#" role="button" id="wishlistDropdown"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fas fa-ellipsis-h"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="wishlistDropdown">
                          <li>
                            <form action="{{ route('destroyAuction.destroy', $item->id) }}" method="POST"
                              onsubmit="return confirmDeletion('Apakah anda yakin ingin menghapus produk ini dari daftar favorit?', event.preventDefault())">
                              @csrf
                              @method('DELETE')
                              <a role="button" type="submit" class="dropdown-item"
                                onclick="$(this).closest('form').submit()" style="color: red;">Hapus Favorit</a>
                            </form>
                          </li>
                          <hr>
                          <li><a class="dropdown-item" href="#">Batal</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="product-info">
                      <div class="product-description">
                        <a href="" class="product-details"
                          style="font-size: 2rem">{{ $item->productAuction->title }}
                        </a>
                        <div class="price">
                          <span class="new-price"
                            style="font-size: 1.8rem">Rp{{ number_format($item->productAuction->bid_price_start, null, null, '.') }}
                            - Rp{{ number_format($item->productAuction->bid_price_end, null, null, '.') }}
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="product-cart-btn mb-4">
                    </div>
                  </div>
                </div>
              @empty
                <div class="col-lg-12">
                  <h5 class="text-center" style="color: #a5a3ae">Produk Lelang Masih Kosong</h5>
                  <p class="text-center" style="color: #a5a3ae">Maaf, anda masih belum menambahkan daftar favorit.</p>
                </div>
              @endforelse --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
