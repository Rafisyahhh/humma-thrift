@extends('layouts.home')
@section('title', 'Shop')
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
