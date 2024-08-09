@extends('layouts.home')

@section('title', 'Product')

@push('style')
  <style>
    .modal-content {
      padding-top: 2.5rem;
      padding-bottom: 2.5rem;
      width: 50rem;
      left: 50%;
      transform: translate(-50%, 150%);
    }

    .modal-content .modal-header {
      border: unset;
    }
  </style>
@endpush

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
                    <p>Menampilkan <span id="total"></span> hasil
                    </p>
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

  <div class="d-none">
    @include('Landing.components.product-regular')
    @include('Landing.components.product-auction')

    <div class="modal fade" id="auctionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" style="transform: translate(-50%, 50%);">
          <form method="post" action="{{ route('user.auctions.store') }}" class="mt-5">
            @csrf
            <div class="modal-header">
              <h1 class="modal-title fs-2" id="exampleModalLabel"
                style="transform: translateX(-50%); position: relative; left: 50%;" data-title>:title:</h1>
              <button type="button" class="btn-close position-absolute fs-3" data-bs-dismiss="modal" aria-label="Close"
                style="top: 15px; right: 15px;"></button>
            </div>
            <div class="modal-body mt-2" data-status="">
              <label for="auction_price" class="form-label" style="font-size: 18px;">Bid Lelang :</label>
              <input type="number" name="auction_price" class="form-control" placeholder="Masukkan Bid Lelang anda"
                style="font-size: 17px;">
              <p style="margin-top: 5px;margin-left:6px;font-size:12px;color: #7c7c7c;">Bid: <span
                  data-price>:price:</span>
              </p>
              <button type="submit" class="shop-btn" style="margin-left: 22rem;">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-2" id="exampleModalLabel"
              style="transform: translateX(-50%); position: relative; left: 50%;">Bagikan</h1>
            <button type="button" class="btn-close position-absolute fs-3" data-bs-dismiss="modal" aria-label="Close"
              style="top: 15px; right: 15px;"></button>
          </div>
          <div class="modal-body d-flex gap-2 align-items-center justify-content-center mt-2">
            <span class="share-container share-buttons d-flex gap-3 ms-2" style="z-index:1;">
              <a href="" target="_blank" class="social-buttons facebook-link">
                <i class="fa-brands fa-square-facebook" style="color: #1c3879;font-size:4rem"></i>
              </a>
              <a href="" target="_blank" class="social-buttons twitter-link">
                <i class="fa-brands fa-square-x-twitter" style="color: #1c3879;font-size:4rem"></i>
              </a>
              <a href="" target="_blank" class="social-buttons telegram-link">
                <i class="fa-brands fa-telegram" style="color: #1c3879;font-size:4rem"></i>
              </a>
              <a href="" target="_blank" class="social-buttons whatsapp-link">
                <i class="fa-brands fa-whatsapp" style="color: #1c3879;font-size:4rem"></i>
              </a>
            </span>
          </div>
        </div>
      </div>
    </div>

  </div>
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
      const maxPrice = +('{{ $maxPrice }}');
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
        $('html').animate({
          scrollTop: 0
        }, 250);
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

        window.history.replaceState(null, '', url);
        $('[isProduct]').addClass('submitLoading');

        $.ajax({
          url: url.toString(),
          type: 'GET',
          cache: true,
          success: function({
            products,
            product_auctions
          }) {
            loading = false;
            $('[isProduct],[isLoader]').remove();
            (product.length > 0) || appendProduct(products.data);
            (product_auctions.length > 0) || appendProductAuction(product_auctions.data);
            $('#total').text($('[isProduct]').length);
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
             <div class="col-lg-12 d-flex flex-column align-items-center" isLoader>
              <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong"
                  style="width: 200px; height: 200px;">
              <h5 class="text-center" style="color: #000000">Upss.. </h5>
              <p class="text-center" style="color: #000000">Maaf, sudah tidak ada produk lainnya</p>
             </div>
          `);
              return;
            }
            $("#product-container").append(data);
            $('#total').text($('[isProduct]').length);
          },
          error: function() {
            loading = false;
            console.error('No response from server');
          }
        });
      };

      const searchPage = debounce(() => {
        url.searchParams.set('search', searchInput.val());
        window.history.pushState(null, '', url);

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
            $('#total').text($('[isProduct]').length);
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

    const product = $('[isProduct]')[0].outerHTML;
    const productAuction = $('[isProductAuction]')[0].outerHTML;
    const moneyFormat = new Intl.NumberFormat('id', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    });

    function appendProduct(products) {
      products.map((item) => {
        const data = {
          ":id:": item.id,
          ":title:": item.title,
          ":price:": moneyFormat.format(item.price),
          ":userStore.name:": item.user_store.name,
          ":storesproduct:": `{{ route('storesproduct', '') }}/${item.id}`,
          ":storecart:": `{{ route('storecart', '') }}/${item.id}`,
          ":store.product.detail:": "{{ route('store.product.detail', ['store' => ':store:', 'product' => ':product:']) }}"
            .replace(":store:", item.user_store.username).replace(":product:", item.slug),
          ":store.profile:": "{{ route('store.profile', ['store' => ':username:']) }}"
            .replace(":username:", item.user_store.username),
          ":thumbnail:": `{{ asset('storage/') }}/${item.thumbnail}`,
          ":user.checkout.process:": `{{ route('user.checkout.process') }}`,
        };
        const productHTML = replacePlaceholders(product, data);
        $("#product-container").append(productHTML);
      })
    }

    function appendProductAuction(productAuctions) {
      productAuctions.map((item) => {
        const data = {
          ":id:": item.id,
          ":title:": item.title,
          ":price:": moneyFormat.format(item.bid_price_start) + '-' +
            moneyFormat.format(item.bid_price_end),
          ":userStore.name:": item.user_store.name,
          ":storesproduct:": `{{ route('storesproduct', '') }}/${item.id}`,
          ":storecart:": `{{ route('storecart', '') }}/${item.id}`,
          ":store.product.detail:": "{{ route('store.product.detail', ['store' => ':store:', 'product' => ':product:']) }}"
            .replace(":store:", item.user_store.username).replace(":product:", item.slug),
          ":store.profile:": "{{ route('store.profile', ['store' => ':username:']) }}"
            .replace(":username:", item.user_store.username),
          ":thumbnail:": `{{ asset('storage/') }}/${item.thumbnail}`,
          ":user.checkout.process:": `{{ route('user.checkout.process') }}`,
          ":data:": [
            item.status, item.title, moneyFormat.format(item.bid_price_start) + '-' + moneyFormat.format(item
              .bid_price_end)
          ].toString()
        };
        const productAuctionsHTML = replacePlaceholders(productAuction, data);
        $("#product-container").append(productAuctionsHTML);
      })
    }

    function replacePlaceholders(product, data) {
      // Create a regex dynamically from the keys of the data object
      const keys = Object.keys(data).join('|');
      const regex = new RegExp(keys, 'g');

      return product.replace(regex, function(match) {
        return data[match];
      });
    }
  </script>
  <script>
    const auctionModal = $('#auctionModal');

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

    function openModal(modal) {
      $(modal).modal('show');

      function share(url, title = '') {
        const links = {
          facebook: `https://www.facebook.com/sharer/sharer.php?u=${url || ''}`,
          whatsapp: `https://api.whatsapp.com/send?text=${encodeURIComponent(title || '')} ${encodeURIComponent(url || '')}`,
          telegram: `https://t.me/share/url?url=${encodeURIComponent(url || '')}&text=${encodeURIComponent(title || '')}`,
          twitter: `https://twitter.com/intent/tweet?url=${encodeURIComponent(url || '')}&text=${encodeURIComponent(title || '')}`
        };

        $('.social-buttons.facebook-link').attr('href', links.facebook);
        $('.social-buttons.twitter-link').attr('href', links.twitter);
        $('.social-buttons.telegram-link').attr('href', links.telegram);
        $('.social-buttons.whatsapp-link').attr('href', links.whatsapp);
      }

      function auction(data) {
        const parsedData = data.split(",");
        console.log(parsedData);
        const modal = auctionModal;
        $('#auctionModal [data-title]').text(parsedData[1]);
        $('#auctionModal [data-price]').text(parsedData[2]);
      }

      return {
        share,
        auction
      };
    }
  </script>
@endpush
