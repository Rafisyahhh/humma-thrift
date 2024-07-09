<div class="header-center-section d-none d-lg-block">
    <div class="container">
        <div class="header-center">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/brands/png/logo-color-lightxxxhdpi.png') }}" alt="logo" height="36px" />
                </a>
            </div>
            <div class="header-cart-items">
                @includeWhen(!request()->routeIs(['register', 'login']), 'layouts.partials.home.navbar.other-links')
                @includeWhen(auth()->check() && auth()->user()->getUserRoleInstance()->value !== 'admin' && !auth()->user()->store && !request()->routeIs(['register', 'login']), 'layouts.partials.home.navbar.cart-links')
                @includeWhen(auth()->check() && auth()->user()->getUserRoleInstance()->value !== 'admin' && !auth()->user()->store && !request()->routeIs(['register', 'login']), 'layouts.partials.home.navbar.notify-links')
                @includeWhen(auth()->check() && auth()->user()->store  && !request()->routeIs(['register', 'login']), 'layouts.partials.home.navbar.notifyseller-links')
                @include('layouts.partials.home.navbar.login-links')
            </div>
        </div>
    </div>
</div>
