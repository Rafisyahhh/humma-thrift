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
        <div class="col-lg-3 pt-5 h-100">
          <div class="sticky-top" style="top: 80px;"> <!-- Set top to adjust sticky behavior -->
            <ul class="nav nav-pills justify-content-around sidebar gap-3 bg-body-secondary p-3" id="myTab"
              role="tablist" style="border-top-left-radius: 2rem; border-top-right-radius: 2rem;">
              <li class="nav-item" role="presentation">
                <button class="nav-link active position-relative" id="home-tab" data-bs-toggle="tab"
                  data-bs-target="#category-tab" type="button" role="tab" aria-controls="category-tab"
                  aria-selected="true">Kategori
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"
                    style="display: none;" id="categoriesCount">0</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link position-relative" id="profile-tab" data-bs-toggle="tab"
                  data-bs-target="#brand-tab" type="button" role="tab" aria-controls="brand-tab"
                  aria-selected="false">Brand
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"
                    style="display: none;" id="brandCount">0</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link position-relative" id="contact-tab" data-bs-toggle="tab"
                  data-bs-target="#color-tab" type="button" role="tab" aria-controls="color-tab"
                  aria-selected="false">Warna
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"
                    style="display: none;" id="colorCount">0</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link position-relative" id="contact-tab" data-bs-toggle="tab"
                  data-bs-target="#size-tab" type="button" role="tab" aria-controls="size-tab"
                  aria-selected="false">Ukuran
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"
                    style="display: none;" id="sizeCount">0</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link position-relative" id="contact-tab" data-bs-toggle="tab"
                  data-bs-target="#price-tab" type="button" role="tab" aria-controls="price-tab"
                  aria-selected="false">Harga
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"
                    style="display: none;" id="priceCount">0</span>
                </button>
              </li>
            </ul>
            <div class="tab-content sidebar-section bg-body-tertiary" id="myTabContent"
              style="border-top-left-radius: unset; border-top-right-radius: unset">
              <div class="tab-pane fade show active sidebar-wrapper" id="category-tab" role="tabpanel"
                aria-labelledby="category-tab" tabindex="0">
                <div class="sidebar-item">
                  <ul class="sidebar-list">
                    @foreach ($categories as $item)
                      <li>
                        <input type="checkbox" id="{{ $item->id }}" name="categories[]" value="{{ $item->title }}" />
                        <label for="{{ $item->id }}">{{ $item->title }}</label>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="tab-pane fade sidebar-wrapper" id="brand-tab" role="tabpanel" aria-labelledby="brand-tab"
                tabindex="0">
                <div class="sidebar-item">
                  <ul class="sidebar-list">
                    @foreach ($brands as $item)
                      <li>
                        <input type="checkbox" id="brands-{{ $item->id }}" name="brands[]"
                          value="{{ $item->title }}" />
                        <label for="brands-{{ $item->id }}">{{ $item->title }}</label>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="tab-pane fade sidebar-wrapper" id="color-tab" role="tabpanel" aria-labelledby="color-tab"
                tabindex="0">
                <div class="sidebar-item">
                  <ul class="sidebar-list">
                    @foreach ($colors as $item)
                      <li>
                        <input type="checkbox" id="{{ $item }}" name="colors[]" value="{{ $item }}" />
                        <label for="{{ $item }}" class="text-capitalize">{{ $item }}</label>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="tab-pane fade sidebar-wrapper" id="size-tab" role="tabpanel" aria-labelledby="size-tab"
                tabindex="0">
                <div class="sidebar-item">
                  <ul class="sidebar-list">
                    @foreach ($sizes as $item)
                      <li>
                        <input type="checkbox" id="{{ $item }}" name="sizes[]"
                          value="{{ $item }}" />
                        <label for="{{ $item }}" class="text-capitalize">{{ $item }}</label>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="tab-pane fade sidebar-wrapper sidebar-range" id="price-tab" role="tabpanel"
                aria-labelledby="price-tab" tabindex="0">
                <h5 class="wrapper-heading">Harga Awal</h5>
                <div class="price-slide range-slider">
                  <div class="price">
                    <div class="range-slider style-1">
                      <div id="price-slider" class="slider-range mb-3"></div>
                      <span class="example-val" id="slider-margin-value-min"></span>
                      <span>-</span>
                      <span class="example-val" id="slider-margin-value-max"></span>
                    </div>
                  </div>
                </div>
                <h5 class="wrapper-heading mt-4">Harga Akhir</h5>
                <div class="price-slide range-slider">
                  <div class="price">
                    <div class="range-slider style-1">
                      <div id="price-slider-2" class="slider-range mb-3"></div>
                      <span class="example-val" id="slider-margin-value-min-2"></span>
                      <span>-</span>
                      <span class="example-val" id="slider-margin-value-max-2"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- sticky-top ends here -->
        </div>
        <div class="col-lg-9">
          <div class="product-sidebar-section" data-aos="fade-up">
            <div class="row g-5">
              <div class="col-lg-12">
                <div class="product-sorting-section" style="padding-bottom: unset; margin-bottom: unset">
                  <div class="result">
                    <p>Menampilkan
                      {{ $product_auction->firstItem() ?? 0 }}–{{ $product_auction->lastItem() ?? 0 }}
                      dari {{ $product_auction->total() ?? 0 }} hasil</p>
                  </div>
                </div>
              </div>

              @forelse ($product_auction as $item)
              @php
                $user = Auth::user();
                if ($user) {
                    $existingAuction = App\Models\auctions::where('user_id', Auth::id())
                        ->where('product_auction_id', $item->id)
                        ->first();
                    $auctions = App\Models\Auctions::where('user_id', $user->id)
                        ->where('product_auction_id', $item->id)
                        ->first();
                }
                $auctionproduct = App\Models\Auctions::where('product_auction_id', $item->id)
                    ->where('status', 1)
                    ->first();

            @endphp
              @if ( $auctions->status === 0)
                <div class="col-lg-4 col-sm-6" data-brand="{{ $item->brand->title }}"
                  data-categories="{{ json_encode($item->categories->pluck('title')->toArray()) }}"
                  data-color="{{ $item->color }}" data-size="{{ $item->size }}"
                  data-priceStart="{{ $item->bid_price_start }}" data-priceEnd="{{ $item->bid_price_end }}">
                  <div class="product-wrapper" data-aos="fade-up">
                    <div class="product-img">
                      <img src="{{ asset("storage/$item->thumbnail") }}" alt="product-img" class="object-fit-cover"
                        loading="lazy">
                      <div class="product-cart-items">
                        {{-- <a href="/user/wishlist" class="favourite cart-item">
                                                    <span>
                                                        <i class="fas fa-heart"></i>
                                                    </span>
                                                </a>
                                                <a href="/user/wishlist" class="favourite cart-item">
                                                    <span>
                                                        <i class="fas fa-shopping-cart"></i>
                                                    </span>
                                                </a> --}}
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
                          <span class="new-price">Rp{{ number_format($item->bid_price_start, null, null, '.') }}
                            -
                            Rp{{ number_format($item->bid_price_end, null, null, '.') }}</span>
                        </div>
                      </div>
                    </div>


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
                        <button class="close" style="float: right; text-align: end;">&times;</button>
                        @if ($user)
                          @if ($existingAuction)
                            <p style="text-align: center; font-size :20px; font-weight:bold; margin-top:2rem;">Anda sudah
                              mengikuti lelang</p>
                            <p style="text-align: center; margin-bottom:2rem;">bid lelang anda :
                              {{ $auctions->auction_price }}</p>
                          @elseif ($auctionproduct)
                            <p
                              style="text-align: center; font-size :20px; font-weight:bold; margin-top: 2rem; margin-bottom:2rem;">
                              lelang sudah berakhir</p>
                          @else
                            <h4 style="text-align: center;">Bid Lelang</h4>
                            <form id="auctionForm-{{ $item->id }}" method="post"
                              action="{{ route('user.auctions.store') }}" class="mt-5">
                              @csrf
                              <input type="hidden" name="product_id" value="{{ $item->id }}">
                              <label for="auction_price" class="form-label" style="font-size: 18px;">Bid Lelang
                                :</label> <br>
                              <input type="number" name="auction_price"
                                class="form-control @error('auction_price') is-invalid @enderror"
                                placeholder="Masukkan Bid Lelang anda" style="font-size: 17px;">
                              <p style="margin-top: 5px;margin-left:6px;font-size:12px;color: #7c7c7c;">
                                Bid : Rp{{ number_format($item->bid_price_start, null, null, '.') }}
                                -
                                Rp{{ number_format($item->bid_price_end, null, null, '.') }}</p>
                              @error('auction_price')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                              <button type="submit" class="shop-btn" style="margin-left: 22rem;">Kirim Bid
                                Anda</button>
                            </form>
                          @endif
                        @endif

                      </div>
                    </div>
                  </div>
                </div>
                @endif

              @empty
                <div class="col-lg-12">
                  <h5 class="text-center" style="color: #a5a3ae">Produk Lelang Masih Kosong</h5>
                  <p class="text-center" style="color: #a5a3ae">Maaf ya, kami masih belum menambahkan produknya. Tapi
                    dalam
                    waktu dekat kami akan menambahkan beberapa produk untukmu, stay tune.</p>
                </div>
              @endforelse

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="d-none">
    {{ $product_auction->links() }}
  </div>
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

