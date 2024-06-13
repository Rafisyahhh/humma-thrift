@extends('user.layouts.app')
@section('tittle', 'Checkout')
@section('content')
  <section class="blog about-blog">
    <div class="container">
      <div class="blog-heading about-heading">
        <h1 class="heading">Checkout</h1>
      </div>
    </div>
  </section>
  <section class="checkout product footer-padding">
    <div class="container">
      <div class="checkout-section">
        <div class="row gy-5">
          <div class="col-lg-8">
            <div class="checkout-wrapper">
              <div class="account-section billing-section">
                <h5 class="wrapper-heading">Alamat Pengiriman</h5>
                <div class="order-summery">
                  <div class="subtotal product-total">
                    <h5 class="wrapper-heading">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" xml:space="preserve" width="15"
                        height="15">
                        <path
                          d="M7.5 0a5.69 5.69 0 0 0-5.686 5.686c0 2.391 1.192 4.656 2.691 6.518 1.31 1.626 2.606 2.639 2.661 2.682A.54.54 0 0 0 7.5 15a.55.55 0 0 0 .334-.114c.055-.043 1.351-1.056 2.661-2.682 1.501-1.862 2.691-4.127 2.691-6.518A5.69 5.69 0 0 0 7.5 0m0 8.236a2.723 2.723 0 0 1-2.72-2.72c0-1.5 1.22-2.722 2.72-2.722s2.72 1.22 2.72 2.72S9 8.234 7.5 8.234" />
                      </svg>
                      Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    </h5>
                  </div>
                  <div>
                    <a class="border btn">Ganti alamat</a>
                    <a class="border btn">Kirim kebeberapa alamat</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="checkout-wrapper">
              <div class="account-section billing-section">
                <h5 class="wrapper-heading">Daftar Order</h5>
                <div class="order-summery">
                  <hr>
                  <div class="subtotal product-total">
                    <ul class="product-list">
                      @foreach ([['src' => 'https://placehold.co/400', 'judul' => 'Apple Watch X1', 'deskripsi' => '64GB, Black, 44mm, Chain Belt', 'harga' => '10'], ['src' => 'https://placehold.co/400', 'judul' => 'Apple Watch X1', 'deskripsi' => '64GB, Black, 44mm, Chain Belt', 'harga' => '10'], ['src' => 'https://placehold.co/400', 'judul' => 'Apple Watch X1', 'deskripsi' => '64GB, Black, 44mm, Chain Belt', 'harga' => '10'], ['src' => 'https://placehold.co/400', 'judul' => 'Apple Watch X1', 'deskripsi' => '64GB, Black, 44mm, Chain Belt', 'harga' => '10']] as $item)
                        <li>
                          <div class="d-flex gap-3">
                            <img src="{{ $item['src'] }}" width="40" />
                            <div class="mt-1">
                              <h5 class="wrapper-heading">{{ $item['judul'] }}</h5>
                              <p class="paragraph">{{ $item['deskripsi'] }}</p>
                            </div>
                          </div>
                          <div class="price mt-3">
                            <h5 class="wrapper-heading">${{ $item['harga'] }}</h5>
                          </div>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="checkout-wrapper">
              <div class="account-section billing-section">
                <h5 class="wrapper-heading">Ringkasan Belanja</h5>
                <div class="order-summery">
                  <div class="subtotal product-total">
                    <h5 class="wrapper-heading">Total Harga</h5>
                    <h5 class="wrapper-heading">$365</h5>
                  </div>
                  <div class="subtotal total">
                    <h5 class="wrapper-heading">Total Belanja</h5>
                    <h5 class="wrapper-heading price">$365</h5>
                  </div>
                  <a href="#" class="shop-btn">Place Order Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
