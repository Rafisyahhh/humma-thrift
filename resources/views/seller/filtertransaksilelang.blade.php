<table style="width: 100rem;">
    <tbody>
        <tr class="table-row table-top-row custom-table-header" style="color:#fff;">
            <td class="table-wrapper wrapper-product" style="width: 15%;">
                <h5 class="table-heading">PRODUK</h5>
            </td>
            <td class="table-wrapper wrapper-product" style="width: 15%;">
                <h5 class="table-heading">PEMBELI</h5>
            </td>
            <td class="table-wrapper wrapper-product" style="width: 15%;">
                <h5 class="table-heading">EMAIL</h5>
            </td>
            <td class="table-wrapper">
                <h5 class="table-heading">HARGA</h5>
            </td>
            <td class="table-wrapper">
                <div class="table-wrapper-center">
                    <h5 class="table-heading">PENGIRIMAN</h5>
                </div>
            </td>
            <td class="table-wrapper">
                <div class="table-wrapper-center">
                    <h5 class="table-heading">STATUS</h5>
                </div>
            </td>

        </tr>
        @php
            $hasDatalelang = false;
        @endphp
        @forelse ($transaction as $item)
            @foreach ($orderL[$item->id] as $ordr)
                @if ($ordr->product_auction)
                    @if ($ordr->product_auction->userStore->user_id == auth()->user()->id)
                        @php
                            $hasDatalelang = true;
                        @endphp

                        <tr class="table-row ticket-row">

                            <td class="table-wrapper wrapper-product" style="width: 28%;">
                                <div class="wrapper">
                                    <div class="wrapper-img">
                                        <img src="{{ asset('storage/' . $ordr->product_auction->thumbnail) }}"
                                            alt="img" style="border-radius:0.5rem;">
                                    </div>
                                    <div class="wrapper-content">
                                        <p class="heading" style="color: #787878; font-size: 12px;">
                                            {{ $item->created_at->format('d F Y') }}</p>
                                        <h5 class="heading">
                                            {{ $ordr->product_auction->title }}</h5>
                                    </div>
                                </div>
                            </td>
                            <td class="table-wrapper" style="width: 15%;">
                                <div class="table-wrapper-center">
                                    <h5 class="heading">{{ $item->user->name }}</h5>
                                </div>
                            </td>
                            <td class="table-wrapper" style="width: 15%;">
                                <div class="table-wrapper-center">
                                    <h5 class="heading">{{ $item->user->email }}</h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="heading">
                                        {{ 'Rp. ' . number_format($ordr->product_auction->price, 0, ',', '.') }}
                                    </h5>
                                </div>
                            </td>
                            @php
                                $statusClasses = [
                                    'diterima' => 'badge  text-bg-primary text-light',
                                    'selesai' => 'badge  text-bg-success text-light',
                                    'dikemas' => 'badge  text-bg-warning text-light',
                                    'diantar' => 'badge  text-bg-warning text-light',
                                    'selesaikan pesanan' => 'badge  text-bg-danger text-light',
                                ];
                            @endphp
                            @if (isset($statusClasses[$item->delivery_status]))
                                <td class="table-wrapper" style="width: 12%; font-size: 15px">
                                    {{-- <div class="{{ $statusClasses[$item->delivery_status] }}"> --}}
                                    {{-- {{ $item->delivery_status }} --}}
                                    <form action="{{ route('seller.transaction.detail.update', $item->id) }}"
                                        method="POST">
                                        @csrf
                                        <select class="form-select form-select-lg mx-2"
                                            aria-label="Default select example"
                                            style="width: 160px;border-color: #1c3879" name="status"
                                            onchange="this.form.submit()">
                                            <option value="dikemas"
                                                {{ $item->delivery_status == 'dikemas' ? 'selected' : '' }}>
                                                Dikemas</option>
                                            <option value="diantar"
                                                {{ $item->delivery_status == 'diantar' ? 'selected' : '' }}>
                                                Diantar</option>
                                            <option value="diterima"
                                                {{ $item->delivery_status == 'diterima' ? 'selected' : '' }}>
                                                Diterima</option>
                                        </select>
                                    </form>
                                    {{-- </div> --}}
                                </td>
                            @endif
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    @if ($ordr->transaction_order->status == 'UNPAID')
                                        <h5 class="heading text-danger">Belum Bayar</h5>
                                    @elseif ($ordr->transaction_order->status == 'PAID')
                                        <h5 class="heading text-success">Pembayaran
                                            Berhasil</h5>
                                    @elseif ($ordr->transaction_order->status == 'EXPIRED')
                                        <h5 class="heading text-danger">Pembayaran
                                            Kadaluarsa</h5>
                                    @elseif ($ordr->transaction_order->status == 'REFUND')
                                        <h5 class="heading text-warning">Produk
                                            Dikembalikan</h5>
                                    @elseif ($ordr->transaction_order->status == 'FAILED')
                                        <h5 class="heading text-danger">Pembayaran Gagal
                                        </h5>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endif
                @endif
            @endforeach
        @endforeach

        @if (!$hasDatalelang)
            <tr class="table-row ticket-row" style="height:12px;">
                <td colspan="6" class="text-center no-data-message">
                    <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong"
                        style="width: 200px; height: 200px;">
                    <p>Tidak ada data</p>
                </td>
            </tr>
        @endif
    </tbody>
</table>
