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
        @include('Landing.components.filter', ['isAuction' => true])
        <div class="col-lg-9">
          <div class="product-sidebar-section">
            <div class="row g-5" id="product-container">
              <div class="col-lg-12">
                <div class="product-sorting-section" style="padding-bottom: unset; margin-bottom: unset">
                  <div class="result">
                    <p>Menampilkan
                      {{ $product_auction->firstItem() ?? 0 }}–<span id="last-item">0</span>
                      dari {{ $product_auction->total() ?? 0 }} hasil</p>
                  </div>
                </div>
              </div>
              @include('Landing.components.loader')
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')
  <script>
    function openModal(modal, callback) {
      $(modal).modal('show');
      callback?.($(modal));
    }

    function openModal2(modal, callback) {
      $(modal).show();
      callback?.($(modal));
    }

    function closeModal2(modal) {
      $(modal).hide();
    }
    document.addEventListener('DOMContentLoaded', function() {
      var modals = document.querySelectorAll('.modal');
      var btns = document.querySelectorAll('.openModal');
      var spans = document.querySelectorAll('.close');

      document.querySelectorAll('.openModal').forEach(function(btn, index) {
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

      document.querySelectorAll('.close').forEach(function(span, index) {
        span.onclick = function() {
          var modal = span.closest('.modal');
          modal.style.display = 'none';
        }
      });

      window.onclick = function(event) {
        document.querySelectorAll('.modal').forEach(function(modal) {
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
      const url = new URL(window.location.href);
      window.scrollTo(0, 0);
      let updateTimeout;
      let page = 0;
      let loading = true;
      let lastPage = false;
      const filters = ['categories', 'brands', 'colors', 'sizes', 'priceStart', 'priceEnd'];
      const maxPriceStart = +('{{ $product_auction->pluck('bid_price_start')->max() }}');
      const maxPriceEnd = +('{{ $product_auction->pluck('bid_price_end')->max() }}');
      const loader = $('[isLoader]');

      const getCheckedFilters = () => {
        const checked = {};

        filters.forEach(filter => {
          checked[filter] = $(`input:checkbox[name="${filter}[]"]:checked`).map(function() {
            return this.value;
          }).get();
        });

        if ($("#price-slider").length > 0 && $("#price-slider-2").length > 0) {
          const priceStartRange = $('#price-slider')[0].noUiSlider.get().map(value => Number(value));
          const priceEndRange = $('#price-slider-2')[0].noUiSlider.get().map(value => Number(value));
          checked['priceStart'] = (priceStartRange[0] <= 0 && priceStartRange[1] >= maxPriceStart) ? [] : [
            `${priceStartRange[0]}-${priceStartRange[1]}`
          ];
          checked['priceEnd'] = (priceEndRange[0] <= 0 && priceEndRange[1] >= maxPriceEnd) ? [] : [
            `${priceEndRange[0]}-${priceEndRange[1]}`
          ];
        } else {
          checked['priceStart'] = [];
          checked['priceEnd'] = [];
        }

        return checked;
      };

      const updateFilters = () => {
        clearInterval(updateTimeout);
        updateTimeout = setTimeout(() => {
          page = 1;
          lastPage = false;
          const checked = getCheckedFilters();

          filters.forEach(filter => {
            const count = checked[filter].length;
            if (count > 0) {
              url.searchParams.set(filter, checked[filter].join(','));
            } else {
              url.searchParams.delete(filter);
            }
            $(`#${filter}Count`).toggle(count > 0).text(count);
            if (["priceStart", "priceEnd"].includes(checked[filter])) {
              $(`#priceCount`).text(1);
            }
          });

          window.history.replaceState(null, null, url);

          $.ajax({
            url: url.toString(),
            type: 'GET',
            success: function(data) {
              loading = false;
              $('[isProduct],[isLoader]').remove();
              $('#product-container').append(data);
            },
            error: function() {
              loading = false;
              console.error('Failed to update filters.');
            }
          });
        }, 500);
      };

      const initPriceSlider = () => {
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

          const formatValues = [
            $("#slider-margin-value-min"),
            $("#slider-margin-value-max"),
            $("#slider-margin-value-min-2"),
            $("#slider-margin-value-max-2")
          ];

          sliderPriceStart.noUiSlider.on("update", (values) => {
            formatValues[0].text("Harga: Rp" + values[0]);
            formatValues[1].text("Rp" + values[1]);
            updateFilters();
            $('#priceCount').toggle(values[0] > 0 || values[1] < maxPriceStart).text(1);
          });
          sliderPriceEnd.noUiSlider.on("update", (values) => {
            formatValues[2].text("Harga: Rp" + values[0]);
            formatValues[3].text("Rp" + values[1]);
            updateFilters();
            $('#priceCount').toggle(values[0] > 0 || values[1] < maxPriceEnd).text(1);
          });
        }
      };

      const loadPage = () => {
        $.ajax({
          url: url.toString() + (url.search ? '&' : '?') + 'page=' + page,
          type: 'GET',
          beforeSend: function() {
            $("#product-container").append(loader);
          },
          success: function(data) {
            loading = false;
            $('[isLoader]').remove();
            if (data.lastPage) {
              lastPage = true;
              $("#product-container").append(`
              <div class="col" style="align-self: center;" isProduct>
                <h3 class="text-center">Produk Habis</h3>
                <p class="text-center">Maaf ya, sepertinya tidak ada lagi produk yang tersedia.</p>
              </div>
            `);
              return;
            }
            $("#product-container").append(data);
          },
          error: function() {
            loading = false;
            console.error('No response from server');
          }
        });
      };

      initPriceSlider();

      $('input:checkbox[name="categories[]"], input:checkbox[name="brands[]"], input:checkbox[name="colors[]"], input:checkbox[name="sizes[]"]')
        .on('change', updateFilters);

      $(window).on("scroll", function() {
        if (loading || lastPage) return;
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 450) {
          loading = true;
          page++;
          loadPage();
        }
      });
    });
  </script>
@endpush
