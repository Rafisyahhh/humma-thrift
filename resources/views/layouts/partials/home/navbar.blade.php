<div class="header-center-section d-none d-lg-block bg-white">
  <div class="container">
    <div class="header-center">
      <div class="logo">
        <a href="{{ url('/') }}">
          <img src="{{ asset('images/brands/png/logo-color-lightxxxhdpi.png') }}" alt="logo" height="36px" />
        </a>
      </div>
      <div class="header-cart-items">
        @includeWhen(!request()->routeIs(['register', 'login']), 'layouts.partials.home.navbar.search-links')
        @if (auth()->check() &&
                auth()->user()->getUserRoleInstance()->value !== 'admin' &&
                !request()->routeIs(['register', 'login']) &&
                !auth()->user()->store)
          @include('layouts.partials.home.navbar.cart-links')
          @include('layouts.partials.home.navbar.wishlist-links')
        @endif
        @includeWhen(auth()->check() &&
                auth()->user()->getUserRoleInstance()->value !== 'admin' &&
                !auth()->user()->store &&
                !request()->routeIs(['register', 'login']),
            'layouts.partials.home.navbar.notify-links')
        @includeWhen(auth()->check() && auth()->user()->store && !request()->routeIs(['register', 'login']),
            'layouts.partials.home.navbar.notifyseller-links')
        @include('layouts.partials.home.navbar.login-links')
      </div>
    </div>
  </div>
</div>

@push('js')
  <script>
    const updatePartials = (() => {
      const ajaxRequest = (url, target) => {
        return $.ajax({
          url: url,
          cache: true,
          success: function(response) {
            window.globalVarProxy[target] = response;
          },
          error: function(xhr, status, error) {
            if (error.login) {
              flasher.error(error.login);
            }
            console.error(`Error fetching ${url}: ${status} ${error}`);
          }
        });
      };

      const routes = {
        cart: "{{ route('header.cart') }}",
        notification: "{{ route('header.notification') }}",
        wishlist: "{{ route('header.wishlist') }}"
      };

      return {
        wishlist: () => ajaxRequest(routes.wishlist, 'wishlist'),
        cart: () => ajaxRequest(routes.cart, 'cart'),
        // notification: () => ajaxRequest(routes.notification, '#notification-header'),
        all: function() {
          Promise.all([
            this.wishlist(),
            this.cart(),
            // this.notification(),
          ]).catch(error => console.error('Error updating partials:', error));
        }
      };
    })();

    @auth
    updatePartials.all();

    // setInterval(() => {
    //   updatePartials.notification();
    // }, 60_000);
    @endauth
  </script>
  <script>
    window.wishlist = null;

    window.globalVarProxy = new Proxy(window, {
      set(target, property, value) {
        if (property === 'wishlist' && value > 0) {
          $('#favorite-wrapper .wishlist-count').removeClass('d-none');
          $('#favorite-wrapper .wishlist-count').text(value);
        }
        if (property === 'cart' && value.length > 0) {
          $('.header-cart .cart-count').removeClass('d-none');
          $('.header-cart .cart-count').text(value.length);
          $('.header-cart .cart-submenu #cart-wrapper').html(pushCartItem(value));
        }
        target[property] = value;
        return true;
      }
    });

    function pushCartItem(value) {
      return value.map(({
        product
      }) => `
        <div class="wrapper">
          <div class="wrapper-item">
            <div class="wrapper-img" style="margin-right: 1rem;">
              <img src="{{ asset('storage/') }}/${product.thumbnail}" alt="img">
            </div>
            <div class="wrapper-content">
              <h5 class="heading" style="font-size: 18px; ">${ product.title } </h5>
              <div style="display: flex; align-items: center; margin-left: 0px;">
                <p>Rp</p>
                <p>${ product.price.toLocaleString('id-ID', {maximumFractionDigits:0}) }</p>
              </div>
            </div>
          </div>
        </div>
      `);
    }
  </script>
  <script>
    $(document).ready(function() {
      var $filter = $('#navbar');
      var stickyTop = $filter.offset().top;

      $(window).on('scroll', function() {
        var filterWidth = $filter.width();
        requestAnimationFrame(function() {
          var windowTop = $(window).scrollTop();

          if (stickyTop < windowTop) {
            $filter.css({
              position: 'fixed',
              top: '0',
              width: filterWidth,
            });
          } else {
            $filter.css({
              position: 'relative',
              top: '',
              width: '',
            });
          }
        });
      });
    });
  </script>
@endpush
