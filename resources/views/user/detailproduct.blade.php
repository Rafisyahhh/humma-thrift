@extends('layouts.home')

@section('title', 'Detail Product')

@section('style')
  <style>
    .share-container {
      display: flex;
      align-items: center;
    }

    .share-buttons {
      display: flex;
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .share-buttons li {
      margin-right: 10px;
    }

    .social-buttons {
      display: inline-block;
    }

    .header-bottom {
      z-index: 1;
      position: relative;
    }

    .text-gray {
      color: gray;
    }

    .row product-details {
      font-size: 10rem;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 100;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0, 0, 0);
      background-color: rgba(0, 0, 0, 0.4);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 100%;
      max-width: 60rem;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }


    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
@endsection
@section('script')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var modals = document.querySelectorAll('.modal');
      var btns = document.querySelectorAll('.openModal');
      var spans = document.querySelectorAll('.close');

      btns.forEach(function(btn, index) {
        btn.onclick = function() {
          modals[index].style.display = 'flex';
        }
      });

      spans.forEach(function(span, index) {
        span.onclick = function() {
          modals[index].style.display = 'none';
        }
      });

      window.onclick = function(event) {
        modals.forEach(function(modal) {
          if (event.target == modal) {
            modal.style.display = 'none';
          }
        });
      }
    });
  </script>
