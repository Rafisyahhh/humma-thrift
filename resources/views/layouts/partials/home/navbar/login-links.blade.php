@if (request()->routeIs(['register', 'login']))
    <div class="header-user">
        <a href="{{ url('/') }}" class="d-flex gap-2 align-items-center lh-1">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>
@elseif(auth()->check() && auth()->user()->getUserRoleInstance()->value === 'admin')
    <div class="header-user d-flex gap-4 h-100">
        <a href="{{ route('register') }}" class="d-flex gap-3 align-items-center lh-1">
            <span>Kembali Ke Dasbor</span>
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>
@elseif(auth()->check())
    <div class="header-favourite">
        <a href="wishlist.html" class="cart-item">
            <span>
                <svg  xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                    <path fill="6E6D79"
                        d="M21 19v1H3v-1l2-2v-6c0-3.1 2.03-5.83 5-6.71V4a2 2 0 0 1 2-2a2 2 0 0 1 2 2v.29c2.97.88 5 3.61 5 6.71v6zm-7 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2" />
                </svg>
            </span>
        </a>
    </div>

    <div class="header-favourite">
        <a href="wishlist.html" class="cart-item">
            <span>
                <svg width="35" height="27" viewBox="0 0 35 27" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.4047 8.54989C11.6187 8.30247 11.8069 8.07783 12.0027 7.86001C15.0697 4.45162 20.3879 5.51717 22.1581 9.60443C23.4189 12.5161 22.8485 15.213 20.9965 17.6962C19.6524 19.498 17.95 20.9437 16.2722 22.4108C15.0307 23.4964 13.774 24.5642 12.5246 25.6408C11.6986 26.3523 11.1108 26.3607 10.2924 25.6397C8.05177 23.6657 5.79225 21.7125 3.59029 19.6964C2.35865 18.5686 1.33266 17.2553 0.638823 15.7086C-0.626904 12.8872 0.0324709 9.41204 2.22306 7.41034C4.84011 5.01855 8.81757 5.36918 11.1059 8.19281C11.1968 8.30475 11.2907 8.41404 11.4047 8.54989Z"
                        fill="#6E6D79"></path>
                    <circle cx="26.7662" cy="8" r="8" fill="#AE1C9A"></circle>
                    <path
                        d="M26.846 13.1392C26.1632 13.1392 25.5534 13.0215 25.0164 12.7862C24.4828 12.5509 24.0602 12.2244 23.7487 11.8068C23.4404 11.3859 23.2747 10.8987 23.2515 10.3452H24.8126C24.8325 10.6468 24.9336 10.9086 25.1159 11.1307C25.3015 11.3494 25.5434 11.5185 25.8417 11.6378C26.14 11.7571 26.4715 11.8168 26.836 11.8168C27.2371 11.8168 27.5917 11.7472 27.9 11.608C28.2115 11.4687 28.4551 11.2749 28.6308 11.0263C28.8065 10.7744 28.8943 10.4844 28.8943 10.1562C28.8943 9.81487 28.8065 9.51491 28.6308 9.25639C28.4584 8.99455 28.2049 8.78906 27.8701 8.63991C27.5387 8.49077 27.1377 8.41619 26.667 8.41619H25.8069V7.16335H26.667C27.0448 7.16335 27.3763 7.09541 27.6613 6.95952C27.9497 6.82363 28.1751 6.63471 28.3375 6.39276C28.4999 6.14749 28.5811 5.8608 28.5811 5.53267C28.5811 5.2178 28.5098 4.94437 28.3673 4.71236C28.2281 4.47704 28.0292 4.29309 27.7707 4.16051C27.5155 4.02794 27.2139 3.96165 26.8659 3.96165C26.5344 3.96165 26.2245 4.02296 25.9362 4.1456C25.6511 4.26491 25.4191 4.43726 25.2402 4.66264C25.0612 4.88471 24.9651 5.15151 24.9518 5.46307H23.4653C23.4819 4.91288 23.6443 4.42898 23.9525 4.01136C24.2641 3.59375 24.6751 3.26728 25.1855 3.03196C25.6959 2.79664 26.2627 2.67898 26.8858 2.67898C27.5387 2.67898 28.1021 2.80658 28.5761 3.06179C29.0534 3.31368 29.4213 3.65009 29.6798 4.07102C29.9416 4.49195 30.0709 4.95265 30.0676 5.45312C30.0709 6.0232 29.9118 6.5071 29.5903 6.90483C29.2721 7.30256 28.8479 7.56937 28.3176 7.70526V7.7848C28.9937 7.88755 29.5174 8.15601 29.8886 8.5902C30.2631 9.02438 30.4487 9.56297 30.4454 10.206C30.4487 10.7661 30.293 11.2682 29.9781 11.7124C29.6665 12.1565 29.2406 12.5062 28.7004 12.7614C28.1601 13.0133 27.542 13.1392 26.846 13.1392Z"
                        fill="#F9FFFB"></path>
                </svg>
            </span>
        </a>
    </div>

    <div class="header-cart header-right-dropdown">
        <a href="cart.html" class="cart-item">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                    class="fill-current">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path fill="currentColor"
                        d="M20 22H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12z"></path>
                </svg>
            </span>
        </a>
        <div class="cart-submenu">
            <div class="cart-wrapper-section">
                <div class="d-flex gap-4 mb-4">
                    <img src="{{ auth()->user()->getGravatarLink() }}" alt="{{ auth()->user()->fullname }}"
                        height="48px" class="rounded-circle" />

                    <div class="d-flex flex-column gap-1">
                        <p class="fw-bold mb-0">{{ auth()->user()->fullname }}</p>
                        <p class="mb-0 opacity-75">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <div class="wrapper-line"></div>
                <div class="cart-btn">
                    <a href="cart.html" class="shop-btn view-btn">Kembali Ke Dasbor</a>
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
            <i class="fas fa-user-plus"></i>
            <span>Daftar</span>
        </a>
        <div class="vr"></div>
        <a href="{{ route('login') }}" class="d-flex gap-3 align-items-center lh-1">
            <i class="fas fa-sign-in-alt"></i>
            <span>Masuk</span>
        </a>
    </div>
@endif

@push('js')
<script>
    document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    });
</script>
@endpush
