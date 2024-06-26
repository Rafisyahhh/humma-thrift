@extends('layouts.home')
@section('title','Brand')
@section('style')
<style>
.top-selling-section .product-wrapper .product-img {
    height: 25.7rem;
    width: 25.7rem;
    background: rgba(126, 163, 219, 0.4);
}
html:not(.no-js) [data-aos^="fade"][data-aos^="fade"].aos-animate {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
    width:28rem;
    height:35rem;
}
</style>
@endsection
@section('content')
    <section class="product top-selling">
        <div class="container">
            <div class="section-title">
                <h5>Brand Produk</h5>
            </div>
            @foreach ( $brands as $item )
            <div class="top-selling-section">
                <div class="row g-5 mt-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right" style="display: flex; flex-direction: column; align-items: center;">
                            <div class="product-img" style="display: flex; justify-content: center; width: 100%;">
                                <img src="{{ asset("storage/$item->logo") }}"
                                    alt="product-img" style="height: 25.7rem; width: 25.7rem; background: rgba(126, 163, 219, 0.4);">
                            </div>
                            <p class="product-details" style="text-align: center; margin-top: 10px;">{{ $item->title }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
    </section>
@endsection
