<style>
    .shop-btn {
    color: rgb(255, 255, 255); /* General color for the anchor link */
}

.shop-btn .icon i {
    color: #6e6d79; /* Color for the icon */
    font-size: 1.5em; /* Font size for the icon */
}

</style>

@php
    $user = auth()->user();
    $store = $user?->store;
@endphp
<div class="header-bottom d-lg-block d-none">
    <div class="container">
        <div class="header-nav">
            <div class="category-menu-section position-relative">
                <div class="empty position-fixed" onclick="tooglmenu()"></div>
                <button class="dropdown-btn" onclick="tooglmenu()">
                    <span class="dropdown-icon">
                        <svg width="14" height="9" viewBox="0 0 14 9" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="14" height="1" />
                            <rect y="8" width="14" height="1" />
                            <rect y="4" width="10" height="1" />
                        </svg>
                    </span>
                    <span class="list-text">
                        Semua Kategori
                    </span>
                </button>
                <div class="category-dropdown position-absolute" id="subMenu">
                    <ul class="category-list">
                        <li class="category-list-item">
                            <a href="product-sidebar.html">
                                <div class="dropdown-item">
                                    <div class="dropdown-list-item">
                                        <span class="dropdown-img">
                                            <img src="template-assets/front/assets/images/homepage-one/category-img/dresses.webp"
                                                alt="dress">
                                        </span>
                                        <span class="dropdown-text">
                                            Dresses
                                        </span>
                                    </div>
                                    <div class="drop-down-list-icon">
                                        <span>
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                    transform="rotate(45 1.5 0.818359)" fill="#1D1D1D" />
                                                <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                    transform="rotate(135 5.58984 4.90918)" fill="#1D1D1D" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="category-list-item">
                            <a href="product-sidebar.html">
                                <div class="dropdown-item d-flex justify-content-between align-items-center">
                                    <div class="dropdown-list-item d-flex">
                                        <span class="dropdown-img">
                                            <img src="template-assets/front/assets/images/homepage-one/category-img/bags.webp"
                                                alt="Bags">
                                        </span>
                                        <span class="dropdown-text">
                                            Bags
                                        </span>
                                    </div>
                                    <div class="drop-down-list-icon">
                                        <span>
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                    transform="rotate(45 1.5 0.818359)" />
                                                <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                    transform="rotate(135 5.58984 4.90918)" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="category-list-item">
                            <a href="product-sidebar.html">
                                <div class="dropdown-item d-flex justify-content-between align-items-center">
                                    <div class="dropdown-list-item d-flex">
                                        <span class="dropdown-img">
                                            <img src="template-assets/front/assets/images/homepage-one/category-img/sweaters.webp"
                                                alt="sweaters">
                                        </span>
                                        <span class="dropdown-text">
                                            Sweaters
                                        </span>
                                    </div>
                                    <div class="drop-down-list-icon">
                                        <span>
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                    transform="rotate(45 1.5 0.818359)" />
                                                <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                    transform="rotate(135 5.58984 4.90918)" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="category-list-item">
                            <a href="product-sidebar.html">
                                <div class="dropdown-item d-flex justify-content-between align-items-center">
                                    <div class="dropdown-list-item d-flex">
                                        <span class="dropdown-img">
                                            <img src="template-assets/front/assets/images/homepage-one/category-img/shoes.webp"
                                                alt="sweaters">
                                        </span>
                                        <span class="dropdown-text">
                                            Boots
                                        </span>
                                    </div>
                                    <div class="drop-down-list-icon">
                                        <span>
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                    transform="rotate(45 1.5 0.818359)" />
                                                <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                    transform="rotate(135 5.58984 4.90918)" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="category-list-item">
                            <a href="product-sidebar.html">
                                <div class="dropdown-item d-flex justify-content-between align-items-center">
                                    <div class="dropdown-list-item d-flex">
                                        <span class="dropdown-img">
                                            <img src="template-assets/front/assets/images/homepage-one/category-img/gift.webp"
                                                alt="gift">
                                        </span>
                                        <span class="dropdown-text">
                                            Gifts
                                        </span>
                                    </div>
                                    <div class="drop-down-list-icon">
                                        <span>
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                    transform="rotate(45 1.5 0.818359)" />
                                                <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                    transform="rotate(135 5.58984 4.90918)" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="category-list-item">
                            <a href="product-sidebar.html">
                                <div class="dropdown-item d-flex justify-content-between align-items-center">
                                    <div class="dropdown-list-item d-flex">
                                        <span class="dropdown-img">
                                            <img src="template-assets/front/assets/images/homepage-one/category-img/sneakers.webp"
                                                alt="sneakers">
                                        </span>
                                        <span class="dropdown-text">
                                            Sneakers
                                        </span>
                                    </div>
                                    <div class="drop-down-list-icon">
                                        <span>
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                    transform="rotate(45 1.5 0.818359)" fill="#1D1D1D" />
                                                <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                    transform="rotate(135 5.58984 4.90918)" fill="#1D1D1D" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="category-list-item">
                            <a href="product-sidebar.html">
                                <div class="dropdown-item d-flex justify-content-between align-items-center">
                                    <div class="dropdown-list-item d-flex">
                                        <span class="dropdown-img">
                                            <img src="template-assets/front/assets/images/homepage-one/category-img/watch.webp"
                                                alt="watch">
                                        </span>
                                        <span class="dropdown-text">
                                            Watches
                                        </span>
                                    </div>
                                    <div class="drop-down-list-icon">
                                        <span>
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                    transform="rotate(45 1.5 0.818359)" />
                                                <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                    transform="rotate(135 5.58984 4.90918)" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="category-list-item">
                            <a href="product-sidebar.html">
                                <div class="dropdown-item d-flex justify-content-between align-items-center">
                                    <div class="dropdown-list-item d-flex">
                                        <span class="dropdown-img">
                                            <img src="template-assets/front/assets/images/homepage-one/category-img/ring.webp"
                                                alt="ring">
                                        </span>
                                        <span class="dropdown-text">
                                            Gold Ring
                                        </span>
                                    </div>
                                    <div class="drop-down-list-icon">
                                        <span>
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                    transform="rotate(45 1.5 0.818359)" />
                                                <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                    transform="rotate(135 5.58984 4.90918)" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="category-list-item">
                            <a href="product-sidebar.html">
                                <div class="dropdown-item d-flex justify-content-between align-items-center">
                                    <div class="dropdown-list-item d-flex">
                                        <span class="dropdown-img">
                                            <img src="template-assets/front/assets/images/homepage-one/category-img/cap.webp"
                                                alt="cap">
                                        </span>
                                        <span class="dropdown-text">
                                            Cap
                                        </span>
                                    </div>
                                    <div class="drop-down-list-icon">
                                        <span>
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                    transform="rotate(45 1.5 0.818359)" />
                                                <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                    transform="rotate(135 5.58984 4.90918)" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="category-list-item">
                            <a href="product-sidebar.html">
                                <div class="dropdown-item d-flex justify-content-between align-items-center">
                                    <div class="dropdown-list-item d-flex">
                                        <span class="dropdown-img">
                                            <img src="template-assets/front/assets/images/homepage-one/category-img/glass.webp"
                                                alt="glass">
                                        </span>
                                        <span class="dropdown-text">
                                            Sunglasses
                                        </span>
                                    </div>
                                    <div class="drop-down-list-icon">
                                        <span>
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                    transform="rotate(45 1.5 0.818359)" />
                                                <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                    transform="rotate(135 5.58984 4.90918)" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="category-list-item">
                            <a href="product-sidebar.html">
                                <div class="dropdown-item d-flex justify-content-between align-items-center">
                                    <div class="dropdown-list-item d-flex">
                                        <span class="dropdown-img">
                                            <img src="template-assets/front/assets/images/homepage-one/category-img/baby.webp"
                                                alt="baby">
                                        </span>
                                        <span class="dropdown-text">
                                            Baby Shop
                                        </span>
                                    </div>
                                    <div class="drop-down-list-icon">
                                        <span>
                                            <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.5" y="0.818359" width="5.78538" height="1.28564"
                                                    transform="rotate(45 1.5 0.818359)" />
                                                <rect x="5.58984" y="4.90918" width="5.78538" height="1.28564"
                                                    transform="rotate(135 5.58984 4.90918)" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="header-nav-menu">
                <ul class="menu-list">
                    <li>
                        <a href="/user/userhome">
                            <span class="list-text">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="/user/shop">
                            <span class="list-text">Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="/user/brand">
                            <span class="list-text">Brand</span>
                        </a>
                    </li>
                    <li>
                        <a href="/user/store">
                            <span class="list-text">Toko</span>
                        </a>
                    </li>
                    <li>
                        <a href="/about-us">
                            <span class="list-text">Tentang Kami</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="header-vendor-btn">
                @if (auth()->check())
                    @if (!$store)
                    <a href="{{ url('user/open-shop') }}" class="shop-btn">
                        <span class="list-text shop-text">Jualan Yuk</span>
                        <span class="icon">
                            <i class="fas fa-store"></i>
                        </span>
                    </a>

                    @else
                        <a href="{{ request()->routeIs('store.profile') ? url('/') : url('@' . $store->username) }}"
                            class="shop-btn">
                            <span class="icon">
                                <i class="fas fa-{{ request()->routeIs('store.profile') ? 'home' : 'store' }}"></i>
                            </span>
                            <span
                                class="list-text shop-text">{{ request()->routeIs('store.profile') ? 'Ke Beranda' : 'Ke Tokomu' }}</span>
                        </a>
                    @endif
                @else
                    <a href="{{ url('login') }}" class="shop-btn">
                        <span class="list-text shop-text">Masuk</span>
                        <span class="icon">
                            <i class="fas fa-user"></i>
                        </span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
