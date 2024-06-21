@extends('layouts.app')

@section('title', 'Data Tentang Kami')

@section('style')
    <link href="{{ asset('additional-assets/summernote-0.8.20/summernote-lite.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
        <h5 class="card-header">Data Tentang Kami</h5>
        <div class="card-header d-flex justify-content-between align-items-center">
            @if ($aboutUs->isEmpty())
                <a type="button" class="btn btn" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#tambahModal"
                    style="background: linear-gradient(72.47deg, rgba(28, 56, 121, 1) 22.16%, rgba(115, 103, 240, 0.7) 76.47%); color:#fff;">
                    Tambahkan Data Tentang Kami
                </a>
            @endif
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($aboutUs as $about)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $about->title }}</td>
                            <td><img src="{{ asset("storage/{$about->image}") }}" class="rounded-3" height="96px"></td>
                            <td>{!! $about->description !!}</span></td>
                            <td>
                                <button type="button" class="badge bg-label-warning me-1 border-0" style="background: none"
                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $about->id }}">
                                    <i class="ti ti-pencil"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" tabindex="-1" id="tambahModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="m-0 font-weight-bold d-flex align-items-center gap-2"><i
                                    class="fas fa-newspaper me-1"></i>Tambahkan About</h6>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title">

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Gambar</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="image" name="image">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea class="custom-summernote @error('description') is-invalid @enderror" id="custom-summernote" name="description"
                                        aria-label="With textarea">{{ old('description') }}</textarea>
                                    @error('description')
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

            @foreach ($aboutUs as $key => $about)
                <div class="modal fade" tabindex="-1" id="editModal{{ $about->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="m-0 font-weight-bold"><i class="fas fa-newspaper me-1"></i>Edit About Us</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.about.update', $about->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title"
                                            value="{{ old('title', $about->title) }}">

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Gambar</label>
                                        <input type="file"
                                            class="form-control @error('image_update') is-invalid @enderror"
                                            id="image" name="image_update" />

                                        @if ($about->image)
                                            <img src="{{ asset('storage/' . $about->image) }}"
                                                class="w-100 mt-3 rounded-3" alt="image" />
                                        @else
                                            No Image
                                        @endif
                                        @error('image_update')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <textarea class="custom-summernote @error('description_update') is-invalid @enderror" id="custom-summernote"
                                            name="description_update" aria-label="With textarea">{{ old('description_update', $about->description) }}</textarea>
                                        @error('description_update')
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


@section('js')
    <script src="{{ asset('additional-assets/summernote-0.8.20/summernote-lite.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.custom-summernote').summernote({
                placeholder: 'Isi deskripsi about us',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['insert', ['link', 'picture']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                ],
                callbacks: {
                    onInit: function() {
                        // Set background color to white
                        $('.custom-summernote .note-editor').css('background-color', 'white');
                        // Set text color to white
                        $('.custom-summernote .note-editable').css('color', 'white');
                    },
                    onChange: function(contents, $editable) {
                        // Set text color to white
                        $('.custom-summernote .note-editable').css('color', 'white');
                    }
                }
            });
        });
    </script>
@endsection
