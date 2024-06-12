@extends('user.layouts.app')
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
                                        <img src="template-assets/front/assets/images/homepage-one/product-img/product-img-14.webp"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="template-assets/front/assets/images/homepage-one/product-img/product-slider-img-1.webp"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="template-assets/front/assets/images/homepage-one/product-img/product-slider-img-2.webp"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="template-assets/front/assets/images/homepage-one/product-img/product-slider-img-3.webp"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="template-assets/front/assets/images/homepage-one/product-img/product-slider-img-1.webp"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="template-assets/front/assets/images/homepage-one/product-img/product-slider-img-2.webp"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="template-assets/front/assets/images/homepage-one/product-img/product-slider-img-3.webp"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="template-assets/front/assets/images/homepage-one/product-img/product-slider-img-1.webp"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="template-assets/front/assets/images/homepage-one/product-img/product-slider-img-2.webp"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-top-img">
                                        <img src="template-assets/front/assets/images/homepage-one/product-img/product-slider-img-3.webp"
                                            alt="img">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper product-bottom">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide slider-bottom-img">
                                        <img src="template-assets/front/assets/images/homepage-one/product-img/product-img-16.png"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-bottom-img">
                                        <img src="template-assets/front/assets/images/homepage-one/product-img/product-img-17.png"
                                            alt="img">
                                    </div>
                                    <div class="swiper-slide slider-bottom-img">
                                        <img src="template-assets/front/assets/images/homepage-one/product-img/product-slider-img-2.webp"
                                            alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-info-content" data-aos="fade-left">
                            <span class="wrapper-subtitle">Baju</span>
                            <h5>Jaket Vintage Adidas</h5>
                            <div class="price">
                                <span class="new-price">Rp.100.000,00</span>
                            </div>
                            <hr>
                            <div class="product-quantity">
                                <div class="quantity-wrapper">
                                    <div class="wishlist">
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
                                <a href="#" class="shop-btn">
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.25357 3.32575C8.25357 4.00929 8.25193 4.69283 8.25467 5.37583C8.25576 5.68424 8.31536 5.74439 8.62431 5.74439C9.964 5.74603 11.3031 5.74275 12.6428 5.74603C13.2728 5.74767 13.7397 6.05663 13.9246 6.58104C14.2209 7.42098 13.614 8.24232 12.6762 8.25052C11.5919 8.25982 10.5075 8.25271 9.4232 8.25271C9.17714 8.25271 8.93107 8.25216 8.68501 8.25271C8.2913 8.2538 8.25412 8.29154 8.25412 8.69838C8.25357 10.0195 8.25686 11.3412 8.25248 12.6624C8.25029 13.2836 7.92603 13.7544 7.39891 13.9305C6.56448 14.2088 5.75848 13.6062 5.74863 12.6821C5.73824 11.7251 5.74645 10.7687 5.7459 9.81173C5.7459 9.41965 5.74754 9.02812 5.74535 8.63604C5.74371 8.30849 5.69012 8.2538 5.36204 8.25326C4.02235 8.25162 2.68321 8.25545 1.34352 8.25107C0.719613 8.24943 0.249902 7.93008 0.0710952 7.40348C-0.212153 6.57065 0.388245 5.75916 1.31017 5.74658C2.14843 5.73564 2.98669 5.74384 3.82495 5.74384C4.30779 5.74384 4.79062 5.74384 5.274 5.74384C5.72184 5.7433 5.7459 5.71869 5.7459 5.25716C5.7459 3.95406 5.74317 2.65096 5.74699 1.34786C5.74863 0.720643 6.0625 0.253102 6.58799 0.0704598C7.40875 -0.213893 8.21803 0.370671 8.25248 1.27349C8.25303 1.29154 8.25303 1.31013 8.25303 1.32817C8.25357 1.99531 8.25357 2.66026 8.25357 3.32575Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <span>Add to Cart</span>
                                </a>
                            </div>
                            <hr>
                            <div class="product-details">
                                <p class="fs-2">Kategori : <span class="inner-text">Baju</span></p>
                                <p class="fs-2">Brand : <span class="inner-text">Adidas</span></p>
                                <p class="fs-2">Ukuran : <span class="inner-text">XL</span></p>
                                <p class="fs-2">Kondisi : <span class="inner-text">Bagus</span></p>
                                <p class="fs-2">Warna : <span class="inner-text">Pink</span></p>
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
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                            type="button" role="tab" aria-controls="nav-home" aria-selected="true">Deskripsi
                            Produk</button>
                        <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review"
                            type="button" role="tab" aria-controls="nav-review" aria-selected="false">Info
                            Seller</button>
                    </div>
                </nav>
                <div class="tab-content tab-item" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                        tabindex="0" data-aos="fade-up">
                        <div class="product-intro-section">
                            <h5 class="intro-heading">Deskripsi</h5>
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
                    </div>
                    <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab"
                        tabindex="0">
                        <div class="product-review-section" data-aos="fade-up">
                            <h5 class="intro-heading">Info Seller</h5>
                            <div class="review-wrapper">
                                <div class="wrapper">
                                    <div class="wrapper-aurthor">
                                        <div class="wrapper-info">
                                            <div class="aurthor-img">
                                                <img src="template-assets/front/assets/images/homepage-one/aurthor-img-1.webp"
                                                    alt="aurthor-img">
                                            </div>
                                            <div class="author-details">
                                                <h5>Asoy Store</h5>
                                                <p>Karangploso, Malang</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrapper-review mt-4">
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis ad nostrum
                                            suscipit
                                            neque error laborum, odit, optio, vero provident consequatur modi fuga commodi
                                            quod
                                            quibusdam repellendus dolore nam corrupti nemo.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>
@endsection
