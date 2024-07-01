<header id="header" class="header" style="background: white;z-index:100;position: relative">
    @include('layouts.partials.home.navbar')
    @includeWhen(!request()->routeIs(['login', 'register', 'seller.*']), 'layouts.partials.home.navbar-bottom')
    @include('layouts.partials.home.navbar-mobile')
</header>
