<div class="row g-5">
    @php
        $hasData = false;
    @endphp

    @foreach ($transaction as $item)
        {{-- @foreach ($orders[$item->id] as $ordr)
            @if ($ordr->product) --}}

        @php
            $firstOrder = $orders[$item->id]->first();
            $additionalProductsCount = $orders[$item->id]->count() - 1;

        @endphp
        @if ($firstOrder && $firstOrder->product && $firstOrder->product->userstore->user_id == auth()->user()->id)
            @php
                $hasData = true;
            @endphp

            {{-- @foreach ($transaction as $item)
                    @if ($orders) --}}
            <div class="col-lg-4 col-sm-6">
                <div class="product-wrapper" style="border: 1px solid; height: 41rem;">
                    <div class="wrapper-content" style="position: relative; height:13rem;">
                        <img src="{{ asset('storage/' . $firstOrder->product->thumbnail) }}" alt="img"
                            class="object-fit-cover" style="border-radius: 0%; height:20rem; width:100%;">
                        @if ($additionalProductsCount === 0)
                            <p class="paragraph mt-4 ms-4 fw-bold" style="margin-bottom: 38px">
                                {{ $firstOrder->product->title }}</p>
                        @else
                            <p class="paragraph mt-4 ms-4 fw-bold">
                                {{ $firstOrder->product->title }} dan
                                {{ $additionalProductsCount }} produk lainnya</p>
                        @endif
                        {{-- @endif
                    @endforeach --}}


                        <p class="paragraph mt-4 ms-4 fw-bold" style="font-size: 15px;">
                            {{ $item->user->name }}</p>
                        {{-- <p class="paragraph mt-4 ms-4 p-0" style="font-size: 15px;">
                        Jumlah
                        produk : {{ $item->order->count() }}
                    </p> --}}

                        @php
                            $statusClasses = [
                                'diterima' => 'badge  text-bg-primary text-light',
                                'selesai' => 'badge  text-bg-success text-light',
                                'dikemas' => 'badge  text-bg-warning text-light',
                                'diantar' => 'badge  text-bg-warning text-light',
                                'selesaikan pesanan' => 'badge  text-bg-danger text-light',
                            ];
                        @endphp

                        <p class="paragraph ms-4 p-0 mb-4" style="font-size: 15px;">
                            @currency($item->total)
                        </p>

                        @if (isset($statusClasses[$item->delivery_status]))
                            <div class="ps-3">
                                <div class="{{ $statusClasses[$item->delivery_status] }}" style="font-size: 15px">
                                    {{ $item->delivery_status }}
                                </div>
                            </div>
                        @endif

                        <a href="{{ route('seller.transaction.detail', $item->id) }}">
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Transaksi"
                                style="position: absolute;  right: 10px; display: flex; justify-content: right; align-items: right; margin-bottom: 10px; border-radius: 50%; border:1px solid;">
                                <svg style="display: flex; justify-content: center; align-items:center;"
                                    class="mt-1 me-1" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m13.692 17.308l-.707-.72l4.088-4.088H5v-1h12.073l-4.088-4.088l.707-.72L19 12z" />
                                </svg>
                            </span></a>
                        <p class="bottom-left mt-4 ms-2"
                            style="position: absolute; left: 10px; display: flex; justify-content: left; align-items: left;">
                            {{ $item->created_at->format('d F Y') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    {{-- @endforeach --}}


    @if (!$hasData)
        <div class="table-body d-flex flex-column align-items-center justify-content-center">
            <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;">
            <p>Tidak ada data</p>
        </div>
    @endif

</div>
