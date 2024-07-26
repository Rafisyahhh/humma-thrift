@include('Landing.components.product-regular', ['doNotShowEmptyProduct' => true])
@include('Landing.components.product-auction', ['doNotShowEmptyProduct' => true])

@if (count($products) + count($product_auction) <= 0)
  <div class="col-lg-12 d-flex flex-column align-items-center">
    <img src="{{ asset('asset-thrift/datakosong.png') }}" alt="kosong" style="width: 200px; height: 200px;">
    <h5 class="text-center" style="color: #000000">Produk Masih Kosong</h5>
    <p class="text-center" style="color: #000000">Maaf, produk belum ada.</p>
  </div>
@endif
