@push('style')
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
@endpush

<div class="header-favourite">
  <a href="{{ route('user.wishlist') }}" class="cart-item">
    <span style="position: relative;" id="favorite-wrapper">
      <i class="fas fa-heart"></i>
      @if (count($favorites) > 0)
        <span class="wishlist-count">{{ count($favorites) }}</span>
      @endif
    </span>
  </a>
</div>
