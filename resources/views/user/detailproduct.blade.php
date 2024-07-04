@php
    $url = url()->current();
    $text = $isProductAuction ? $isProductAuction->title : ($isProduct ? $isProduct->title : 'Undefined');
@endphp

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

        @media screen and (min-width: 1440px) {
            .svg-container {
                position: absolute;
                top: 3%;
                left: 50%;
                width: 70%;
                height: 70%;
                z-index: 0;
            }
        }

        @media screen and (max-width: 1440px) and (min-width: 1200px) {
            .svg-container {
                position: absolute;
                top: 3%;
                left: 50%;
                width: 50%;
                height: 70%;
                z-index: 0;
            }
        }

        @media screen and (max-width: 1200px) and (max-width: 992px) {
            .svg-container {
                position: absolute;
                top: 3%;
                left: 50%;
                width: 50%;
                height: 70%;
                z-index: 0;
            }
        }

        @media screen and (max-width: 992px) and (max-width: 786px) {
            .svg-container {
                position: absolute;
                top: 3%;
                left: 50%;
                width: 50%;
                height: 70%;
                z-index: 0;
            }
        }

        .svg-container {
            position: absolute;
            top: 3%;
            left: 50%;
            width: 50%;
            height: 70%;
            z-index: 0;
        }
    </style>
