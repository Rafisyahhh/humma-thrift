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
                    <p>Menampilkan 0–1 dari
                      2 hasil</p>
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

@push('script')
  <script>
    $(document).ready(function() {
      const url = new URL(window.location.href);
      window.scrollTo(0, 0);

      let updateTimeout;
      let page = 0;
      let loading = true;
      let lastPage = false;

      const filters = ['categories', 'brands', 'colors', 'sizes', 'price', 'type'];
      const maxPrice = +('{{ $products->pluck('price')->max() }}');
      const loader = $('[isLoader]');
      const searchInput = $('input#search-input');

      const getCheckedFilters = () => {
        const checked = {};
        filters.forEach(filter => {
          checked[filter] = $(`input:checkbox[name="${filter}[]"]:checked`).map(function() {
            return this.value;
          }).get();
        });

        if ($('#price-slider').length > 0) {
          const priceRange = $('#price-slider')[0].noUiSlider.get().map(Number);
          checked.price = (priceRange[0] <= 0 && priceRange[1] >= maxPrice) ? [] : [
            `${priceRange[0]}-${priceRange[1]}`
          ];
        } else {
          checked.price = [];
        }

        return checked;
      };

      const updateFilters = debounce(() => {
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
        });

        window.history.replaceState(null, null, url);
        $('[isProduct]').addClass('submitLoading');

        $.ajax({
          url: url.toString(),
          type: 'GET',
          cache: true,
          success: function(data) {
            loading = false;
            $('[isProduct],[isLoader]').remove();
            $('#product-container').append(data);
          },
          error: function() {
            loading = false;
            $('[isProduct]').removeClass('submitLoading');
            console.error('Failed to update filters.');
          }
        });
      }, 500);

      const initPriceSlider = () => {
        if ($("#price-slider").length > 0) {
          const tooltipSlider = document.getElementById("price-slider");
          noUiSlider.create(tooltipSlider, {
            start: [Number('{{ explode('-', request()->price ?? '0')[0] ?? 0 }}'), Number(
              '{{ explode('-', request()->price ?? '0-' . $maxPrice)[1] }}')],
            connect: true,
            format: {
              from: Number,
              to: Math.round
            },
            step: 500,
            range: {
              min: 0,
              max: maxPrice
            }
          });

          const formatValues = [$("#slider-margin-value-min"), $("#slider-margin-value-max")];

          tooltipSlider.noUiSlider.on("update", (values) => {
            formatValues[0].text("Harga: Rp" + values[0]);
            formatValues[1].text("Rp" + values[1]);
            updateFilters();
            $('#priceCount').toggle(values[0] > 0 || values[1] < maxPrice).text(1);
          });
        }
      };

      const loadPage = () => {
        $.ajax({
          url: `${url.toString()}${url.search ? '&' : '?'}page=${page}`,
          type: 'GET',
          cache: true,
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

      const searchPage = debounce(() => {
        url.searchParams.set('search', searchInput.val());
        window.history.replaceState(null, null, url);

        page = 1;
        lastPage = false;

        $('[isProduct]').addClass('submitLoading');

        $.ajax({
          url: url.toString(),
          type: 'GET',
          cache: true,
          success: function(data) {
            loading = false;
            $('[isProduct],[isLoader]').remove();
            $('#product-container').append(data);
          },
          error: function() {
            loading = false;
            $('[isProduct]').removeClass('submitLoading');
            console.error('Failed to update filters.');
          }
        });
      }, 750);

      initPriceSlider();

      $('input:checkbox').on('change', updateFilters);
      searchInput.keyup(searchPage);
      $('form#global-search').submit(function(e) {
        e.preventDefault();
        searchPage();
      });

      $(window).on("scroll", function() {
        if (loading || lastPage) return;
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 450) {
          loading = true;
          page++;
          loadPage();
        }
      });

      function debounce(func, wait) {
        let timeout;
        return function() {
          const context = this,
            args = arguments;
          clearTimeout(timeout);
          timeout = setTimeout(() => func.apply(context, args), wait);
        };
      }
    });
  </script>
  <script>
    function ajaxSubmit(e, $this) {
      e.preventDefault();
      const form = $($this);
      const product = form.closest('[isProduct]');
      product.addClass('submitLoading');
      $.ajax({
        url: form.attr('action'),
        type: "POST",
        cache: true,
        success: function(response) {
          product.removeClass('submitLoading');
          if (response.error) {
            flasher.error(response.error);
          } else {
            flasher.success(response.success);
          }
          window.globalVarProxy[response.type] = response.data;
        }
      });
    };
  </script>
@endpush
