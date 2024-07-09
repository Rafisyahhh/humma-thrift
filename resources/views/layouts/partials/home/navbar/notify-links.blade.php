<style>
    .cart-submenu {
    background: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    width: 100%;
    max-width: 400px;
    max-height: 500px;
    overflow-y: auto;
}

.cart-wrapper-item {
    padding: 15px;
}

.notification-item {
    display: flex;
    align-items: start;
    padding: 10px 15px;
    border-bottom: 1px solid #f0f0f0;
}

.wrapper-img img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    /* border-radius: 50%; */
}

.wrapper-content {
    flex-grow: 1;
}

.wrapper-title {
    font-size: 16px;
    font-weight: 600;
    color: #333;
}

.new-price {
    font-size: 14px;
    color: #777;
}

.card-header {
    background-color: #f8f9fa;
    padding: 10px 15px;
    border-bottom: 1px solid #e0e0e0;
}

.card-header h5 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
}

.list-group {
    position: relative;
    height: 100px;
}

.list-group-item {
    position: absolute;
    top: 50%;
    text-align:center;
    transform: translateY(-50%);
}
</style>
<div class="header-cart header-right-dropdown">
    <a href="{{ route('user.cart') }}" class="cart-item">
        <span style="position: relative; display: inline-block;">
            <i class="fas fa-bell" style="font-size: 1.5em; position: relative;"></i>
            @if(!auth()->user()->unreadNotifications->isEmpty())
            <span style="
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
            ">{{ auth()->user()->unreadNotifications->count() }}</span>
            @endif
        </span>
    </a>
    <div class="cart-submenu">
        <div class="cart-wrapper-item">
            <div class="card-header border-bottom d-flex gap-3 align-items-center justify-content-between">
                <h5 class="mb-0">Notifikasi</h5>
            </div>
            @forelse(auth()->user()->unreadNotifications as $notification)
            {{-- @dd($notification->data) --}}
            {{-- @php
                $store = $notification->product_auction_id; // Sesuaikan dengan nama atribut yang benar
                $product = $notification->slug; // Sesuaikan dengan nama atribut yang benar
                $routeParameters = compact('store', 'product');
                $route = route('store.product.detail', $routeParameters);
            @endphp --}}
        <a href="{{ $notification->data && $notification->data['action'] ? $notification->data['action'] : '' }}">

            <div class="wrapper" style="padding:2px;">
                <div class="wrapper-item">
                    <div class="wrapper-content">
                        <h5 class="wrapper-title ms-4" style="font-size:1.5rem;">{{ $notification->data['title'] }}</h5>
                        <div class="price mx-4">
                            <p class="new-price">{{ Str::limit($notification->data['data'], 200) }}</p>
                        </div>

                    </div>
                </div>
                {{-- <span class="close-btn">
                    <svg viewBox="0 0 10 10" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z">
                        </path>
                    </svg>
                </span> --}}
                <div class="flex-shrink-0 dropdown-notifications-actions">
                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                            class="badge badge-dot"></span></a>
                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                            class="ti ti-x"></span></a>
                </div>
            </div>
            </a>
            @empty
            <li class="list-group-item list-group-item-action" >Tidak ada notifikasi yang belum dibaca</li>
            @endforelse
        </div>
        <div class="cart-wrapper-section">
            <div class="wrapper-line"></div>

            <div class="cart-btn">
                <a href="cart" class="shop-btn">Lihat Semua</a>
            </div>
        </div>
    </div>
</div>
