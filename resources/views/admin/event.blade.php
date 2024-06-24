@extends('layouts.app')

@section('title', 'Event')

@section('content')
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
        <h5 class="card-header">Daftar Hero Section</h5>
        <div class="card-header d-flex justify-content-between align-items-center">

            <a type="button" class="btn btn" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#tambahModal"
                style="background: linear-gradient(72.47deg, rgba(28, 56, 121, 1) 22.16%, rgba(115, 103, 240, 0.7) 76.47%); color:#fff;">
                Tambah Baru
            </a>
            <form action="{{ route('admin.brand.index') }}" method="get">
                <div class="input-group mb-3">
                    <input type="search" name="search" class="form-control" placeholder="Cari sesuatu disini&hellip;"
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
                        <th>Judul</th>
                        <th>SubJudul</th>
                        <th>Foto</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($event as $even)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $even->judul }}</span></td>
                            <td>{{ Str::limit($even->subjudul, 100) }}</span></td>
                            <td><img src="{{ asset("storage/{$even->foto}") }}" class="rounded-3" height="96px"></td>
                            <td>
                                <button type="button" class="badge bg-label-warning me-1 border-0" style="background: none"
                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $even->id }}">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 21h9" stroke="currentColor" stroke-width="2" />
                                        <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7.5 18.5 3 21l2.5-4.5L16.5 3.5z"
                                            fill="currentColor" />
                                    </svg>
                                </button>


                                <form id="delete-form-{{ $even->id }}"
                                    action="{{ route('admin.event.destroy', ['event' => $even->id]) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" style="background: none"
                                        class="badge bg-label-danger me-1 border-0"
                                        onclick="confirmDeletion({{ $even->id }});">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 24 24">
                                            <path fill="#FA7070"
                                                d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="modal fade" tabindex="-1" id="tambahModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="m-0 font-weight-bold d-flex align-items-center gap-2"><i
                                    class="fas fa-newspaper me-1"></i>Tambahkan Event</h6>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        id="judul" name="judul" value="{{ old('judul') }}"
                                        placeholder="Masukkan judul hero section" />
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="subjudul" class="form-label">Sub Judul</label>
                                    <textarea type="text" class="form-control @error('subjudul') is-invalid @enderror" id="subjudul" name="subjudul"
                                        placeholder="Masukkan sub judul">{{ old('subjudul') }}</textarea>
                                    @error('subjudul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        id="foto" name="foto">
                                    @if (old('foto'))
                                        <img id="preview" src="{{ asset('storage/' . old('foto')) }}" alt="Old gambar"
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
                                        style="background: linear-gradient(72.47deg, rgba(28, 56, 121, 1) 22.16%, rgba(115, 103, 240, 0.7) 76.47%); color: #fff;">Tambahkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($event as $key => $even)
                <div class="modal fade" tabindex="-1" id="editModal{{ $even->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="m-0 font-weight-bold"><i class="fas fa-newspaper me-1"></i>Edit Kategori</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.event.update', $even->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                            id="judul" name="judul" value="{{ old('judul', $even->judul) }}">
                                        @error('judul')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="subjudul" class="form-label">Sub Judul</label>
                                        <textarea type="text" class="form-control @error('subjudul') is-invalid @enderror" id="subjudul"
                                            name="subjudul">{{ old('subjudul', $even->subjudul) }}</textarea>
                                        @error('subjudul')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Foto Cover</label>
                                        <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                            id="foto" name="foto" />

                                        @if ($even->logo)
                                            <img src="{{ asset('storage/' . $even->foto) }}" class="w-100 mt-3 rounded-3"
                                                alt="{{ $even->judul }}" />
                                        @else
                                            No Image
                                        @endif
                                        @error('subjudul')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn"
                                    style="background: linear-gradient(72.47deg, rgba(28, 56, 121, 1) 22.16%, rgba(115, 103, 240, 0.7) 76.47%); color:#fff;">Simpan</button>
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
