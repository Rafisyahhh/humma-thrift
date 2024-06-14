@extends('penjualan.layouts.app')
@section('title', 'Produk')
@section('css')
    <style>
        .table-row.ticket-row:hover {
            background: rgba(167, 146, 119, 0.40) !important;
        }
    </style>
@endsection
@section('content')
    <div class="wishlist">
        <h5>Data Produk</h5>
            <a href="tambahproduk" class="shop-btn float-left mb-4" onclick="modalAction('.submit')">Tambah Produk</a>
        <div class="cart-section wishlist-section">
            <table>
                <tbody>
                    <tr class="table-row table-top-row">
                        <td class="table-wrapper wrapper-product">
                            <h5 class="table-heading">PRODUK</h5>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">HARGA</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">AKSI</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">STATUS</h5>
                            </div>
                        </td>
                    </tr>
                    <tr class="table-row ticket-row">
                        <td class="table-wrapper wrapper-product">
                            <div class="wrapper">
                                <div class="wrapper-img">
                                    <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                        alt="img">
                                </div>
                                <div class="wrapper-content">
                                    <h5 class="heading">Classic Design Skart</h5>
                                </div>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="heading">Rp.100.000,00 - 200.000,00</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <span>
                                    <div class="col-lg-6">
                                        <a href="#" class="shop-btn" onclick="modalAction('.submit')">Detail</a>

                                    <button type="button" class="shop-btn" data-bs-toggle="modal"
                                        data-bs-target="#detailModal">
                                        Detail
                                    </button>

                                    <button type="button" class="shop-btn" data-bs-toggle="modal"
                                        data-bs-target="#detailLelang">
                                        Lelang
                                    </button>
                                </span>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                            fill="#AAAAAA"></path>
                                    </svg>
                                </span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- <div class="wishlist-btn">
            <a href="#" class="clean-btn">Clean Wishlist</a>
            <a href="#" class="shop-btn">View Cards</a>
        </div> --}}
    </div>

   {{-- DETAIL --}}
   <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
   style="height: 99%;">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="login-section account-section p-0">
               <div class="review-form m-0" style="height: 80%; width: 95rem;">
                   <div class="text-end">
                       <div class="close-btn">

                           <button type="button" class="btn-close" data-bs-dismiss="modal"
                               aria-label="Close"></button>

                       </div>
                   </div>


                   <section class="product product-info" style="width:85rem; height:60%;">
                       {{-- <div class="container">
                           <div class="product-info-section"> --}}
                               <div class="row ">
                                   <div class="col-md-6">
                                       <div class="product-info-img" data-aos="fade-right">
                                           <div class="swiper product-top" style="height:50rem;">
                                               <div class="swiper-wrapper">
                                                   <div class="swiper-slide slider-top-img" >
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
                                               <p class="fs-2">Deskripsi : <span class="inner-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet cumque perferendis libero nesciunt minima odio autem ratione quia, eligendi temporibus!</span></p>
                                               <b>
                                                   <p class="fs-2">Status : <span class="inner-text">Diterima</span>
                                                   </p>
                                               </b>
                                           </div>
                                           <hr>
                                       </div>
                                   </div>
                               </div>
                           {{-- </div>
                       </div> --}}
                   </section>


               </div>
           </div>
       </div>
   </div>
</div>

    {{-- LELANG --}}
    <div class="modal fade" id="detailLelang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="height: 99%;">
        <div class="modal-dialog">
            {{-- <div class="modal-content"> --}}
                <div class="login-section account-section p-0">
                    <div class="review-form m-0 " style="height: 80%; width: 75rem;">
                        <div class="text-end mb-4">
                            <div class="close-btn">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        <table  style="width:65rem;">
                            <tbody>
                                <tr class="table-row table-top-row">
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">

                                            <h5 class="table-heading">PRODUK</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">HARGA</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">AKSI</h5>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="table-row ticket-row">
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="heading">Classic Design Skart</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="heading">Rp.100.000,00 - 200.000,00</h5>
                                        </div>
                                    </td>

                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="m9.55 17.308l-4.97-4.97l.714-.713l4.256 4.256l9.156-9.156l.713.714z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function modalAction(modalClass) {
            $(modalClass).toggleClass('active');
        }
    </script>
@endsection
