@extends('layouts.app')
@section('title', 'Admin - Product Category')
@section('content')

    <!-- Tabel -->
    <div class="card">
        <h5 class="card-header">Kategori</h5>
        <div class="table-responsive text-nowrap">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a type="button" class="btn btn" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#tambahModal"
                    style="background-color: rgb(128, 114, 97) ; color:#fff;">
                    Tambahkan Kategori
                </a>
                <form method="get">
                    <div class="input-group mb-3">
                        <input type="search" name="search" class="form-control" placeholder="Cari Kategori&hellip;" />
                        <button type="submit" class="btn btn-secondary">Cari</button>
                    </div>
                </form>

            </div>
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Warna Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->title }}</td>
                            <td><img src="{{ asset("storage/{$category->icon}") }}" class="rounded-3" height="96px"></td>
                            <td>
                                <button type="button" class="badge bg-label-warning me-1 border-0" style="background: none"
                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">
                                    <i class="ti ti-pencil"></i>
                                </button>
                                <form id="delete-form-{{ $category->id }}"
                                    action="{{ route('admin.category.destroy', ['category' => $category->id]) }}"
                                    method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" style="background: none"
                                        class="badge bg-label-danger me-1 border-0"
                                        onclick="confirmDeletion({{ $category->id }});">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 24 24">
                                            <path fill="#FA7070"
                                                d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Tabel -->

    {{-- Modal Tambah --}}
    <div class="modal fade" tabindex="-1" id="tambahModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="m-0 font-weight-bold d-flex gap-2 align-items-center"><i
                            class="fas fa-newspaper me-1"></i>Tambahkan Kategori</h6>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="name"
                                name="title" value="{{ old('title') }}" placeholder="Masukkan nama kategori" />
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon</label>
                            <input type="file" class="form-control @error('icon') is-invalid @enderror"
                                id="icon" name="icon">
                            @if (old('icon'))
                                <img id="preview" src="{{ asset('storage/' . old('icon')) }}" alt="Old gambar"
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
                                style="background-color: rgb(128, 114, 97) ; color:#fff;">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end --}}

    {{-- Modal Edit --}}
    @foreach ($categories as $key => $category)
        <div class="modal fade" tabindex="-1" id="editModal{{ $category->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="m-0 font-weight-bold"><i class="fas fa-newspaper me-1"></i>Edit Kategori</h6>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $category->title) }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="icon" class="form-label">Icon</label>
                                <input type="file"
                                    class="form-control @error('icon') is-invalid @enderror"
                                    id="icon" name="icon" />

                                @if ($category->icon)
                                    <img src="{{ asset('storage/' . $category->icon) }}"
                                        class="w-100 mt-3 rounded-3" alt="{{ $category->title }}" />
                                @else
                                    No Image
                                @endif
                                @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn"
                            style="background-color:	rgb(167, 146, 119)  ; color:#fff;">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end --}}
@endsection
@section('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script>
        function confirmDeletion(categoryId) {
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
                    document.getElementById('delete-form-' + categoryId).submit();
                }
            });
        }
    </script>
@endsection
