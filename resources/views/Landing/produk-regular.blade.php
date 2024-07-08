@extends('layouts.home')

@section('title', 'Product')

@section('content')
  <section class="product product-sidebar footer-padding">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-3">
          <div class="sidebar" data-aos="fade-right">
            <div class="sidebar-section">
              <div class="sidebar-wrapper">
                <h5 class="wrapper-heading">Kategori Produk</h5>
                <div class="sidebar-item">
                  <ul class="sidebar-list">
                    @foreach ($categories as $item)
                      <li>
                        <input type="checkbox" id="{{ $item->id }}" name="category[]" value="{{ $item->title }}" />
                        <label for="{{ $item->id }}">{{ $item->title }}</label>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <hr>
              <div class="sidebar-wrapper sidebar-range">
                <h5 class="wrapper-heading">Kisaran harga</h5>
                <div class="price-slide range-slider">
                  <div class="price">
                    <div class="range-slider style-1">
                      <div id="slider-tooltips" class="slider-range mb-3"></div>
                      <span class="example-val" id="slider-margin-value-min"></span>
                      <span>-</span>
                      <span class="example-val" id="slider-margin-value-max"></span>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="sidebar-wrapper">
                <h5 class="wrapper-heading">Brands</h5>
                <div class="sidebar-item">
                  <ul class="sidebar-list">
                    @foreach ($brands as $item)
                      <li>
                        <input type="checkbox" id="brands-{{ $item->id }}" name="brands[]" />
                        <label for="brands-{{ $item->id }}">{{ $item->title }}</label>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <hr>
              <div class="sidebar-wrapper">
                <h5 class="wrapper-heading">Warna</h5>
                <div class="sidebar-item">
                  <ul class="sidebar-list">
                    <li>
                      <input type="checkbox" id="red" name="red">
                      <label for="red">Merah</label>
                    </li>
                    <li>
                      <input type="checkbox" id="blue" name="blue">
                      <label for="blue">Biru</label>
                    </li>
                    <li>
                      <input type="checkbox" id="navy" name="navy">
                      <label for="navy">Navy</label>
                    </li>
                  </ul>
                </div>
              </div>
              <hr>
              <div class="sidebar-wrapper">
                <h5 class="wrapper-heading">Ukuran</h5>
                <div class="sidebar-item">
                  <ul class="sidebar-list">
                    <li>
                      <input type="checkbox" id="small" name="small">
                      <label for="small">Kecil</label>
                    </li>
                    <li>
                      <input type="checkbox" id="medium" name="medium">
                      <label for="medium">Sedang</label>
                    </li>
                    <li>
                      <input type="checkbox" id="large" name="large">
                      <label for="large">Besar</label>
                    </li>
                    <li>
                      <input type="checkbox" id="xl" name="xl">
                      <label for="xl">XL</label>
                    </li>
                    <li>
                      <input type="checkbox" id="2xl" name="2xl">
                      <label for="2xl">2XL</label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="product-sidebar-section" data-aos="fade-up">
            <div class="row g-5">
              <div class="col-lg-12">
                <div class="product-sorting-section">
                  <div class="result">
                    <p>Menampilkan {{ $products->firstItem() }}–{{ $products->lastItem() }} dari
                      {{ $products->total() }} hasil</p>
                  </div>
                </div>
              </div>
              @forelse ($products as $item)
                <div class="col-lg-4 col-sm-6" data-brand="{{ $item->brand->title }}"
                  data-categories="{{ json_encode($item->categories->pluck('title')->toArray()) }}">
                  <div class="product-wrapper p-0" data-aos="fade-up">
                    <div class="product-img">
                      <img src="{{ asset("storage/$item->thumbnail") }}" alt="product-img" class="object-fit-cover">
                      <div class="product-cart-items">
                        <a href="/user/wishlist" class="favourite cart-item">
                          <span>
                            <i class="fas fa-heart"></i>
                          </span>
                        </a>
                        <a href="/user/checkout" class="favourite cart-item">
                          <span>
                            <i class="fas fa-shopping-cart"></i>
                          </span>
                        </a>
                        <a href="#" class="compaire cart-item">
                          <span>
                            <i class="fas fa-share"></i>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="product-info">
                      <div class="product-description">
                        <a href="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                          class="product-details">{{ $item->title }}
                        </a>
                        <div class="price">
                          <span class="new-price">Rp.{{ number_format($item->price, 2, ',', '.') }}</span>
                        </div>
                      </div>
                    </div>
                    <form action="{{ route('user.checkout') }}" method="post">
                      @csrf
                      <div class="product-cart-btn" style="bottom:0;">
                        <input type="hidden" value="{{ $item->id }}" name="product_id">
                        <button type="submit" class="product-btn">Beli sekarang</button>
                      </div>
                    </form>
                  </div>
                </div>
              @empty
                <div class="col-lg-12">
                  <h3 class="text-center">Produk Masih Kosong</h3>
                  <p class="text-center">Maaf ya, kami masih belum menambahkan produknya. Tapi dalam
                    waktu dekat kami akan menambahkan beberapa produk untukmu, stay tune.</p>
                </div>
              @endforelse
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
      let products = [];
      let brands = [];
      var checkedCategories = [];
      $('[data-brand][data-categories]').each(function() {
        products.push([$(this).data('brand'), $(this).data('categories')]);
      })
      //   $('[data-brand]').each(function() {
      //     brands.push($(this).data('brand'));
      //     console.log(this);
      //   })
      //   $('[data-categories]').each(function() {
      //     var categories = $(this).data('categories');
      //   })

      console.log(products);
      let selectedCategory;
      $('input:checkbox[name^="category"]').click(function(e) {
        // console.log($('input:checkbox[name^="category"]').index(this));
        // console.log(this);
        checkedCategories = $('input:checkbox[name^="category"]:checked').map(function() {
          return this.value;
        }).get();
      });
      //   $('input:checkbox[name^="brands"]').click(function(e) {
      //     console.log($(this).index());
      //     console.log(brand);
      //     $('[data-brand]:checkbox:checked').each(function() {
      //       var checkedBrand = $(this).data('brand');
      //       console.log(checkedBrand);
      //     })
      //   });
    });
  </script>
@endpush
