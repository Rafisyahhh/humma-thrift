@forelse ($products as $item)
  <div class="col-lg-4 col-sm-6" isProduct>
    <div class="product-wrapper p-0" data-aos="fade-up">
      <div class="product-img">
        <img src="{{ asset("storage/$item->thumbnail") }}" alt="product-img" class="object-fit-cover">
        <div class="product-cart-items">
          @auth
            @role('user')
              <form action="{{ route('storesproduct', $item->id) }}" method="POST" onsubmit="ajaxSubmit(event, this)">
                @csrf
                <button class="favourite cart-item">
                  <span>
                    <i class="fas fa-heart"></i>
                  </span>
                </button>
              </form>
              <form action="{{ route('storecart', $item->id) }}" method="POST" onsubmit="ajaxSubmit(event, this)">
                @csrf
                <button class="favourite cart-item">
                  <span>
                    <i class="fas fa-shopping-cart" style="font-size: 18px;"></i>
                  </span>
                </button>
              </form>
            @endrole
          @endauth
          <a data-id="{{ $item->id }}" class="compaire item-cart openModal"
            onclick="openModal2('#shareModal-{{ $item->id }}')">
            <span>
              <i class="fas fa-share"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="product-info">
        <div class="product-description">
          {{-- STORE --}}
          <tr class="table-row ticket-row store-header"
            style="border: 1px solid #e6d5d593; background-color: #ffffff; width:100%;">
            <td class="table-wrapper wrapper-product" style="display: flex; align-items: center;">
              <div class="form-check" style="display: flex; align-items: center; margin-left: 1rem;">
                <i class="fa-solid fa-store" style="margin-left: -3rem; color: #215791; font-size: 1.75rem;"></i>
                <a href="{{ route('store.profile', ['store' => $item->userStore->username]) }}"
                  style="font-weight: bold; margin-left: 1rem; font-size: 1.55rem; color: gray;">{{ $item->userStore->name }}</a>
              </div>
            </td><br>
          </tr>
          <a href="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
            class="product-details">{{ $item->title }}
          </a>
          <div class="price">
            <span class="new-price">Rp{{ number_format($item->price, 0, '', '.') }}</span>
          </div>
        </div>
      </div>
      @auth
        @role('user')
          <form action="{{ route('user.checkout.process') }}" method="post">
            @csrf
          @endrole
        @endauth
        <div class="product-cart-btn" style="bottom:0;">
          <input type="hidden" value="{{ $item->id }}" name="product_id[]">
          <button type="submit" class="product-btn">Beli sekarang</button>
        </div>
        @auth
          @role('user')
          </form>
        @endrole
      @endauth
      <div id="shareModal-{{ $item->id }}" class="modal" style="display: none;">
        <div class="modal-content">
          <button class="close" style="float: right; text-align: end;"
            onclick="closeModal2('#shareModal-{{ $item->id }}')">&times;</button>
          <div class="align-items-center gap-3 justify-content-center py-3" style="position: relative;">
            <p class="fs-2 mb-0 text-center fw-bold">Bagikan ke:</p>
            <div class="d-flex gap-2 align-items-center justify-content-center mt-2">
              <span class="share-container share-buttons d-flex gap-3 ms-2" style="z-index:1;">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                  target="_blank" class="social-buttons">
                  <i class="fa-brands fa-square-facebook" style="color: #1c3879;font-size:4rem"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}&text={{ $item->title }}"
                  target="_blank" class="social-buttons">
                  <i class="fa-brands fa-square-x-twitter" style="color: #1c3879;font-size:4rem"></i>
                </a>
                <a href="https://t.me/share/url?url={{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}&text={{ $item->title }}"
                  target="_blank" class="social-buttons">
                  <i class="fa-brands fa-telegram" style="color: #1c3879;font-size:4rem"></i>
                </a>
                <a href="https://api.whatsapp.com/send?text={{ $item->title . ' ' . route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
                  target="_blank" class="social-buttons">
                  <i class="fa-brands fa-whatsapp" style="color: #1c3879;font-size:4rem"></i>
                </a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@empty
  @if (!isset($doNotShowEmptyProduct))
    <div class="col-lg-12 d-flex flex-column align-items-center" isProduct>
      <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;">
      <h5 class="text-center" style="color: #000000">Upss..</h5>
      <p class="text-center" style="color: #000000">Maaf ya, kami masih belum menambahkan produknya. Tapi
        dalam waktu dekat kami akan menambahkan beberapa produk untukmu, stay tune.</p>
    </div>
    {{-- <div class="col-lg-12" isProduct>
    <h3 class="text-center">Produk Masih Kosong</h3>
    <p class="text-center">Maaf ya, kami masih belum menambahkan produknya. Tapi dalam
        waktu dekat kami akan menambahkan beberapa produk untukmu, stay tune.</p>
</div> --}}
  @endif
@endforelse
