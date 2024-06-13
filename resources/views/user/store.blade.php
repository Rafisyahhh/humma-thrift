@extends('user.layouts.app')
@section('tittle','Store')
@section('content')

    <section class="product top-selling">
        <div class="container">
            <div class="section-title">
                <h5>Daftar Toko</h5>
            </div>
            <div class="top-selling-section">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right">
                            <div class="product-img">
                                <img src="{{asset('template-assets/front/assets/images/homepage-one/product-img/product-img-5.webp')}}" alt="product-img">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a class="product-details">Nama Toko
                                    </a>
                                    <div class="price">
                                        <span class="new-price">Keterangan</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="/user/detail" class="product-btn">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>

@endsection
