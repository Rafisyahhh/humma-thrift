@forelse ($product_auction as $item)
    @php
        $user = Auth::user();
        if ($user) {
            $existingAuction = App\Models\auctions::where('user_id', Auth::id())
                ->where('product_auction_id', $item->id)
                ->first();
            $auctions = App\Models\Auctions::where('user_id', $user->id)
                ->where('product_auction_id', $item->id)
                ->first();
        }
        $auctionproduct = App\Models\Auctions::where('product_auction_id', $item->id)
            ->where('status', 1)
            ->first();

    @endphp
    {{-- @if ($auctions)
              @if ($auctions->status === 0) --}}
    <div class="col-lg-4 col-sm-6" isProduct>
        <div class="product-wrapper" data-aos="fade-up" style="height: 47rem !important;">
            <div class="product-img">
                <img src="{{ asset("storage/$item->thumbnail") }}" alt="product-img" class="object-fit-cover"
                    loading="lazy">
                <div class="product-cart-items">
                    {{-- <a href="/user/wishlist" class="favourite cart-item">
                                                    <span>
                                                        <i class="fas fa-heart"></i>
                                                    </span>
                                                </a>
                                                <a href="/user/wishlist" class="favourite cart-item">
                                                    <span>
                                                        <i class="fas fa-shopping-cart"></i>
                                                    </span>
                                                </a> --}}
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
                    @if ($user)
                        @if ($existingAuction && $auctions->status === 1)
                            <div class="price">
                                <span class="new-price">Rp{{ number_format($item->price, null, null, '.') }}</span>
                            </div>
                        @elseif ($auctionproduct)
                        @else
                            <div class="price">
                                <span class="new-price">Rp{{ number_format($item->bid_price_start, null, null, '.') }}
                                    -
                                    Rp{{ number_format($item->bid_price_end, null, null, '.') }}</span>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
            @if ($user)
                @if ($existingAuction && $auctions->status === 1)
                    <form action="{{ route('user.checkout.process.auction') }}" method="post">
                        @csrf
                        <div class="product-cart-btn" style="bottom:0;">
                            <input type="hidden" value="{{ $item->id }}" name="product_auction_id[]">
                            <button type="submit" class="product-btn">Beli sekarang</button>
                        </div>
                    </form>
                @elseif ($auctionproduct)
                    <div class="product-cart-btn">
                        <a data-id="{{ $item->id }}" class="product-btn openModal"
                            onclick="openModal2('#reviewModal-{{ $item->id }}')">
                            Lelang Berakhir</a>
                    </div>
                @else
                    <div class="product-cart-btn">
                        <a data-id="{{ $item->id }}" class="product-btn openModal"
                            onclick="openModal2('#reviewModal-{{ $item->id }}')">Ikuti
                            Lelang</a>
                    </div>
                @endif
            @else
                <div class="product-cart-btn">
                    <a href="{{ url('login') }}" class="product-btn openModal">Ikuti
                        Lelang</a>
                </div>
            @endif

            <div id="reviewModal-{{ $item->id }}" class="modal" style="display: none;">
                <div class="modal-content">
                    <button class="close" style="float: right; text-align: end;"
                        onclick="closeModal2('#reviewModal-{{ $item->id }}')">&times;</button>
                    @if ($user)
                        @if ($existingAuction)
                            <p style="text-align: center; font-size :20px; font-weight:bold; margin-top:2rem;">Anda
                                sudah
                                mengikuti lelang</p>
                            <p style="text-align: center; margin-bottom:2rem;">bid lelang anda :
                                {{ $auctions->auction_price }}</p>
                        @elseif ($auctionproduct)
                            <p
                                style="text-align: center; font-size :20px; font-weight:bold; margin-top: 2rem; margin-bottom:2rem;">
                                lelang sudah berakhir</p>
                        @else
                            <h4 style="text-align: center;">Bid Lelang</h4>
                            <form id="auctionForm-{{ $item->id }}" method="post"
                                action="{{ route('user.auctions.store') }}" class="mt-5">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <label for="auction_price" class="form-label" style="font-size: 18px;">Bid Lelang
                                    :</label> <br>
                                <input type="number" name="auction_price"
                                    class="form-control @error('auction_price') is-invalid @enderror"
                                    placeholder="Masukkan Bid Lelang anda" style="font-size: 17px;">
                                <p style="margin-top: 5px;margin-left:6px;font-size:12px;color: #7c7c7c;">
                                    Bid : Rp{{ number_format($item->bid_price_start, null, null, '.') }}
                                    -
                                    Rp{{ number_format($item->bid_price_end, null, null, '.') }}</p>
                                @error('auction_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button type="submit" class="shop-btn" style="margin-left: 22rem;">Kirim Bid
                                    Anda</button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
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
                                    <i class="fa-brands fa-square-x-twitter"
                                        style="color: #1c3879;font-size:4rem"></i>
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
            <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong"
                style="width: 200px; height: 200px;">
            <h5 class="text-center" style="color: #000000">Upss..</h5>
            <p class="text-center" style="color: #000000">Maaf ya, kami masih belum menambahkan produknya. Tapi
                dalam waktu dekat kami akan menambahkan beberapa produk untukmu, stay tune.</p>
        </div>
        {{-- <div class="col-lg-12" isProduct>
      <h5 class="text-center" style="color: #a5a3ae">Produk Lelang Masih Kosong</h5>
      <p class="text-center" style="color: #a5a3ae">Maaf ya, kami masih belum menambahkan produknya. Tapi
        dalam
        waktu dekat kami akan menambahkan beberapa produk untukmu, stay tune.</p>
    </div> --}}
    @endif
@endforelse
