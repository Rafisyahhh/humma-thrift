@php
    $sidebarItems = [
        [
            'title' => 'Profil',
            'route' => 'profil',
            'icon' => 'user',
        ],
        [
            'title' => 'Order',
            'route' => 'order',
            'icon' => 'list',
        ],
        [
            'title' => 'Keranjang',
            'route' => 'keranjang',
            'icon' => 'shopping-cart',
        ],
        [
            'title' => 'Daftar Keinginan',
            'route' => 'whislist',
            'icon' => 'heart',
        ],
    ];
@endphp

@foreach ($sidebarItems as $item)
    <a href="{{ route($item['route']) }}" class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}">
        <span>
            <i class="fas fa-{{ $item['icon'] }}"></i>
        </span>
        <span class="text">
            {{ $item['title'] }}
        </span>
    </a>
@endforeach
