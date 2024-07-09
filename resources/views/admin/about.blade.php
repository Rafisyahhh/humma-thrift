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
@endpush

@section('content')
  <!-- Bootstrap Table with Header - Light -->
  <section class="about card" id="basics" style="display: none;">
    <div class="container">
      <div class="card-header d-flex justify-content-between align-items-center">
        @if ($aboutUs->isEmpty())
          <a type="button" class="btn" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#tambahModal"
            style="background:#7367f0;">
            Tambahkan About
          </a>
        @else
          <div></div>
        @endif
        <a type="button" class="btn" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#editModal2"
          style="background:#7367f0;">
          Edit About
        </a>
      </div>
      <div class="about-section mt-5">
        @foreach ($aboutUs as $about)
          <div class="row align-items-center gy-5" style="padding: 0 3rem;">
            <div class="col-lg-5">
              <div class="about-img" data-aos="fade-right">
                <div class="ratio ratio-1x1">
                  <img src="{{ asset("storage/{$about->image}") }}" alt="img" style="max-width: 100%; height: auto;"
                    class="object-fit-cover" />
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="about-content" data-aos="fade-up">
                <h3 class="review-title" style="font-family: 'Helvetica', sans-serif; font-size: 60px !important;">
                  {{ $about->title }}
                </h3>
                <p class="about-info"
                  style="font-family: 'Roboto', serif; font-size: 20px !important; word-wrap: break-word; width: 100%; max-width: 70rem;  text-align: justify;">
                  {{ $about->description }}
                </p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <div class="card" id="notbasics">
    <div class="table-responsive text-nowrap">
      <table class="table yajra-datatable w-100">
        <thead class="table-light">
          <tr>
            <th>NO.</th>
            <th>JUDUL</th>
            <th>GAMBAR</th>
            <th class="text-center">DESKRIPSI</th>
            <th>AKSI</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0"></tbody>
      </table>
    </div>
  </div>
  <div class="modal fade" tabindex="-1" id="tambahModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="m-0 font-weight-bold d-flex align-items-center gap-2"><i class="fas fa-newspaper me-1"></i>Tambahkan
            About</h6>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Judul</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                name="title">

              @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="image" class="form-label">Gambar</label>
              <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                name="image">

              @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Deskripsi</label>
              <textarea class="form-control @error('description') is-invalid @enderror" name="description" aria-label="With textarea">{{ old('description') }}</textarea>
              @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="pt-2 d-flex gap-3 justify-content-end">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn" style="background: #7367f0">Tambahkan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" tabindex="-1" id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="m-0 font-weight-bold"><i class="fas fa-newspaper me-1"></i>Edit About Us</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.about.update', ':id:') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="title" class="form-label">Judul</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                name="title" value="{{ old('title') }}">

              @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="image" class="form-label">Gambar</label>
              <input type="file" class="form-control @error('image_update') is-invalid @enderror" id="image"
                name="image_update" />
              <img src="#" class="w-100 mt-3 rounded-3" alt="image" id="image_placeholder" />
              @error('image_update')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Deskripsi</label>
              <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                aria-label="With textarea">{{ old('description') }}</textarea>
              @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="pt-2 d-flex gap-3 justify-content-end">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn" style="background:#7367f0;">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @foreach ($aboutUs as $about)
    <div class="modal fade" tabindex="-1" id="editModal2">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="m-0 font-weight-bold"><i class="fas fa-newspaper me-1"></i>Edit About Us</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                  name="title" value="{{ $about->title }}">

                @error('title')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" class="form-control @error('image_update') is-invalid @enderror" id="image"
                  name="image_update" />
                <img src="{{ asset("storage/$about->image") }}" class="w-100 mt-3 rounded-3" alt="image"
                  id="image_placeholder" />
                @error('image_update')
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
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn" style="background: #7367f0; color:#fff;">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  <!-- Bootstrap Table with Header - Light -->
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
            form.find('img#image_placeholder').attr('src', `{{ asset('storage/') }}/${data.image}`)
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
@endpush
