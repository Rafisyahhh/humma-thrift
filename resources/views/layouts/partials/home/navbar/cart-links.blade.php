<div class="header-cart header-right-dropdown">
  <a href="{{ route('user.cart') }}" class="cart-item">
    <span style="position: relative;">
      <i class="fas fa-shopping-cart" style="font-size: 1.5em position: relative;"></i>
      <span class="cart-count d-none">0</span>
    </span>
  </a>
  <div class="cart-submenu">
    <div class="cart-wrapper-item" id="cart-wrapper">
      {{-- Codenya ada di navbar.blade.php di dalam function pushCartItem() --}}
      <div colspan="6" class="list-group-item list-group-item-action">
        <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 110px; height: 110px;">
        <p>Keranjang masih kosong</p>
      </div>
    </div>
    <div class="cart-wrapper-section">
      <div class="wrapper-line"></div>
      <div class="cart-btn">
        <a href="{{ route('user.cart') }}" class="shop-btn checkout-btn">Tampilkan ke Keranjang</a>
      </div>
    </div>
  </div>
</div>
