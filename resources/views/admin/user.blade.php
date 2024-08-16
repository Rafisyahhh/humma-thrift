@extends('layouts.app')

@section('title', 'Daftar Pengguna')

@push('style')
  <style>
    .btn {
      background: #7367f0;
      color: #fff;
    }
  </style>
@endpush

@section('content')
  <!-- Bootstrap Table with Header - Light -->
  <div class="card">

    <div class="table-responsive text-nowrap">
      <table class="table yajra-datatable w-100">
        <thead class="table-light">
          <tr>
            <th class="text-start">NAMA AKUN</th>
            <th class="text-start">TANGGAL</th>
            <th class="text-start">PERAN</th>
            <th class="text-start">STATUS</th>
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
      onDelete: {
        url: '{{ route('admin.user.destroy', ':id:') }}',
        onClick: ($delete) => {
          confirmDeletion(() => {
            $delete()
          });
        }
      },
      options: {
        layout: {
          topStart: $(`<ul class="ms-4 nav nav-pills d-none d-md-flex">
            <li class="nav-item">
              <a class="nav-link active" type="button" id="order-all">Semua Pengguna</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" type="button" id="order-user">Pengguna</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" type="button" id="order-seller"">Admin</a>
            </li>
          </ul>`),
          topEnd: $(`<div class="input-group">
              <input class="form-control me-4" placeholder="Cari User&hellip;" id="searchInput" />
            </div>`),
          bottomStart: {
            info: {
              text: 'Menampilkan _START_ dari _END_ hasil'
            }
          },
        },
        order: [
          [2, 'desc']
        ]
      },
      ajax: "{{ route('yajra.users') }}",
      columns: [{
          data: 'name',
        },
        {
          data: 'created_at',
        },
        {
          data: 'role',
        },
        {
          data: 'status',
        },
        {
          data: 'id',
          className: 'text-center',
          orderable: false,
          searchable: false,
          render: (data, type) => {
            const deleteButton = `<button type="button" class="badge bg-label-danger me-1 border-0 delete" style="background: none">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                <path fill="#FA7070" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
              </svg>
            </button>`;
            return deleteButton;
          }
        }
      ]
    });

    $("#search").submit(function(e) {
      e.preventDefault();
      table.search($(this).find("input[name='search']").val()).draw();
    });

    function setupOrderButton(button, searchValue) {
      button.click(function(e) {
        e.preventDefault();
        $("ul").find("li a").removeClass("active");
        $(this).addClass("active");
        table.search(searchValue).draw();
        $('#searchInput').val("");
      });
    }

    setupOrderButton($("#order-all"), "");
    setupOrderButton($("#order-user"), "Pengguna");
    setupOrderButton($("#order-seller"), "Admin");
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
