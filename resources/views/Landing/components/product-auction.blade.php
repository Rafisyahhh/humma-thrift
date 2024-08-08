<div class="col-lg-4 col-sm-6" isProductAuction>
  <div class="product-wrapper" data-aos="fade-up" style="height: 47rem !important;">
    <div class="product-img">
      <img src=":thumbnail:" alt="product-img" class="object-fit-cover" loading="lazy">
      <div class="product-cart-items">
        <a data-id=":id:" class="compaire item-cart openModal" onclick="openModal('#shareModal').share()">
          <span>
            <i class="fas fa-share"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="product-info">
      <div class="product-description">
        <tr class="table-row ticket-row store-header"
          style="border: 1px solid #e6d5d593; background-color: #ffffff; width:100%;">
          <td class="table-wrapper wrapper-product" style="display: flex; align-items: center;">
            <div class="form-check" style="display: flex; align-items: center; margin-left: 1rem;">
              <i class="fa-solid fa-store" style="margin-left: -3rem; color: #215791; font-size: 1.75rem;"></i>
              <a href=":store.profile:"
                style="font-weight: bold; margin-left: 1rem; font-size: 1.55rem; color: gray;">:userStore.name:</a>
            </div>
          </td><br>
        </tr>
        <a href=":store.product.detail:" class="product-details">:title:
        </a>
        <div class="price">
          <span class="new-price">:price:</span>
        </div>
      </div>
    </div>
    {{-- @if ($user)
      @if ($existingAuction && $auctions->status === 1) --}}
    <form action="{{ route('user.checkout.process.auction') }}" method="post">
      @csrf
      <div class="product-cart-btn" style="bottom:0;">
        <input type="hidden" value=":id:" name="product_auction_id[]">
        <button type="submit" class="product-btn">Beli sekarang</button>
      </div>
    </form>
    {{-- @elseif ($auctionproduct)
        <div class="product-cart-btn">
          <a data-id=":id:" class="product-btn openModal" onclick="openModal2('#reviewModal-:id:')">
            Lelang Berakhir</a>
        </div>
      @else
        <div class="product-cart-btn">
          <a data-id=":id:" class="product-btn openModal" onclick="openModal2('#reviewModal-:id:')">Ikuti
            Lelang</a>
        </div>
      @endif
    @else
      <div class="product-cart-btn">
        <a href="{{ url('login') }}" class="product-btn openModal">Ikuti
          Lelang</a>
      </div>
    @endif --}}

    <div id="reviewModal-:id:" class="modal" style="display: none;">
      <div class="modal-content">
        <button class="close" style="float: right; text-align: end;"
          onclick="closeModal2('#reviewModal-:id:')">&times;</button>
        {{-- @if ($user)
          @if ($existingAuction)
            <p style="text-align: center; font-size :20px; font-weight:bold; margin-top:2rem;">Anda
              sudah
              mengikuti lelang</p>
            <p style="text-align: center; margin-bottom:2rem;">bid lelang anda :
              {{ $auctions->auction_price }}</p>
          @elseif ($auctionproduct)
            <p style="text-align: center; font-size :20px; font-weight:bold; margin-top: 2rem; margin-bottom:2rem;">
              lelang sudah berakhir</p>
          @else
            <h4 style="text-align: center;">Bid Lelang</h4>
            <form id="auctionForm-:id:" method="post" action="{{ route('user.auctions.store') }}" class="mt-5">
              @csrf
              <input type="hidden" name="product_id" value=":id:">
              <label for="auction_price" class="form-label" style="font-size: 18px;">Bid Lelang
                :</label> <br>
              <input type="number" name="auction_price" class="form-control" placeholder="Masukkan Bid Lelang anda"
                style="font-size: 17px;">
              <p style="margin-top: 5px;margin-left:6px;font-size:12px;color: #7c7c7c;">
                Bid : :price:</p>
              @error('auction_price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              <button type="submit" class="shop-btn" style="margin-left: 22rem;">Kirim Bid
                Anda</button>
            </form>
          @endif
        @endif --}}
      </div>
    </div>

  </div>
</div>
