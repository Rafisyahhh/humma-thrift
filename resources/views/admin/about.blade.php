@extends('layouts.app')

@section('title', 'Data Tentang Kami')

@section('link')
    <link href="{{ asset('additional-assets/summernote-0.8.20/summernote-lite.min.css') }}" rel="stylesheet" />
@endsection

@push('style')
    <style>
        .description {
            display: block;
            max-width: 30rem;
            break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }

        .btn {
            background: #7367f0;
            color: #fff;
        }
    </style>
    <style>
    .container, .container-fluid, .container-sm, .container-md, .container-lg, .container-xl, .container-xxl {
        padding-right: 3rem;
        padding-left: 3rem;
        margin-bottom: 2rem;
    }

  .image-preview-container {
    position: relative;
    width: 325px;
    height: 310px;
    border-radius: 15px;
    overflow: hidden;
    border: 2px solid #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.image-preview-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.pencil-icon {
    position: absolute;
    bottom: 10px;
    right: 10px;
    background-color: white;
    border-radius: 50%;
    padding: 10px;
    cursor: pointer;
    border: 2px solid #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
}

.pencil-icon i {
    font-size: 16px;
    color: #000;
}

.upload-input input[type="file"] {
    display: none;
}

textarea.form-control {
    min-height: calc(10em + 0.844rem + calc(var(--bs-border-width)* 2));
}
    </style>
@endpush

@section('content')
    <!-- Bootstrap Table with Header - Light -->
    <section class="about card" id="basics" style="display: none;">
        <div class="container">
        </div>
    </section>
    @foreach ($aboutUs as $about)
    <div class="card" id="notbasics">
        <div class="container">

            <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="img-upload-section">
                    <div class="logo-wrapper">
                        <div class="logo-upload mt-5 mb-5">
                            <div class="image-preview-container" id="avatar-preview-container">
                                <img src="{{ asset("storage/$about->image") }}"
                                    alt="up" class="upload-img" id="upload-img" style="object-fit: cover;">
                                <label for="input-file" class="pencil-icon">
                                    <i class="fas fa-pencil-alt"></i>
                                </label>
                                <input type="file" name="image" accept="image/jpeg, image/jpg, image/png, image/webp"
                                    id="input-file" onchange="previewImage(event, 'upload-img')" style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                        id="title" name="title" value="{{ $about->title }}">

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                        aria-label="With textarea">{{ $about->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="pt-2 d-flex gap-3 justify-content-end">
                    <button type="submit" class="btn btn" style="background: #7367f0">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endsection


@push('js')
    <script src="{{ asset('additional-assets/summernote-0.8.20/summernote-lite.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.custom-summernote').summernote({
                placeholder: 'Isi deskripsi about us',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['insert', ['link']],
                    ['para', ['ul', 'ol', 'paragraph']],
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
@endpush

@push('scripts')
    <script src="{{ asset('additional-assets/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('additional-assets/datatables/datatables-button.min.js') }}"></script>
    <script src="{{ asset('additional-assets/datatables/datatables-responsive.min.js') }}"></script>
    <script src="{{ asset('additional-assets/datatables/datatables-stateRestore.min.js') }}"></script>
    <script src="{{ asset('js/AjaxDataTable.js') }}"></script>
@endpush

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            const {
                table
            } = $('.yajra-datatable').AjaxDataTable({
                onCreate: {
                    modal: $('#tambahModal'),
                    text: 'Tambahkan Data',
                    className: 'btn me-4 mt-4',
                    onSuccess: () => {
                        $('.createButton').remove();
                    }
                },
                onEdit: {
                    modal: $('#editModal'),
                    onClick: (form, data) => {
                        form.find('img#image_placeholder').attr('src',
                            `{{ asset('storage/') }}/${data.image}`)
                    }
                },
                options: {
                    responsive: true,
                    layout: {
                        topStart: $(`<div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="ms-3 mb-0">Data Tentang Kami</h5>
          </div>`),
                        @if ($aboutUs->isEmpty())
                            topEnd: {
                                buttons: ["create"]
                            },
                        @else
                            topEnd: null,
                        @endif
                        bottomStart: null,
                        bottomEnd: null
                    }
                },
                ajax: "{{ route('yajra.abouts') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'title',
                    },
                    {
                        data: 'image',
                        orderable: false,
                        searchable: false,
                        render: (data, type) =>
                            `<img src="{{ asset('storage/') }}/${data}" class="rounded-3" height="96px" loading="lazy">`
                    },
                    {
                        data: 'description',
                        className: 'text-wrap',
                    },
                    {
                        data: 'id',
                        orderable: false,
                        searchable: false,
                        render: (data, type) => {
                            const editButton = `<button type="button" class="badge bg-label-warning me-1 border-0 edit" style="background: none">
                <i class="ti ti-pencil"></i>
              </button>`;
                            return editButton;
                        }
                    }
                ]
            });

            $("#search").submit(function(e) {
                e.preventDefault();
                table.search($(this).find("input[name='search']").val()).draw();
            });

            $(document).keydown(function(event) {
                if (event.key === 'Home') {
                    $("#basics").show();
                    $("#notbasics").hide();
                } else if (event.key === 'PageUp') {
                    $("#basics").hide();
                    $("#notbasics").show();
                }
            });
        });
    </script>
    <script>
        function previewImage(event, previewId) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function() {
                const previewImage = document.getElementById(previewId);
                previewImage.src = reader.result;
                previewImage.style.display = 'block';
            }

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