@push('script')
  <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
  <script>
    $('#global-search').attr('action', '{{ route('searchProductAuction') }}');
    $(document).ready(function() {
      function updateFilters(price = []) {
        const filters = ['categories', 'brands', 'colors', 'sizes'];
        const checked = {};

        filters.forEach(filter => {
          checked[filter] = $(`input:checkbox[name="${filter}[]"]:checked`).map(function() {
            return this.value;
          }).get();
        });

        const priceStartRange = $('#price-slider')[0].noUiSlider.get().map(value => Number(value));
        const priceEndRange = $('#price-slider-2')[0].noUiSlider.get().map(value => Number(value));

        $('[data-brand][data-categories][data-color][data-size][data-priceStart][data-priceEnd]').each(function() {
          const data = $(this).data();
          const matches = filters.every(filter => {
            const key = filter === 'categories' ? 'categories' : filter.slice(0, -1);
            return checked[filter].length === 0 || checked[filter].some(item => data[key].includes(item));
          }) && ((data.pricestart >= priceStartRange[0] && data.pricestart <= priceStartRange[1]) && (data
            .priceend >= priceEndRange[0] && data.priceend <= priceEndRange[1]));

          $(this).toggle(matches);
        });

        filters.forEach(filter => {
          const count = checked[filter].length;
          const selector = `#${filter === 'categories' ? 'categories' : filter.slice(0, -1)}Count`;
          $(selector).toggle(count > 0).text(count);
        });
      }

      function initPriceSlider() {
        const maxPriceStart = +'{{ $product_auction->pluck('bid_price_start')->max() }}';
        const maxPriceEnd = +'{{ $product_auction->pluck('bid_price_end')->max() }}';
        if ($("#price-slider").length > 0 && $("#price-slider-2").length > 0) {
          var sliderPriceStart = document.getElementById("price-slider");
          var sliderPriceEnd = document.getElementById("price-slider-2");

          noUiSlider.create(sliderPriceStart, {
            start: [0, maxPriceStart],
            connect: true,
            format: {
              from: function(value) {
                return Number(value);
              },
              to: function(value) {
                return Math.round(value);
              },
            },
            step: 500,
            range: {
              min: 0,
              max: maxPriceStart,
            },
          });
          noUiSlider.create(sliderPriceEnd, {
            start: [0, maxPriceEnd],
            connect: true,
            format: {
              from: function(value) {
                return Number(value);
              },
              to: function(value) {
                return Math.round(value);
              },
            },
            step: 500,
            range: {
              min: 0,
              max: maxPriceEnd,
            },
          });

          var formatValues = [
            $("#slider-margin-value-min"),
            $("#slider-margin-value-max"),
            $("#slider-margin-value-min-2"),
            $("#slider-margin-value-max-2")
          ];

          sliderPriceStart.noUiSlider.on("update", function(values) {
            formatValues[0].text("Harga: Rp" + values[0]);
            formatValues[1].text("Rp" + values[1]);
            updateFilters();
            $('#priceCount').toggle(values[0] > 0 || values[1] < maxPriceStart).text(1);
          });
          sliderPriceEnd.noUiSlider.on("update", function(values) {
            formatValues[2].text("Harga: Rp" + values[0]);
            formatValues[3].text("Rp" + values[1]);
            updateFilters();
            $('#priceCount').toggle(values[0] > 0 || values[1] < maxPriceStart).text(1);
          });
        }
      }

      initPriceSlider();
      $('input:checkbox[name="categories[]"], input:checkbox[name="brands[]"], input:checkbox[name="colors[]"], input:checkbox[name="sizes[]"]')
        .on('change', updateFilters);
    });
  </script>
@endpush
{{-- page-link --}}
