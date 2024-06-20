<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 133.79 127.59">
                    <g id="Layer_2" data-name="Layer 2">
                        <g id="Layer_1-2" data-name="Layer 1">
                            <path fill="#1c3879"
                                d="M40.37,97.49l-6.69,4.24,3.73-7A96.86,96.86,0,0,1,67,61.33l1.2-.83v-35l-.57-.21A34.16,34.16,0,0,1,46.17,0H26.4L0,9.77,13.19,45.42l17-6.28v88.45h38V84.87A109.48,109.48,0,0,0,40.37,97.49Z" />
                            <path fill="#d7e4f4"
                                d="M133.79,0V127.59h-38V78.37A111.76,111.76,0,0,0,39.25,95.73a94.17,94.17,0,0,1,56.52-46V0Z" />
                        </g>
                    </g>
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Thrifting</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
            <a href="{{ route('admin.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-home"></i>
                <div>Dasbor</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('/admin') ? 'active' : '' }}">
            <a href="{{ url('/admin') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-building"></i>
                <div>Toko</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
            <a href="{{ url('/admin/about') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-building"></i>
                <div>Tentang kami</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.brand.*') ? 'active' : '' }}">
            <a href="{{ route('admin.brand.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-flag"></i>
                <div>Merk</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
            <a href="{{ route('admin.category.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-list"></i>
                <div>Kategori</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-box"></i>
                <div>Produk</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>Persetujuan Produk</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link">
                        <div>Daftar Produk</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons ti ti-wallet"></i>
                <div>Transaksi</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div>Pengguna</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.event.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file"></i>
                <div>Event</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
