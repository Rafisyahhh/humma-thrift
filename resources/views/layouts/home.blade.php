<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{ asset('template-assets/front/images/homepage-one/icon.png') }}" />

    @hasSection('title')
        <title>{{ $__env->yieldContent('title') }} &bullet; {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&Inter:wght@100..900&family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('template-assets/front/css/swiper10-bundle.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template-assets/front/css/bootstrap-5.3.2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template-assets/front/css/nouislider.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template-assets/front/css/aos-3.0.0.css') }}">

    <link rel="stylesheet" href="{{ asset('template-assets/front/css/style.css') }}">

    <style>
        .header-right-dropdown > div {
            right: 0 !important;
            left: unset !important;
        }
    </style>

    @stack('link')
    @yield('link')

    @stack('style')
    @yield('style')
</head>

<body>
    @include('layouts.partials.home.header')

    @yield('content')

    @include('layouts.partials.home.footer')

    <script src="{{ asset('template-assets/front/assets/js/jquery_3.7.1.min.js') }}"></script>

    <script src="{{ asset('template-assets/front/assets/js/bootstrap_5.3.2.bundle.min.js') }}"></script>

    <script src="{{ asset('template-assets/front/assets/js/nouislider.min.js') }}"></script>

    <script src="{{ asset('template-assets/front/assets/js/aos-3.0.0.js') }}"></script>

    <script src="{{ asset('template-assets/front/assets/js/swiper10-bundle.min.js') }}"></script>

    <script src="{{ asset('template-assets/front/assets/js/shopus.js') }}"></script>

    @stack('script')
    @yield('script')

    @stack('js')
    @yield('js')
</body>

</html>
