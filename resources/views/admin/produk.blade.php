@extends('layouts.app')

@section('title', 'Merk')
@section('style')
<style>


.modal-content {
    max-width: 50rem;
    width: 100%;
}

.review-form {
    width: 100%;
}

.modal-header {
    padding: 1rem 1.5rem;
}

.product-info {
    padding: 2rem;
}

.product-info-img {
    margin-bottom: 1.5rem;
}

.product-info-content h5 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    font-weight: bold;
  color: #000;
}

.price .new-price {
    font-size: 1rem;
    color: blue;
}

.product-details th, .product-details td {
    padding: 0.5rem 1rem;
}

.product-details th {
    text-align: left;
    width: 60%;
    font-weight: 600;
    padding: 10px;
    color: rgba(0, 0, 0, 0.4);
}
.product-info-content .product-details .inner-text {
    color: #1c3879;
}
.product-details td {
    text-align: left;
    width: 75%;
}

.product-details hr {
    margin: 1.5rem 0;
}

.product-info-img .product-top .slider-top-img img {
    width: 100%;
    height: 100%;
    object-fit: cover !important;
    border: 1px solid rgba(126, 163, 219, 0.4);
    border-radius: 1rem;
}


.product-info-img .product-top .slider-top-img {
    width: 21rem;
    height: 25.5rem;
}

