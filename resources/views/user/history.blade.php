@extends('layouts.panel')

@section('content')
  <div class="wishlist">
    <div class="cart-content">
      <h5 class="cart-heading mb-3">History</h5>
    </div>
    <div class="cart-section wishlist-section">
      <table>
        <tbody>
          <tr class="table-row ticket-row">
            <td class="table-wrapper wrapper-product">
              <div class="wrapper">
                <div class="wrapper-img">
                  <img
                    src="{{ asset('template-assets/front/assets/images/homepage-one/product-img/product-img-1.webp') }}"
                    alt="img">
                </div>
                <div class="wrapper-content">
                  <h5 class="heading">Classic Design Skart</h5>
                  <p class="paragraph">$20.00</p>
                </div>
              </div>
            </td>
            <td class="table-wrapper">
              <div class="table-wrapper-center me-5" style="float: right;">
                <h5 class="heading">08-09-2006</h5>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    {{-- <div class="wishlist-btn">
        <a href="#" class="clean-btn">Clean Wishlist</a>
        <a href="#" class="shop-btn">View Cards</a>
    </div> --}}
  </div>
@endsection
