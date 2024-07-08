<style>
    .header-favourite .wishlist-count {
        position: absolute;
            top: -10px;
            right: -10px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            padding:1px 6px;
            font-size: 0.75em;
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>


<div class="header-search">
    <div onclick="modalAction('.search')" class="anywhere-away"></div>
    <div class="modal-main">
        <div class="wrapper-close-btn" onclick="modalAction('.search')">
        </div>
        <div class="wrapper-main">
            <div class="search-section">
                <input type="text" placeholder="Telusuri produk...">
                <div class="divider"></div>
                <a href="#" class="shop-btn"><i class="fas fa-search"></i></a>
            </div>
        </div>
    </div>
</div>

@auth
    @can('user')
    <div class="header-favourite">
        <a href="{{ route('user.wishlist') }}" class="cart-item">
            <span style="position: relative;">
                <i class="fas fa-heart"></i>
                @if($countFavorite)
                <span class="wishlist-count">{{ $countFavorite }}</span>
            @endif
            </span>
        </a>
    </div>
    @endcan
@endauth
