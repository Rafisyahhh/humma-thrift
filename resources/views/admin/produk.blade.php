@extends('layouts.app')

@section('title', 'Merk')

@section('content')
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
        <h5 class="card-header">Daftar Brand</h5>
        <div class="card-header d-flex justify-content-between align-items-center">

            <a type="button" class="btn btn" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#tambahModal"
                style="background: linear-gradient(72.47deg, rgba(28, 56, 121, 1) 22.16%, rgba(115, 103, 240, 0.7) 76.47%); color:#fff;">
                Tambahkan Brand
            </a>
            <form action="{{ route('admin.brand.index') }}" method="get">
                <div class="input-group mb-3">
                    <input type="search" name="search" class="form-control" placeholder="Cari Brand&hellip;"
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
                        <th>Kategori</th>
                        <th>Brand</th>
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
                            <td>
                                @foreach ($item->categories as $category)
                                    {{ $category->title }}
                                    @if (!$loop->last)
                                    ,
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $item->brand->title }}</td>
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
                                
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($product_auctions as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> {{ $item->title }}</td>
                            <td> <img src="{{ asset("storage/{$item->thumbnail}") }}" class="rounded-3" height="96px"></td>
                            <td>
                                @foreach ($item->categories as $category)
                                    {{ $category->title }}
                                    @if (!$loop->last)
                                    ,
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $item->brand->title }}</td>
                            <td>{{ $item->bid_price_start }} - {{ $item->bid_price_end }}</td>
                            <td>
                                <form id="updateForm{{ $item->id }}" action="{{ route('admin.produk.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex gap-2">
                                        <div>
                                            <input type="radio" onchange="submitForm(this)" class="btn-check"
                                                name="status" id="reject" value="reject" {{ $item->status == 'reject' ? 'checked' : '' }} autocomplete="off" />
                                            <label class="btn btn-sm btn-danger" for="reject">Tolak</label>
                                        </div>

                                        <div>
                                            <input type="radio" onchange="submitForm(this)" class="btn-check"
                                                name="status" id="accept" value="accept" {{ $item->status == 'accept' ? 'checked' : '' }} autocomplete="off" />
                                            <label class="btn btn-sm btn-success" for="accept">Terima</label>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
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
