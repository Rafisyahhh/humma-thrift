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
                <div class="col">
                    <div class="product-sidebar-section" data-aos="fade-up">
                        <div class="row g-5">
                            <div class="col-lg-12">
                                <div class="product-sorting-section p-0">
                                    <h4 class="wrapper-heading">Semua Favorit</h4> <br><br>
                                    <div class="result ms-auto me-4">
                                        <h6 style="font-size: 1.5rem;">Urutkan</h6>
                                    </div>
                                    <div class="btn-group mt-12">
                                        <select id="sortSelect" class="form-select" style="width: 18rem; font-size: 15px;"
                                            onchange="applyFilter(this.value)">
                                            <option value="newest"
                                                {{ request()->get('sortOrder') == 'newest' ? 'selected' : '' }}>Terbaru
                                                Disimpan</option>
                                            <option value="oldest"
                                                {{ request()->get('sortOrder') == 'oldest' ? 'selected' : '' }}>Terlama
                                                Disimpan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="result mb-6">
                                @if ($countFavorite > 0)
                                    <p><strong style="font-size: 1.5rem">({{ $countFavorite }})</strong><span> Barang</span>
                                    </p>
                                @else
                                    <p><strong style="font-size: 1.5rem">Tidak ada barang</strong></p>
                                @endif
                            </div>

                            <div id="produk" class="row g-5">
                                {{-- @forelse ($product_favorite as $item)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="product-wrapper" data-aos="fade-up">
                                        <div class="product-img position-relative">
                                            <img src="{{ asset('storage/' . $item->product->thumbnail) }}" alt="product-img"
                                                class="object-fit-cover">
                                            <div class="dropdown position-absolute" style="right: 0; top: 0;">
                                                <a class="wishlist-link" href="#" role="button" id="wishlistDropdown"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h"
                                                        style="color: #1c3879; font-size: 30px;"></i>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="wishlistDropdown">
                                                    <li>
                                                        <form action="{{ route('destroyProduct.destroy', $item->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirmDeletion('Apakah anda yakin ingin menghapus produk ini dari daftar favorit?', (() => { event.preventDefault(); this.submit()}))">
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
                                                <a href="{{ route('store.product.detail', ['store' => $item->product->userStore->username, 'product' => $item->product->slug]) }}"
                                                    class="product-details"
                                                    style="font-size: 1.85rem">{{ $item->product->title }}
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
                                <div class="col-lg-12 d-flex flex-column align-items-center">
                                    <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong"
                                        style="width: 200px; height: 200px;">
                                    <h5 class="text-center" style="color: #000000">Produk Masih Kosong</h5>
                                    <p class="text-center" style="color: #000000">Maaf, anda masih belum menambahkan daftar
                                        favorit.</p>
                                </div>
                            @endforelse --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')

    <script>
        applyFilter('newest')

        function applyFilter(value, e = null) {
            if (e !== null) {
                e.preventDefault()

            }
            $.ajax({
                url: '{{ route('user.wishlist') }}',
                type: 'GET',
                data: {
                    filter: value
                },
                success: function(data) {
                    $('#produk').html(data);
                },
                error: function() {
                    alert('Terjadi kesalahan saat memfilter konten.');
                }
            });
        }
    </script>

@endsection
