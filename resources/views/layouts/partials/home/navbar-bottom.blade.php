@php
  $user = auth()->user();
  $store = $user?->store;
@endphp

<style>

.active1 {
  overflow: hidden;
  border-bottom: 2px solid rgb(243, 243, 243);
  padding: 1rem;
  line-height: 3rem;
  font-weight: bold;
  padding-bottom: 2.2rem;
}

</style>

<div class="header-bottom d-lg-block d-none" id="navbar" style="z-index: 1;">
  <div class="container">
    <div class="header-nav">
      <div class="category-menu-section position-relative">
        <div class="empty position-fixed" onclick="tooglmenu()"></div>
        <button class="dropdown-btn" onclick="tooglmenu()">
          <span class="dropdown-icon">
            <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="14" height="1" />
              <rect y="8" width="14" height="1" />
              <rect y="4" width="10" height="1" />
            </svg>
          </span>
          <span class="list-text">Kategori</span>
        </button>
        <div class="category-dropdown position-absolute" id="subMenu">
          <ul class="category-list">
            @foreach ($productCategories as $category)
              <li class="category-list-item">
                <a href="{{ url("/product?categories=$category->slug") }}">
                  <div class="dropdown-item">
                    <div class="dropdown-list-item">
                      <span class="dropdown-img">
                        <img src="{{ asset("storage/{$category->icon}") }}" alt="dress" width="40px">
                      </span>
                      <span class="dropdown-text">{{ $category->title }}</span>
                    </div>
                    <div class="drop-down-list-icon">
                      <span>
                        <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                            transform="rotate(45 1.5 0.818359)" fill="#1D1D1D" />
                          <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                            transform="rotate(135 5.58984 4.90918)" fill="#1D1D1D" />
                        </svg>
                      </span>
                    </div>
                  </div>
                </a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>

      <div class="header-nav-menu">
        <ul class="menu-list">
          <li><a href="{{ url('/') }}"><span class="list-text {{ request()->is('/') ? 'active1' : '' }}">Home</span></a></li>
          <li><a href="{{ url('/product/regular') }}"><span class="list-text {{ request()->is('product/regular') ? 'active1' : '' }}">Produk</span></a></li>
          <li><a href="{{ url('/product/auction') }}"><span class="list-text {{ request()->is('product/auction') ? 'active1' : '' }}">Lelang</span></a></li>
          <li><a href="{{ url('/stores') }}"><span class="list-text {{ request()->is('stores') ? 'active1' : '' }}">Toko</span></a></li>
          <li><a href="{{ url('/about-us') }}"><span class="list-text {{ request()->is('about-us') ? 'active1' : '' }}">Tentang Kami</span></a></li>
        </ul>
      </div>

      <div class="header-vendor-btn">
        @if (auth()->check() && auth()->user()->hasRole('user'))
          @if (!$store)
            <a href="{{ url('user/open-shop') }}" class="shop-btn">
              <span class="list-text shop-text">Jualan Yuk</span>
              <span class="icon"><i class="fas fa-store"></i></span>
            </a>
          @else
            <a href="{{ request()->routeIs('store.profile') ? url('/') : url('@' . $store->username) }}"
              class="shop-btn">
              <span class="icon"><i
                  class="fas fa-{{ request()->routeIs('store.profile') ? 'home' : 'store' }}"></i></span>
              <span
                class="list-text shop-text">{{ request()->routeIs('store.profile') ? 'Ke Beranda' : 'Ke Tokomu' }}</span>
            </a>
          @endif
        @endif
      </div>
    </div>
  </div>
</div>

{{-- <script>
    $(document).ready(function () {

  $(".list-text").click(function (){
    $(this).addClass("active1").siblings().removeClass("active1");
  });
});

</script> --}}
