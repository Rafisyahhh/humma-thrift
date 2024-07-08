<div class="header-cart header-right-dropdown">
    <a href="{{ route('user.cart') }}" class="cart-item">
        <span style="position: relative; display: inline-block;">
            <i class="fas fa-shopping-cart" style="font-size: 1.5em position: relative;"></i>
            @if ($countcart)
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
            ">{{ $countcart }}</span>
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
                    <span class="close-btn">
                        <svg viewBox="0 0 10 10" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z">
                            </path>
                        </svg>
                    </span>
                </div>
                @empty
                @endforelse
        </div>
        <div class="cart-wrapper-section">
            <div class="wrapper-line"></div>
            {{-- <div class="wrapper-subtotal">
                <h5 class="wrapper-title">Subtotal</h5>
                <h5 class="wrapper-title">$60</h5>
            </div> --}}
            <div class="cart-btn">
                <a href="cart" class="shop-btn checkout-btn">Tampilkan ke Keranjang</a>
            </div>
        </div>
    </div>
</div>
