@extends('layouts.app')

@section('title', 'Event')

@push('style')
  <style>
    .btn {
      background: #7367f0;
      color: #fff;
    }
  </style>
@endpush

@section('content')
  <div>
    @include('components.show-errors')
  </div>

  <!-- Bootstrap Table with Header - Light -->
  <div class="card">
    <h5 class="card-header">Daftar Event</h5>
    {{-- <div class="card-header d-flex justify-content-between align-items-center">

            <a type="button" class="btn btn" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#tambahModal"
                style="background: #7367f0; color:#fff;">
                Tambahkan Event
            </a>
            <form action="{{ route('admin.brand.index') }}" method="get">
                <div class="input-group mb-3">
                    <input type="search" name="search" class="form-control" placeholder="Cari Brand&hellip;"
                        value="{{ old('search', request('search')) }}" />
                    <button type="submit" class="btn"
                        style="background: #7367f0; color:#fff;">Cari</button>
                </div>
            </form>
        </div> --}}

    <div class="table-responsive text-nowrap">
      <table class="table yajra-datatable w-100">
        <thead class="table-light">
          <th>NO.</th>
          <th>JUDUL</th>
          <th>SUB JUDUL</th>
          <th>FOTO</th>
          <th>AKSI</th>
        </thead>
        <tbody class="table-border-bottom-0"></tbody>
      </table>
      {{--  <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Sub Judul</th>
                        </th>
                        <th>Foto</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($event as $even)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $even->judul }}</span></td>
                            <td>{{ $even->subjudul }}</span></td>
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
                    @endforeach
                </tbody>
            </table> --}}
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
                  <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                    name="judul" value="{{ old('judul') }}" placeholder="Masukkan nama kategori" />
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
                  <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                    name="foto">
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
                  <button type="submit" class="btn btn" style="background: #7367f0; color: #fff;">Tambahkan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      {{--  @foreach ($event as $key => $even)
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
                                        <label for="judul_update" class="form-label">Judul</label>
                                        <input type="text"
                                            class="form-control @error('judul_update') is-invalid @enderror"
                                            id="judul_update" name="judul_update"
                                            value="{{ old('judul_update', $even->judul) }}">
                                        @error('judul_update')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="subjudul_update" class="form-label">Sub Judul</label>
                                        <textarea type="text" class="form-control @error('subjudul_update') is-invalid @enderror" id="subjudul_update"
                                            name="subjudul_update">{{ old('subjudul_update', $even->subjudul) }}</textarea>
                                        @error('subjudul_update')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="foto_update" class="form-label">Foto Cover</label>
                                        <input type="file"
                                            class="form-control @error('foto_update') is-invalid @enderror"
                                            id="foto_update" name="foto_update" />

                                        @if ($even->foto)
                                            <img src="{{ asset('storage/' . $even->foto) }}" class="w-100 mt-3 rounded-3"
                                                alt="{{ $even->judul }}" />
                                        @else
                                            No Image
                                        @endif
                                        @error('foto_update')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn"
                                    style="background: #7367f0; color:#fff;">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach --}}

    </div>
  </div>
  <div class="modal fade" tabindex="-1" id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="m-0 font-weight-bold"><i class="fas fa-newspaper me-1"></i>Edit Kategori</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.event.update', ':id:') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="judul_update" class="form-label">Judul</label>
              <input type="text" class="form-control @error('judul_update') is-invalid @enderror" id="judul_update"
                name="judul" value="">
              @error('judul_update')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="subjudul_update" class="form-label">Sub Judul</label>
              <textarea type="text" class="form-control @error('subjudul_update') is-invalid @enderror" id="subjudul_update"
                name="subjudul"></textarea>
              @error('subjudul_update')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="foto_update" class="form-label">Foto Cover</label>
              <input type="file" class="form-control @error('foto_update') is-invalid @enderror" id="foto_update"
                name="foto_update" />

              <img src="#" class="w-100 mt-3 rounded-3" id="logo_image" alt="" />
              @error('foto_update')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn" style="background: #7367f0; color:#fff;">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap Table with Header - Light -->
@endsection

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
          text: 'Tambahkan Event',
          className: 'btn ms-4'
        },
        onEdit: {
          modal: $('#editModal'),
          onClick: (form, data) => {
            form.find('img#logo_image').attr('src', `{{ asset('storage/') }}/${data.logo}`)
          }
        },
        onDelete: {
          url: '{{ route('admin.event.destroy', ':id:') }}',
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
            topEnd: $(`<div class="input-group">
            <input class="form-control me-4" placeholder="Cari Event&hellip;" id="searchInput" />
          </div>`),
            bottomStart: {
              info: {
                text: 'Menampilkan _START_ dari _END_ hasil'
              }
            },
          },
          autoWidth: true
        },
        ajax: "{{ route('yajra.events') }}",
        columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false,
            width: "5%",
          },
          {
            data: 'judul',
          },
          {
            data: 'subjudul',
          },
          {
            data: 'foto',
            orderable: false,
            searchable: false,
            render: (data, type) =>
              `<img src="{{ asset('storage/') }}/${data}" class="rounded-3" height="96px" loading="lazy">`
          },
          {
            data: 'id',
            className: 'text-center',
            orderable: false,
            searchable: false,
            width: "10%",
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
        ],
        drawCallback: () => {
          table.columns.adjust();
        }
      });

      $("#search").submit(function(e) {
        e.preventDefault();
        table.search($(this).find("input[name='search']").val()).draw();
      });
      let searchTimeout;

      $('#searchInput').on('input', function() {
        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function() {
          const searchTerm = $('#searchInput').val().trim();
          table.search(searchTerm).draw();
        }, 750);
      });
    });
  </script>
@endpush
