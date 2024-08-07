@extends('layouts.panel')

@section('title', 'Produk')

@section('style')
  <style>
    .modal-lelang {
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
      max-width: 125rem;
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

    button {
      font-size: 15px;
    }

    .product-details table {
      width: 100%;
      border-collapse: collapse;
      /* Menghilangkan jarak antar sel */
    }

    .product-details th,
    .product-details td {
      text-align: left;
      padding: 10px;
      color: rgba(0, 0, 0, 0.4);
      /* Warna teks abu-abu */
    }

    .product-details th {
      font-weight: normal;
      font-size: 17px;
    }

    .product-details .inner-text {
      font-size: 17px;
      color: rgba(0, 0, 0, 0.7);
      /* Warna teks sedikit lebih gelap untuk kontras */
    }

    .ribbon-status {
      z-index: 5;
      position: absolute;
      width: 25rem;
      top: 2.5rem;
      left: -8rem;
      padding: .25rem;
      transform: rotate(-45deg);
      font-size: 1.875rem;
      text-align: center;
      text-transform: uppercase;
    }

    .ribbon-status.danger {
      background: red;
      color: white;
    }

    .product-wrapper .product-cart-btn {
      position: absolute;
      bottom: 0;
      right: 0;
    }

    /* Ensure the dropdown is hidden by default */
    .product-cart-items .dropdown-menu {
      display: none;
      position: absolute;
      top: 0;
      right: 100%;
      margin-top: 3px;
      margin-right: 3px;
    }

    /* Show the dropdown menu when the icon is hovered */
    .product-cart-items:hover .dropdown-menu,
    .product-cart-items .dropdown-menu:hover {
      display: block;
    }

    .product-cart-btn {
      position: relative;
    }

    .favorite-cart-container {
      position: absolute;
      bottom: 5px;
      left: 10px;
      display: flex;
      gap: 1rem;
      flex-direction: column;
      padding: 1rem;
    }

    .favorite-cart-icon {
      display: flex;
      align-items: center;
    }

    .favorite-cart-icon .badge {
      position: absolute;
      top: -8px;
      right: 41px;
      background-color: #1c3879;
      color: white;
      border-radius: 50%;
      padding: 1px 6px;
      font-size: 0.55em;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 18px;
      height: 18px;
      line-height: 18px;
    }

    .product-btn {
      display: inline-block;
    }

    .product-wrapper {
      height: unset;
    }

    .product-wrapper .product-info {
      font-size: 2px;
      margin: 1.5rem 3rem 8rem;
    }
  </style>
@endsection

@section('content')
  @include('components.sweetalert')
  <div class="wishlist">
    <div class="d-flex mb-4 justify-content-between align-items-center">
      <h5 class="mb-0">Data Produk</h5>
      <a href="{{ route('seller.product.create') }}" class="shop-btn float-left mb-4" style="color: white;">Tambah
        Produk</a>
    </div>

    <div class="cart-section wishlist-section row gy-5">
      @foreach ($products as $item)
        @if ($item->status == 'active')
          <div class="col-lg-4 col-sm-6">
            <div class="product-wrapper" data-aos="fade-up">
              <div class="product-img" style="background-color:black">
                <img src="{{ asset("storage/$item->thumbnail") }}" alt="product-img" class="object-fit-cover"
                  @style(['opacity: 0.4;' => $item->status != 'active'])>
                @if ($item->status != 'active')
                  <div class="ribbon-status danger">
                    {{ $item->status }}
                  </div>
                @endif

                <div class="product-cart-items dropstart dropdown-hover"
                  style="top: 0; transform: translate(0, 0); bottom: unset; left: unset; right: 0; opacity: unset; visibility: unset; transition: unset;">
                  <a type="button" class="favourite cart-item">
                    <span>
                      <i class="fas fa-solid fa-bars"></i>
                    </span>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <form action="{{ route('seller.product.edit', $item->id) }}" method="get">
                        <button class="dropdown-item" type="submit">Edit</button>
                      </form>
                    </li>
                    <li>
                      <form action="{{ route('seller.product.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item" type="submit">Hapus</button>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="product-info">
                <div class="product-description">
                  <a role="button" class="product-details">{{ $item->title }}</a>
                  <div class="price">
                    <p class="new-price fs-4 fw-bold">Rp.
                      {{ number_format($item->price, null, null, '.') }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="product-cart-btn">
                <a role="button" class="product-btn" data-bs-toggle="modal"
                  data-bs-target="#detailModal{{ $item->id }}">Detail</a>
              </div>
              {{-- FAVORITE --}}
              <div class="favorite-cart-container">
                <a role="button" data-bs-toggle="modal" data-bs-target="#favoriteModal{{ $item->id }}"
                  class="favorite-cart-icon" style="position: relative; display: inline-block; height: 2rem; ">
                  @if (isset($countFavorite[$item->id]))
                    <span style="background-color: unset">
                      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                        <path fill="#1c3879"
                          d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812T2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412t-2.625 2.963T13.45 19.7zm0-2.7q2.4-2.15 3.95-3.687t2.45-2.675t1.25-2.026T20 8.15q0-1.5-1-2.5t-2.5-1q-1.175 0-2.175.662T12.95 7h-1.9q-.375-1.025-1.375-1.687T7.5 4.65q-1.5 0-2.5 1t-1 2.5q0 .875.35 1.763t1.25 2.025t2.45 2.675T12 18.3m0-6.825" />
                      </svg>
                    </span>
                    <span
                      style="margin-left:0.5px; font-size: 15px; background-color: unset; color: #797979;">Favorit</span>
                    <span
                      style="margin-left:0.5px; font-size: 15px; background-color: unset; color: #797979;">({{ $countFavorite[$item->id] }})</span>
                    {{-- <p><i class="fas fa-heart" style="font-size: 1.1em; color: red;"></i> {{ $countFavorite[$item->id] }} orang menyukai produk ini<span style="background-color: unset"> </span></p> --}}

                    {{-- <i class="fas fa-heart" style="font-size: 1.2em;"></i> --}}
                    {{-- @if (isset($countFavorite[$item->id])) --}}
                    {{-- <span class="badge">{{ $countFavorite[$item->id] }}</span> --}}

                    <div class="modal fade" id="favoriteModal{{ $item->id }}" tabindex="-1"
                      aria-labelledby="favoriteModalLabel{{ $item->id }}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="favoriteModalLabel{{ $item->id }}">
                              {{ $item->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>User Name</th>
                                  <th>Waktu</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse ($favorites as $fav)
                                  @if ($fav->product_id == $item->id)
                                    <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $fav->user?->username }}</td>
                                      <td>{{ \Carbon\Carbon::parse($fav->created_at)->format('d M Y H:i') }}
                                      </td>
                                    </tr>
                                  @endif
                                @empty
                                  <tr>
                                    <td colspan="3">Tidak ada data</td>
                                  </tr>
                                @endforelse
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
                </a>
                {{-- CART --}}
                <a role="button" data-bs-toggle="modal" data-bs-target="#cartModal{{ $item->id }}"
                  class="favorite-cart-icon">
                  @if (isset($countCart[$item->id]))
                    {{-- <p><i class="fas fa-shopping-cart"
                                        style="font-size: 1em; margin-left: 1rem; color: #1b336b;"></i> Keranjang<span
                                        style="background-color: unset">({{ $countCart[$item->id] }})</span></p> --}}
                    <span style="background-color: unset">
                      <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 36 36">
                        <circle cx="13.33" cy="29.75" r="2.25" fill="#1b336b"
                          class="clr-i-outline clr-i-outline-path-1" stroke="#1b336b" stroke-width="1" />
                        <circle cx="27" cy="29.75" r="2.25" fill="#1b336b"
                          class="clr-i-outline clr-i-outline-path-2" stroke="#1b336b" stroke-width="1" />
                        <path fill="#1b336b"
                          d="M33.08 5.37a1 1 0 0 0-.77-.37H11.49l.65 2H31l-2.67 12h-15L8.76 4.53a1 1 0 0 0-.66-.65L4 2.62a1 1 0 1 0-.59 1.92L7 5.64l4.59 14.5l-1.64 1.34l-.13.13A2.66 2.66 0 0 0 9.74 25A2.75 2.75 0 0 0 12 26h16.69a1 1 0 0 0 0-2H11.84a.67.67 0 0 1-.56-1l2.41-2h15.44a1 1 0 0 0 1-.78l3.17-14a1 1 0 0 0-.22-.85"
                          class="clr-i-outline clr-i-outline-path-3" stroke="#1b336b" stroke-width="1" />
                        <path fill="none" d="M0 0h36v36H0z" />
                      </svg>
                    </span>
                    <span
                      style="margin-left: 5px; font-size: 15px; background-color: unset; color: #797979;">Keranjang</span>
                    <span
                      style="margin-left: 2.8rem; font-size: 15px; background-color: unset; color: #797979;">({{ $countCart[$item->id] }})</span>

                    {{-- <i class="fas fa-shopping-cart" style="font-size: 1.1em;">{{ count($countCart) }} test</i> --}}
                    {{-- <span class="badge">{{ $countCart[$item->id] }}</span> --}}
                    <div class="modal fade" id="cartModal{{ $item->id }}" tabindex="-1"
                      aria-labelledby="cartModalLabel{{ $item->id }}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="cartModalLabel{{ $item->id }}">
                              {{ $item->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>User Name</th>
                                  <th>Waktu</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php $lfavoriteIndex = 1; @endphp
                                @foreach ($carts as $cart)
                                  @if ($cart->product_id == $item->id)
                                    <tr>
                                      <td>{{ $lfavoriteIndex++ }}</td>
                                      <td>{{ $cart->user->username }}</td>
                                      <td>{{ \Carbon\Carbon::parse($cart->created_at)->format('d M Y H:i') }}
                                      </td>
                                    </tr>
                                  @endif
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
                </a>
              </div>
            </div>
          </div>
        @endif
      {{-- @empty
        <div class="col-lg-12 d-flex flex-column align-items-center">
          <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;">
          <h5 class="text-center" style="color: #000000">Upss..</h5>
          <p class="text-center" style="color: #000000">Maaf, anda belum menambahkan produk apapun</p>
        </div> --}}
      @endforeach

      @if ($products->isEmpty() && $product_auctions->isEmpty())
      <div class="col-lg-12 d-flex flex-column align-items-center">
        <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;">
        <h5 class="text-center" style="color: #000000">Upss..</h5>
        <p class="text-center" style="color: #000000">Maaf, anda belum menambahkan produk apapun</p>
      </div>
      @endif

      {{-- LELANG --}}
      @foreach ($product_auctions as $item)
        @if ($item->status == 'active')
          <div class="col-lg-4 col-sm-6">
            <div class="product-wrapper" data-aos="fade-up">
              <div class="product-img" style="background-color:black">
                <img src="{{ asset("storage/$item->thumbnail") }}" alt="product-img" class="object-fit-cover"
                  @style(['opacity: 0.4;' => $item->status != 'active'])>
                @if ($item->status != 'active')
                  <div class="ribbon-status danger">
                    {{ $item->status }}
                  </div>
                @endif
                <div class="product-cart-items dropstart"
                  style="top: 0;transform: translate(0, 0); bottom: unset; left: unset; right: 0; opacity: unset; visibility: unset; transition: unset;">
                  <a type="button" class="favourite cart-item" data-bs-toggle="dropdown">
                    <span>
                      <i class="fas fa-solid fa-bars"></i>
                    </span>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <form action="{{ route('seller.productauction.edit', $item->id) }}" method="get">
                        <button class="dropdown-item" type="submit">Edit</button>
                      </form>
                    </li>
                    <li>
                      <form action="{{ route('seller.productauction.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item" type="submit">Hapus</button>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="product-info">
                <div class="product-description">
                  <a role="button" class="product-details">{{ $item->title }}</a>
                  <div class="price">
                    <p class="new-price fs-4 fw-bold">Rp.
                      {{ number_format($item->bid_price_start, null, null, '.') }}-Rp.
                      {{ number_format($item->bid_price_end, null, null, '.') }}</p>
                  </div>
                </div>
              </div>
              <div class="product-cart-btn">
                {{-- <a role="button" class="product-btn" data-bs-toggle="modal"
                           data-bs-target="#detailLelang{{ $item->id }}">Lelang</a> --}}
                <a data-id="{{ $item->id }}" class="product-btn openModal">Lelang</a>

                <a role="button" class="product-btn" data-bs-toggle="modal"
                  data-bs-target="#detailLelangModal{{ $item->id }}"
                  style="border-top-left-radius: 0; margin-left:-4px;">Detail</a>

              </div>
              <div class="favorite-cart-container">
                <a role="button" data-bs-toggle="modal" data-bs-target="#lfavoriteModal{{ $item->id }}"
                  class="favorite-cart-icon" style="position: relative; display: inline-block;">
                  {{-- <i class="fas fa-heart" style="font-size: 1em; color: red;"></i> --}}
                  @if (isset($countLFavorite[$item->id]))
                    <span class="badge">{{ $countLFavorite[$item->id] }}</span>
                    <div class="modal fade" id="lfavoriteModal{{ $item->id }}" tabindex="-1"
                      aria-labelledby="lfavoriteModalLabel{{ $item->id }}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="lfavoriteModalLabel{{ $item->id }}">
                              {{ $item->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>User Name</th>
                                  <th>Waktu</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php $favoriteIndex = 1; @endphp
                                @foreach ($favorites as $fav)
                                  @if ($fav->product_auction_id == $item->id)
                                    <tr>
                                      <td>{{ $favoriteIndex++ }}</td>
                                      <td>{{ $fav->user->username }}</td>
                                      <td>{{ \Carbon\Carbon::parse($fav->created_at)->format('d M Y H:i') }}
                                      </td>
                                    </tr>
                                  @endif
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
                </a>
              </div>
            </div>
          </div>
        @endif
      @endforeach
      {{-- sold out --}}
      @foreach ($products as $item)
        @if ($item->status == 'sold')
          <div class="col-lg-4 col-sm-6">
            <div class="product-wrapper" data-aos="fade-up">
              <div class="product-img" style="background-color:black">
                <img src="{{ asset("storage/$item->thumbnail") }}" alt="product-img" class="object-fit-cover"
                  @style(['opacity: 0.4;' => $item->status != 'active'])>
                @if ($item->status != 'active')
                  <div class="ribbon-status danger">
                    {{ $item->status }}
                  </div>
                @endif

                <div class="product-cart-items dropstart dropdown-hover"
                  style="top: 0; transform: translate(0, 0); bottom: unset; left: unset; right: 0; opacity: unset; visibility: unset; transition: unset;">
                  <a type="button" class="favourite cart-item">
                    <span>
                      <i class="fas fa-solid fa-bars"></i>
                    </span>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <form action="{{ route('seller.product.edit', $item->id) }}" method="get">
                        <button class="dropdown-item" type="submit">Edit</button>
                      </form>
                    </li>
                    <li>
                      <form action="{{ route('seller.product.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item" type="submit">Hapus</button>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="product-info">
                <div class="product-description">
                  <a role="button" class="product-details">{{ $item->title }}</a>
                  <div class="price">
                    <p class="new-price fs-4 fw-bold">Rp.
                      {{ number_format($item->price, null, null, '.') }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="product-cart-btn">
                <a role="button" class="product-btn" data-bs-toggle="modal"
                  data-bs-target="#detailModal{{ $item->id }}">Detail</a>
              </div>
              {{-- FAVORITE --}}
              <div class="favorite-cart-container">
                <a role="button" data-bs-toggle="modal" data-bs-target="#favoriteModal{{ $item->id }}"
                  class="favorite-cart-icon" style="position: relative; display: inline-block; height: 2rem; ">
                  @if (isset($countFavorite[$item->id]))
                    <span style="background-color: unset">
                      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                        <path fill="#1c3879"
                          d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812T2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412t-2.625 2.963T13.45 19.7zm0-2.7q2.4-2.15 3.95-3.687t2.45-2.675t1.25-2.026T20 8.15q0-1.5-1-2.5t-2.5-1q-1.175 0-2.175.662T12.95 7h-1.9q-.375-1.025-1.375-1.687T7.5 4.65q-1.5 0-2.5 1t-1 2.5q0 .875.35 1.763t1.25 2.025t2.45 2.675T12 18.3m0-6.825" />
                      </svg>
                    </span>
                    <span
                      style="margin-left:0.5px; font-size: 15px; background-color: unset; color: #797979;">Favorit</span>
                    <span
                      style="margin-left:0.5px; font-size: 15px; background-color: unset; color: #797979;">({{ $countFavorite[$item->id] }})</span>
                    {{-- <p><i class="fas fa-heart" style="font-size: 1.1em; color: red;"></i> {{ $countFavorite[$item->id] }} orang menyukai produk ini<span style="background-color: unset"> </span></p> --}}

                    {{-- <i class="fas fa-heart" style="font-size: 1.2em;"></i> --}}
                    {{-- @if (isset($countFavorite[$item->id])) --}}
                    {{-- <span class="badge">{{ $countFavorite[$item->id] }}</span> --}}

                    <div class="modal fade" id="favoriteModal{{ $item->id }}" tabindex="-1"
                      aria-labelledby="favoriteModalLabel{{ $item->id }}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="favoriteModalLabel{{ $item->id }}">
                              {{ $item->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>User Name</th>
                                  <th>Waktu</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($favorites as $fav)
                                  @if ($fav->product_id == $item->id)
                                    <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $fav->user->username }}</td>
                                      <td>{{ \Carbon\Carbon::parse($fav->created_at)->format('d M Y H:i') }}
                                      </td>
                                    </tr>
                                  @endif
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
                </a>
                {{-- CART --}}
                <a role="button" data-bs-toggle="modal" data-bs-target="#cartModal{{ $item->id }}"
                  class="favorite-cart-icon">
                  @if (isset($countCart[$item->id]))
                    {{-- <p><i class="fas fa-shopping-cart"
                                        style="font-size: 1em; margin-left: 1rem; color: #1b336b;"></i> Keranjang<span
                                        style="background-color: unset">({{ $countCart[$item->id] }})</span></p> --}}
                    <span style="background-color: unset">
                      <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 36 36">
                        <circle cx="13.33" cy="29.75" r="2.25" fill="#1b336b"
                          class="clr-i-outline clr-i-outline-path-1" stroke="#1b336b" stroke-width="1" />
                        <circle cx="27" cy="29.75" r="2.25" fill="#1b336b"
                          class="clr-i-outline clr-i-outline-path-2" stroke="#1b336b" stroke-width="1" />
                        <path fill="#1b336b"
                          d="M33.08 5.37a1 1 0 0 0-.77-.37H11.49l.65 2H31l-2.67 12h-15L8.76 4.53a1 1 0 0 0-.66-.65L4 2.62a1 1 0 1 0-.59 1.92L7 5.64l4.59 14.5l-1.64 1.34l-.13.13A2.66 2.66 0 0 0 9.74 25A2.75 2.75 0 0 0 12 26h16.69a1 1 0 0 0 0-2H11.84a.67.67 0 0 1-.56-1l2.41-2h15.44a1 1 0 0 0 1-.78l3.17-14a1 1 0 0 0-.22-.85"
                          class="clr-i-outline clr-i-outline-path-3" stroke="#1b336b" stroke-width="1" />
                        <path fill="none" d="M0 0h36v36H0z" />
                      </svg>
                    </span>
                    <span
                      style="margin-left: 5px; font-size: 15px; background-color: unset; color: #797979;">Keranjang</span>
                    <span
                      style="margin-left: 2.8rem; font-size: 15px; background-color: unset; color: #797979;">({{ $countCart[$item->id] }})</span>

                    {{-- <i class="fas fa-shopping-cart" style="font-size: 1.1em;">{{ count($countCart) }} test</i> --}}
                    {{-- <span class="badge">{{ $countCart[$item->id] }}</span> --}}
                    <div class="modal fade" id="cartModal{{ $item->id }}" tabindex="-1"
                      aria-labelledby="cartModalLabel{{ $item->id }}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="cartModalLabel{{ $item->id }}">
                              {{ $item->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>User Name</th>
                                  <th>Waktu</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php $lfavoriteIndex = 1; @endphp
                                @foreach ($carts as $cart)
                                  @if ($cart->product_id == $item->id)
                                    <tr>
                                      <td>{{ $lfavoriteIndex++ }}</td>
                                      <td>{{ $cart->user->username }}</td>
                                      <td>{{ \Carbon\Carbon::parse($cart->created_at)->format('d M Y H:i') }}
                                      </td>
                                    </tr>
                                  @endif
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
                </a>
              </div>
            </div>
          </div>
        @endif
      @endforeach

      {{-- LELANG --}}
      @foreach ($product_auctions as $item)
        @if ($item->status == 'sold')
          <div class="col-lg-4 col-sm-6">
            <div class="product-wrapper" data-aos="fade-up">
              <div class="product-img" style="background-color:black">
                <img src="{{ asset("storage/$item->thumbnail") }}" alt="product-img" class="object-fit-cover"
                  @style(['opacity: 0.4;' => $item->status != 'active'])>
                @if ($item->status != 'active')
                  <div class="ribbon-status danger">
                    {{ $item->status }}
                  </div>
                @endif
                <div class="product-cart-items dropstart"
                  style="top: 0;transform: translate(0, 0); bottom: unset; left: unset; right: 0; opacity: unset; visibility: unset; transition: unset;">
                  <a type="button" class="favourite cart-item" data-bs-toggle="dropdown">
                    <span>
                      <i class="fas fa-solid fa-bars"></i>
                    </span>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <form action="{{ route('seller.productauction.edit', $item->id) }}" method="get">
                        <button class="dropdown-item" type="submit">Edit</button>
                      </form>
                    </li>
                    <li>
                      <form action="{{ route('seller.productauction.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item" type="submit">Hapus</button>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="product-info">
                <div class="product-description">
                  <a role="button" class="product-details">{{ $item->title }}</a>
                  <div class="price">
                    <p class="new-price fs-4 fw-bold">Rp.
                      {{ number_format($item->bid_price_start, null, null, '.') }}-Rp.
                      {{ number_format($item->bid_price_end, null, null, '.') }}</p>
                  </div>
                </div>
              </div>
              <div class="product-cart-btn">
                {{-- <a role="button" class="product-btn" data-bs-toggle="modal"
                           data-bs-target="#detailLelang{{ $item->id }}">Lelang</a> --}}
                <a data-id="{{ $item->id }}" class="product-btn openModal">Lelang</a>

                <a role="button" class="product-btn" data-bs-toggle="modal"
                  data-bs-target="#detailLelangModal{{ $item->id }}"
                  style="border-top-left-radius: 0; margin-left:-4px;">Detail</a>

              </div>
              <div class="favorite-cart-container">
                <a role="button" data-bs-toggle="modal" data-bs-target="#lfavoriteModal{{ $item->id }}"
                  class="favorite-cart-icon" style="position: relative; display: inline-block;">
                  {{-- <i class="fas fa-heart" style="font-size: 1em; color: red;"></i> --}}
                  @if (isset($countLFavorite[$item->id]))
                    <span class="badge">{{ $countLFavorite[$item->id] }}</span>
                    <div class="modal fade" id="lfavoriteModal{{ $item->id }}" tabindex="-1"
                      aria-labelledby="lfavoriteModalLabel{{ $item->id }}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="lfavoriteModalLabel{{ $item->id }}">
                              {{ $item->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>User Name</th>
                                  <th>Waktu</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php $favoriteIndex = 1; @endphp
                                @foreach ($favorites as $fav)
                                  @if ($fav->product_auction_id == $item->id)
                                    <tr>
                                      <td>{{ $favoriteIndex++ }}</td>
                                      <td>{{ $fav->user->username }}</td>
                                      <td>{{ \Carbon\Carbon::parse($fav->created_at)->format('d M Y H:i') }}
                                      </td>
                                    </tr>
                                  @endif
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
                </a>
              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
    @if ($products == null && $product_auctions == null)
      <div class="align-items-center" style="margin-top: 40px;margin-bottom: 30px;">
        <h5 class="text-center mb-0 border-bottom border-dark" style="color: #767979">Belum Ada Produk yang diTambahkan
        </h5>
      </div>
    @endif
  </div>



  {{-- <div id="favoriteModal{{ $item->id }}" class="modal-favorite" style="display: none;">
    <div class="modal-content">
      <button class="close" style="float: right; text-align: end;">&times;</button>
      <h3 style="text-align: center">{{ $item->title }}</h3>
      <hr>
      <table style="width:120rem;">
        <tbody>
          <tr class="table-row table-top-row">
            <td class="table-wrapper">
              <div class="table-wrapper-center">
                <h5 class="table-heading">NO</h5>
              </div>
            </td>
            <td class="table-wrapper">
              <div class="table-wrapper-center">
                <h5 class="table-heading">USER NAME</h5>
              </div>
            </td>
            <td class="table-wrapper">
              <div class="table-wrapper-center">
                <h5 class="table-heading">WAKTU</h5>
              </div>
            </td>
          </tr>
          @foreach ($favorite as $item)
            <tr class="table-row ticket-row">
              <td class="table-wrapper">
                <div class="table-wrapper-center">
                  <h5 class="heading">{{ $loop->iteration }}</h5>
                </div>
              </td>
              <td class="table-wrapper">
                <div class="table-wrapper-center">
                  <h5 class="heading">{{ $item->user->username }}</h5>
                </div>
              </td>
              <td class="table-wrapper">
                <div class="table-wrapper-center">
                  <h5 class="heading">{{ $item->user->created_at }}</h5>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div> --}}

  {{-- Detail --}}
  @foreach ($products as $item)
    <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
      aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true" style="height: 99%;">
      <div class="modal-dialog" style="margin-left: auto;">
        <div class="login-section account-section p-0">
          <div class="review-form m-0" style="height: 80%; width: 95rem;">
            <div class="text-end mb-4">
              <div class="close-btn">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            </div>
            <section class="product product-info" style="width:85rem; height:60%;">
              <div class="row ">
                <div class="col-md-6">
                  <div class="product-info-img" data-aos="fade-right">
                    <div class="swiper product-top" style="height:50rem;">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide slider-top-img">
                          <img src="{{ asset("storage/$item->thumbnail") }}" alt="img" class="object-fit-cover">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="product-info-content" data-aos="fade-left">
                    <h5>{{ $item->title }}</h5>
                    <div class="price">
                      <span class="new-price" style="font-size: 2rem; color: blue">Rp.
                        {{ number_format($item->price, null, null, '.') }}</span>
                    </div>
                    <hr>
                    <div class="product-details">
                      <table>
                        <tr>
                          <th>Kategori</th>
                          <td><span
                              class="inner-text">{{ implode(', ', array_column($item->categories->toArray(), 'title')) }}</span>
                          </td>
                        </tr>
                        <tr>
                          <th>Brand</th>
                          <td><span class="inner-text">{{ $item->brand->title }}</span></td>
                        </tr>
                        <tr>
                          <th>Ukuran</th>
                          <td><span class="inner-text">{{ $item->size }}</span></td>
                        </tr>
                        <tr>
                          <th>Warna</th>
                          <td><span class="inner-text">{{ $item->color }}</span></td>
                        </tr>
                        <tr>
                          <th>Deskripsi</th>
                          <th colspan="2"><span class="inner-text">{{ $item->description }}</span>
                          </th>
                        </tr>
                        <tr>
                          <th>Status</th>
                          <td><span class="inner-status" style="color: red">{{ $item->status }}</span></td>
                        </tr>
                      </table>
                    </div>
                    <hr>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  {{-- Detail-lelang --}}
  @foreach ($product_auctions as $item)
    <div class="modal fade" id="detailLelangModal{{ $item->id }}" tabindex="-1"
      aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true" style="height: 99%;">
      <div class="modal-dialog" style="margin-left: auto;">
        <div class="login-section account-section p-0">
          <div class="review-form m-0" style="height: 80%; width: 95rem;">
            <div class="text-end mb-4">
              <div class="close-btn">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            </div>
            <section class="product product-info" style="width:85rem; height:60%;">
              <div class="row ">
                <div class="col-md-6">
                  <div class="product-info-img" data-aos="fade-right">
                    <div class="swiper product-top" style="height:50rem;">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide slider-top-img">
                          <img src="{{ asset("storage/$item->thumbnail") }}" alt="img" class="object-fit-cover">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="product-info-content" data-aos="fade-left">
                    <h5>{{ $item->title }}</h5>
                    <div class="price">
                      <span class="new-price" style="font-size: 2rem; color: blue">Rp.
                        {{ number_format($item->bid_price_start, null, null, '.') }}-Rp.
                        {{ number_format($item->bid_price_end, null, null, '.') }}</span>
                    </div>
                    <hr>
                    <div class="product-details">
                      <table>
                        <tr>
                          <th>Kategori</th>
                          <td><span
                              class="inner-text">{{ implode(', ', array_column($item->categories->toArray(), 'title')) }}</span>
                          </td>
                        </tr>
                        <tr>
                          <th>Brand</th>
                          <td><span class="inner-text">{{ $item->brand->title }}</span></td>
                        </tr>
                        <tr>
                          <th>Ukuran</th>
                          <td><span class="inner-text">{{ $item->size }}</span></td>
                        </tr>
                        <tr>
                          <th>Warna</th>
                          <td><span class="inner-text">{{ $item->color }}</span></td>
                        </tr>
                        <tr>
                          <th>Deskripsi</th>
                          <th colspan="2"><span class="inner-text">{{ $item->description }}</span>
                          </th>
                        </tr>
                        <tr>
                          <th>Status</th>
                          <td><span class="inner-status" style="color: red">{{ $item->status }}</span></td>
                        </tr>
                      </table>
                    </div>
                    <hr>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  @endforeach


  @foreach ($product_auctions as $item)
    <div id="reviewModal{{ $item->id }}" class="modal-lelang" style="display: none;">
      <div class="modal-content">
        <button class="close" style="float: right; text-align: end;">&times;</button>
        <h3 style="text-align: center">{{ $item->title }}</h3>
        <hr>
        <table style="width:120rem;">
          <tbody>
            <tr class="table-row table-top-row">
              <td class="table-wrapper">
                <div class="table-wrapper-center">
                  <h5 class="table-heading">NO</h5>
                </div>
              </td>
              <td class="table-wrapper">
                <div class="table-wrapper-center">
                  <h5 class="table-heading">USER NAME</h5>
                </div>
              </td>
              <td class="table-wrapper">
                <div class="table-wrapper-center">
                  <h5 class="table-heading">NO HP</h5>
                </div>
              </td>
              <td class="table-wrapper">
                <div class="table-wrapper-center">
                  <h5 class="table-heading">EMAIL</h5>
                </div>
              </td>
              <td class="table-wrapper">
                <div class="table-wrapper-center">
                  <h5 class="table-heading">HARGA</h5>
                </div>
              </td>
              <td class="table-wrapper">
                <div class="table-wrapper-center">
                  <h5 class="table-heading">AKSI</h5>
                </div>
              </td>
            </tr>
            @php
              $auctions = App\Models\Auctions::where('product_auction_id', $item->id)
                  ->orderBy('auction_price', 'desc')
                  ->orderBy('created_at', 'asc')
                  ->get();
            @endphp
            @foreach ($auctions as $item)
              @php
                $anyTrueStatus = App\Models\auctions::where('product_auction_id', $item->product_auction_id)
                    ->where('status', 1)
                    ->exists();
                $statusTrue = $item->status === 1;
                // $auction =  App\Models\auctions::where('product_auction_id', $item->product_auction_id)->orderBy('auction_price', 'desc')->orderBy('created_at', 'asc')->get();
              @endphp
              <tr class="table-row ticket-row" style="{{ $statusTrue ? 'background-color: #edeaea;' : '' }}">
                <td class="table-wrapper">
                  <div class="table-wrapper-center">
                    <h5 class="heading">{{ $loop->iteration }}</h5>
                  </div>
                </td>
                <td class="table-wrapper">
                  <div class="table-wrapper-center">
                    <h5 class="heading">{{ $item->user->username }}</h5>
                  </div>
                </td>
                <td class="table-wrapper">
                  <div class="table-wrapper-center">
                    <h5 class="heading">{{ $item->user->phone }}</h5>
                  </div>
                </td>
                <td class="table-wrapper">
                  <div class="table-wrapper-center">
                    <h5 class="heading">{{ $item->user->email }}</h5>
                  </div>
                </td>
                <td class="table-wrapper">
                  <div class="table-wrapper-center">
                    <h5 class="heading">Rp. {{ number_format($item->auction_price, null, null, '.') }}</h5>
                  </div>
                </td>

                <td class="table-wrapper">
                  <div class="table-wrapper-center">
                    <form action="{{ route('seller.auction.updatelelang', $item->id) }}" method="POST">
                      @csrf
                      @method('PUT')

                      <input type="hidden" name="product_auction_id" value="{{ $item->product_auction_id }}">
                      <input type="radio" onchange="submitForm(this)" class="btn-check" name="status"
                        id="status-{{ $item->id }}" value="1" {{ $statusTrue ? 'checked' : '' }}
                        autocomplete="off" {{ $anyTrueStatus ? 'disabled' : '' }} />
                      <label for="status-{{ $item->id }}"
                        style="{{ $anyTrueStatus ? 'pointer-events: none; opacity: 0.5;' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                          <path fill="currentColor"
                            d="m9.55 17.308l-4.97-4.97l.714-.713l4.256 4.256l9.156-9.156l.713.714z" />
                        </svg>
                      </label>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endforeach


  {{-- LELANG --}}
  {{-- @foreach ($product_auctions as $item)
        <div class="modal fade" id="detailLelang{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="height: 99%; margin-top:1px;">
            <div class="modal-dialog" style="margin-left: auto; height: 100%">
                <div class="login-section account-section p-0" style="height: 100%;">
                    <div class="review-form m-0" style="height: 80%; width:400%;">
                        <div class="text-end mb-2">
                            <div class="close-btn">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        <h3 style="text-align: center">{{ $item->title }}</h3>
                        <hr>
                        <table style="width:120rem;">
                            <tbody>
                                <tr class="table-row table-top-row">
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">NO</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">USER NAME</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">NO HP</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">EMAIL</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">HARGA</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">AKSI</h5>
                                        </div>
                                    </td>
                                </tr>
                                @foreach ($auctions as $item)

                                <tr class="table-row ticket-row">
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="heading">{{ $loop->iteration }}</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="heading">{{ $item->user->username }}</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="heading">{{ $item->user->phone }}</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="heading">{{ $item->user->email }}</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="heading">{{ $item->auction_price }}</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <form action="{{ route('seller.auction.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <input type="radio" onchange="submitForm(this)" class="btn-check"
                                                name="status" id="status" {{ $item->status == true ? 'checked' : '' }} autocomplete="off" />
                                                <label for="status">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                        viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="m9.55 17.308l-4.97-4.97l.714-.713l4.256 4.256l9.156-9.156l.713.714z" />
                                                    </svg>
                                                </label>

                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}

@endsection

@section('script')
  <script>
    function modalAction(modalClass) {
      $(modalClass).toggleClass('active');
    }
  </script>
  <script>
    function submitForm(radio) {
      if (!radio.disabled) {
        const form = radio.closest('form');
        form.submit();
      }
    }
  </script>
  <script>
    $(document).ready(function() {
      $('.favorite-cart-icon').on('click', function() {
        var targetModal = $(this).data('bs-target');
        $(targetModal).modal('show');
      });

      $('.modal-favorite .close').on('click', function() {
        $(this).closest('.modal-favorite').modal('hide');
      });
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var btns = document.querySelectorAll('.openModal');
      var spans = document.querySelectorAll('.close');

      btns.forEach(function(btn) {
        btn.onclick = function() {
          var productId = btn.getAttribute('data-id');
          var modal = document.getElementById('reviewModal' + productId);
          modal.style.display = 'flex';
        }
      });

      spans.forEach(function(span) {
        span.onclick = function() {
          var modal = span.closest('.modal-lelang');
          modal.style.display = 'none';
        }
      });

      window.onclick = function(event) {
        var modals = document.querySelectorAll('.modal-lelang');
        modals.forEach(function(modal) {
          if (event.target == modal) {
            modal.style.display = 'none';
          }
        });
      }
    });
  </script>
  <script>
    $('#global-search').attr('action', "{{ route('seller.product.index') }}");
  </script>
@endsection
