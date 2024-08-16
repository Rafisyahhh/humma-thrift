@extends('layouts.app')

@section('title', 'Kategori Produk')

@push('style')
    <style>
        .btn {
            background: #7367f0;
            color: #fff;
        }
    </style>
@endpush

@section('content')
    <!-- Tabel -->
    <div class="card">
        <h5 class="card-header">Kategori</h5>
        <div class="table-responsive text-nowrap">
            <table class="table yajra-datatable w-100">
                <thead class="table-light">
                    <tr>
                        <th class="text-start">NO.</th>
                        <th class="text-start">NAMA KATEGORI</th>
                        <th class="text-start">GAMBAR KATEGORI</th>
                        <th class="text-start">TYPE</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0"></tbody>
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
                            class="fas fa-newspaper me-1"></i>Tambahkan
                        Kategori</h6>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.product-category.store') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="file" class="form-control @error('icon') is-invalid @enderror" id="icon"
                                name="icon">
                            @if (old('icon'))
                                <img id="preview" src="{{ asset('storage/' . old('icon')) }}" alt="Old gambar"
                                    style="max-width: 100px; max-height: 100px;">
                            @endif
                            @error('icon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe</label>
                                <select name="type" id="type" class="form-select" placeholder="Masukkan tipe kategori">
                                    <option value=""></option>
                                    <option value="atasan"> Atasan </option>
                                    <option value="bawahan"> Bawahan</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="pt-2 d-flex gap-3 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn"
                                style="background: #7367f0; color:#fff;">Tambahkan</button>
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
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-newspaper me-1"></i>Edit Kategori</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.product-category.update', ':id:') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon</label>
                            <input type="file" class="form-control @error('icon') is-invalid @enderror" id="icon"
                                name="icon" />
                            <img src="#" class="w-100 mt-3 rounded-3" alt="" id="icon_image" />
                            @error('icon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe</label>
                                <select name="type" id="type" class="form-select" placeholder="Masukkan tipe kategori">
                                    <option value=""></option>
                                    <option value="atasan"> Atasan </option>
                                    <option value="bawahan"> Bawahan</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="pt-2 d-flex gap-3 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn"
                                style="background: #7367f0; color:#fff;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        const {
            table
        } = $('.yajra-datatable').AjaxDataTable({
            onCreate: {
                modal: $('#tambahModal'),
                text: 'Tambahkan Kategori',
                className: 'btn ms-4'
            },
            onEdit: {
                modal: $('#editModal'),
                onClick: (form, data) => {
                    form.find('img#icon_image').attr('src', `{{ asset('storage/') }}/${data.logo}`)
                }
            },
            onDelete: {
                modal: $('#editModal'),
                url: '{{ route('admin.product-category.destroy', ':id:') }}',
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
            <input class="form-control me-4" placeholder="Cari Kategori&hellip;" id="searchInput" />
          </div>`),
                    bottomStart: {
                        info: {
                            text: 'Menampilkan _START_ dari _END_ hasil'
                        }
                    },
                }
            },
            ajax: "{{ route('yajra.categories') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'title',
                },

                {
                    data: 'icon',
                    orderable: false,
                    searchable: false,
                    render: (data, type) =>
                        `<img src="{{ asset('storage/') }}/${data}" class="rounded-3" height="96px">`
                },
                {
                    data: 'type',
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
        let searchTimeout;

        $('#searchInput').on('input', function() {
            clearTimeout(searchTimeout);

            searchTimeout = setTimeout(function() {
                const searchTerm = $('#searchInput').val().trim();
                table.search(searchTerm).draw();
            }, 750);
        });
    </script>
@endpush
