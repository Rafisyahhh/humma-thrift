@extends('layouts.home')
@section('title','Store')
@section('content')

    <section class="product top-selling">
        <div class="container">
            <div class="section-title">
                <h5>Daftar Toko</h5>
            </div>
            <div class="top-selling-section">
                <div class="row g-5">
                    @foreach ($store as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right">
                            <div class="product-img" style="background-color: white">
                                <img src="{{asset('storage/'.$item->store_logo)}}" alt="product-img" style="border-radius: 10%" class="object-fit-cover">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a class="product-details">{{ $item->name }}
                                    </a>
                                    <div class="price">
                                        <span class="new-price">{{$item->address}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-btn">
                                <a href="{{ route('store.profile', ['store' => $item->username]) }}" class="product-btn">Detail</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>

@endsection
