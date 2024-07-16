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
            <div class="row g-5" id="product-container">
              <div class="col-lg-12">
                <div class="product-sorting-section" style="padding-bottom: unset; margin-bottom: unset">
                  <div class="result">
                    <p>Menampilkan
                      {{ $product_auction->firstItem() ?? 0 }}–{{ $product_auction->lastItem() ?? 0 }}
                      dari {{ $product_auction->total() ?? 0 }} hasil</p>
                  </div>
                </div>

              </div>
              <div class="loader">Loading...</div>
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

@push('script')
  <script>
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
  <script>
    $(document).ready(function() {
      var page = 1;
      var lastPage = {{ $product_auction->lastPage() }};
      var loading = true;
      loadPage(page)

      $(window).on("scroll", function() {
        if (loading || page >= lastPage) return;
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 450) {
          loading = true;
          page++;
          loadPage(page)
        }
      });

      function loadPage(page) {
        $.ajax({
            url: '?page=' + page,
            type: 'get',
            beforeSend: function() {
              $('.loader').show();
            }
          })
          .done(function(data) {
            loading = false;
            const lastItem = $('#last-item');
            lastItem.text(parseInt(lastItem.text()) + {{ $product_auction->lastItem() }});
            $('.loader').hide();
            if (data.html === "") {
              $('.loader').html("No more records found");
              return;
            }
            $("#product-container").append(data);
          })
          .fail(function() {
            loading = false;
            console.error('No response from server');
          });
      }
    });
  </script>
@endpush
{{-- page-link --}}
