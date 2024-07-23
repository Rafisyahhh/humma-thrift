<div class="header-cart header-right-dropdown">
  <a href="{{ route('user.cart') }}" class="cart-item">
    <span style="position: relative; display: inline-block;">
      <i class="fas fa-shopping-cart" style="font-size: 1.5em position: relative;"></i>
      @if (count($carts) > 0)
        <span
          style="
                position: absolute;
                top: -10px; /* Adjust as needed */
                right: -10px; /* Adjust as needed */
                background-color: #dc3545;
                color: white;
                border-radius: 50%;
                padding:1px 6px; /* Adjust as needed */
                font-size: 0.75em; /* Adjust as needed */
                display: flex;
                align-items: center;
                justify-content: center;
            ">{{ count($carts) }}</span>
      @endif
    </span>
  </a>
  <div class="cart-submenu">
    <div class="cart-wrapper-item">
      @forelse ($carts as $item)
        <div class="wrapper">
          <div class="wrapper-item">
            <div class="wrapper-img" style="margin-right: 1rem;">
              <img src="{{ asset('storage/' . $item->product->thumbnail) }}" alt="img">
            </div>
            <div class="wrapper-content">
              <h5 class="heading" style="font-size: 18px; ">{{ $item->product->title }} </h5>
              <div style="display: flex; align-items: center; margin-left: 0px;">
                <p>Rp</p>
                <p>{{ number_format($item->product->price, 0, ',', '.') }}</p>
              </div>
            </div>
          </div>
        </div>
      @empty
      @endforelse
    </div>
    <div class="cart-wrapper-section">
      <div class="wrapper-line"></div>
      <div class="cart-btn">
        <a href="{{ route('user.cart') }}" class="shop-btn checkout-btn">Tampilkan ke Keranjang</a>
      </div>
    </div>
  </div>
</div>
