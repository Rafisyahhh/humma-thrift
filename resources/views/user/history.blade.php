@extends('layouts.panel')

@section('content')
  <div class="wishlist">
    <div class="cart-content">
      <h5 class="cart-heading mb-3">History</h5>
    </div>
    <div class="cart-section wishlist-section">
      <table>
        <tbody>
          @forelse ($transaction as $item)
            <tr class="table-row ticket-row">
              <td class="table-wrapper wrapper-product">
                <div class="wrapper">
                  <div class="wrapper-img">
                    <img src="{{ asset($item['order']['product']['cover_image']) }}" alt="img">
                  </div>
                  <div class="wrapper-content">
                    <h5 class="heading">{{ $item['order']['product']['title'] }}</h5>
                    <p class="paragraph">Rp{{ number_format($item['order']['product']['price'], 0, '', '.') }}</p>
                  </div>
                </div>
              </td>
              <td class="table-wrapper">
                <div class="wrapper-content me-5" style="float: right; text-align: end;">
                  <h5 class="heading">{{ App\Http\Controllers\HistoryController::formatTanggal($item['created_at']) }}
                  </h5>
                  <p class="paragraph opacity-75 pt-1">
                    {{ Carbon\Carbon::parse($item['created_at'])->format('d F Y') }}
                  </p>
                </div>
              </td>
            </tr>
          @empty
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