.inner-status {
    background: rgba(110, 109, 121, 0.10);
    color: rgba(0, 0, 0, .87);
    font-size: 0.8rem;
    font-weight: 400;
    margin: 0;
    padding: 0.47rem;
    text-transform: capitalize;
}
</style>
@endsection
@section('content')
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
        <h5 class="card-header">Daftar Produk</h5>
        <div class="card-header d-flex justify-content-between align-items-center">

       <a href=""></a>
            <form action="{{ route('admin.produk.index') }}" method="get">
                <div class="input-group mb-3">
                    <input type="search" name="search" class="form-control" placeholder="Cari Produk&hellip;"
                        value="{{ old('search', request('search')) }}" />
                    <button type="submit" class="btn"
                        style="background: linear-gradient(72.47deg, rgba(28, 56, 121, 1) 22.16%, rgba(115, 103, 240, 0.7) 76.47%); color:#fff;">Cari</button>
                </div>
            </form>

        </div>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>No.</th>
                        <th>Produk</th>
                        <th>Gambar</th>
                        <th>Toko</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($products->isEmpty() && $product_auctions->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data</td>
                    </tr>
                    @else
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td><img src="{{ asset("storage/{$item->thumbnail}") }}" class="rounded-3" height="96px"> </td>
                            <td>{{ $item->userstore->username }}</td>
                            <td>
                                @foreach ($item->categories as $category)
                                    {{ $category->title }}
                                    @if (!$loop->last)
                                    ,
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <form id="updateForm{{ $item->id }}" action="{{ route('admin.produk.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex gap-2">
                                        <div>
                                            <input type="radio" onchange="submitForm(this)" class="btn-check"
                                                name="status" id="inactive" value="inactive" {{ $item->status == 'inactive' ? 'checked' : '' }} autocomplete="off" />
                                            <label class="btn btn-sm btn-danger" for="inactive">Tidak Aktif</label>
                                        </div>

                                        <div>
                                            <input type="radio" onchange="submitForm(this)" class="btn-check"
                                                name="status" id="active" value="active" {{ $item->status == 'active' ? 'checked' : '' }} autocomplete="off" />
                                            <label class="btn btn-sm btn-success" for="active">Aktif</label>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <a data-bs-toggle="modal" class="btn" data-bs-target="#detailModal{{ $loop->iteration }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M12 16q1.875 0 3.188-1.312T16.5 11.5t-1.312-3.187T12 7T8.813 8.313T7.5 11.5t1.313 3.188T12 16m0-1.8q-1.125 0-1.912-.788T9.3 11.5t.788-1.912T12 8.8t1.913.788t.787 1.912t-.787 1.913T12 14.2m0 4.8q-3.35 0-6.113-1.8t-4.362-4.75q-.125-.225-.187-.462t-.063-.488t.063-.488t.187-.462q1.6-2.95 4.363-4.75T12 4t6.113 1.8t4.362 4.75q.125.225.188.463t.062.487t-.062.488t-.188.462q-1.6 2.95-4.362 4.75T12 19"/></svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($product_auctions as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> {{ $item->title }}</td>
                            <td> <img src="{{ asset("storage/{$item->thumbnail}") }}" class="rounded-3" height="96px"></td>
                            <td>{{ $item->userstore->username }}</td>
                            <td>
                                @foreach ($item->categories as $category)
                                    {{ $category->title }}
                                    @if (!$loop->last)
                                    ,
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $item->bid_price_start }} - {{ $item->bid_price_end }}</td>
                            <td>
                              <form id="updateForm{{ $item->id }}" action="{{ route('admin.produk.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="d-flex gap-2">
                                    <div>
                                        <input type="radio" onchange="submitForm(this)" class="btn-check"
                                            name="status" id="inactive{{ $item->id }}" value="inactive" {{ $item->status == 'inactive' ? 'checked' : '' }} autocomplete="off" />
                                        <label class="btn btn-sm btn-danger" for="inactive{{ $item->id }}">Tidak Aktif</label>
                                    </div>
                                    <div>
                                        <input type="radio" onchange="submitForm(this)" class="btn-check"
                                            name="status" id="active{{ $item->id }}" value="active" {{ $item->status == 'active' ? 'checked' : '' }} autocomplete="off" />
                                        <label class="btn btn-sm btn-success" for="active{{ $item->id }}">Aktif</label>
                                    </div>
                                </div>
                              </form>
                            </td>
                            <td>
                                <a data-bs-toggle="modal" class="btn" data-bs-target="#detailLelangModal{{ $loop->iteration }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M12 16q1.875 0 3.188-1.312T16.5 11.5t-1.312-3.187T12 7T8.813 8.313T7.5 11.5t1.313 3.188T12 16m0-1.8q-1.125 0-1.912-.788T9.3 11.5t.788-1.912T12 8.8t1.913.788t.787 1.912t-.787 1.913T12 14.2m0 4.8q-3.35 0-6.113-1.8t-4.362-4.75q-.125-.225-.187-.462t-.063-.488t.063-.488t.187-.462q1.6-2.95 4.363-4.75T12 4t6.113 1.8t4.362 4.75q.125.225.188.463t.062.487t-.062.488t-.188.462q-1.6 2.95-4.362 4.75T12 19"/></svg>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>

    </div>
    @foreach ($products as $item)

    <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="review-form m-0">
                  <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <section class="product product-info">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="product-info-img" data-aos="fade-right">
                                  <div class="swiper product-top">
                                      <div class="swiper-wrapper">
                                          <div class="swiper-slide slider-top-img">
                                              <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="img" class="object-fit-cover">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="product-info-content" data-aos="fade-left">
                                  <h5 style="margin-bottom:0;">{{ $item->title }}</h5>
                                  <div class="price" style="display: flex; justify-content: space-between; align-items: center;">
                                    <span class="new-price">Rp. {{ number_format($item->price, 0, ',', '.') }}</span>
                                      <span style="display: flex; justify-content:center; align-items:center;">
                                        <i class="fa-solid fa-store" style="margin-right: 0.5rem; color: #215791; font-size: 1.2rem; margin-left:2rem;"></i>
                                        <p style="font-weight: bold; margin-top:1rem; display: flex; justify-content:center; align-items:center;">{{ $item->userstore->username }}</p></span>
                                  </div>
                                  <hr>
                                  <div class="product-details">
                                      <table>
                                          <tr>
                                              <th>Kategori</th>
                                              <td><span class="inner-text">{{ implode(', ', array_column($item->categories->toArray(), 'title')) }}</span></td>
                                          </tr>
                                          <tr>
                                              <th>Brand</th>
                                              <td><span class="inner-text">{{ $item->brand->title }}</span></td>
                                          </tr>
                                          <tr>
                                              <th>Ukuran</th>
                                              <td><span class="inner-text">{{ $item->size }}</span></td>
                                          </tr>
                                          <tr>
                                              <th>Warna</th>
                                              <td><span class="inner-text">{{ $item->color }}</span></td>
                                          </tr>
                                          <tr>
                                              <th>Deskripsi</th>
                                              <td colspan="2"><span class="inner-text">{{ $item->description }}</span></td>
                                          </tr>
                                          <tr>
                                              <th>Status</th>
                                              <td><span class="inner-status" style="color: red">{{ $item->status }}</span></td>
                                          </tr>
                                      </table>
                                  </div>
                                  <hr>
                              </div>
                          </div>
                      </div>
                  </section>
              </div>
          </div>
      </div>
  </div>

  @endforeach
  @foreach ($product_auctions as $item)
  <div class="modal fade" id="detailLelangModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="review-form m-0">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <section class="product product-info">
              <div class="row">
                  <div class="col-md-6">
                      <div class="product-info-img" data-aos="fade-right">
                          <div class="swiper product-top">
                              <div class="swiper-wrapper">
                                  <div class="swiper-slide slider-top-img">
                                      <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="img" class="object-fit-cover">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="product-info-content" data-aos="fade-left">
                          <h5 style="margin-bottom:0;">{{ $item->title }}</h5>
                          <div class="price" style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="new-price">Rp. {{ number_format($item->bid_price_start, 0, ',', '.') }} - {{ number_format($item->bid_price_end, 0, ',', '.') }}</span>
                              <span style="display: flex; justify-content:center; align-items:center;">
                                <i class="fa-solid fa-store" style="margin-right: 0.5rem; color: #215791; font-size: 1.2rem; margin-left:2rem;"></i>
                                <p style="font-weight: bold; margin-top:1rem; display: flex; justify-content:center; align-items:center;">{{ $item->userstore->username }}</p></span>
                          </div>
                          <hr>
                          <div class="product-details">
                              <table>
                                  <tr>
                                      <th>Kategori</th>
                                      <td><span class="inner-text">{{ implode(', ', array_column($item->categories->toArray(), 'title')) }}</span></td>
                                  </tr>
                                  <tr>
                                      <th>Brand</th>
                                      <td><span class="inner-text">{{ $item->brand->title }}</span></td>
                                  </tr>
                                  <tr>
                                      <th>Ukuran</th>
                                      <td><span class="inner-text">{{ $item->size }}</span></td>
                                  </tr>
                                  <tr>
                                      <th>Warna</th>
                                      <td><span class="inner-text">{{ $item->color }}</span></td>
                                  </tr>
                                  <tr>
                                      <th>Deskripsi</th>
                                      <td colspan="2"><span class="inner-text">{{ $item->description }}</span></td>
                                  </tr>
                                  <tr>
                                      <th>Status</th>
                                      <td><span class="inner-status" style="color: red">{{ $item->status }}</span></td>
                                  </tr>
                              </table>
                          </div>
                          <hr>
                      </div>
                  </div>
              </div>
          </section>
        </div>
      </div>
    </div>
  </div>
@endforeach
    <br>
    {{-- {{ $items->links() }} --}}
    <!-- Bootstrap Table with Header - Light -->
@endsection
@section('js')
<script>
    function submitForm(radioBtn) {
        var form = radioBtn.closest('form').submit();
    }
</script>
@endsection
