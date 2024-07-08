<style>
  .header-favourite .wishlist-count {
    position: absolute;
    top: -10px;
    right: -10px;
    background-color: #dc3545;
    color: white;
    border-radius: 50%;
    padding: 1px 6px;
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
      <form class="search-section" action="{{ route('searchProduct') }}">
        <input type="search" placeholder="Telusuri produk..." name="search" value="{{ $search }}">
        <div class="divider"></div>
        <a role="button" class="shop-btn" onclick="$(this).closest('form').submit()"><i class="fas fa-search"></i></a>
      </form>
    </div>
  </div>
</div>

@auth
  @can('user')
    <div class="header-favourite">
      <a href="{{ route('user.wishlist') }}" class="cart-item">
        <span style="position: relative;">
          <i class="fas fa-heart"></i>
          @if ($countFavorite)
            <span class="wishlist-count">{{ $countFavorite }}</span>
          @endif
        </span>
      </a>
    </div>
  @endcan
@endauth