@endsection
@section('content')
    <section class="product product-info py-0">
        <div class="container">
            <div class="product-info-section">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="product-info-img" data-aos="fade-right">
                            <div class="swiper product-top" style="z-index:1">
                                <div class="swiper-wrapper">
                                    @if ($isProduct)
                                        @foreach ($isProduct->gallery as $item)
                                            <div class="swiper-slide slider-top-img">
                                                <div class="ratio ratio-1x1">
                                                    <img src="{{ asset('storage/' . $item->image) }}"
                                                        class="object-fit-cover" alt="img">
                                                </div>
                                            </div>
                                        @endforeach
                                    @elseif($isProductAuction)
                                        @foreach ($isProductAuction->gallery as $item)
                                            <div class="swiper-slide slider-top-img">
                                                <div class="ratio ratio-1x1">
                                                    <img src="{{ asset('storage/' . $item->image) }}"
                                                        class="object-fit-cover" alt="img">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="swiper product-bottom" style="z-index:1">
                                <div class="swiper-wrapper">
                                    @if ($isProduct)
                                        @foreach ($isProduct->gallery as $item)
                                            <div class="swiper-slide slider-bottom-img p-0">
                                                <div class="ratio ratio-1x1">
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="img"
                                                        class="object-fit-cover" width="100%" style="border-radius: 10%">
                                                </div>
                                            </div>
                                        @endforeach
                                    @elseif ($isProductAuction)
                                        @foreach ($isProductAuction->gallery as $item)
                                            <div class="swiper-slide slider-bottom-img">
                                                <div class="ratio ratio-1x1">
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="img"
                                                        style="border-radius: 10%" class="object-fit-cover">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($isProduct)
                        <div class="col-md-6">
                            <div class="svg-container"
                                style="position: absolute; top: 5%; left: 30%; width: 70%; height: 70%; z-index: 0;overflow:hidden">
                                <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 490"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="transition duration-300 ease-in-out delay-150">
                                    <path
                                        d="M 0,500 L 0,93 C 49.552835051546396,71.62196244477173 99.10567010309279,50.24392488954345 169,63 C 238.8943298969072,75.75607511045655 329.1301546391752,122.64626288659792 389,162 C 448.8698453608248,201.35373711340208 478.3737113402062,233.1710235640648 538,254 C 597.6262886597938,274.8289764359352 687.375,284.66964285714283 742,298 C 796.625,311.33035714285717 816.1262886597938,328.15040500736376 870,362 C 923.8737113402062,395.84959499263624 1012.1198453608249,446.7287371134021 1082,482 C 1151.880154639175,517.2712628865979 1203.394329896907,536.934646539028 1260,557 C 1316.605670103093,577.065353460972 1378.3028350515465,597.532676730486 1440,618 L 1440,500 L 0,500 Z"
                                        stroke="none" stroke-width="0" fill="#bacaff" fill-opacity="0.4"
                                        class="transition-all duration-300 ease-in-out delay-150 path-0"
                                        transform="rotate(-180 720 250)"></path>
                                    <path
                                        d="M 0,500 L 0,218 C 66.15740058910163,220.707382179676 132.31480117820325,223.41476435935198 191,233 C 249.68519882179675,242.58523564064802 300.89819587628864,259.04832474226805 361,281 C 421.10180412371136,302.95167525773195 490.09241531664225,330.39193667157593 553,346 C 615.9075846833578,361.60806332842407 672.7321428571428,365.38392857142856 725,403 C 777.2678571428572,440.61607142857144 824.9790132547867,512.0723490427098 891,558 C 957.0209867452133,603.9276509572902 1041.3518041237112,624.326675257732 1104,636 C 1166.6481958762888,647.673324742268 1207.6137702503684,650.6209499263624 1260,667 C 1312.3862297496316,683.3790500736376 1376.1931148748158,713.1895250368188 1440,743 L 1440,500 L 0,500 Z"
                                        stroke="none" stroke-width="0" fill="#bacaff" fill-opacity="0.53"
                                        class="transition-all duration-300 ease-in-out delay-150 path-1"
                                        transform="rotate(-180 720 250)"></path>
                                    <path
                                        d="M 0,500 L 0,343 C 75.1494845360825,316.22303019145807 150.298969072165,289.4460603829161 211,304 C 271.701030927835,318.5539396170839 317.9536082474226,374.43878865979383 371,425 C 424.0463917525774,475.56121134020617 483.8865979381443,520.7987849779087 541,533 C 598.1134020618557,545.2012150220913 652.5,524.3660714285716 718,535 C 783.5,545.6339285714284 860.1134020618555,587.7369293078056 920,636 C 979.8865979381445,684.2630706921944 1023.0463917525774,738.6862113402061 1079,759 C 1134.9536082474226,779.3137886597939 1203.701030927835,765.5182253313698 1266,778 C 1328.298969072165,790.4817746686302 1384.1494845360826,829.2408873343152 1440,868 L 1440,500 L 0,500 Z"
                                        stroke="none" stroke-width="0" fill="#bacaff" fill-opacity="1"
                                        class="transition-all duration-300 ease-in-out delay-150 path-2"
                                        transform="rotate(-180 720 250)"></path>
                                </svg>
                            </div>
                            <div class="product-info-content" data-aos="fade-left">
                                <h5 style="z-index:1;position: relative;">{{ $isProduct->title }}</h5>
                                <div class="price">
                                    <span class="new-price fs-1"
                                        style="z-index:1">Rp.{{ number_format($isProduct->price, 2, ',', '.') }}</span>
                                </div>
                                <hr>
                                <div class="row product-details">
                                    <div class="col-3 py-2 my-2" style="z-index:1">
                                        <p class="fs-2 text-grey">Kategori</p>
                                        <p class="fs-2 text-grey">Brand</p>
                                        <p class="fs-2 text-grey">Ukuran</p>
                                        <p class="fs-2 text-grey">Warna</p>
                                    </div>
                                    <div class="col-9 py-2 my-2" style="z-index:1">
                                        <p class="fs-2 inner-text">:
                                            {{ implode(', ', $isProduct->categories->pluck('title')->toArray()) }}</p>
                                        <p class="fs-2 inner-text">: {{ $isProduct->brand->title }}</p>
                                        <p class="fs-2 inner-text">: {{ $isProduct->size }}</p>
                                        <p class="fs-2 inner-text">: {{ $isProduct->color }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="product-quantity mt-0"
                                        style="display: flex; align-items: center; gap: 10px; z-index:1">
                                        <div class="share-icons">
                                            <a href="#" class="share-icon">
                                                <span>
                                                    <i class="fas fa-heart fa-xl" style="color: black"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <a href="#" style="width :10px" class="shop-btn"
                                            style="display: flex; align-items: center; gap: 10px; z-index:1">
                                            <span style="width: 37rem; align-items:center; justify-content:center;">
                                                <i class="fas fa-shopping-cart"></i>
                                                Masukkan Keranjang
                                            </span>
                                        </a>
                                        <a href="#" style="width :10px" class="shop-btn"
                                            style="display: flex; align-items: center; gap: 5px; z-index:1">
                                            <span style="width: 37rem; align-items:center; justify-content:center;">
                                                <i class="fa-solid fa-plus"></i>
                                                Beli Sekarang</span>
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                <p class="fs-2 d-flex py-2" style="z-index:1;position: relative;">Bagikan ke:
                                    <span class="share-container share-buttons gap-3" style="margin-left: 7px;z-index:1">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"
                                            target="_blank" class="social-buttons">
                                            <i class="fa-brands fa-square-facebook fa-lg" style="color: black"></i>
                                        </a>
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($text) }}"
                                            target="_blank" class="social-buttons">
                                            <i class="fa-brands fa-square-x-twitter fa-lg" style="color: black"></i>
                                        </a>
                                        <a href="https://t.me/share/url?url={{ urlencode($url) }}&text={{ urlencode($text) }}"
                                            target="_blank" class="social-buttons">
                                            <i class="fa-brands fa-telegram fa-lg" style="color: black"></i>
                                        </a>
                                        <a href="https://api.whatsapp.com/send?text={{ urlencode($text . ' ' . $url) }}"
                                            target="_blank" class="social-buttons">
                                            <i class="fa-brands fa-whatsapp fa-lg" style="color: black"></i>
                                        </a>
                                    </span>
                                </p>
                                <hr>
                                <div class="product-seller-section py-2">
                                    <div class="review-wrapper">
                                        <div class="wrapper">
                                            <div class="wrapper-aurthor">
                                                <div class="wrapper-info">
                                                    <div class="author-details d-flex">
                                                        <h5 class="d-flex align-items-center"
                                                            style="font-size: 25px; z-index:1"><img
                                                                style="height: 45px; margin-left: 10px;"
                                                                src="{{ asset('storage/' . $isProduct->userStore->store_logo) }}"
                                                                alt="aurthor-img" class="me-2">
                                                            <div style="margin-left: 10px; z-index:1">
                                                                {{ $isProduct->userStore->name }} <div
                                                                    class="text-secondary"
                                                                    style="font-size: 16px; margin-left: 4px;">
                                                                    {{ $isProduct->userStore->address }}</div>
                                                            </div>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    @endforeach
                  @endif
                </div>
              </div>
              <div class="swiper product-bottom" style="z-index:1">
                <div class="swiper-wrapper">
                  @if ($isProduct)
                    @foreach ($isProduct->gallery as $item)
                      <div class="swiper-slide slider-bottom-img p-0">
                        <div class="ratio ratio-1x1">
                          <img src="{{ asset('storage/' . $item->image) }}" alt="img" class="object-fit-cover"
                            width="100%" style="border-radius: 10%">
                        </div>
                      </div>
                    @endforeach
                  @elseif ($isProductAuction)
                    @foreach ($isProductAuction->gallery as $item)
                      <div class="swiper-slide slider-bottom-img">
                        <div class="ratio ratio-1x1">
                          <img src="{{ asset('storage/' . $item->image) }}" alt="img" style="border-radius: 10%"
                            class="object-fit-cover">
                        </div>
                      </div>
                    @endforeach
                  @endif
                </div>
              </div>
            </div>
          </div>
          @if ($isProduct)
            <div class="col-md-6">
              <div class="svg-container"
                style="position: absolute; top: 5%; left: 70%; width: 70%; height: 70%; z-index: 0; opacity:70%">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                  <path fill="#88b2f066"
                    d="M28.2,-50.6C38.9,-42.7,51.4,-39.8,55.3,-32.2C59.1,-24.6,54.3,-12.3,52.7,-0.9C51.2,10.5,52.8,21,52.9,35.3C52.9,49.7,51.3,67.9,42.2,72.4C33.1,76.9,16.6,67.8,1.5,65.1C-13.5,62.5,-27,66.3,-34,60.6C-40.9,54.8,-41.4,39.5,-50.3,27.8C-59.2,16.1,-76.6,8,-81.6,-2.9C-86.6,-13.8,-79.2,-27.6,-71.4,-41.3C-63.6,-54.9,-55.4,-68.4,-43.5,-75.6C-31.5,-82.8,-15.8,-83.7,-3.5,-77.7C8.8,-71.6,17.5,-58.6,28.2,-50.6Z"
                    transform="translate(100 100)" />
                </svg>
              </div>
              <div class="product-info-content" data-aos="fade-left">
                <h5 style="z-index:1;position: relative;">{{ $isProduct->title }}</h5>
                <div class="price">
                  <span class="new-price fs-1"
                    style="z-index:1">Rp.{{ number_format($isProduct->price, null, null, '.') }}</span>
                </div>
                <hr>
                <div class="row product-details">
                  <div class="col-3 py-2 my-2" style="z-index:1">
                    <p class="fs-2 text-grey">Kategori</p>
                    <p class="fs-2 text-grey">Brand</p>
                    <p class="fs-2 text-grey">Ukuran</p>
                    <p class="fs-2 text-grey">Warna</p>
                  </div>
                  <div class="col-9 py-2 my-2" style="z-index:1">
                    <p class="fs-2 inner-text">:
                      {{ implode(', ', $isProduct->categories->pluck('title')->toArray()) }}</p>
                    <p class="fs-2 inner-text">: {{ $isProduct->brand->title }}</p>
                    <p class="fs-2 inner-text">: {{ $isProduct->size }}</p>
                    <p class="fs-2 inner-text">: {{ $isProduct->color }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="product-quantity mt-0" style="display: flex; align-items: center; gap: 10px; z-index:1">
                    <div class="share-icons">
                      <a href="#" class="share-icon">
                        <span>
                          <i class="fas fa-heart fa-xl" style="color: black"></i>
                        </span>
                      </a>
                    </div>
                    <a href="#" style="width :10px" class="shop-btn"
                      style="display: flex; align-items: center; gap: 10px; z-index:1">
                      <span style="width: 37rem; align-items:center; justify-content:center;">
                        <i class="fas fa-shopping-cart"></i>
                        Masukkan Keranjang
                      </span>
                    </a>
                    <a href="#" style="width :10px" class="shop-btn"
                      style="display: flex; align-items: center; gap: 5px; z-index:1">
                      <span style="width: 37rem; align-items:center; justify-content:center;">
                        <i class="fa-solid fa-plus"></i>
                        Beli Sekarang</span>
                    </a>
                  </div>
                </div>
                <hr>
                <p class="fs-2 d-flex py-2" style="z-index:1;position: relative;">Bagikan ke:
                  <span class="share-container share-buttons gap-3" style="margin-left: 7px;z-index:1">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank"
                      class="social-buttons">
                      <i class="fa-brands fa-square-facebook fa-lg" style="color: black"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($text) }}"
                      target="_blank" class="social-buttons">
                      <i class="fa-brands fa-square-x-twitter fa-lg" style="color: black"></i>
                    </a>
                    <a href="https://t.me/share/url?url={{ urlencode($url) }}&text={{ urlencode($text) }}"
                      target="_blank" class="social-buttons">
                      <i class="fa-brands fa-telegram fa-lg" style="color: black"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($text . ' ' . $url) }}" target="_blank"
                      class="social-buttons">
                      <i class="fa-brands fa-whatsapp fa-lg" style="color: black"></i>
                    </a>
                  </span>
                </p>
                <hr>
                <div class="product-seller-section py-2">
                  <div class="review-wrapper">
                    <div class="wrapper">
                      <div class="wrapper-aurthor">
                        <div class="wrapper-info">
                          <div class="author-details d-flex">
                            <h5 class="d-flex align-items-center" style="font-size: 25px; z-index:1"><img
                                style="height: 45px; margin-left: 10px;"
                                src="{{ asset('storage/' . $isProduct->userStore->store_logo) }}" alt="aurthor-img"
                                class="me-2">
                              <div style="margin-left: 10px; z-index:1">
                                {{ $isProduct->userStore->name }} <div class="text-secondary"
                                  style="font-size: 16px; margin-left: 4px;">
                                  {{ $isProduct->userStore->address }}</div>
                              </div>
                            </h5>
                          </div>
                        </div>
                      </div>
                      <hr>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @elseif ($isProductAuction)
            <div class="col-md-6">
              <div class="svg-container"
                style="position: absolute; top: 5%; left: 70%; width: 70%; height: 70%; z-index: 0; opacity:70%">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                  <path fill="#5ca3e6"
                    d="M28.2,-50.6C38.9,-42.7,51.4,-39.8,55.3,-32.2C59.1,-24.6,54.3,-12.3,52.7,-0.9C51.2,10.5,52.8,21,52.9,35.3C52.9,49.7,51.3,67.9,42.2,72.4C33.1,76.9,16.6,67.8,1.5,65.1C-13.5,62.5,-27,66.3,-34,60.6C-40.9,54.8,-41.4,39.5,-50.3,27.8C-59.2,16.1,-76.6,8,-81.6,-2.9C-86.6,-13.8,-79.2,-27.6,-71.4,-41.3C-63.6,-54.9,-55.4,-68.4,-43.5,-75.6C-31.5,-82.8,-15.8,-83.7,-3.5,-77.7C8.8,-71.6,17.5,-58.6,28.2,-50.6Z"
                    transform="translate(100 100)" />
                </svg>
              </div>
              <div class="product-info-content" data-aos="fade-left">
                <h5 style="z-index:1;position: relative;">{{ $isProductAuction->title }}</h5>
                <div class="price">
                  <span class="new-price fs-1"
                    style="z-index:1">Rp{{ number_format($isProductAuction->bid_price_start, null, null, '.') }}
                    - Rp{{ number_format($isProductAuction->bid_price_end, null, null, '.') }}</span>
                </div>
                <hr>
                <div class="row product-details">
                  <div class="col-3 py-2 my-2" style="z-index:1">
                    <p class="fs-2">Kategori</p>
                    <p class="fs-2">Brand</p>
                    <p class="fs-2">Ukuran</p>
                    <p class="fs-2">Warna</p>
                  </div>
                  <div class="col-9 py-2 my-2" style="z-index:1">
                    <p class="fs-2 inner-text">:
                      {{ implode(', ', $isProductAuction->categories->pluck('title')->toArray()) }}
                    </p>
                    <p class="fs-2 inner-text">: {{ $isProductAuction->brand->title }}</p>
                    <p class="fs-2 inner-text">: {{ $isProductAuction->size }}</p>
                    <p class="fs-2 inner-text">: {{ $isProductAuction->color }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="product-quantity mt-0" style="display: flex; align-items: center; gap: 10px; z-index:1">
                    <div class="share-icons">
                      <a href="#" class="share-icon">
                        <span>
                          <i class="fas fa-heart fa-xl" style="color: black"></i>
                        </span>
                      </a>
                    </div>
                    <a href="#" style="width :10px" class="shop-btn"
                      style="display: flex; align-items: center; gap: 10px; z-index:1">
                      <span style="width: 37rem; align-items:center; justify-content:center;">
                        <i class="fas fa-shopping-cart"></i>
                        Masukkan Keranjang
                      </span>
                    </a>
                    <button style="width :10px" class="shop-btn openModal" data-id="{{ $isProductAuction->id }}"
                      style="display: flex; align-items: center; gap: 5px; z-index:1">
                      <span style="width: 37rem; align-items:center; justify-content:center;">
                        <i class="fa-solid fa-plus"></i>
                        Beli Sekarang</span>
                    </button>
                    <div id="reviewModal" class="modal">
                      <div class="modal-content">
                        <button class="close" style="float: right; text-align: end;">&times;</button>
                        <h4 style="text-align: center;">Bid Lelang</h4>
                        <form class="mt-5">
                          <label for="ulasan" class="form-label" style="font-size: 18px;">Bid
                            Lelang :</label> <br>
                          <input type="number" name="auction_price" class="form-control"
                            placeholder="Masukkan Bid Lelang anda" style="font-size: 17px;">

                          <button type="submit" class="shop-btn" style="margin-left: 22rem;">Kirim Bid Anda</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <p class="fs-2 d-flex py-2" style="position: relative;">Bagikan ke:
                  <span class="share-container share-buttons gap-3" style="margin-left: 7px;">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank"
                      class="social-buttons">
                      <i class="fa-brands fa-square-facebook fa-lg" style="color: black"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($text) }}"
                      target="_blank" class="social-buttons">
                      <i class="fa-brands fa-square-x-twitter fa-lg" style="color: black"></i>
                    </a>
                    <a href="https://t.me/share/url?url={{ urlencode($url) }}&text={{ urlencode($text) }}"
                      target="_blank" class="social-buttons">
                      <i class="fa-brands fa-telegram fa-lg" style="color: black"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($text . ' ' . $url) }}" target="_blank"
                      class="social-buttons">
                      <i class="fa-brands fa-whatsapp fa-lg" style="color: black"></i>
                    </a>
                  </span>
                </p>
                <hr>
                <div class="product-seller-section py-2">
                  <div class="review-wrapper">
                    <div class="wrapper">
                      <div class="wrapper-aurthor">
                        <div class="wrapper-info">
                          <div class="author-details d-flex">
                            <h5 class="d-flex align-items-center" style="font-size: 25px;">
                              <img style="height: 45px; margin-left: 10px;"
                                src="{{ asset('storage/' . $isProductAuction->userStore->store_logo) }}"
                                alt="aurthor-img" class="me-2">
                              <div style="margin-left: 10px;">
                                {{ $isProductAuction->userStore->name }} <div class="text-secondary"
                                  style="font-size: 16px; margin-left: 4px;">
                                  {{ $isProductAuction->userStore->address }}</div>
                              </div>
                            </h5>
                          </div>
                        </div>
                      </div>
                      <hr>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>


  <section class="product product-description">
    <div class="container">
      <div class="product-detail-section">
        <nav>
          <div class="nav nav-tabs nav-item" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
              type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
            <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review"
              type="button" role="tab" aria-controls="nav-review" aria-selected="false">Reviews</button>
          </div>
        </nav>
        <div class="tab-content tab-item" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
            tabindex="0" data-aos="fade-up">
            <div class="product-intro-section">
              <h5 class="intro-heading">Introduction</h5>
              <p class="product-details">
                @if ($isProduct)
                  {{ $isProduct->description }}
                @elseif ($isProductAuction)
                  {{ $isProductAuction->description }}
                @endif
              </p>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab" tabindex="0">
            <div class="product-review-section" data-aos="fade-up">
              <h5 class="intro-heading">Reviews</h5>
              <div class="review-wrapper">
                <div class="wrapper">
                  <div class="wrapper-aurthor">
                    <div class="wrapper-info">
                      <div class="aurthor-img">
                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/aurthor-img-1.webp') }}"
                          alt="aurthor-img">
                      </div>
                      <div class="author-details">
                        <h5>Sajjad Hossain</h5>
                        <p>London, UK</p>
                      </div>
                    </div>
                    <div class="ratings">
                      <span>
                        <svg width="75" height="15" viewBox="0 0 75 15" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                            fill="#FFA800" />
                          <path
                            d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                            fill="#FFA800" />
                          <path
                            d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                            fill="#FFA800" />
                          <path
                            d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                            fill="#FFA800" />
                          <path
                            d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                            fill="#FFA800" />
                        </svg>
                      </span>
                      <span>(5.0)</span>
                    </div>
                  </div>

                  <div class="wrapper-description">
                    <p class="wrapper-details">Lorem Ipsum is simply dummy text of the printing
                      and
                      typesetting industry. Lorem Ipsum has been the industry's standard dummy
                      text ever since the redi 1500s, when an unknown printer took a galley of
                      type and scrambled it to make a type specimen book. It has survived not only
                      five centuries but also the on leap into electronic typesetting, remaining
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <section class="product weekly-sale product-weekly footer-padding">
            <div class="container">
              <div class="section-title">
                <h5>Best Sell in this Week</h5>
                <a href="#" class="view">Lihat Semua</a>
              </div>
              <div class="weekly-sale-section">
                <div class="row g-5">
                  <div class="col-lg-3 col-md-6">
                    <div class="product-wrapper" data-aos="fade-up">
                      <div class="product-img">
                        <img
                          src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-5.webp') }}"
                          alt="product-img">
                        <div class="product-cart-items">
                          <a href="/user/wishlist" class="favourite cart-item">
                            <span>
                              <i class="fas fa-heart"></i>
                            </span>
                          </a>
                          <a href="/user/wishlist" class="favourite cart-item">
                            <span>
                              <i class="fas fa-shopping-cart"></i>
                            </span>
                          </a>
                          <a href="/user/keranjang" class="compaire cart-item">
                            <span>
                              <i class="fas fa-share"></i>
                            </span>
                          </a>
                        </div>
                      </div>
                      <div class="product-info">
                        <div class="ratings">
                          <span>
                            <svg width="75" height="15" viewBox="0 0 75 15" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                fill="#FFA800" />
                              <path
                                d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                                fill="#FFA800" />
                              <path
                                d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                                fill="#FFA800" />
                              <path
                                d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                                fill="#FFA800" />
                              <path
                                d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                                fill="#FFA800" />
                            </svg>
                          </span>
                        </div>
                        <div class="product-description">
                          <a href="/user/detailproduct" class="product-details">White Checked
                            Shirt
                          </a>
                          <div class="price">
                            <span class="new-price">$16.99</span>
                          </div>
                        </div>
                      </div>
                      <div class="product-cart-btn">
                        <a href="cart.html" class="product-btn">Masukkan Keranjang</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
  </section>
@endsection

@section('script')
  <script src="{{ asset('additional-assets/jquery-3.7.1/jquery.min.js') }}"></script>
  <script src="{{ asset('js/share.js') }}"></script>
@endsection
