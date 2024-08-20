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

        .dropdown-menu {
            background-color: #ffffff;
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
                                        <h6 style="font-size: 1.50rem; height: 12px;">Urutkan</h6>
                                    </div>
                                    <div class="filter mt-12">
                                        <select id="sortSelect" class="form-select form-select-lg" style="width: 17rem; font-size: 14px; border: 2px solid #1c3879;"
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
