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
                <div>
                    <h5 class="cart-heading mt-4 pt-4 mb-4">Keranjang</h5>
                </div>
                <div class="cart-section wishlist-section">
                    <table style="border-spacing: 10px;">
                        <tbody>
                            <tr class="table-row ticket-row"
                                style="border: 1px solid #e6d5d593; background-color: #ffffff; width:100rem;">
                                <td class="table-wrapper wrapper-product" style="display: flex; align-items: center;">
                                    <div class="form-check" style="display: flex; align-items: center;">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                            style="border-color: #215791; margin-right: 1rem;">
                                        <p style="margin-right: 30rem; margin-left:18rem;">Produk</p>
                                        <p style="margin-right: 27rem;">Harga</p>
                                        <p>Aksi</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-row ticket-row" style="border:none; background-color: #ffffff;">
                                <td style="height:10px;"></td>
                            </tr>
                            <tr class="table-row ticket-row" style="border-color: #e6d5d593;">
                                <td class="table-wrapper wrapper-product">
                                    <div class="wrapper">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="border-color: #215791;">
                                        </div>
                                        <div class="wrapper-img">
                                            <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}" alt="img">
                                        </div>
                                        <div class="wrapper-content" style="display: flex; align-items: center; justify-content: space-between; flex-grow: 1;">
                                            <h5 class="heading" style="font-size: 18px; margin-right: 1rem;">Classic Design Skart</h5>
                                            <div style="display: flex; align-items: center; margin-right: 1rem;">
                                                <p>Rp</p>
                                                <p style="margin-left: 0.5rem;">100.000</p>
                                            </div>
                                            <p>Hapus</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="table-wrapper" style="align-items: center;"></td>
                                <td class="table-wrapper" style="display: flex; justify-content: flex-end;">
                                    <div class="wrapper-content me-5" style="text-align: end;">
                                        <p class="paragraph opacity-75 pt-1"></p>
                                    </div>
                                </td>
                                <td class="table-wrapper" style="align-items: center;"></td>
                                <td class="table-wrapper">
                                    <div class="wrapper-content me-5" style="float: right; text-align: end;">
                                        <p class="paragraph opacity-75 pt-1"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-row ticket-row" style="border:none; background-color: #ffffff;">
                                <td style="height:45px;"></td>
                            </tr>
                            <tr class="table-row ticket-row" style="border: 1px solid #e6d5d593; background-color: #ffffff;">
                                <td style="display: flex; justify-content: flex-end; align-items: center; width:100rem;">
                                    <div class="wrapper-content me-5" style="display: flex; justify-content: flex-end; align-items: center;">
                                        <p style="margin-right: 1rem;">Total produk :</p>
                                        <button class="shop-btn openModal" style="margin-left: 1rem;">Checkout</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Detail --}}
            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 99%;">
                <div class="modal-dialog" style="margin-left: auto;">
                    <div class="login-section account-section p-0">
                        <div class="review-form m-0" style="height: 80%; width: 95rem;">
                            <div class="text-end mb-4">
                                <div class="close-btn">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                            <section class="product product-info" style="width:85rem; height:60%;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-info-img" data-aos="fade-right">
                                            <div class="swiper product-top" style="height:50rem;">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide slider-top-img">
                                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}" alt="img">
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
                                                <p class="fs-2">Deskripsi : <span class="inner-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet cumque perferendis libero nesciunt minima odio autem ratione quia, eligendi temporibus!</span></p>
                                                <b>
                                                    <p class="fs-2">Status : <span class="inner-text">Diterima</span></p>
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
