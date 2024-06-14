    <header id="header" class="header">
        <div class="header-center-section d-none d-lg-block">
            <div class="container">
                <div class="header-center">
                    <div class="logo">
                        <a href="index.html">
                            <img src="/template-assets/front/assets/images/logos/logo.webp" alt="logo">
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
                                            fill="white" />
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
                                            <input type="text" placeholder="Telusuri produk.........">
                                            <div class="divider"></div>
                                            <button type="button">Semua Kategori</button>
                                            <a href="#" class="shop-btn">Telusuri</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="header-vendor-btn"> <a href="{{ url('/user/home') }}" class="shop-btn">
                            <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.74302 8.92795C3.96205 8.92795 4.15262 8.92795 4.34371 8.92795C6.51751 8.92795 8.6914 8.92795 10.8648 8.92795C13.8455 8.92795 16.8266 8.92751 19.8074 8.92751C20.6961 8.92751 21.5848 8.92976 22.4735 8.92705C22.8788 8.92569 23.1902 8.74735 23.3742 8.37349C23.5613 8.00377 23.5118 7.63444 23.2623 7.30574C23.0677 7.04973 22.7947 6.92827 22.4713 6.92963C21.7905 6.93234 21.1097 6.93098 20.4289 6.93098C18.0472 6.93098 15.6659 6.93098 13.2841 6.93098C10.218 6.93098 7.15147 6.93098 4.08544 6.93098C3.97264 6.93098 3.86016 6.93098 3.71781 6.93098C3.81292 6.82668 3.88586 6.74135 3.96417 6.66143C4.43437 6.18328 4.90775 5.70778 5.37705 5.22877C5.86367 4.73206 6.3459 4.22093 6.83255 3.72428C7.50577 3.03662 8.18841 2.35853 8.85236 1.66093C9.09045 1.41065 9.15455 1.08428 9.05944 0.742525C8.84403 -0.030522 7.94328 -0.24992 7.38806 0.323142C6.56584 1.17136 5.73453 2.01079 4.90727 2.85419C4.30516 3.46827 3.70317 4.08276 3.10148 4.69767C2.4048 5.40978 1.70887 6.12271 1.01216 6.8352C0.894087 6.95575 0.775076 7.0754 0.656492 7.1955C0.30967 7.54633 0.276098 8.15722 0.605675 8.5234C1.00195 8.96317 1.41478 9.38759 1.82437 9.81427C2.20352 10.2093 2.58656 10.6003 2.96966 10.9909C3.32673 11.3552 3.68462 11.7044 4.04471 12.0808C4.4846 12.5505 4.90489 12.9804 5.32565 13.4093C5.74893 13.8414 6.18023 14.2658 6.59425 14.7074C6.96372 15.1016 7.63028 15.0817 7.9656 14.7426C8.37615 14.3272 8.40005 13.7362 8.00496 13.3145C7.66217 12.9483 7.30432 12.5966 6.95351 12.2381C6.071 11.3355 5.18892 10.432 4.30627 9.53046C3.81705 9.03019 3.32651 8.53082 2.83681 8.02954C2.81148 8.00426 2.78769 7.97671 2.74302 7.92795Z" />
                            </svg>
                                <span class="list-text shop-text">Menjadi Pembeli</span> <span class="icon"></span>
                            </a>
                        </div>


                        <div class="header-cart">
                            <div class="header-user">
                                <a href="/profil">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24" class="fill-current">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path
                                                d="M20 22H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="cart-submenu">
                                <div class="cart-wrapper-section">
                                    <div class="cart-btn">
                                        <a href="/profil" class="shop-btn view-btn">
                                            <i class="fas fa-user"></i> Profil
                                        </a>
                                        <a href="checkout.html" class="shop-btn checkout-btn">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </header>
