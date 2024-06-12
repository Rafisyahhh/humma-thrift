@extends('layouts.app')
@section('content')
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
        <h5 class="card-header">Daftar Brands</h5>
        <div class="card-header d-flex justify-content-between align-items-center">

            <a type="button" class="btn btn" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#tambahModal"
                style="background-color:	rgb(167, 146, 119)  ; color:#fff;">
                Tambahkan Brand
            </a>
            <form action="{{ route('brand.index') }}" method="get">
                <div class="input-group mb-3">
                    <input type="search" name="search" class="form-control" placeholder="Cari Brand&hellip;"
                    value="{{ old('search', request('search')) }}" />
                    <button type="submit" class="btn btn-secondary">Cari</button>
                </div>
            </form>

        </div>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>No.</th>
                        <th>Nama Brand</th>
                        <th>Logo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brand->title }}</span></td>
                            <td><img src="{{ asset("storage/{$brand->logo}") }}" class="rounded-3" height="96px"></td>
                            <td>
                                <button type="button" class="badge bg-label-warning me-1 border-0" style="background: none"
                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $brand->id }}">
                                    <i class="ti ti-pencil"></i>
                                </button>
                                <form id="delete-form-{{ $brand->id }}" action="{{ route('brand.destroy', ['brand' => $brand->id]) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" style="background: none" class="badge bg-label-danger me-1 border-0" onclick="confirmDeletion({{ $brand->id }});">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                            <path fill="#FA7070" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" tabindex="-1" id="tambahModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="m-0 font-weight-bold"><i class="fas fa-newspaper me-1"></i>Tambahkan Brand</h6>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="title" class="form-label">Name Brand</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}"
                                        placeholder="Masukkan nama kategori" />
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                        id="logo" name="logo">
                                    @if (old('logo'))
                                        <img id="preview" src="{{ asset('storage/' . old('logo')) }}" alt="Old gambar"
                                            style="max-width: 100px; max-height: 100px;">
                                    @endif
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="pt-2 d-flex gap-3 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn"
                                        style="background-color:	rgb(167, 146, 119)  ; color:#fff;">Tambahkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($brands as $key => $brand)
                <div class="modal fade" tabindex="-1" id="editModal{{ $brand->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="m-0 font-weight-bold"><i class="fas fa-newspaper me-1"></i>Edit Kategori</h6>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('brand.update', $brand->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Nama Brand</label>
                                        <input type="text"
                                            class="form-control @error('title_update') is-invalid @enderror" id="title"
                                            name="title_update" value="{{ old('title_update', $brand->title ) }}">
                                        @error('title_update')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Foto Cover</label>
                                        <input type="file"
                                            class="form-control @error('logo_update') is-invalid @enderror"
                                            id="logo" name="logo_update" />

                                        @if ($brand->logo)
                                            <img src="{{ asset('storage/' . $brand->logo) }}"
                                                class="w-100 mt-3 rounded-3" alt="{{ $brand->title }}" />
                                        @else
                                            No Image
                                        @endif
                                        @error('logo_update')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit"  class="btn btn"
                                style="background-color:	rgb(167, 146, 119)  ; color:#fff;">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Bootstrap Table with Header - Light -->
@endsection

@section('scripts')
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script>
    function confirmDeletion(brandId) {
        Swal.fire({
            title: "Apa kamu yakin?",
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + brandId).submit();
            }
        });
    }
</script>
@endsection
