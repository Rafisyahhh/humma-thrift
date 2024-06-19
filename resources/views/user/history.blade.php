@php
  use App\Http\Controllers\HistoryController;

  $data = [
      [
          'title' => 'Classic Design Skart',
          'price' => '20',
          'image' => 'template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp',
          'purchased_date' => '2024-02-08',
      ],
      [
          'title' => 'Classic Design Skart',
          'price' => '20',
          'image' => 'template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp',
          'purchased_date' => '2024-04-08',
      ],
  ];
@endphp

@extends('layouts.panel')

@section('content')
  <div class="wishlist">
    <div class="cart-content">
      <h5 class="cart-heading mb-3">History</h5>
    </div>
    <div class="cart-section wishlist-section">
      <table>
        <tbody>
          @forelse ($data as $item)
            <tr class="table-row ticket-row">
              <td class="table-wrapper wrapper-product">
                <div class="wrapper">
                  <div class="wrapper-img">
                    <img src="{{ asset($item['image']) }}" alt="img">
                  </div>
                  <div class="wrapper-content">
                    <h5 class="heading">{{ $item['title'] }}</h5>
                    <p class="paragraph">${{ $item['price'] }}</p>
                  </div>
                </div>
              </td>
              <td class="table-wrapper">
                <div class="wrapper-content me-5" style="float: right; text-align: end;">
                  <h5 class="heading">{{ HistoryController::formatTanggal($item['purchased_date']) }}</h5>
                  <p class="paragraph opacity-75 pt-1">
                    {{ Carbon\Carbon::parse($item['purchased_date'])->format('d F Y') }}
                  </p>
                </div>
              </td>
            </tr>
          @empty
            Anda belum memesan apapun
          @endforelse
        </tbody>
      </table>
    </div>
    {{-- <div class="wishlist-btn">
        <a href="#" class="clean-btn">Clean Wishlist</a>
        <a href="#" class="shop-btn">View Cards</a>
    </div> --}}
  </div>
@endsection
