@forelse ($products as $item)
    <div class="col-lg-4 col-sm-6" isProduct>
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
                    {{-- STORE --}}
                    <tr class="table-row ticket-row store-header"
                        style="border: 1px solid #e6d5d593; background-color: #ffffff; width:100%;">
                        <td class="table-wrapper wrapper-product" style="display: flex; align-items: center;">
                            <div class="form-check" style="display: flex; align-items: center; margin-left: 1rem;">
                                <i class="fa-solid fa-store"
                                    style="margin-left: -3rem; color: #215791; font-size: 1.75rem;"></i>
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
    <div class="col-lg-12" isProduct>
        <h3 class="text-center">Produk Masih Kosong</h3>
        <p class="text-center">Maaf ya, kami masih belum menambahkan produknya. Tapi dalam
            waktu dekat kami akan menambahkan beberapa produk untukmu, stay tune.</p>
    </div>
@endforelse
