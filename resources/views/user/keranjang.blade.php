@extends('layouts.home')

@section('style')
    <style>
        .table-row .table-wrapper .wrapper {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            gap: 2rem;
            width: 90rem;
        }
    </style>
@endsection


@section('content')
    <div class="container">
        <div class="cart-section">
            <div class="wishlist">
                {{-- <div>
                    <h5 class="cart-heading mt-4 pt-4 mb-4">Keranjang</h5>
                </div> --}}
                <div class="cart-section wishlist-section">
                    <table style="border-spacing: 10px; width: 100%;">
                        <tbody>
                            <tr class="table-row ticket-row" style="border: 1px solid #e6d5d593; background-color: #ffffff; width:100rem;">
                                <th class="table-wrapper wrapper-product" style="display: flex; align-items: center; padding-top: 25px;">
                                    <div class="form-check" style="display: flex; align-items: center;">
                                        <p style="flex: 0 0 3rem; text-align: left; margin-left: -1.70rem;">#</p>
                                        <p style="margin-right: 44.5rem; margin-left:3rem;">Produk</p>
                                        <p style="margin-right: 25rem;">Kategori</p>
                                        <p style="margin-right: 26rem;">Harga</p>
                                        <p>Aksi</p>
                                    </div>
                                </th>
                            </tr>

                            <tr class="table-row ticket-row" style="border:none; background-color: #ffffff;">
                                <td style="height:10px;"></td>
                            </tr>

                            @forelse ($cartStoreGroups as $storeItem)
                                <tr class="table-row ticket-row store-header"
                                    style="border: 1px solid #e6d5d593; background-color: #ffffff; width:100rem;">
                                    <td class="table-wrapper wrapper-product" style="display: flex; align-items: center;">
                                        <div class="form-check" style="display: flex; align-items: center;">
                                            <input class="form-check-input storeselectall" type="checkbox" value=""
                                                id="storeselectall" data-store="{{ $storeItem['store']->id }}"
                                                style="border-color: #215791; margin-right: 2rem;">
                                            <i class="fa-solid fa-store"
                                                style="margin-right: 1rem; color: #215791; font-size: 2rem; margin-left:2rem;"></i>
                                            <p style="font-weight: bold">{{ $storeItem['store']->name }}</p>
                                        </div>
                                    </td>
                                </tr>

                                <form action="{{ route('user.checkout.process') }}" id="products-form" method="post">
                                    @csrf
                                    @forelse ($storeItem['cartItems'] as $item)
                                        <tr class="table-row ticket-row product-list"
                                            style="border: 1px solid #e6d5d593; width:100rem; margin-left:55">
                                            <td class="table-wrapper wrapper-product">
                                                <div class="wrapper"
                                                    style="display: flex; align-items: center; width:122rem;">
                                                    <div class="form-check" style="margin-right: 1rem;">
                                                        <input class="form-check-input" type="checkbox" name="product_id[]"
                                                            value="{{ $item->product_id }}" id="product-{{ $item->id }}"
                                                            data-price="{{ $item->product->price }}"
                                                            data-store="{{ $item->product->userStore->id }}"
                                                            style="border-color: #215791;">
                                                    </div>
                                                    <div class="wrapper-img" style="margin-right: 1rem;"
                                                        data-route="{{ route('store.product.detail', ['store' => $item->product->userStore->username, 'product' => $item->product->slug]) }}">
                                                        <img src="{{ asset('storage/' . $item->product->thumbnail) }}"
                                                            alt="img">
                                                    </div>
                                                    <div class="wrapper-content"
                                                        style="display: flex; align-items: center; justify-content: space-between; flex-grow: 1;">
                                                        <h5 class="heading" style="font-size: 18px; "
                                                            data-route="{{ route('store.product.detail', ['store' => $item->product->userStore->username, 'product' => $item->product->slug]) }}">
                                                            {{ $item->product->title }}
                                                        </h5>
                                                        <div
                                                            style="display: flex; align-items: center; margin-left: 125px;">
                                                            <p class="inner-text">
                                                                {{ implode(', ', array_column($item->product->categories->toArray(), 'title')) }}
                                                            </p>
                                                        </div>
                                                        <div
                                                            style="display: flex; align-items: center; margin-inline-start: 10px;">
                                                            <p>Rp</p>
                                                            <p>{{ number_format($item->product->price, 0, ',', '.') }}</p>
                                                        </div>
                                                        <button type="button" class="deleteButton" data-form-target="deleteform-{{ $item->id }}"
                                                            style="color: red; font-weight: bold; font-size: 13px; padding: 5px 20px; border-radius: 20px; margin-right: 0.1rem; text-decoration: underline;">
                                                            Hapus</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </form>
                                @foreach ($storeItem['cartItems'] as $item)
                                    <form action="{{ route('deletecart', $item->id) }}" method="post"
                                        id="deleteform-{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endforeach
                            @empty
                                <tr class="table-row ticket-row" style="border:none; background-color: #ffffff;">
                                    <td class="cart-section wishlist-section" style="padding:2rem;">
                                        <div class="wrapper-content"
                                            style="display: flex; align-items: center; text-align: center; justify-content: center; flex-grow: 1; margin: 0 auto;">
                                            <h5 class="heading" style="font-size: 18px;">Maaf Anda belum memasukkan
                                                produk
                                                apapun</h5>
                                        </div>
                                    </td>
                                </tr>
                            @endif

                            <tr class="table-row ticket-row"
                                style="border: 1px solid #e6d5d593; background-color: #ffffff; width:130rem;">
                                <td style="display: flex; justify-content: flex-end; align-items: center;">
                                    <div class="wrapper-content me-5"
                                        style="display: flex; justify-content: flex-end; align-items: center;">
                                        <p style="margin-right: 1rem;" class="total-product">Total 0 produk :</p>
                                        <p>
                                        <h6 style="font-size: 18px; font-weight: bold;  color: red;" class="total-price">Rp
                                            0 </h6>
                                        </p>
                                        <button class="shop-btn submitButton" type="button"
                                            style="margin-left: 1rem;">Checkout</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Detail --}}
            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                style="height: 99%;">
                <div class="modal-dialog" style="margin-left: auto;">
                    <div class="login-section account-section p-0">
                        <div class="review-form m-0" style="height: 80%; width: 95rem;">
                            <div class="text-end mb-4">
                                <div class="close-btn">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                            <section class="product product-info" style="width:85rem; height:60%;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-info-img" data-aos="fade-right">
                                            <div class="swiper product-top" style="height:50rem;">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide slider-top-img">
                                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                                            alt="img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="product-info-content" data-aos="fade-left">
                                            <h5>Classic Design Skart</h5>
                                            <div class="price">
                                                <span class="new-price">Rp.100.000,00 - 200.000,00</span>
                                            </div>
                                            <hr>
                                            <div class="product-details">
                                                <p class="fs-2">Kategori : <span class="inner-text">Dress</span></p>
                                                <p class="fs-2">Brand : <span class="inner-text">Adidas</span></p>
                                                <p class="fs-2">Ukuran : <span class="inner-text">XL</span></p>
                                                <p class="fs-2">Stok : <span class="inner-text">2</span></p>
                                                <p class="fs-2">Deskripsi : <span class="inner-text">Lorem ipsum dolor
                                                        sit amet consectetur adipisicing elit. Eveniet cumque perferendis
                                                        libero nesciunt minima odio autem ratione quia, eligendi
                                                        temporibus!</span></p>
                                                <b>
                                                    <p class="fs-2">Status : <span class="inner-text">Diterima</span>
                                                    </p>
                                                </b>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        let totalPrice = 0;
        let totalProduct = 0;

        function formatRupiah(amount) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(amount);
        }

        $("[data-route]").click(function({
            target: {
                tagName
            }
        }) {
            if (!["A", "I"].includes(tagName)) window.location.href = $(this).data("route");
        });


        // $('.storeselectall').click(function(e) {
        //     const parentEl = $(this);
        //     const storeId = parentEl.data('store');

        //     // Mengatur status checkbox .storeselectall
        //     const isChecked = parentEl.prop('checked');
        //     $(`.product-list [type=checkbox][data-store=${storeId}]`).prop('checked', isChecked);

        //     // Menghitung kembali total harga dan produk setelah perubahan
        //     calculateTotal();
        // });

        // $('#cartSelectAll').click(function(e) {
        //     const isChecked = $(this).prop('checked');
        //     $(`[data-store]`).prop('checked', isChecked);

        //     // Menghitung kembali total harga dan produk setelah perubahan
        //     calculateTotal();
        // });

        // $('.product-list').find('[type=checkbox]').on('change', function() {
        //     // Mengatur ulang status .storeselectall setelah checkbox dalam grup berubah
        //     const storeId = $(this).data('store');
        //     const parentSelectAll = $(`.storeselectall[data-store=${storeId}]`);
        //     const checkboxes = $(`.product-list [type=checkbox][data-store=${storeId}]`);
        //     const allChecked = checkboxes.length === checkboxes.filter(':checked').length;

        //     parentSelectAll.prop('checked', allChecked);

        //     // Menghitung kembali total harga dan produk setelah perubahan
        //     calculateTotal();
        // });

        // $('.product-list [type=checkbox],.storeselectall').on('change', function() {
        //     // Menghitung kembali total harga dan produk setelah perubahan
        //     calculateTotal();

        //     const findCheckboxes = $('.product-list,.storeselectall').find('[type=checkbox]').length;
        //     const findChecked = $('.product-list,.storeselectall').find('[type=checkbox]:checked').length;

        //     $('#cartSelectAll').prop('checked', findCheckboxes === findChecked);
        // });


        $('.storeselectall').click(function(e) {
            const parentEl = $(this);
            const storeId = parentEl.data('store');

            // Deselect all other stores
            $('.storeselectall').not(parentEl).prop('checked', false);
            $('.product-list [type=checkbox]').not(`[data-store=${storeId}]`).prop('checked', false);

            // Set the status of the current store's checkboxes
            const isChecked = parentEl.prop('checked');
            $(`.product-list [type=checkbox][data-store=${storeId}]`).prop('checked', isChecked);

            // Recalculate total price and products after changes
            calculateTotal();
        });

        $('#cartSelectAll').click(function(e) {
            const isChecked = $(this).prop('checked');
            $(`[data-store]`).prop('checked', isChecked);

            // Recalculate total price and products after changes
            calculateTotal();
        });

        $('.product-list').find('[type=checkbox]').on('change', function() {
            const storeId = $(this).data('store');
            const parentSelectAll = $(`.storeselectall[data-store=${storeId}]`);
            const checkboxes = $(`.product-list [type=checkbox][data-store=${storeId}]`);
            const allChecked = checkboxes.length === checkboxes.filter(':checked').length;

            parentSelectAll.prop('checked', allChecked);

            // Deselect checkboxes from other stores
            $('.product-list [type=checkbox]').not(`[data-store=${storeId}]`).prop('checked', false);
            $('.storeselectall').not(parentSelectAll).prop('checked', false);

            // Recalculate total price and products after changes
            calculateTotal();
        });

        $('.product-list [type=checkbox],.storeselectall').on('change', function() {
            // Recalculate total price and products after changes
            calculateTotal();

            const findCheckboxes = $('.product-list,.storeselectall').find('[type=checkbox]').length;
            const findChecked = $('.product-list,.storeselectall').find('[type=checkbox]:checked').length;

            $('#cartSelectAll').prop('checked', findCheckboxes === findChecked);
        });

        function calculateTotal() {
            totalPrice = 0;
            totalProduct = 0;

            $('.product-list [type=checkbox]').each(function() {
                if (this.checked) {
                    totalPrice += parseInt($(this).data('price'));
                    totalProduct += 1;
                }
            });

            $('.total-product').text(`Total ${totalProduct} produk`);
            $('.total-price').html(formatRupiah(totalPrice));
        }
    </script>

    <script>
        $('.submitButton').click(function() {
            if ($('.product-list [type=checkbox]:checked').length == 0) {
                // flasher.error('Tidak ada produk yang dipilih');
                return false;
            }

            $('#products-form').submit();
        });
    </script>
    <script>
        $('.deleteButton').click(function() {
            let id = $(this).data('form-target');
            $(`#${id}`).submit();
        });
    </script>
@endpush
