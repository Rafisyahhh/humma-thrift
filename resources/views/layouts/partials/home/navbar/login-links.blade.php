
@if (request()->routeIs(['register', 'login']))
    <div class="header-user">
        <a href="{{ url('/') }}" class="d-flex gap-2 align-items-center lh-1">
            <i style="font-size: 1em" class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>
@elseif(auth()->check() && auth()->user()->getUserRoleInstance()->value === 'admin')
    <div class="header-user d-flex gap-4 h-100">
        <a href="{{ route('admin.index') }}" class="d-flex gap-3 align-items-center lh-1">
            <span>Ke Dasbor</span>
            <i style="font-size: 1.25em" class="fas fa-arrow-right"></i>
        </a>
    </div>
@elseif(auth()->check())
<div class="header-favourite">
    <a href="wishlist.html" class="cart-item">
        <span>
            <i class="fas fa-bell"></i>
        </span>
    </a>
</div>

<div class="header-favourite">
    <a href="wishlist.html" class="cart-item">
        <span>
            <i class="fas fa-heart"></i>
        </span>
    </a>
</div>

{{-- ICON PROFILE --}}
<div class="header-cart header-right-dropdown">
    <a href="/user/profile" class="cart-item">
        <span>
            <i class="fas fa-user"></i>
        </span>
    </a>

        <div class="cart-submenu">
            <div class="cart-wrapper-section">
                <div class="d-flex gap-4 mb-4">
                    <img src="{{ auth()->user()->getGravatarLink() }}" alt="{{ auth()->user()->name }}"
                        height="48px" class="rounded-circle" />

                    <div class="d-flex flex-column gap-1">
                        <p class="fw-bold mb-0">{{ auth()->user()->name }}</p>
                        <p class="mb-0 opacity-75">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <div class="wrapper-line"></div>
                <div class="cart-btn">
                    @if(auth()->user()->store)
                        <a href="{{ route('seller.home') }}" class="shop-btn view-btn"> Ke Dasbor Penjual</a>
                    @endif
                    <a href="{{ route('user.userhome') }}" class="shop-btn view-btn">Ke Dasbor</a>
                    <a href="#" class="shop-btn checkout-btn" id="logout-link">Keluar</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="header-user d-flex gap-4 h-100">
        <a href="{{ route('register') }}" class="d-flex gap-3 align-items-center lh-1">
            <i style="font-size: 1.125em" class="fas fa-user-plus"></i>
            <span>Daftar</span>
        </a>
        <div class="vr"></div>
        <a href="{{ route('login') }}" class="d-flex gap-3 align-items-center lh-1">
            <i style="font-size: 1.125em" class="fas fa-sign-in-alt"></i>
            <span>Masuk</span>
        </a>
    </div>
@endif

@push('js')
<script>
    document.getElementById('logout-link')?.addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    });
</script>
@endpush