@endsection
@section('script')
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     var modals = document.querySelectorAll('.modal');
        //     var btns = document.querySelectorAll('.openModal');
        //     var spans = document.querySelectorAll('.close');

        //     btns.forEach(function(btn, index) {
        //         btn.onclick = function() {
        //             modals[index].style.display = 'flex';
        //         }
        //     });

        //     spans.forEach(function(span, index) {
        //         span.onclick = function() {
        //             modals[index].style.display = 'none';
        //         }
        //     });

        //     window.onclick = function(event) {
        //         modals.forEach(function(modal) {
        //             if (event.target == modal) {
        //                 modal.style.display = 'none';
        //             }
        //         });
        //     }
        // });

        document.addEventListener('DOMContentLoaded', function() {
            var modals = document.querySelectorAll('.modal');
            var btns = document.querySelectorAll('.openModal');
            var spans = document.querySelectorAll('.close');

            btns.forEach(function(btn, index) {
                btn.onclick = function() {
                    var productId = btn.getAttribute('data-id');
                    var modal = document.getElementById('reviewModal-' + productId);
                    var auctionForm = document.getElementById('auctionForm-' + productId);

                    if (auctionForm) {
                        auctionForm.querySelector('input[name="product_id"]').value = productId;
                    }

                    modal.style.display = 'flex';
                }
            });

            spans.forEach(function(span, index) {
                span.onclick = function() {
                    var modal = span.closest('.modal');
                    modal.style.display = 'none';
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
                                                <div class="ratio ratio-1x1 position-relative">
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
                            <div class="svg-container">
                                <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 590"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="transition duration-300 ease-in-out delay-150">
                                    <path
                                        d="M 0,600 L 0,112 C 42.35743741573924,137.0312260435116 84.71487483147848,162.06245208702316 139,160 C 193.28512516852152,157.93754791297684 259.49793808982525,128.78141769541887 311,142 C 362.50206191017475,155.21858230458113 399.29337280922044,210.8118771313014 445,260 C 490.70662719077956,309.1881228686986 545.328570673293,351.9710737793756 587,359 C 628.671429326707,366.0289262206244 657.3923444976077,337.3038277511962 708,360 C 758.6076555023923,382.6961722488038 831.1020513362763,456.8136152158397 877,496 C 922.8979486637237,535.1863847841603 942.1994501572868,539.441711385445 983,543 C 1023.8005498427132,546.558288614555 1086.1001480345765,549.4195392423801 1147,592 C 1207.8998519654235,634.5804607576199 1267.3999577044067,716.8801316450342 1316,756 C 1364.6000422955933,795.1198683549658 1402.3000211477965,791.0599341774829 1440,787 L 1440,600 L 0,600 Z"
                                        stroke="none" stroke-width="0" fill=" #1C3879" fill-opacity="0.4"
                                        class="transition-all duration-300 ease-in-out delay-150 path-0"
                                        transform="rotate(-180 720 300)"></path>
                                    <path
                                        d="M 0,600 L 0,262 C 40.191691559385646,247.31183087049618 80.38338311877129,232.62366174099236 135,245 C 189.6166168812287,257.37633825900764 258.65815908430045,296.8171839065268 309,326 C 359.34184091569955,355.1828160934732 390.983980544027,374.10760263290064 432,405 C 473.016019455973,435.89239736709936 523.4059187395914,478.75240556187055 565,510 C 606.5940812604086,541.2475944381295 639.3923444976076,560.8827751196173 695,568 C 750.6076555023924,575.1172248803827 829.0247032699781,569.7164939596606 880,602 C 930.9752967300219,634.2835060403394 954.50884242248,704.2512490417405 1004,739 C 1053.49115757752,773.7487509582595 1128.9399270401013,773.2785098733775 1173,801 C 1217.0600729598987,828.7214901266225 1229.731449417114,884.6347114647493 1269,912 C 1308.268550582886,939.3652885352507 1374.134275291443,938.1826442676254 1440,937 L 1440,600 L 0,600 Z"
                                        stroke="none" stroke-width="0" fill=" #1C3879" fill-opacity="0.53"
                                        class="transition-all duration-300 ease-in-out delay-150 path-1"
                                        transform="rotate(-180 720 300)"></path>
                                    <path
                                        d="M 0,600 L 0,412 C 48.571268074757455,415.3157167781332 97.14253614951491,418.6314335562664 149,446 C 200.8574638504851,473.3685664437336 256.0011234766977,524.7899825530677 300,541 C 343.9988765233023,557.2100174469323 376.8529699436941,538.2086362314627 423,541 C 469.1470300563059,543.7913637685373 528.5869967485261,568.3754725210817 574,601 C 619.4130032514739,633.6245274789183 650.799043062201,674.2894736842105 696,716 C 741.200956937799,757.7105263157895 800.2168310026698,800.4666327420762 851,826 C 901.7831689973302,851.5333672579238 944.3336329271197,859.8439953474847 999,868 C 1053.6663670728803,876.1560046525153 1120.4486372888525,884.1573858679849 1173,913 C 1225.5513627111475,941.8426141320151 1263.8718179174707,991.5264611805758 1306,1024 C 1348.1281820825293,1056.4735388194242 1394.0640910412646,1071.736769409712 1440,1087 L 1440,600 L 0,600 Z"
                                        stroke="none" stroke-width="0" fill=" #1C3879" fill-opacity="1"
                                        class="transition-all duration-300 ease-in-out delay-150 path-2"
                                        transform="rotate(-180 720 300)"></path>
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
                                    <div class="product-quantity mt-0"
                                        style="display: flex; align-items: center; gap: 10px; z-index:1">
                                        <a href="#" style="width :10px" class="shop-btn"
                                            style="display: flex; align-items: center; gap: 10px; z-index:1">
                                            <span style="width: 37rem; align-items:center; justify-content:center;">
                                                <i class="fas fa-shopping-cart"></i>
                                                Masukkan Keranjang
                                            </span>
                                        </a>
                                        <a href="#"
                                            class="shop-btn d-flex gap-3 align-items-center justify-content-center">
                                            <i class="fas fa-arrow-right"></i>
                                            Beli Sekarang
                                        </a>
                                    </div>
                                </div>
                                <hr>

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
                    @elseif ($isProductAuction)
                        <div class="col-md-6">
                            <div class="svg-container">
                                <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 590"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="transition duration-300 ease-in-out delay-150">
                                    <path
                                        d="M 0,600 L 0,112 C 42.35743741573924,137.0312260435116 84.71487483147848,162.06245208702316 139,160 C 193.28512516852152,157.93754791297684 259.49793808982525,128.78141769541887 311,142 C 362.50206191017475,155.21858230458113 399.29337280922044,210.8118771313014 445,260 C 490.70662719077956,309.1881228686986 545.328570673293,351.9710737793756 587,359 C 628.671429326707,366.0289262206244 657.3923444976077,337.3038277511962 708,360 C 758.6076555023923,382.6961722488038 831.1020513362763,456.8136152158397 877,496 C 922.8979486637237,535.1863847841603 942.1994501572868,539.441711385445 983,543 C 1023.8005498427132,546.558288614555 1086.1001480345765,549.4195392423801 1147,592 C 1207.8998519654235,634.5804607576199 1267.3999577044067,716.8801316450342 1316,756 C 1364.6000422955933,795.1198683549658 1402.3000211477965,791.0599341774829 1440,787 L 1440,600 L 0,600 Z"
                                        stroke="none" stroke-width="0" fill=" #1C3879" fill-opacity="0.4"
                                        class="transition-all duration-300 ease-in-out delay-150 path-0"
                                        transform="rotate(-180 720 300)"></path>
                                    <path
                                        d="M 0,600 L 0,262 C 40.191691559385646,247.31183087049618 80.38338311877129,232.62366174099236 135,245 C 189.6166168812287,257.37633825900764 258.65815908430045,296.8171839065268 309,326 C 359.34184091569955,355.1828160934732 390.983980544027,374.10760263290064 432,405 C 473.016019455973,435.89239736709936 523.4059187395914,478.75240556187055 565,510 C 606.5940812604086,541.2475944381295 639.3923444976076,560.8827751196173 695,568 C 750.6076555023924,575.1172248803827 829.0247032699781,569.7164939596606 880,602 C 930.9752967300219,634.2835060403394 954.50884242248,704.2512490417405 1004,739 C 1053.49115757752,773.7487509582595 1128.9399270401013,773.2785098733775 1173,801 C 1217.0600729598987,828.7214901266225 1229.731449417114,884.6347114647493 1269,912 C 1308.268550582886,939.3652885352507 1374.134275291443,938.1826442676254 1440,937 L 1440,600 L 0,600 Z"
                                        stroke="none" stroke-width="0" fill=" #1C3879" fill-opacity="0.53"
                                        class="transition-all duration-300 ease-in-out delay-150 path-1"
                                        transform="rotate(-180 720 300)"></path>
                                    <path
                                        d="M 0,600 L 0,412 C 48.571268074757455,415.3157167781332 97.14253614951491,418.6314335562664 149,446 C 200.8574638504851,473.3685664437336 256.0011234766977,524.7899825530677 300,541 C 343.9988765233023,557.2100174469323 376.8529699436941,538.2086362314627 423,541 C 469.1470300563059,543.7913637685373 528.5869967485261,568.3754725210817 574,601 C 619.4130032514739,633.6245274789183 650.799043062201,674.2894736842105 696,716 C 741.200956937799,757.7105263157895 800.2168310026698,800.4666327420762 851,826 C 901.7831689973302,851.5333672579238 944.3336329271197,859.8439953474847 999,868 C 1053.6663670728803,876.1560046525153 1120.4486372888525,884.1573858679849 1173,913 C 1225.5513627111475,941.8426141320151 1263.8718179174707,991.5264611805758 1306,1024 C 1348.1281820825293,1056.4735388194242 1394.0640910412646,1071.736769409712 1440,1087 L 1440,600 L 0,600 Z"
                                        stroke="none" stroke-width="0" fill=" #1C3879" fill-opacity="1"
                                        class="transition-all duration-300 ease-in-out delay-150 path-2"
                                        transform="rotate(-180 720 300)"></path>
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
                                    <div class="product-quantity mt-0"
                                        style="display: flex; align-items: center; gap: 10px; z-index:1">
                                        <a href="#" style="width :10px" class="shop-btn"
                                            style="display: flex; align-items: center; gap: 10px; z-index:1">
                                            <span style="width: 37rem; align-items:center; justify-content:center;">
                                                <i class="fas fa-shopping-cart"></i>
                                                Masukkan Keranjang
                                            </span>
                                        </a>

                                        @php
                                                                                    $user = Auth::user();

                                            if ($user) {
                                                $existingAuction = App\Models\auctions::where('user_id', Auth::id())
                                                ->where('product_auction_id', $isProductAuction->id)
                                                ->first();
                                                $auctions = App\Models\Auctions::where('user_id', $user->id)->where('product_auction_id', $isProductAuction->id)->first();
                                            }
                                        @endphp
                                        @if ($user)
                                        <button style="width :10px" class="shop-btn openModal"
                                            data-id="{{ $isProductAuction->id }}"
                                            style="display: flex; align-items: center; gap: 5px; z-index:1">
                                            <span style="width: 37rem; align-items:center; justify-content:center;">
                                                <i class="fa-solid fa-plus"></i>
                                                Ikuti Lelang</span>
                                        </button>
                                        @else
                                        <a href="{{ url('login') }}" style="width :10px" class="shop-btn openModal"
                                        style="display: flex; align-items: center; gap: 5px; z-index:1">
                                        <span style="width: 37rem; align-items:center; justify-content:center;">
                                            <i class="fa-solid fa-plus"></i>
                                            Ikuti Lelang</span>
                                    </a>
                                        @endif
                                        <div id="reviewModal-{{ $isProductAuction->id }}" class="modal" style="display: none;">
                                            <div class="modal-content">
                                                <button class="close"
                                                    style="float: right; text-align: end;">&times;</button>
                                                    @if ($user)

                                                    @if ($existingAuction)
                                                    <p style="text-align: center; font-size :20px; font-weight:bold;">Anda sudah mengikuti lelang</p>
                                                    <p style="text-align: center;">bid lelang anda : {{ $auctions->auction_price }}</p>
                                                @else
                                                    <h4 style="text-align: center;">Bid Lelang</h4>
                                                    <form id="auctionForm-{{ $isProductAuction->id }}" method="post"
                                                        action="{{ route('user.auctions.store') }}" class="mt-5">
                                                        @csrf
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $isProductAuction->id }}">
                                                        <label for="auction_price" class="form-label"
                                                            style="font-size: 18px;">Bid Lelang :</label> <br>
                                                        <input type="number" name="auction_price"
                                                            class="form-control @error('auction_price') is-invalid @enderror"
                                                            placeholder="Masukkan Bid Lelang anda"
                                                            style="font-size: 17px;">
                                                            <p style="margin-top: 5px;margin-left:6px;font-size:12px;color: #7c7c7c;">
                                                            Bid : Rp{{ number_format($isProductAuction->bid_price_start, null, null, '.') }}
                                                            -
                                                            Rp{{ number_format($isProductAuction->bid_price_end, null, null, '.') }}
                                                            </p>
                                                        @error('auction_price')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <button type="submit" class="shop-btn"
                                                            style="margin-left: 22rem;">Kirim Bid Anda</button>
                                                    </form>
                                                @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                                {{ $isProductAuction->userStore->name }} <div
                                                                    class="text-secondary"
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
    <br>
    <div class="container">
        <div class="d-flex align-items-center justify-content-star py-3" style="position: relative;">
            <p class="fs-2 mb-0">Bagikan ke:</p>
            <span class="share-container share-buttons d-flex gap-3 ms-2" style="z-index:1;">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank"
                    class="social-buttons">
                    <i class="fa-brands fa-square-facebook fa-lg" style="color: #1c3879"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($text) }}"
                    target="_blank" class="social-buttons">
                    <i class="fa-brands fa-square-x-twitter fa-lg" style="color: #1c3879"></i>
                </a>
                <a href="https://t.me/share/url?url={{ urlencode($url) }}&text={{ urlencode($text) }}" target="_blank"
                    class="social-buttons">
                    <i class="fa-brands fa-telegram fa-lg" style="color: #1c3879"></i>
                </a>
                <a href="https://api.whatsapp.com/send?text={{ urlencode($text . ' ' . $url) }}" target="_blank"
                    class="social-buttons">
                    <i class="fa-brands fa-whatsapp fa-lg" style="color: #1c3879"></i>
                </a>
            </span>
            </p>
            <div class="line" style="border-left: 1px solid #dcdcdd; height: 30px; margin-left: 10px;"></div>
            <div class="share-icons" style="z-index:1; margin-left:40px;">
                <a href="#" class="share-icon">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                            <path fill="#1c3879" d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812T2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412t-2.625 2.963T13.45 19.7zm0-2.7q2.4-2.15 3.95-3.687t2.45-2.675t1.25-2.026T20 8.15q0-1.5-1-2.5t-2.5-1q-1.175 0-2.175.662T12.95 7h-1.9q-.375-1.025-1.375-1.687T7.5 4.65q-1.5 0-2.5 1t-1 2.5q0 .875.35 1.763t1.25 2.025t2.45 2.675T12 18.3m0-6.825" />
                        </svg>
                    </span>
                </a>
                <span style="margin-left:0.5px; font-size: 15px">Favorit</span>
                <span style="margin-left:0.5px; font-size: 15px">(3,8RB)</span>
            </div>
        </div>
    </div>

    <section class="product product-description">
        <div class="container">
            <div class="product-detail-section">
                <nav>
                    <div class="nav nav-tabs nav-item" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">Description</button>
                        <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review"
                            type="button" role="tab" aria-controls="nav-review"
                            aria-selected="false">Reviews</button>
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
                    <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab"
                        tabindex="0">
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
                                                <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-5.webp') }}"
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
                                                        <svg width="75" height="15" viewBox="0 0 75 15"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                    <a href="/user/detailproduct" class="product-details">White
                                                        Checked
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
