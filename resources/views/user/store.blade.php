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
                    @foreach ($stores as $item)
                    <div class="col-lg-4 col-md-6" style="margin-left: 5rem; margin-right: 5rem;">
                        <div class="product-wrapper" data-aos="fade-right" style="height: 17rem; width:50rem;">
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
                                <div class="d-flex">
                                    <div class="profile-icon me-1" style="color: #1c3879; font-size: 19px;">
                                        <i class="fas fa-box"></i>
                                    </div>
                                    <span class="new-price" style="font-size: 17px; font-weight:bold;">{{ count($item->products) + count($item->productAuctions) }} produk</span>
                                    <span class="new-price mx-2" style="font-size: 17px; font-weight:bold;">|</span>
                                    <div class="profile-icon me-1" style="color:green; font-size: 19px;">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </div>
                                    <span class="new-price" style="font-size: 17px; font-weight:bold; color:green;">{{ count($storeOrders[$item->id]) }} terjual</span>
                                </div>
                            </div>
                            <div class="profile-info-detail-content me-5" style="align-items: center; justify-content: center; text-align: center; border-left: 2px solid rgb(216, 216, 216);padding-left: 12px;">
                                <div class="profile-icon">
                                    <i class="fas fa-star" style="color: #ffbb28; font-size: 25px;"></i>
                                </div>
                                <div class="profile-title" style="margin-left: 12px; font-size: 15px;">{!! $item->getAverageRating() !!}/5.0</div>
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
