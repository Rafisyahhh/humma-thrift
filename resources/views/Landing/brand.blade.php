@extends('layouts.home')
@section('title', 'Brand')
@section('style')
  <style>
    .top-selling-section .product-wrapper .product-img {
      height: 25.7rem;
      width: 25.7rem;
      background: rgba(126, 163, 219, 0.4);
    }

    html:not(.no-js) [data-aos^="fade"][data-aos^="fade"].aos-animate {
      opacity: 1;
      -webkit-transform: none;
      transform: none;
      width: 28rem;
      height: 35rem;
    }
  </style>
  <style>
    .grid:after {
      content: '';
      display: block;
      clear: both;
    }

    .grid-sizer,
    .grid-item {
      width: 14.285714285714286%;
    }

    .grid-item {
      float: left;
      border: 2px solid #b6b5b4;
    }

    .grid-item img {
      display: block;
      width: 100%;
      max-width: 100%;
    }
  </style>
@endsection
@section('content')
  <section class="product top-selling">
    <div class="container">
      <div class="section-title">
        <h5>Brand Produk</h5>
      </div>
      <div class="top-selling-section">
        <div class="row g-5 mt-4" id="basics">
          @foreach ($brands as $item)
            <div class="col-lg-2 col-md-6">
              <div class="product p-0" style="box-shadow: rgb(18 106 195 / 20%) 0 8px 24px;border-radius: 20px;">
                <div class="wrapper-img p-0">
                  <a href="product-sidebar.html">
                    <div class="ratio ratio-1x1">
                      <img src="{{ asset("storage/{$item->logo}") }}" alt="img" style="border-radius: 20px;"
                        class="object-fit-cover w-100 h-100">
                    </div>
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <div class="grid" id="notbasics" style="display: none">
          <div class="grid-sizer"></div>
          @foreach ($brands as $item)
            <div class="grid-item">
              <img src="{{ asset("storage/{$item->logo}") }}" alt="img">
            </div>
          @endforeach
        </div>
      </div>
  </section>
@endsection

@push('js')
  <script src="https://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
  <script src="{{ asset('template-assets/front/assets/js/imagesloaded.pkgd.min.js') }}"></script>
  <script>
    var $grid = $('.grid').isotope({
      itemSelector: '.grid-item',
      percentPosition: true,
      masonry: {
        columnWidth: '.grid-sizer'
      }
    });
    $grid.imagesLoaded().progress(function() {
      $grid.isotope('layout');
    });
    $(document).keydown(function(event) {
      if (event.key === 'Home') {
        $("#basics").show();
        $("#notbasics").hide();
      } else if (event.key === 'PageUp') {
        $("#basics").hide();
        $("#notbasics").show();
      }
    });
  </script>
@endpush
