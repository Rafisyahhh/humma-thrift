@extends('layouts.home')
@section('tittle', 'Shop')
@section('content')

    <section class="product product-sidebar footer-padding">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3">
                    <div class="sidebar" data-aos="fade-right">
                        <div class="sidebar-section">
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Kategori Produk</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        <li>
                                            <input type="checkbox" id="bags" name="bags">
                                            <label for="bags">Tas</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="sweatshirt" name="sweatshirt">
                                            <label for="sweatshirt">Sweatshirt</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="boots" name="boots">
                                            <label for="boots">Sepatu Boot</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="accessories" name="accessories">
                                            <label for="accessories">Aksesoris</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="sneakers" name="sneakers">
                                            <label for="sneakers">Sneakers</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="cosmatics" name="cosmatics">
                                            <label for="cosmatics">Kosmetik</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="watch" name="watch">
                                            <label for="watch">Jam Tangan</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper sidebar-range">
                                <h5 class="wrapper-heading">Kisaran harga</h5>
                                <div class="price-slide range-slider">
                                    <div class="price">
                                        <div class="range-slider style-1">
                                            <div id="slider-tooltips" class="slider-range mb-3"></div>
                                            <span class="example-val" id="slider-margin-value-min"></span>
                                            <span>-</span>
                                            <span class="example-val" id="slider-margin-value-max"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Brands</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        <li>
                                            <input type="checkbox" id="thread" name="thread">
                                            <label for="thread">Refined Threads
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="ethereal" name="ethereal">
                                            <label for="ethereal">Ethereal Chic</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="yellow" name="yellow">
                                            <label for="yellow">Yellow</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="esctasy" name="esctasy">
                                            <label for="esctasy">Esctasy</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="urban" name="urban">
                                            <label for="urban">Urban Hive</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="velvet" name="velvet">
                                            <label for="velvet">Velvet Vista</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="boldly" name="boldly">
                                            <label for="boldly">Boldly Blue</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="minted" name="minted">
                                            <label for="minted">Minted Mode</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="ensemble" name="ensemble">
                                            <label for="ensemble">Eclectic Ensemble</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="attire" name="attire">
                                            <label for="attire">BraveAlchemy Attire</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="couture" name="couture">
                                            <label for="couture">Cascade Couture</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Warna</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        <li>
                                            <input type="checkbox" id="red" name="red">
                                            <label for="red">Merah</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="blue" name="blue">
                                            <label for="blue">Biru</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="navy" name="navy">
                                            <label for="navy">Navy</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="sidebar-wrapper">
                                <h5 class="wrapper-heading">Ukuran</h5>
                                <div class="sidebar-item">
                                    <ul class="sidebar-list">
                                        <li>
                                            <input type="checkbox" id="small" name="small">
                                            <label for="small">Kecil</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="medium" name="medium">
                                            <label for="medium">Sedang</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="large" name="large">
                                            <label for="large">Besar</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="xl" name="xl">
                                            <label for="xl">XL</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="2xl" name="2xl">
                                            <label for="2xl">2XL</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="product-sidebar-section" data-aos="fade-up">
                        <div class="row g-5">
                            <div class="col-lg-12">
                                <div class="product-sorting-section">
                                    <div class="result">
                                        <p>Showing <span>1–16 of 66 results</span></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <div class="product-wrapper" data-aos="fade-up">
                                    <div class="product-img">
                                        <img src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                                            alt="product-img">
                                        <div class="product-cart-items">
                                            {{-- <a href="/detailproduct" class="cart cart-item">
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
                                            <a href="/user/wishlist" class="favourite cart-item">
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
                                            <a href="/user/checkout" class="compaire cart-item">
                                                <span>
                                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="40" height="40" rx="20" fill="white" />
                                                        <g transform="translate(7.7, 7.7)">
                                                            <path fill="currentColor" d="M9 8V6h6v2zM7 22q-.825 0-1.412-.587T5 20t.588-1.412T7 18t1.413.588T9 20t-.587 1.413T7 22m10 0q-.825 0-1.412-.587T15 20t.588-1.412T17 18t1.413.588T19 20t-.587 1.413T17 22M1 4V2h3.275l4.25 9h7l3.9-7H21.7l-4.975 9H8.1L7 15h12v2H3.625L6.6 11.6L3 4z" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-description">
                                            <a href="/user/detailproduct" class="product-details">Flower Design Skart
                                            </a>
                                            <div class="price">
                                                <span class="new-price">$15.99</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-cart-btn">
                                        <a href="/user/checkout" class="product-btn">Beli sekarang</a>
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
