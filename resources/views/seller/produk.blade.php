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


    .filter-section {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1rem;

      .form-control,
      .form-select {
        font-size: 14px !important;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        border: 1px solid #ced4da;
      }
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
    <div class="d-flex filter-section">
      <select id="type" class="form-select form-select-lg" aria-label="Default select example" style="width: 200px;">
        <option value="">Semua</option>
        <option value="product">Produk
        </option>
        <option value="auction">Produk Lelang</option>
        </option>
      </select>
      <input type="date" id="date" class="form-control" style="font-size: 1rem" />
      <input type="text" id="search" class="form-control" placeholder="Misal: Hoodie" style="font-size: 1rem" />
    </div>

    <div class="cart-section wishlist-section row gy-5" id="product-area">

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
  <script>
    function openModal(modal) {
      // $(modal).modal("show");
      $(modal).css("display", "flex");
    }
    var formData = {};
    requestAjax();
    $(document).ready(function() {
      let searchTimeout;

      $('.filter-section #type').change(function(e) {
        formData.type = this.value;
        requestAjax();
      });

      $('.filter-section #date').change(function(e) {
        formData.date = this.value;
        requestAjax();
      });

      $('.filter-section #search').on('input', function() {
        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function() {
          const searchTerm = $('.filter-section #search').val().trim();
          formData.search = searchTerm;
          requestAjax();
        }, 1000);
      });

    });

    function requestAjax(params) {
      $.ajax({
        data: formData,
        success: function(data) {
          $("#product-area").html(data);
        }
      });
    }
  </script>
@endsection
