@extends('layouts.home')

@section('title', 'Product')

@section('content')
  <section class="product product-sidebar footer-padding">
    <div class="container">
      <div class="row g-5">
        @include('Landing.components.filter', ['isAuction' => false])
        <div class="col-lg-9">
          <div class="product-sidebar-section">
            <div class="row g-5" id="product-container">
              <div class="col-lg-12">
                <div class="product-sorting-section" style="padding-bottom: unset; margin-bottom: unset">
                  <div class="result">
                    <p>Menampilkan {{ $products->firstItem() }}–{{ $products->lastItem() }} dari
                      {{ $products->total() }} hasil</p>
                  </div>
                </div>
              </div>
              @include('Landing.components.loader', ['lists' => $products])
            </div>
            {{-- <div class="loader">Loading...</div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('script')
  <script>
    $(document).ready(function() {
      function updateFilters() {
        const filters = ['categories', 'brands', 'colors', 'sizes'];
        const checked = {};

        filters.forEach(filter => {
          checked[filter] = $(`input:checkbox[name="${filter}[]"]:checked`).map(function() {
            return this.value;
          }).get();
        });

        const priceRange = $('#price-slider')[0].noUiSlider.get().map(value => Number(value));

        $('[data-brand][data-categories][data-color][data-size][data-price]').each(function() {
          const data = $(this).data();
          const matches = filters.every(filter => {
            const key = filter === 'categories' ? 'categories' : filter.slice(0, -1);
            return checked[filter].length === 0 || checked[filter].some(item => data[
              key].includes(item));
          }) && data.price >= priceRange[0] && data.price <= priceRange[1];

          $(this).toggle(matches);
        });

        filters.forEach(filter => {
          const count = checked[filter].length;
          const selector =
            `#${filter === 'categories' ? 'categories' : filter.slice(0, -1)}Count`;
          $(selector).toggle(count > 0).text(count);
        });
      }

      function initPriceSlider() {
        const maxPrice = +'{{ $products->pluck('price')->max() }}';
        if ($("#price-slider").length > 0) {
          var tooltipSlider = document.getElementById("price-slider");

          noUiSlider.create(tooltipSlider, {
            start: [0, maxPrice],
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
              max: maxPrice,
            },
          });

          var formatValues = [
            $("#slider-margin-value-min"),
            $("#slider-margin-value-max")
          ];

          tooltipSlider.noUiSlider.on("update", function(values) {
            formatValues[0].text("Harga: Rp" + values[0]);
            formatValues[1].text("Rp" + values[1]);
            updateFilters();
            $('#priceCount').toggle(values[0] > 0 || values[1] < maxPrice).text(1);
          });
        }
      }

      function loadPage(page) {
        $.ajax({
            url: '?{{ isset($search) ? "search=$search" : '' }}&page=' + page,
            type: 'get',
            beforeSend: function() {
              // $('.loader').show();
            }
          })
          .done(function(data) {
            loading = false;
            const lastItem = $('#last-item');
            lastItem.text(parseInt(lastItem.text()) + {{ $products->lastItem() }});
            if (data.html === "") {
              $('.loader').html("No more records found");
              return;
            }
            $("#product-container").append(data);
            $('.loader').remove();
            setTimeout(() => {
              updateFilters();
            }, 500);
          })
          .fail(function() {
            loading = false;
            console.error('No response from server');
          });
      }

      initPriceSlider();
      $('input:checkbox[name="categories[]"], input:checkbox[name="brands[]"], input:checkbox[name="colors[]"], input:checkbox[name="sizes[]"]')
        .on('change', updateFilters);

      var loader = $('.loader');
      var page = 1;
      var lastPage = {{ $products->lastPage() }};
      var loading = true;
      loadPage(page)

      $(window).on("scroll", function() {
        if (loading || page >= lastPage) return;
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 450) {
          loading = true;
          page++;
          $("#product-container").append(loader);
          loadPage(page)
        }
      });
    });
  </script>
@endpush
