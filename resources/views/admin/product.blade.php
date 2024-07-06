@extends('layouts.app')

@section('title', 'Daftar Pengguna')

@push('style')
  <style>
    .btn {
      background: linear-gradient(72.47deg, rgba(28, 56, 121, 1) 22.16%, rgba(115, 103, 240, 0.7) 76.47%);
      color: #fff;
    }
  </style>
@endpush

@section('content')
  <!-- Bootstrap Table with Header - Light -->
  <div class="card">
    <div class="card-header p-3 p-lg-2">
      <div class="row justify-content-between align-items-center">
        <div class="col-4 col-md-5 d-flex justify-content-center justify-content-md-start">
          <div class="dropdown d-md-none">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
              aria-expanded="false">
              Saring
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li><a
                  class="dropdown-item {{ request()->routeIs('admin.user.index') && !request()->has('action') && !request()->has('role') ? 'active' : '' }}"
                  href="{{ route('admin.user.index') }}">Semua Pengguna</a></li>
              <li><a
                  class="dropdown-item {{ request()->routeIs('admin.user.index') && request()->has('role') && request()->role == 'user' ? 'active' : '' }}"
                  href="{{ route('admin.user.index', ['role' => 'user']) }}">Pengguna</a></li>
              <li><a
                  class="dropdown-item {{ request()->routeIs('admin.user.index') && request()->has('role') && request()->role == 'seller' ? 'active' : '' }}"
                  href="{{ route('admin.user.index', ['role' => 'seller']) }}">Penjual</a></li>
            </ul>
          </div>
          <ul class="nav nav-pills d-none d-md-flex">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('admin.user.index') && !request()->has('action') && !request()->has('role') ? 'active' : '' }}"
                href="{{ route('admin.user.index') }}">Semua Pengguna</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('admin.user.index') && request()->has('role') && request()->role == 'user' ? 'active' : '' }}"
                href="{{ route('admin.user.index', ['role' => 'user']) }}">Pengguna</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('admin.user.index') && request()->has('role') && request()->role == 'seller' ? 'active' : '' }}"
                href="{{ route('admin.user.index', ['role' => 'seller']) }}">Penjual</a>
            </li>
          </ul>
        </div>
        <div class="col-8 col-md-3">
          <form action="{{ request()->fullUrl() }}" method="GET" class="d-flex w-100">
            @if (request()->input('role'))
              <input type="hidden" name="role" value="{{ old('role', request()->input('role')) }}" />
            @endif
            @if (request()->input('action'))
              <input type="hidden" name="action" value="{{ old('action', request()->input('action')) }}" />
            @endif
            <div class="input-group">
              <input type="search" name="search" class="form-control" placeholder="Cari surelnya&hellip;"
                value="{{ old('search', request('search')) }}" />
              <button type="submit" class="btn btn-primary">
                <i class="ti ti-search"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

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
    const {
      table
    } = $('.yajra-datatable').AjaxDataTable({
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
          /*topEnd: $(`<form action="#" method="get" id="search" class="me-4">
            <div class="input-group mb-3">
              <input type="search" name="search" class="form-control" placeholder="Cari Brand&hellip;"
                value="{{ old('search', request('search')) }}" />
              <button type="submit" class="btn"
                style="background: linear-gradient(72.47deg, rgba(28, 56, 121, 1) 22.16%, rgba(115, 103, 240, 0.7) 76.47%); color:#fff;">Cari</button>
            </div>
          </form>`),*/
          bottomStart: {
            info: {
              text: 'Menampilkan _START_ dari _END_ hasil'
            }
          },
        }
      },
      ajax: "{{ route('yajra.brands') }}",
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
@endpush
