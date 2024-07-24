@include('Landing.components.product-regular', ['doNotShowEmptyProduct' => true])
@include('Landing.components.product-auction', ['doNotShowEmptyProduct' => true])

@if (count($products) + count($product_auction) <= 0)
  <div class="col-lg-12" isProduct>
    <h5 class="text-center" style="color: #a5a3ae">Tidak ada Produk</h5>
    <p class="text-center" style="color: #a5a3ae">Maaf ya, kami masih belum menambahkan produknya. Tapi
      dalam
      waktu dekat kami akan menambahkan beberapa produk untukmu, stay tune.</p>
  </div>
@endif
