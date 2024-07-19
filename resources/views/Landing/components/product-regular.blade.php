@forelse ($products as $item)
  <div class="col-lg-4 col-sm-6" data-brand="{{ $item->brand->title }}"
    data-categories="{{ json_encode($item->categories->pluck('title')->toArray()) }}"
    data-color="{{ strtolower($item->color) }}" data-size="{{ strtolower($item->size) }}" data-price="{{ $item->price }}">
    <div class="product-wrapper p-0" data-aos="fade-up">
      <div class="product-img">
        <img src="{{ asset("storage/$item->thumbnail") }}" alt="product-img" class="object-fit-cover">
        <div class="product-cart-items">
          <form action="{{ route('storesproduct', $item->id) }}" method="POST">
            @csrf
            <button class="favourite cart-item">
              <span>
                <i class="fas fa-heart"></i>
              </span>
            </button>
          </form>
          <form action="{{ route('storecart', $item->id) }}" method="POST">
            @csrf
            <button class="favourite cart-item">
              <span>
                <i class="fas fa-shopping-cart" style="font-size: 18px;"></i>
              </span>
            </button>
          </form>
          <a href="#" class="compaire cart-item">
            <span>
              <i class="fas fa-share"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="product-info">
        <div class="product-description">
          <a href="{{ route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]) }}"
            class="product-details">{{ $item->title }}
          </a>
          <div class="price">
            <span class="new-price">Rp{{ number_format($item->price, 0, '', '.') }}</span>
          </div>
        </div>
      </div>
      <form action="{{ route('user.checkout.process') }}" method="post">
        @csrf
        <div class="product-cart-btn" style="bottom:0;">
          <input type="hidden" value="{{ $item->id }}" name="product_id[]">
          <button type="submit" class="product-btn">Beli sekarang</button>
        </div>
      </form>
    </div>
  </div>
@empty
  <div class="col-lg-12">
    <h3 class="text-center">Produk Masih Kosong</h3>
    <p class="text-center">Maaf ya, kami masih belum menambahkan produknya. Tapi dalam
      waktu dekat kami akan menambahkan beberapa produk untukmu, stay tune.</p>
  </div>
@endforelse
