<table>
    <tbody>
        <tr class="table-row table-top-row">
            <td class="table-wrapper wrapper-product">
                <div class="table-wrapper-center">
                    <h5 class="table-heading">PRODUK</h5>
                </div>
            </td>
            <td class="table-wrapper">
                <div class="table-wrapper-center">
                    <h5 class="table-heading">HARGA</h5>
                </div>
            </td>
            <td class="table-wrapper">
                <div class="table-wrapper-center">
                    <h5 class="table-heading">STATUS</h5>
                </div>
            </td>

            <td class="table-wrapper">
                <div class="table-wrapper-center">
                    <h5 class="table-heading">DETAIL ORDER</h5>
                </div>
            </td>
        </tr>
        {{-- @forelse ($transaction as $item)
            @if ($item->transaction_order->user_id == auth()->user()->id)
                @if ($item->product_auction !== null) --}}
                @forelse ($auctions as $item)
                @if ($item->transaction_order && $item->transaction_order->user_id == auth()->user()->id)
                    @if ($item->product_auction !== null)
                    <tr class="table-row ticket-row">
                        <td class="table-wrapper wrapper-product" style="width: 35%; ">
                            <div class="wrapper">
                                <div class="wrapper-img">
                                    <img src="{{ asset('storage/' . $item->product_auction->thumbnail) }}"
                                        alt="img">
                                </div>
                                <div class="wrapper-content">
                                    <h5 class="heading">{{ $item->product_auction->title }}
                                    </h5>
                                    <p style="color: #636363">
                                        {{ $item->product_auction->brand->title }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="table-wrapper" style="text-align:center;">
                            <p style="color: #989797; font-size: 14px">Rp.
                                {{ number_format($item->product_auction->bid_price_start, null, null, '.') }}
                                - Rp.
                                {{ number_format($item->product_auction->bid_price_end, null, null, '.') }}
                            </p>
                            <p class="heading">Rp.
                                {{ number_format($item->product_auction->price, null, null, '.') }}
                            </p>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                @if ($item->transaction_order->delivery_status == 'diterima')
                                    <form
                                        action="{{ route('user.order.update', $item->transaction_order->id) }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="selesai">
                                        <div class="table-wrapper-center">
                                            <button type="submit" class="shop-btn m-0"
                                                style="font-size: 15px;">
                                                Konfirmasi telah diterima
                                            </button>
                                        </div>
                                    </form>
                                @elseif($item->transaction_order->delivery_status == 'selesai')
                                    <div class="table-wrapper-center">
                                        <span class="badge text-bg-success">
                                            <h5 class="heading text-light">
                                                {{ $item->transaction_order->delivery_status }}
                                            </h5>
                                        </span>
                                    </div>
                                @elseif($item->transaction_order->delivery_status == 'dikemas')
                                    <div class="table-wrapper-center">
                                        <span class="badge text-bg-warning">
                                            <h5 class="heading text-light">
                                                {{ $item->transaction_order->delivery_status }}
                                            </h5>
                                        </span>
                                    </div>
                                @elseif($item->transaction_order->delivery_status == 'diantar')
                                    <div class="table-wrapper-center">
                                        <span class="badge text-bg-warning">
                                            <h5 class="heading text-light">
                                                {{ $item->transaction_order->delivery_status }}
                                            </h5>
                                        </span>
                                    </div>
                                @elseif($item->transaction_order->delivery_status == 'selesaikan pesanan')
                                    <div class="table-wrapper-center">
                                        <span class="badge text-bg-danger">
                                            <h5 class="heading text-light">
                                                {{ $item->transaction_order->delivery_status }}
                                            </h5>
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </td>

                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <div class="wrapper-btn">
                                    <a href="{{ route('user.transaction.show', ['reference' => $item->transaction_order->reference_id]) }}"
                                        class="shop-btn">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                {{-- @else
                <tr class="table-row ticket-row" style="height:12px;">
                    <td colspan="6" class="text-center no-data-message" >
                        <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;">
                        <p>Tidak ada data</p>
                    </td>
                </tr> --}}
                @endif
                {{-- @else
                <tr class="table-row ticket-row" style="height:12px;">
                    <td colspan="6" class="text-center no-data-message" >
                        <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;">
                        <p>Tidak ada data</p>
                    </td>
                </tr> --}}
            @endif
        @empty
        <tr class="table-row ticket-row" style="height:12px;">
            <td colspan="6" class="text-center no-data-message" >
                <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;">
                <p>Tidak ada data</p>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
