@php
    $sidebarItems = [
        [
            'title' => 'Dasbor',
            'route' => 'seller.home',
            'icon' => 'box',
            'role' => 'seller'
        ],
        [
            'title' => 'Produk',
            'route' => 'seller.product',
            'icon' => 'shopping-cart',
            'role' => 'seller'
        ],
        [
            'title' => 'Data Transaksi',
            'route' => 'seller.transaction',
            'icon' => 'chart-bar',
            'role' => 'seller'
        ],
        [
            'title' => 'Transaksi',
            'route' => 'seller.transaction',  // Menyesuaikan sesuai konteks
            'icon' => 'wallet',
            'role' => 'seller'
        ],
        [
            'title' => 'Profil Lapak',
            'route' => 'seller.profil',
            'icon' => 'user',
            'role' => 'seller'
        ],
        [
            'title' => 'Profil',
            'route' => 'user.profile',
            'icon' => 'user',
            'role' => 'user'
        ],
        [
            'title' => 'Order',
            'route' => 'user.order',
            'icon' => 'list',
            'role' => 'user'
        ],
        [
            'title' => 'Keranjang',
            'route' => 'user.cart',
            'icon' => 'shopping-cart',
            'role' => 'user'
        ],
        [
            'title' => 'Daftar Keinginan',
            'route' => 'user.wishlist',
            'icon' => 'heart',
            'role' => 'user'
        ],
    ];
@endphp

<div class="nav justify-content-start h-100 d-none d-md-none d-lg-flex nav-item nav-pills w-100 flex-shrink-0 me-3"
    id="v-pills-tab" role="tablist" aria-orientation="vertical">
    @foreach ($sidebarItems as $item)
        @if (request()->routeIs("{$item['role']}.*"))
            <a href="{{ route($item['route']) }}" class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}">
                <span>
                    <i class="fas fa-{{ $item['icon'] }} text-dark fa-fw"></i>
                </span>
                <span class="text">
                    {{ $item['title'] }}
                </span>
            </a>
        @endif
    @endforeach

    <!-- Form Logout -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a href="{{ route('logout') }}" class="nav-link"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span>
            <i class="fas fa-sign-out-alt text-dark fa-fw"></i>
        </span>
        <span class="text">
            Logout
        </span>
    </a>
</div>
