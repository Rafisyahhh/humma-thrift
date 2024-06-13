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
        <form class="row gy-5">
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
                    <button class="border btn" type="button" data-bs-toggle="modal" data-bs-target="#modal-1">Ganti
                      alamat</button>
                    {{-- Modal --}}
                    <div id="modal-1" class="modal fade" role="dialog" tabindex="-1">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content" action method="post">
                          <div class="modal-header border-0">
                            <h4 class="modal-title ms-auto">Daftar Alamat</h4><button class="btn-close" aria-label="Close"
                              data-bs-dismiss="modal" type="button"></button>
                          </div>
                          <div class="modal-body d-flex flex-column gap-2"><input class="form-control" type="search" />
                            <label class="card" for="alamat" role="button">
                              <div class="card-body">
                                <h4 class="card-title">Rumah</h4>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo
                                  odio, dapibus
                                  ac
                                  facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                              </div>
                              <input type="radio" id="alamat" name="alamat" class="d-none">
                            </label>
                            <label class="card" for="alamat2">
                              <div class="card-body">
                                <h4 class="card-title">Rumah</h4>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo
                                  odio, dapibus
                                  ac
                                  facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                              </div>
                              <input type="radio" id="alamat2" name="alamat" class="d-none">
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
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
                      @foreach ([['cover_image' => 'https://placehold.co/400', 'title' => 'Apple Watch X1', 'description' => '64GB, Black, 44mm, Chain Belt', 'price' => '10'], ['cover_image' => 'https://placehold.co/400', 'title' => 'Apple Watch X1', 'description' => '64GB, Black, 44mm, Chain Belt', 'price' => '10'], ['cover_image' => 'https://placehold.co/400', 'title' => 'Apple Watch X1', 'description' => '64GB, Black, 44mm, Chain Belt', 'price' => '10'], ['cover_image' => 'https://placehold.co/400', 'title' => 'Apple Watch X1', 'description' => '64GB, Black, 44mm, Chain Belt', 'price' => '10']] as $item)
                        <li>
                          <div class="d-flex gap-3">
                            <img src="{{ $item['cover_image'] }}" width="40" />
                            <div class="mt-1">
                              <h5 class="wrapper-heading">{{ $item['title'] }}</h5>
                              <p class="paragraph">{{ $item['description'] }}</p>
                            </div>
                          </div>
                          <div class="price mt-3">
                            <h5 class="wrapper-heading">${{ $item['price'] }}</h5>
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
                  <button type="button" class="shop-btn">Place Order Now</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
