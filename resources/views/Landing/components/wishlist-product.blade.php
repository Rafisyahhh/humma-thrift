    @forelse ($product_favorite as $item)
    <div class="col-lg-3 col-sm-6">
        <div class="product-wrapper" data-aos="fade-up">
            <div class="product-img position-relative">
                <img src="{{ asset('storage/' . $item->product->thumbnail) }}" alt="product-img"
                    class="object-fit-cover">
                <div class="dropdown position-absolute" style="right: 0; top: 0;">
                    <a class="wishlist-link" href="#" role="button" id="wishlistDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"
                            style="color: #1c3879; font-size: 30px;"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="wishlistDropdown">
                        <li>
                            <form action="{{ route('destroyProduct.destroy', $item->id) }}"
                                method="POST"
                                onsubmit="return confirmDeletion('Apakah anda yakin ingin menghapus produk ini dari daftar favorit?', (() => { event.preventDefault(); this.submit()}))">
                                @csrf
                                @method('DELETE')
                                <a role="button" type="submit" class="dropdown-item"
                                    onclick="$(this).closest('form').submit()" style="color: red;">Hapus Favorit</a>
                            </form>
                        </li>
                        <hr>
                        <li><a class="dropdown-item" href="#">Batal</a></li>
                    </ul>
                </div>
            </div>
            <div class="product-info">
                <div class="product-description">
                    <a href="{{ route('store.product.detail', ['store' => $item->product->userStore->username, 'product' => $item->product->slug]) }}"
                        class="product-details"
                        style="font-size: 1.85rem">{{ $item->product->title }}
                    </a>
                    <div class="price">
                        <span class="new-price"
                            style="font-size: 1.8rem">Rp{{ number_format($item->product->price, null, null, '.') }}</span>
                    </div>
                </div>
            </div>
            <div class="product-cart-btn">
                <div></div>
                <form action="{{ route('storecart', $item->product->id) }}" method="POST">
                    @csrf
                    <button class="product-btn" type="submit">
                        <span>
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@empty
    <div class="col-lg-12 d-flex flex-column align-items-center">
        <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong"
            style="width: 200px; height: 200px;">
        <h5 class="text-center" style="color: #000000">Upss..</h5>
        <p class="text-center" style="color: #000000">Maaf, anda masih belum menambahkan daftar favorit</p>
    </div>
@endforelse
