@extends('layouts.app')

@section('title', 'Merk')

@push('style')
  {{-- <link rel="stylesheet" href="{{ asset('additional-assets/datatables/datatables.min.css') }}"> --}}
  <style>
    .btn {
      background: linear-gradient(72.47deg, rgba(28, 56, 121, 1) 22.16%, rgba(115, 103, 240, 0.7) 76.47%);
      color: #fff;
    }

    .dt-info {
      margin-left: 10%;
    }

    div.dt-container div.dt-paging {
      margin: 0;
      margin-right: 10%;
      margin-left: -10%;
    }
  </style>
@endpush

@section('content')
  <!-- Bootstrap Table with Header - Light -->
  <div class="card">
    <h5 class="card-header">Daftar Brand</h5>

    <div class="table-responsive text-nowrap">
      <table class="table yajra-datatable w-100">
        <thead class="table-light">
          <tr>
            <th class="text-start">NO.</th>
            <th class="text-start">NAMA BRAND</th>
            <th class="text-start">LOGO</th>
            <th class="text-center">AKSI</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0"></tbody>
      </table>
      <div class="modal fade" tabindex="-1" id="tambahModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="m-0 font-weight-bold d-flex align-items-center gap-2"><i
                  class="fas fa-newspaper me-1"></i>Tambahkan Brand</h6>

              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                  <label for="title" class="form-label">Name Brand</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title') }}" placeholder="Masukkan nama brand" />
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="logo" class="form-label">Logo</label>
                  <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                    name="logo">
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
                    style="background: linear-gradient(72.47deg, rgba(28, 56, 121, 1) 22.16%, rgba(115, 103, 240, 0.7) 76.47%); color: #fff;">Tambahkan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      {{-- @foreach ($brands as $key => $brand)
        <div class="modal fade" tabindex="-1" id="editModal{{ $brand->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-newspaper me-1"></i>Edit Kategori</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="mb-3">
                    <label for="title" class="form-label">Nama Brand</label>
                    <input type="text" class="form-control @error('title_update') is-invalid @enderror" id="title"
                      name="title_update" value="{{ old('title_update', $brand->title) }}">
                    @error('title_update')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="logo" class="form-label">Foto Cover</label>
                    <input type="file" class="form-control @error('logo_update') is-invalid @enderror" id="logo"
                      name="logo_update" />

                    @if ($brand->logo)
                      <img src="{{ asset('storage/' . $brand->logo) }}" class="w-100 mt-3 rounded-3"
                        alt="{{ $brand->title }}" />
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
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn"
                  style="background: linear-gradient(72.47deg, rgba(28, 56, 121, 1) 22.16%, rgba(115, 103, 240, 0.7) 76.47%); color:#fff;">Simpan</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      @endforeach --}}
      <div class="modal fade" tabindex="-1" id="editModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="m-0 font-weight-bold"><i class="fas fa-newspaper me-1"></i>Edit Kategori</h6>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('admin.brand.update', ':id:') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="title" class="form-label">Nama Brand</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title_edit"
                    name="title" value="test">
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="logo" class="form-label">Foto Cover</label>
                  <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo_edit"
                    name="logo" value="" />
                  <img src="" class="w-100 mt-3 rounded-3" alt="" id="logo_image" />
                  @error('logo')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="pt-2 d-flex gap-3 justify-content-end">
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn"
                    style="background: linear-gradient(72.47deg, rgba(28, 56, 121, 1) 22.16%, rgba(115, 103, 240, 0.7) 76.47%); color:#fff;">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('additional-assets/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('additional-assets/datatables/datatables-button.min.js') }}"></script>
  <script src="{{ asset('additional-assets/datatables/datatables-responsive.min.js') }}"></script>
  <script src="{{ asset('additional-assets/datatables/datatables-stateRestore.min.js') }}"></script>
  <script src="{{ asset('js/jquery.form.min.js') }}"></script>
  <script src="{{ asset('js/formSubmit.js') }}"></script>
  <script src="{{ asset('js/ajaxDataTable.js') }}"></script>
  <script>
    function confirmDeletion(callback) {
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
          callback();
        }
      });
    }
  </script>
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    });
    const {
      table
    } = $('.yajra-datatable').ajaxDataTable({
      onCreate: {
        modal: $('#tambahModal'),
        text: 'Tambahkan Brand',
        className: 'btn ms-4'
      },
      onEdit: {
        modal: $('#editModal'),
        onClick: (form, data) => {
          form.find('img#logo_image').attr('src', `{{ asset('storage/') }}/${data.logo}`)
        }
      },
      onDelete: {
        modal: $('#editModal'),
        url: '{{ route('admin.brand.destroy', ':id:') }}',
        onClick: ($delete) => {
          confirmDeletion(() => {
            $delete()
          });
        }
      },
      options: {
        layout: {
          topStart: {
            buttons: ["create"]
          },
          topEnd: $(`<form action="#" method="get" id="search" class="me-4">
            <div class="input-group mb-3">
              <input type="search" name="search" class="form-control" placeholder="Cari Brand&hellip;"
                value="{{ old('search', request('search')) }}" />
              <button type="submit" class="btn"
                style="background: linear-gradient(72.47deg, rgba(28, 56, 121, 1) 22.16%, rgba(115, 103, 240, 0.7) 76.47%); color:#fff;">Cari</button>
            </div>
          </form>`),
          bottomStart: {
            info: {
              text: 'Menampilkan _START_ dari _END_ hasil'
            }
          },
        }
      },
      ajax: "{{ route('yajra.getBrand') }}",
      columns: [{
          data: 'DT_RowIndex',
          orderable: false,
          searchable: false,
        },
        {
          data: 'title',
        },
        {
          data: 'logo',
          orderable: false,
          searchable: false,
          render: (data, type) => `<img src="{{ asset('storage/') }}/${data}" class="rounded-3" height="96px">`
        },
        {
          data: 'id',
          className: 'text-center',
          orderable: false,
          searchable: false,
          render: (data, type) => {
            const editButton = `<button type="button" class="badge bg-label-warning me-1 border-0 edit" style="background: none">
              <i class="ti ti-pencil"></i>
            </button>`;
            const deleteButton = `<button type="button" class="badge bg-label-danger me-1 border-0 delete" style="background: none">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                <path fill="#FA7070" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
              </svg>
            </button>`;
            return editButton + deleteButton;
          }
        }
      ]
    });

    $("#search").submit(function(e) {
      e.preventDefault();
      table.search($(this).find("input[name='search']").val()).draw();
    });
  </script>
@endsection
