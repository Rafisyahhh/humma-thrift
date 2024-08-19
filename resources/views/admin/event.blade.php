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
    function parseCustomTags(input) {
      const pattern =
        /<#([a-fA-F0-9]{6,8}|rgb\(\d{1,3},\s?\d{1,3},\s?\d{1,3}\)|rgba\(\d{1,3},\s?\d{1,3},\s?\d{1,3},\s?0?\.?\d+\))>(.*?)<\/#\1>/g;

      const output = input.replace(pattern, (match, p1, p2) => {
        const style = p1.startsWith("rgb") ? `color: ${p1};` : `color: #${p1};`;
        return `<span style="${style}">${p2}</span>`;
      });

      return output;
    }
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
            render: (data) => parseCustomTags(data.replace(/&lt;/g, '<').replace(/&gt;/g, '>'))
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
