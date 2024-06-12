<style>
    .header-auth {
    display: flex;
    align-items: center;
    gap: 10px; /* Atur jarak antara elemen */
    font-size: 20px; /* Atur ukuran font untuk konten di dalam .header-auth */
}

.header-auth .btn {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

.header-auth .btn-login {
    color: rgb(94, 94, 94);
    border: none;
    border-radius: 5px; /* Border radius untuk tombol Login */
}

.header-auth .btn-register {

    color: rgb(94, 94, 94);
    border: none;
    border-radius: 5px; /* Border radius untuk tombol Register */
}

.header-auth span {
    font-size: 20px; /* Atur ukuran font untuk span */
}

</style>
<body>

    <header id="header" class="header">
        <div class="header-center-section d-none d-lg-block">
            <div class="container">
                <div class="header-center">
                    <div class="logo">
                        <a href="">
                            <img src="{{asset('template-assets/front/assets/images/logos/logo.webp')}}" alt="logo">
                        </a>
                    </div>
                    <div class="header-cart-items">
                        <div class="header-search">
                            <button class="header-search-btn" onclick="modalAction('.search')">
                                <span>
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.9708 16.4151C12.5227 17.4021 10.9758 17.9723 9.27353 18.0062C5.58462 18.0802 2.75802 16.483 1.05056 13.1945C-1.76315 7.77253 1.33485 1.37571 7.25086 0.167548C12.2281 -0.848249 17.2053 2.87895 17.7198 7.98579C17.9182 9.95558 17.5566 11.7939 16.5852 13.5061C16.4512 13.742 16.483 13.8725 16.6651 14.0553C18.2412 15.6386 19.8112 17.2272 21.3735 18.8244C22.1826 19.6513 22.2058 20.7559 21.456 21.4932C20.7697 22.1678 19.7047 22.1747 18.9764 21.4793C18.3623 20.8917 17.7774 20.2737 17.1796 19.6688C16.118 18.5929 15.0564 17.5153 13.9708 16.4151ZM2.89545 9.0364C2.91692 12.4172 5.59664 15.1164 8.91967 15.1042C12.2384 15.092 14.9138 12.3493 14.8889 8.98505C14.864 5.63213 12.1826 2.92508 8.89047 2.92857C5.58204 2.93118 2.87397 5.68958 2.89545 9.0364Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </button>
                            <div class="modal-wrapper search">
                                <div onclick="modalAction('.search')" class="anywhere-away"></div>

                                <div class="modal-main">
                                    <div class="wrapper-close-btn" onclick="modalAction('.search')">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="red" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="wrapper-main">
                                        <div class="search-section">
                                            <input type="text" placeholder="Search Products.........">
                                            <div class="divider"></div>
                                            <button type="button">All Categories</button>
                                            <a href="#" class="shop-btn">Search</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="header-auth">
                            <button class="btn btn-login">Login</button>
                            <span>|</span>
                            <button class="btn btn-register">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="mobile-menu d-block d-lg-none">
            <div class="mobile-menu-header d-flex justify-content-between align-items-center">
                <button class="btn" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <span>
                        <svg width="14" height="9" viewBox="0 0 14 9" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="14" height="1" fill="#1D1D1D" />
                            <rect y="8" width="14" height="1" fill="#1D1D1D" />
                            <rect y="4" width="10" height="1" fill="#1D1D1D" />
                        </svg>
                    </span>
                </button>
                <a href="" class="mobile-header-logo">
                    <img src="{{asset('template-assets/front/assets/images/logos/logo.webp')}}" alt="logo">
                </a>
            </div>
        </nav>
        <div class="header-bottom d-lg-block d-none">
            <div class="container">
                <div class="header-nav">
                    <div class="header-nav-menu" style="width:50cm">
                        <ul class="menu-list" >
                            <li>
                                <a href="/landing">
                                    <span class="list-text">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="/produk">
                                    <span class="list-text">Produk</span>
                                </a>
                            </li>
                            <li>
                                <a href="/brand">
                                    <span class="list-text">Brand</span>
                                </a>
                            </li>
                            <li>
                                <a href="/toko">
                                    <span class="list-text">Toko</span>
                                </a>
                            </li>
                            <li>
                                <a href="/about">
                                    <span class="list-text">Tentang Kami</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
