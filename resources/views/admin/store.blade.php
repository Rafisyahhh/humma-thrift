@extends('layouts.app')

@section('title', 'Daftar Toko')

@push('style')
    <style>
        .btn {
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
                        <th class="text-start">NAMA TOKO</th>
                        <th class="text-start">ALAMAT</th>
                        <th class="text-start">TANGGAL</th>
                        <th class="text-start">NO TELP</th>
                        <th class="text-start">STATUS</th>
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
<script>
    function submitForm(radioBtn, value) {
      $(radioBtn.closest('form')).find('input.d-none').val(value)
      var form = radioBtn.closest('form').submit();
    }
  </script>
    <script type="text/javascript">
        const {
            table
        } = $('.yajra-datatable').AjaxDataTable({
            onDelete: {
                url: '{{ route('admin.store.destroy', ':id:') }}',
                onClick: ($delete) => {
                    confirmDeletion(() => {
                        $delete()
                    });
                }
            },
            options: {
                layout: {
                    topStart: $(`<h5 class="card-header">Daftar Toko</h5>`),
                    topEnd: $(`<div class="input-group">
              <input class="form-control mt-3 me-4" placeholder="Cari Store&hellip;" id="searchInput" />
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
            ajax: "{{ route('yajra.stores') }}",
            columns: [{
                    data: 'name',
                },
                {
                    data: 'address',
                },
                {
                    data: 'created_at',
                },
                {
                    data: 'user.phone',
                },
                {
                    data: 'id',
                    orderable: false,
                    searchable: false,
                    render: (data, _, row) => {
                        const inactive = `<button class="btn btn-sm btn-danger">Tidak Aktif</button>`;
                        const active = `<button class="btn btn-sm btn-success">Aktif</button>`;
                        const editButton = `<div class="dropdown dropstart" id="datatables-dropdown">
            <button type="button" class="badge bg-label-dark me-1 border-0 editStatus" style="background: none;" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu p-0">
              <form action="${"{{ route('admin.store.update', ':id:') }}".replace(":id:", data)}" method="POST">
                @csrf
                @method('PUT')
                <input class="d-none" value="${row.user.banned}" name="status"/>
                <li><a class="dropdown-item btn btn-sm btn-danger text-white" role="button" onclick="submitForm(this, '1')">Tidak Aktif</a></li>
                <li><a class="dropdown-item btn btn-sm btn-success text-white" role="button" onclick="submitForm(this, '0')">Aktif</a></li>
              </form>
            </ul>
          </div>`;
                        return `<div class="d-flex gap-2 align-items-center">${(row.user.banned == '1' ? inactive : active) + editButton}</div>`;
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

        let searchTimeout;

        $('#searchInput').on('input', function() {
            clearTimeout(searchTimeout);

            searchTimeout = setTimeout(function() {
                const searchTerm = $('#searchInput').val().trim();
                table.search(searchTerm).draw();
            }, 750);
        });
        table.on("click", "button.editStatus", function() {
            $(this).dropdown('toggle');
        });
    </script>
@endpush
