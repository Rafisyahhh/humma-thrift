@extends('layouts.home')
@section('tittle', 'Detail Product')
@section('content')
    <section class="product product-info">
        <div class="container">
            <div class="product-info-section">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="product-info-img" data-aos="fade-right">
                            <div class="swiper product-top">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-14.webp') }}"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-slider-img-1.webp') }}"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-slider-img-2.webp') }}"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-slider-img-3.webp') }}"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-slider-img-1.webp') }}"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-slider-img-2.webp') }}"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-slider-img-3.webp') }}"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-slider-img-1.webp') }}"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-slider-img-2.webp') }}"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-slider-img-3.webp') }}"
                                            alt="img">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper product-bottom">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide slider-bottom-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-16.png') }}"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-bottom-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-17.png') }}"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-bottom-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-slider-img-2.webp') }}"
                                            alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-info-content" data-aos="fade-left">
                            <h5>Jaket Vintage Adidas</h5>
                            <div class="price">
                                <span class="new-price">Rp.100.000,00</span>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="product-quantity" style="display: flex; align-items: center; gap: 10px;">
                                    <div class="quantity-wrapper">
                                        <div class="wishlist" style="border:none;">
                                            <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17 1C14.9 1 13.1 2.1 12 3.7C10.9 2.1 9.1 1 7 1C3.7 1 1 3.7 1 7C1 13 12 22 12 22C12 22 23 13 23 7C23 3.7 20.3 1 17 1Z"
                                                        stroke="#797979" stroke-width="2" stroke-miterlimit="10"
                                                        stroke-linecap="square" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="share-icons">
                                        <a href="#" class="share-icon">
                                            <span>
                                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="40" height="40" rx="20" />
                                                    <g transform="translate(7.7, 7.7)">
                                                        <path fill="currentColor" d="M9 8V6h6v2zM7 22q-.825 0-1.412-.587T5 20t.588-1.412T7 18t1.413.588T9 20t-.587 1.413T7 22m10 0q-.825 0-1.412-.587T15 20t.588-1.412T17 18t1.413.588T19 20t-.587 1.413T17 22M1 4V2h3.275l4.25 9h7l3.9-7H21.7l-4.975 9H8.1L7 15h12v2H3.625L6.6 11.6L3 4z" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="share-icons">
                                        <a href="#" class="share-icon">
                                            <i class="fas fa-share-alt" style="font-size: 18px; color: #797979;"></i>
                                        </a>
                                    </div>
                                    <a href="#" style="width :10px" class="shop-btn"
                                        style="display: flex; align-items: center; gap: 5px;">
                                        <span style="width: 37rem; align-items:center; justify-content:center;">
                                            <svg class="me-4" width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.25357 3.32575C8.25357 4.00929 8.25193 4.69283 8.25467 5.37583C8.25576 5.68424 8.31536 5.74439 8.62431 5.74439C9.964 5.74603 11.3031 5.74275 12.6428 5.74603C13.2728 5.74767 13.7397 6.05663 13.9246 6.58104C14.2209 7.42098 13.614 8.24232 12.6762 8.25052C11.5919 8.25982 10.5075 8.25271 9.4232 8.25271C9.17714 8.25271 8.93107 8.25216 8.68501 8.25271C8.2913 8.2538 8.25412 8.29154 8.25412 8.69838C8.25357 10.0195 8.25686 11.3412 8.25248 12.6624C8.25029 13.2836 7.92603 13.7544 7.39891 13.9305C6.56448 14.2088 5.75848 13.6062 5.74863 12.6821C5.73824 11.7251 5.74645 10.7687 5.7459 9.81173C5.7459 9.41965 5.74754 9.02812 5.74535 8.63604C5.74371 8.30849 5.69012 8.2538 5.36204 8.25326C4.02235 8.25162 2.68321 8.25545 1.34352 8.25107C0.719613 8.24943 0.249902 7.93008 0.0710952 7.40348C-0.212153 6.57065 0.388245 5.75916 1.31017 5.74658C2.14843 5.73564 2.98669 5.74384 3.82495 5.74384C4.30779 5.74384 4.79062 5.74384 5.274 5.74384C5.72184 5.7433 5.7459 5.71869 5.7459 5.25716C5.7459 3.95406 5.74317 2.65096 5.74699 1.34786C5.74863 0.720643 6.0625 0.253102 6.58799 0.0704598C7.40875 -0.213893 8.21803 0.370671 8.25248 1.27349C8.25303 1.29154 8.25303 1.31013 8.25303 1.32817C8.25357 1.99531 8.25357 2.66026 8.25357 3.32575Z"
                                                    fill="white" />
                                            </svg>
                                        Masukkan keranjang</span>
                                    </a>
                                </div>
                            </div>

                            <hr>
                            <div class="product-details">
                                <p class="fs-2">Kategori : <span class="inner-text">Baju</span></p>
                                <p class="fs-2">Brand : <span class="inner-text">Adidas</span></p>
                                <p class="fs-2">Ukuran : <span class="inner-text">XL</span></p>
                                <p class="fs-2">Kondisi : <span class="inner-text">Bagus</span></p>
                                <p class="fs-2">Warna : <span class="inner-text">Pink</span></p>
                            </div>
                            <br>
                            <div class="product-seller-section" data-aos="fade-up">
                                <h5 class="intro-heading" style="font-size: 25px ">Info Seller</h5>
                                <br>
                                <div class="review-wrapper">
                                    <div class="wrapper">
                                        <div class="wrapper-aurthor">
                                            <div class="wrapper-info">
                                                <div class="author-details">
                                                    <h5 class="d-flex align-items-center" style="font-size: 25px;"> <img
                                                            style="height: 45px; margin-left: 10px;"
                                                            src="{{ asset('template-assets/front/assets/images/homepage-one/aurthor-img-1.webp') }}"
                                                            alt="aurthor-img" class="me-2">
                                                        <div style="margin-left: 10px;"> Asoy Store <div
                                                                class="text-secondary"
                                                                style="font-size: 16px; margin-left: 4px;">Karangploso,
                                                                Malang</div>
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
    </section>


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
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. It has
                                survived not only five centuries but also the on leap into electronic typesetting,
                                remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop
                                publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a
                                type specimen book.
                            </p>
                        </div>
                        <div class="product-feature">
                            <h5 class="intro-heading">Features :</h5>
                            <ul>
                                <li>
                                    <p>slim body with metal cover</p>
                                </li>
                                <li>
                                    <p>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</p>
                                </li>
                                <li>
                                    <p>8GB DDR4 RAM and fast 512GB PCIe SSD</p>
                                </li>
                                <li>
                                    <p>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with
                                        gesture support</p>
                                </li>
                            </ul>
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
                                                    {{-- <a href="#" class="cart cart-item">
                                                        <span>
                                                            <svg width="40" height="40" viewBox="0 0 40 40"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="40" height="40" rx="20"
                                                                    fill="white" />
                                                                <path
                                                                    d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                                <path
                                                                    d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                                <path
                                                                    d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                                <path
                                                                    d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                            </svg>
                                                        </span>
                                                    </a> --}}
                                                    <a href="wishlist.html" class="favourite cart-item">
                                                        <span>
                                                            <svg width="40" height="40" viewBox="0 0 40 40"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="40" height="40" rx="20"
                                                                    fill="#AE1C9A" />
                                                                <path
                                                                    d="M14.6928 12.3935C13.5057 12.54 12.512 13.0197 11.671 13.8546C10.9155 14.6016 10.4615 15.3926 10.201 16.4216C9.73957 18.2049 10.0745 19.9626 11.1835 21.6141C11.8943 22.6723 12.8135 23.6427 14.4993 25.1221C15.571 26.0632 18.8422 28.8096 19.0022 28.9011C19.1511 28.989 19.2069 29 19.5232 29C19.8395 29 19.8953 28.989 20.0442 28.9011C20.2042 28.8096 23.4828 26.0595 24.5471 25.1221C26.2404 23.6354 27.1521 22.6687 27.8629 21.6141C28.9719 19.9626 29.3068 18.2049 28.8454 16.4216C28.5849 15.3926 28.1309 14.6016 27.3754 13.8546C26.6237 13.1113 25.8199 12.6828 24.7667 12.4631C24.2383 12.3533 23.2632 12.3423 22.8018 12.4448C21.5142 12.7194 20.528 13.3529 19.6274 14.4808L19.5232 14.609L19.4227 14.4808C18.5333 13.3749 17.562 12.7414 16.3228 12.4631C15.9544 12.3789 15.1059 12.3423 14.6928 12.3935ZM15.9357 13.5104C16.9926 13.6935 17.9044 14.294 18.6263 15.2864C18.7491 15.4585 18.9017 15.6636 18.9613 15.7478C19.2367 16.1286 19.8098 16.1286 20.0851 15.7478C20.1447 15.6636 20.2973 15.4585 20.4201 15.2864C21.4062 13.9315 22.7795 13.2944 24.2755 13.4958C25.9352 13.7191 27.2303 14.8616 27.7252 16.5424C28.116 17.8717 27.9448 19.2668 27.234 20.5228C26.6386 21.5738 25.645 22.676 23.9145 24.203C23.0772 24.939 19.5567 27.9198 19.5232 27.9198C19.486 27.9198 15.9804 24.95 15.1319 24.203C12.4711 21.8557 11.4217 20.391 11.1686 18.6736C11.0049 17.5641 11.2393 16.3703 11.8087 15.4292C12.6646 14.0121 14.3318 13.2358 15.9357 13.5104Z"
                                                                    fill="#000" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <a href="/user/keranjang" class="compaire cart-item">
                                                        <span>
                                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="40" height="40" rx="20" fill="white" />
                                                                <g transform="translate(7.7, 7.7)">
                                                                    <path fill="currentColor"
                                                                        d="M9 8V6h6v2zM7 22q-.825 0-1.412-.587T5 20t.588-1.412T7 18t1.413.588T9 20t-.587 1.413T7 22m10 0q-.825 0-1.412-.587T15 20t.588-1.412T17 18t1.413.588T19 20t-.587 1.413T17 22M1 4V2h3.275l4.25 9h7l3.9-7H21.7l-4.975 9H8.1L7 15h12v2H3.625L6.6 11.6L3 4z" />
                                                                </g>
                                                            </svg>
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
                                                    <a href="product-info.html" class="product-details">White Checked
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
                                    <div class="col-lg-3 col-md-6">
                                        <div class="product-wrapper" data-aos="fade-up">
                                            <div class="product-img">
                                                <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-3.webp') }}"
                                                    alt="product-img">
                                                <div class="product-cart-items">
                                                    {{-- <a href="#" class="cart cart-item">
                                                        <span>
                                                            <svg width="40" height="40" viewBox="0 0 40 40"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="40" height="40" rx="20"
                                                                    fill="white" />
                                                                <path
                                                                    d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                                <path
                                                                    d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                                <path
                                                                    d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                                <path
                                                                    d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                            </svg>
                                                        </span>
                                                    </a> --}}
                                                    <a href="wishlist.html" class="favourite cart-item">
                                                        <span>
                                                            <svg width="40" height="40" viewBox="0 0 40 40"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="40" height="40" rx="20"
                                                                    fill="#AE1C9A" />
                                                                <path
                                                                    d="M14.6928 12.3935C13.5057 12.54 12.512 13.0197 11.671 13.8546C10.9155 14.6016 10.4615 15.3926 10.201 16.4216C9.73957 18.2049 10.0745 19.9626 11.1835 21.6141C11.8943 22.6723 12.8135 23.6427 14.4993 25.1221C15.571 26.0632 18.8422 28.8096 19.0022 28.9011C19.1511 28.989 19.2069 29 19.5232 29C19.8395 29 19.8953 28.989 20.0442 28.9011C20.2042 28.8096 23.4828 26.0595 24.5471 25.1221C26.2404 23.6354 27.1521 22.6687 27.8629 21.6141C28.9719 19.9626 29.3068 18.2049 28.8454 16.4216C28.5849 15.3926 28.1309 14.6016 27.3754 13.8546C26.6237 13.1113 25.8199 12.6828 24.7667 12.4631C24.2383 12.3533 23.2632 12.3423 22.8018 12.4448C21.5142 12.7194 20.528 13.3529 19.6274 14.4808L19.5232 14.609L19.4227 14.4808C18.5333 13.3749 17.562 12.7414 16.3228 12.4631C15.9544 12.3789 15.1059 12.3423 14.6928 12.3935ZM15.9357 13.5104C16.9926 13.6935 17.9044 14.294 18.6263 15.2864C18.7491 15.4585 18.9017 15.6636 18.9613 15.7478C19.2367 16.1286 19.8098 16.1286 20.0851 15.7478C20.1447 15.6636 20.2973 15.4585 20.4201 15.2864C21.4062 13.9315 22.7795 13.2944 24.2755 13.4958C25.9352 13.7191 27.2303 14.8616 27.7252 16.5424C28.116 17.8717 27.9448 19.2668 27.234 20.5228C26.6386 21.5738 25.645 22.676 23.9145 24.203C23.0772 24.939 19.5567 27.9198 19.5232 27.9198C19.486 27.9198 15.9804 24.95 15.1319 24.203C12.4711 21.8557 11.4217 20.391 11.1686 18.6736C11.0049 17.5641 11.2393 16.3703 11.8087 15.4292C12.6646 14.0121 14.3318 13.2358 15.9357 13.5104Z"
                                                                    fill="#000" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <a href="/user/keranjang" class="compaire cart-item">
                                                        <span>
                                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="40" height="40" rx="20" fill="white" />
                                                                <g transform="translate(7.7, 7.7)">
                                                                    <path fill="currentColor"
                                                                        d="M9 8V6h6v2zM7 22q-.825 0-1.412-.587T5 20t.588-1.412T7 18t1.413.588T9 20t-.587 1.413T7 22m10 0q-.825 0-1.412-.587T15 20t.588-1.412T17 18t1.413.588T19 20t-.587 1.413T17 22M1 4V2h3.275l4.25 9h7l3.9-7H21.7l-4.975 9H8.1L7 15h12v2H3.625L6.6 11.6L3 4z" />
                                                                </g>
                                                            </svg>
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
                                                    <a href="product-info.html" class="product-details">Blue Party Dress
                                                    </a>
                                                    <div class="price">
                                                        <span class="new-price">$20.99</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-cart-btn">
                                                <a href="cart.html" class="product-btn">Masukkan Keranjang</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="product-wrapper" data-aos="fade-up">
                                            <div class="product-img">
                                                <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-6.webp') }}"
                                                    alt="product-img">
                                                <div class="product-cart-items">
                                                    {{-- <a href="#" class="cart cart-item">
                                                        <span>
                                                            <svg width="40" height="40" viewBox="0 0 40 40"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="40" height="40" rx="20"
                                                                    fill="white" />
                                                                <path
                                                                    d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                                <path
                                                                    d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                                <path
                                                                    d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                                <path
                                                                    d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                            </svg>
                                                        </span>
                                                    </a> --}}
                                                    <a href="wishlist.html" class="favourite cart-item">
                                                        <span>
                                                            <svg width="40" height="40" viewBox="0 0 40 40"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="40" height="40" rx="20"
                                                                    fill="#AE1C9A" />
                                                                <path
                                                                    d="M14.6928 12.3935C13.5057 12.54 12.512 13.0197 11.671 13.8546C10.9155 14.6016 10.4615 15.3926 10.201 16.4216C9.73957 18.2049 10.0745 19.9626 11.1835 21.6141C11.8943 22.6723 12.8135 23.6427 14.4993 25.1221C15.571 26.0632 18.8422 28.8096 19.0022 28.9011C19.1511 28.989 19.2069 29 19.5232 29C19.8395 29 19.8953 28.989 20.0442 28.9011C20.2042 28.8096 23.4828 26.0595 24.5471 25.1221C26.2404 23.6354 27.1521 22.6687 27.8629 21.6141C28.9719 19.9626 29.3068 18.2049 28.8454 16.4216C28.5849 15.3926 28.1309 14.6016 27.3754 13.8546C26.6237 13.1113 25.8199 12.6828 24.7667 12.4631C24.2383 12.3533 23.2632 12.3423 22.8018 12.4448C21.5142 12.7194 20.528 13.3529 19.6274 14.4808L19.5232 14.609L19.4227 14.4808C18.5333 13.3749 17.562 12.7414 16.3228 12.4631C15.9544 12.3789 15.1059 12.3423 14.6928 12.3935ZM15.9357 13.5104C16.9926 13.6935 17.9044 14.294 18.6263 15.2864C18.7491 15.4585 18.9017 15.6636 18.9613 15.7478C19.2367 16.1286 19.8098 16.1286 20.0851 15.7478C20.1447 15.6636 20.2973 15.4585 20.4201 15.2864C21.4062 13.9315 22.7795 13.2944 24.2755 13.4958C25.9352 13.7191 27.2303 14.8616 27.7252 16.5424C28.116 17.8717 27.9448 19.2668 27.234 20.5228C26.6386 21.5738 25.645 22.676 23.9145 24.203C23.0772 24.939 19.5567 27.9198 19.5232 27.9198C19.486 27.9198 15.9804 24.95 15.1319 24.203C12.4711 21.8557 11.4217 20.391 11.1686 18.6736C11.0049 17.5641 11.2393 16.3703 11.8087 15.4292C12.6646 14.0121 14.3318 13.2358 15.9357 13.5104Z"
                                                                    fill="#000" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <a href="/user/keranjang" class="compaire cart-item">
                                                        <span>
                                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="40" height="40" rx="20" fill="white" />
                                                                <g transform="translate(7.7, 7.7)">
                                                                    <path fill="currentColor"
                                                                        d="M9 8V6h6v2zM7 22q-.825 0-1.412-.587T5 20t.588-1.412T7 18t1.413.588T9 20t-.587 1.413T7 22m10 0q-.825 0-1.412-.587T15 20t.588-1.412T17 18t1.413.588T19 20t-.587 1.413T17 22M1 4V2h3.275l4.25 9h7l3.9-7H21.7l-4.975 9H8.1L7 15h12v2H3.625L6.6 11.6L3 4z" />
                                                                </g>
                                                            </svg>
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
                                                    <a href="product-info.html" class="product-details">Red Baby Dress
                                                    </a>
                                                    <div class="price">
                                                        <span class="new-price">$22.99</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-cart-btn">
                                                <a href="cart.html" class="product-btn">Masukkan Keranjang</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="product-wrapper" data-aos="fade-up">
                                            <div class="product-img">
                                                <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-9.webp') }}"
                                                    alt="product-img">
                                                <div class="product-cart-items">
                                                    {{-- <a href="#" class="cart cart-item">
                                                        <span>
                                                            <svg width="40" height="40" viewBox="0 0 40 40"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="40" height="40" rx="20"
                                                                    fill="white" />
                                                                <path
                                                                    d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                                <path
                                                                    d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                                <path
                                                                    d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                                <path
                                                                    d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z"
                                                                    fill="#181818" />
                                                                <path
                                                                    d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z"
                                                                    fill="black" fill-opacity="0.2" />
                                                            </svg>
                                                        </span>
                                                    </a> --}}
                                                    <a href="wishlist.html" class="favourite cart-item">
                                                        <span>
                                                            <svg width="40" height="40" viewBox="0 0 40 40"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="40" height="40" rx="20"
                                                                    fill="#AE1C9A" />
                                                                <path
                                                                    d="M14.6928 12.3935C13.5057 12.54 12.512 13.0197 11.671 13.8546C10.9155 14.6016 10.4615 15.3926 10.201 16.4216C9.73957 18.2049 10.0745 19.9626 11.1835 21.6141C11.8943 22.6723 12.8135 23.6427 14.4993 25.1221C15.571 26.0632 18.8422 28.8096 19.0022 28.9011C19.1511 28.989 19.2069 29 19.5232 29C19.8395 29 19.8953 28.989 20.0442 28.9011C20.2042 28.8096 23.4828 26.0595 24.5471 25.1221C26.2404 23.6354 27.1521 22.6687 27.8629 21.6141C28.9719 19.9626 29.3068 18.2049 28.8454 16.4216C28.5849 15.3926 28.1309 14.6016 27.3754 13.8546C26.6237 13.1113 25.8199 12.6828 24.7667 12.4631C24.2383 12.3533 23.2632 12.3423 22.8018 12.4448C21.5142 12.7194 20.528 13.3529 19.6274 14.4808L19.5232 14.609L19.4227 14.4808C18.5333 13.3749 17.562 12.7414 16.3228 12.4631C15.9544 12.3789 15.1059 12.3423 14.6928 12.3935ZM15.9357 13.5104C16.9926 13.6935 17.9044 14.294 18.6263 15.2864C18.7491 15.4585 18.9017 15.6636 18.9613 15.7478C19.2367 16.1286 19.8098 16.1286 20.0851 15.7478C20.1447 15.6636 20.2973 15.4585 20.4201 15.2864C21.4062 13.9315 22.7795 13.2944 24.2755 13.4958C25.9352 13.7191 27.2303 14.8616 27.7252 16.5424C28.116 17.8717 27.9448 19.2668 27.234 20.5228C26.6386 21.5738 25.645 22.676 23.9145 24.203C23.0772 24.939 19.5567 27.9198 19.5232 27.9198C19.486 27.9198 15.9804 24.95 15.1319 24.203C12.4711 21.8557 11.4217 20.391 11.1686 18.6736C11.0049 17.5641 11.2393 16.3703 11.8087 15.4292C12.6646 14.0121 14.3318 13.2358 15.9357 13.5104Z"
                                                                    fill="#000" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <a href="/user/keranjang" class="compaire cart-item">
                                                        <span>
                                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="40" height="40" rx="20" fill="white" />
                                                                <g transform="translate(7.7, 7.7)">
                                                                    <path fill="currentColor"
                                                                        d="M9 8V6h6v2zM7 22q-.825 0-1.412-.587T5 20t.588-1.412T7 18t1.413.588T9 20t-.587 1.413T7 22m10 0q-.825 0-1.412-.587T15 20t.588-1.412T17 18t1.413.588T19 20t-.587 1.413T17 22M1 4V2h3.275l4.25 9h7l3.9-7H21.7l-4.975 9H8.1L7 15h12v2H3.625L6.6 11.6L3 4z" />
                                                                </g>
                                                            </svg>
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
                                                    <a href="product-info.html" class="product-details">Gree Wool Sweater
                                                    </a>
                                                    <div class="price">
                                                        <span class="new-price">$12.99</span>
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
                    </section>
                </div>
            </div>
        </div>
    @endsection
