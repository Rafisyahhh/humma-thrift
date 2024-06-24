@php
    $sidebarItems = [
        /// Untuk Seller
        [
            'title' => 'Dasbor',
            'route' => 'seller.home',
            'icon' => 'box',
            'role' => 'seller',
        ],
        [
            'title' => 'Produk',
            'route' => 'seller.product',
            'icon' => 'shopping-cart',
            'role' => 'seller',
        ],
        [
            'title' => 'Data Transaksi',
            'route' => 'seller.transaction',
            'icon' => 'chart-bar',
            'role' => 'seller',
        ],
        [
            'title' => 'Data Penghasilan',
            'route' => 'seller.income',
            'icon' => 'wallet',
            'role' => 'seller',
        ],
        [
            'title' => 'Profil Lapak',
            'route' => 'seller.profil',
            'icon' => 'user',
            'role' => 'seller',
        ],

        /// Untuk User
        [
            'title' => 'Panel Dasbor',
            'route' => 'user.userhome',
            'icon' => 'tachometer-alt',
            'role' => 'user',
        ],
        [
            'title' => 'Profil',
            'route' => 'user.profile',
            'icon' => 'user',
            'role' => 'user',
        ],
        [
            'title' => 'Riwayat Transaksi',
            'route' => 'user.history.index',
            'icon' => 'history',
            'role' => 'user',
        ],
        [
            'title' => 'Pesanan Saya',
            'route' => 'user.order',
            'icon' => 'list',
            'role' => 'user',
        ],
       
        [
            'title' => 'Ganti Sandi',
            'route' => 'user.update-password.index',
            'icon' => 'lock',
            'role' => 'user',
        ],
    ];
@endphp

<div class="nav justify-content-start h-100 d-none d-md-none d-lg-flex nav-item nav-pills w-100 flex-shrink-0 me-3"
    id="v-pills-tab" role="tablist" aria-orientation="vertical">
    @foreach ($sidebarItems as $item)
        @if (request()->routeIs("{$item['role']}.*"))
            <a href="{{ route($item['route']) }}"
                class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}">
                <span>
                    <i class="fas fa-{{ $item['icon'] }} text-dark fa-fw"></i>
                </span>
                <span class="text">
                    {{ $item['title'] }}
                </span>
            </a>
        @endif
    @endforeach
</div>
