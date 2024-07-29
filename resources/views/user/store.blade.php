@extends('layouts.home')
@push('style')
<style>
    .truncate {
  width: 250px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
@endpush
@section('title', 'Daftar Toko')

@section('content')
    <section class="product top-selling">
        <div class="container">
            <div class="section-title">
                <h5>Daftar Toko</h5>
            </div>
            <div class="top-selling-section">
                <div class="row g-5 pb-5 mb-3">
                    @foreach ($store as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="product-wrapper" data-aos="fade-right" style="height: 17rem">
                            <div class="product-img" style="background-color: white; height:7rem; width: 7rem; ">
                                <img src="{{asset('storage/'.$item->store_logo)}}" alt="product-img" style="border-radius: 10%" class="object-fit-cover">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a class="product-details" style="font-size: 2rem">{{ $item->name }}
                                    </a>
                                </div>
                                <div class=" price ">
                                    <span class="new-price truncate" style="font-size: 1.5rem">{{$item->address}}</span>
                                </div>
                            </div>
                            <div class="product-cart-btn" style="bottom: 0;">
                                <a href="{{ route('store.profile', ['store' => $item->username]) }}" class="product-btn d-flex bottom-0 gap-3 align-items-center">
                                    Lihat
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
