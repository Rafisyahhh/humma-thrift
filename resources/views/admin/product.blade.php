@extends('layouts.app')

@section('title', 'Daftar Pengguna')

@push('link')
  <link href="https://cdn.datatables.net/v/dt/dt-2.0.7/b-3.0.2/fh-4.0.1/datatables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/loading.css') }}" />
@endpush

@section('content')
  @include('layouts.partials.app.loading')
  <!-- Bootstrap Table with Header - Light -->
  <div class="card">
    <div class="card-header p-3 p-lg-2">
      <div class="row justify-content-between align-items-center">
        <div class="col-4 col-md-5 d-flex justify-content-center justify-content-md-start">
          <div class="dropdown d-md-none">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
              data-bs-toggle="dropdown" aria-expanded="false">
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
      <table class="table table-striped yajra-datatable w-100">
        <thead class="table-light">
          <tr>
            <th>Nama Akun</th>
            <th>Tanggal</th>
            <th>Peran</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0"></tbody>
      </table>
    </div>

    @if ($users->hasPages())
      <div class="border-top p-3">
        {{ $users->links() }}
      </div>
    @endif
  </div>
  <!-- Bootstrap Table with Header - Light -->
@endsection

@section('js')
  <script src="https://cdn.datatables.net/v/dt/dt-2.0.7/b-3.0.2/fh-4.0.1/datatables.min.js"></script>
  <script>
    $(async () => {
      $(".preloader").fadeOut(750, function() {
        $(this).remove();
      });
    });

    function confirmDeletion(userId) {
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
          document.getElementById('delete-form-' + userId).submit();
        }
      });
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      let firstLoad = true;
      const table = $('.yajra-datatable').DataTable({
        options: {
          fixedHeader: true,
          layout: {
            topStart: {
              buttons: ["create"]
            }
          }
        },
        ajax: "{{ route('api.getUser') }}",
        columns: [{
            data: 'name',
          },
          {
            data: 'email',
          },
          {
            data: 'created_at',
          },
          {
            data: 'updated_at',
          },
          {
            data: 'id',
            orderable: false,
            searchable: false,
            render(a) {
              return `
                <form data-target="#table-ajax" data-reload-table="true" action="https://sideka.dev.id/api/decree/${a}" data-success-message="Data berhasil dihapus dari sistem" id="deletedata-${a}" class="form-ajax" method="POST">
                    <input type="hidden" name="_token" value="a7xSFkCXGYgVs338AI7VuDH1ITxicbh8fThNx4p5" autocomplete="off">                            <input type="hidden" name="_method" value="DELETE">                        </form>

                        <div class="d-flex gap-2 align-items-center">
                            <a href="javascript:handleButton('show', '${a}')" class="btn btn-sm btn-primary"><i class="ti ti-eye"></i></a>
                            <a href="javascript:handleButton('edit', '${a}')" class="btn btn-sm btn-light"><i class="ti ti-pencil"></i></a>
                            <a href="javascript:handleButton('delete', '${a}')" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></a>
                        </div>
                    `;
            },
          }
        ]
      });
    });
  </script>
@endsection
