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
          <table style="border-spacing: 10px; width: 100%;">
            <tbody>
              <tr class="table-row ticket-row"
                style="border: 1px solid #e6d5d593; background-color: #ffffff; width:100rem;">
                <td class="table-wrapper wrapper-product" style="display: flex; align-items: center;">
                  <div class="form-check" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                      style="border-color: #215791; margin-right: 1rem;">
                    <p style="margin-right: 44.5rem; margin-left:3rem;">Produk</p>
                    <p style="margin-right: 25rem;">Kategori</p>
                    <p style="margin-right: 26rem;">Harga</p>
                    <p>Aksi</p>
                  </div>
                </td>
              </tr>
              <tr class="table-row ticket-row" style="border:none; background-color: #ffffff;">
                <td style="height:10px;"></td>
              </tr>
              @forelse ($carts as $item)
                <tr class="table-row ticket-row"
                  style="border: 1px solid #e6d5d593; background-color: #ffffff; width:100rem;">
                  <td class="table-wrapper wrapper-product" style="display: flex; align-items: center;">
                    <div class="form-check" style="display: flex; align-items: center;">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                        style="border-color: #215791; margin-right: 2rem;">
                      <i class="fa-solid fa-store"
                        style="margin-right: 1rem; color: #215791; font-size: 2rem; margin-left:2rem;"></i>
                      <p style="font-weight: bold">{{ $item->product->userStore->name }}</p>
                    </div>
                  </td>
                </tr>

                <tr class="table-row ticket-row" style="border: 1px solid #e6d5d593; width:100rem;">
                  <td class="table-wrapper wrapper-product">
                    <div class="wrapper" style="display: flex; align-items: center; width:122rem;">
                      <div class="form-check" style="margin-right: 1rem;">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                          style="border-color: #215791;">
                      </div>
                      <div class="wrapper-img" style="margin-right: 1rem;">
                        <img src="{{ asset('storage/' . $item->product->thumbnail) }}" alt="img">
                      </div>
                      <div class="wrapper-content"
                        style="display: flex; align-items: center; justify-content: space-between; flex-grow: 1;">
                        <h5 class="heading" style="font-size: 18px; ">{{ $item->product->title }}
                        </h5>
                        <div style="display: flex; align-items: center; margin-left: 55px; ">
                          <p class="inner-text">
                            {{ implode(', ', array_column($item->product->categories->toArray(), 'title')) }}
                          </p>
                        </div>
                        <div style="display: flex; align-items: center; margin-left: 0px;">
                          <p>Rp</p>
                          <p>{{ number_format($item->product->price, 0, ',', '.') }}</p>
                        </div>
                        <form action="{{ route('deletecart', $item->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button
                            style="color: red; font-weight: bold; font-size: 13px; padding: 5px 20px; border-radius: 20px; margin-right: 0.1rem; text-decoration: underline;">
                            Hapus</button>
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
              @empty
                <tr class="table-row ticket-row" style="border:none; background-color: #ffffff;">
                  <td class="cart-section wishlist-section" style="padding:2rem;">
                    <div class="wrapper-content"
                      style="display: flex; align-items: center; text-align: center; justify-content: center; flex-grow: 1; margin: 0 auto;">
                      <h5 class="heading" style="font-size: 18px;">Maaf Anda belum memasukkan produk
                        apapun</h5>
                    </div>
                  </td>
                </tr>
              @endforelse
              {{-- <tr class="table-row ticket-row" style="border:none; background-color: #ffffff;">
                                <td style="height:45px;"></td>
                            </tr> --}}
              <tr class="table-row ticket-row"
                style="border: 1px solid #e6d5d593; background-color: #ffffff; width:130rem;">
                <td style="display: flex; justify-content: flex-end; align-items: center;">
                  <div class="wrapper-content me-5"
                    style="display: flex; justify-content: flex-end; align-items: center;">
                    <p style="margin-right: 1rem;">Total (0) produk :</p>
                    <p>
                    <h6 style="font-size: 18px; font-weight: bold;  color: red;">Rp 0 </h6>
                    </p>
                    <button class="shop-btn openModal" style="margin-left: 1rem;">Checkout</button>
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
                            <img
                              src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
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
