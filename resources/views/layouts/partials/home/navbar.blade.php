<div class="header-center-section d-none d-lg-block">
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
                !request()->routeIs(['register', 'login']))
          @if (!auth()->user()->store)
            <div id="cart-header"></div>
            <div id="wishlist-header"></div>
          @endif
          <div id="notification-header"></div>
        @endif
        {{-- @includeWhen(auth()->check() && auth()->user()->getUserRoleInstance()->value !== 'admin' && !auth()->user()->store && !request()->routeIs(['register', 'login']), 'layouts.partials.home.navbar.cart-links') --}}
        {{-- @includeWhen(auth()->check() &&
                auth()->user()->getUserRoleInstance()->value !== 'admin' &&
                !auth()->user()->store &&
                !request()->routeIs(['register', 'login']),
            'layouts.partials.home.navbar.notify-links') --}}
        {{-- @includeWhen(auth()->check() && auth()->user()->store && !request()->routeIs(['register', 'login']),
        'layouts.partials.home.navbar.notifyseller-links') --}}
        @include('layouts.partials.home.navbar.login-links')
      </div>
    </div>
  </div>
</div>

@push('js')
  <script>
    const updatePartials = {
      cart: () => {
        $.ajax({
          url: "{{ route('header.cart') }}",
          success: function(response) {
            $('#cart-header').html(response)
          }
        });
      },
      notification: () => {
        $.ajax({
          url: "{{ route('header.notification') }}",
          success: function(response) {
            $('#notification-header').html(response)
          }
        });
      },
      wishlist: () => {
        $.ajax({
          url: "{{ route('header.wishlist') }}",
          success: function(response) {
            $('#wishlist-header').html(response)
          }
        });
      },
      all: function() {
        this.cart();
        this.notification();
        this.wishlist();
      }
    }
    @auth
    updatePartials.all();

    setInterval(() => {
      updatePartials.notification();
    }, 60_000);
    @endauth
  </script>
@endpush
