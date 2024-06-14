<header id="header" class="header">
    @include('layouts.partials.home.navbar')
    @includeWhen(!request()->routeIs(['login', 'register', 'seller.*']), 'layouts.partials.home.navbar-bottom')
    @include('layouts.partials.home.navbar-mobile')
</header>
