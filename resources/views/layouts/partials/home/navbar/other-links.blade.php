<div class="header-search">
        <div onclick="modalAction('.search')" class="anywhere-away"></div>
        <div class="modal-main">
            <div class="wrapper-close-btn" onclick="modalAction('.search')">
            </div>
            <div class="wrapper-main">
                <div class="search-section">
                    <input type="text" placeholder="Telusuri produk...">
                    <div class="divider"></div>
                    <button type="button">Semua Kategori</button>
                    <a href="#" class="shop-btn"><i class="fas fa-search"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@auth
    @can('user')
        <div class="header-favourite">
            <a href="wishlist.html" class="cart-item">
                <span>
                    <i class="fas fa-heart"></i>
                </span>
            </a>
        </div>
    @endcan
@endauth
