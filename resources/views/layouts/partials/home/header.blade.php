@php
    function fullCriteria() {
        return !request()->routeIs(['login', 'register']);
    }
@endphp

<header id="header" class="header">
    @include('layouts.partials.home.navbar')
    @includeWhen(fullCriteria(), 'layouts.partials.home.navbar-bottom')
    @include('layouts.partials.home.navbar-mobile')
</header>
