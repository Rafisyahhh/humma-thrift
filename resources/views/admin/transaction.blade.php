@extends('layouts.app')

@section('title', 'Transaksi')

@push('style')
  <style>
    .modal-content {
      max-width: 50rem;
      width: 100%;
    }

    .review-form {
      width: 100%;
    }

    .modal-header {
      padding: 1rem 1.5rem;
    }

    .product-info {
      padding: 2rem;
    }

    .product-info-img {
      margin-bottom: 1.5rem;
    }

    .product-info-content h5 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      font-weight: bold;
      color: #000;
    }

    .price .new-price {
      font-size: 1rem;
      color: blue;
    }

    .product-details th,
    .product-details td {
      padding: 0.5rem 1rem;
    }

    .product-details th {
      text-align: left;
      width: 60%;
      font-weight: 600;
      padding: 10px;
      color: rgba(0, 0, 0, 0.4);
    }

    .product-info-content .product-details .inner-text {
      color: #1c3879;
    }

    .product-details td {
      text-align: left;
      width: 75%;
    }

    .product-details hr {
      margin: 1.5rem 0;
    }

    .product-info-img .product-top .slider-top-img img {
      width: 100%;
      height: 100%;
      object-fit: cover !important;
      border: 1px solid rgba(126, 163, 219, 0.4);
      border-radius: 1rem;
    }


    .product-info-img .product-top .slider-top-img {
      width: 21rem;
      height: 25.5rem;
    }

    .inner-status {
      background: rgba(110, 109, 121, 0.10);
      color: rgba(0, 0, 0, .87);
      font-size: 0.8rem;
      font-weight: 400;
      margin: 0;
      padding: 0.47rem;
      text-transform: capitalize;

    }


    input[type="date"]::before {
      position: absolute;
      color: lightgray;
      content: attr(placeholder);
      margin-right: 122px;
    }

    input[type="date"]:valid::before,
    input[type="date"]:focus::before {
      content: "" !important;
      display: none;
    }

    input[type="date"]:invalid {
      color: transparent !important;
    }
  </style>
@endpush

@section('content')
  <!-- Bootstrap Table with Header - Light -->
  <div class="card">
    <h5 class="card-header">Daftar Transaksi</h5>

        <div class="table-responsive text-nowrap">
            <table class="table yajra-datatable w-100">
                <thead class="table-light">
                    <tr>
                        <th class="text-start">NO.</th>
                        <th class="text-start">PRODUK</th>
                        <th class="text-start">PEMBELI</th>
                        <th class="text-start">TOKO</th>
                        <th class="text-start">HARGA</th>
                        <th class="text-start">TANGGAL</th>
                        <th class="text-center">STATUS PENGIRIMAN</th>
                        <th class="text-center">STATUS</th>
                        <th class="text-center">DETAIL</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0"></tbody>
            </table>
        </div>
    </div>
  </div>
  {{-- @foreach ($product_auctions as $item)
<div class="modal fade" id="detailLelangModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="review-form m-0">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <section class="product product-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-info-img" data-aos="fade-right">
                                <div class="swiper product-top">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide slider-top-img">
                                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="img"
                                                class="object-fit-cover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-info-content" data-aos="fade-left">
                                    <h5 style="margin-bottom:0;" data-row="title">Judul</h5>
                                    <div class="price"
                                        style="display: flex; justify-content: space-between; align-items: center;">
                                        <span class="new-price"><span data-row="total"></span></span>
                                        <span style="display: flex; justify-content:center; align-items:center;">
                                            <i class="fa-solid fa-store"
                                                style="margin-right: 0.5rem; color: #215791; font-size: 1.2rem; margin-left:2rem;"></i>
                                            <p style="font-weight: bold; margin-top:1rem; display: flex; justify-content:center; align-items:center;"
                                                data-row="store"></p>
                                        </span>
                                    </div>
                                    <hr>
                                    <div class="product-details">
                                        <table>
                                            <tr>
                                                <th>Pembeli</th>
                                                <td><span class="inner-text" data-row="name"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal</th>
                                                <td><span class="inner-text" data-row="created_at"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>No Reference</th>
                                                <td><span class="inner-text" data-row="reference_id"></span></td>
                                            </tr>
                                            <tr>
                                                <th>Pembayaran</th>
                                                <td><span class="inner-text" data-row="payment_method"></span></td>
                                            </tr>
                                            <tr>
                                                <th>Biaya Admin</th>
                                                <td><span class="inner-text" data-row="biaya_admin"></span></td>
                                            </tr>
                                            <tr>
                                                <th>Total Harga Produk</th>
                                                <td><span class="inner-text" data-row="total_harga"></span></td>
                                            </tr>
                                            <tr>
                                                <th>Status Pengiriman</th>
                                                <td><span class="inner-text" style="color: red" data-row="delivery_status"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Status Pembayaran</th>
                                                <td><span class="inner-status" style="color: red" data-row="status"></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="product-details">
                                    <table>
                                        <tr>
                                            <th>Kategori</th>
                                            <td><span class="inner-text">{{ implode(', ',
                                                    array_column($item->categories->toArray(), 'title')) }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Brand</th>
                                            <td><span class="inner-text">{{ $item->brand->title }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Ukuran</th>
                                            <td><span class="inner-text">{{ $item->size }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Warna</th>
                                            <td><span class="inner-text">{{ $item->color }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <td colspan="2"><span class="inner-text">{{ $item->description }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td><span class="inner-status" style="color: red">{{ $item->status }}</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endforeach --}}
  <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="review-form m-0">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <section class="product product-info">
            <div class="row">
              <div class="col-md-6">
                <div class="product-info-img" data-aos="fade-right">
                  <div class="swiper product-top">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide slider-top-img">
                        <img src="#" alt="img" class="object-fit-cover" id="detail_image">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="product-info-content" data-aos="fade-left">
                  <h5 style="margin-bottom:0;" data-row="title">Judul</h5>
                  <div class="price" style="display: flex; justify-content: space-between; align-items: center;">
                    <span class="new-price"><span data-row="total"></span></span>
                    <span style="display: flex; justify-content:center; align-items:center;">
                      <i class="fa-solid fa-store"
                        style="margin-right: 0.5rem; color: #215791; font-size: 1.2rem; margin-left:2rem;"></i>
                      <p style="font-weight: bold; margin-top:1rem; display: flex; justify-content:center; align-items:center;"
                        data-row="store"></p>
                    </span>
                  </div>
                  <hr>
                  <div class="product-details">
                    <table>
                      <tr>
                        <th>Pembeli</th>
                        <td><span class="inner-text" data-row="name"></span>
                        </td>
                      </tr>
                      <tr>
                        <th>Tanggal</th>
                        <td><span class="inner-text" data-row="created_at"></span>
                        </td>
                      </tr>
                      <tr>
                        <th>No Reference</th>
                        <td><span class="inner-text" data-row="reference_id"></span></td>
                      </tr>
                      <tr>
                        <th>Pembayaran</th>
                        <td><span class="inner-text" data-row="payment_method"></span></td>
                      </tr>
                      <tr>
                        <th>Biaya Admin</th>
                        <td><span class="inner-text" data-row="biaya_admin"></span></td>
                      </tr>
                      <tr>
                        <th>Total Harga Produk</th>
                        <td><span class="inner-text" data-row="total_harga"></span></td>
                      </tr>
                      <tr>
                        <th>Status Pengiriman</th>
                        <td><span class="inner-text" style="color: red" data-row="delivery_status"></span>
                        </td>
                      </tr>
                      <tr>
                        <th>Status Pembayaran</th>
                        <td><span class="inner-status" style="color: red" data-row="status"></span>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
  <div class="d-none">
    <div datatables-topEnd>
      <div class="d-flex">
        <div class="input-group">
          <input class="form-control mt-3" id="date-before" type="date" placeholder="Tanggal Awal" required />
        </div>
        <div class="ms-1 me-1"></div>
        <div class="input-group">
          <input class="form-control mt-3 me-3" id="date-after" type="date" placeholder="Tanggal Akhir" required />
        </div>
        <div class="input-group">
          <input class="form-control mt-3 me-4" placeholder="Cari Transaksi&hellip;" id="searchInput" />
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
  <script>
    function submitForm(radioBtn, value) {
      // radioBtn.closest('input.d-none')[0].val(value);
      $(radioBtn.closest('form')).find('input.d-none').val(value)
      var form = radioBtn.closest('form').submit();
    }
  </script>
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
          topStart: $(`<ul class="ms-4 nav nav-pills d-none d-md-flex">
            <li class="nav-item">
              <a class="nav-link active" type="button" id="order-all">Semua Tipe</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" type="button" id="order-user">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" type="button" id="order-seller"">Lelang</a>
            </li>
          </ul>`),
                    topEnd: $(`<div class="input-group">
              <input class="form-control me-4" placeholder="Cari Produk&hellip;" id="searchInput" />
            </div>`),
                    bottomStart: {
                        info: {
                            text: 'Menampilkan _START_ dari _END_ hasil'
                        }
                    },
                }
            },
            ajax: "{{ route('yajra.transactions') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    width: "5%"
                },
                {
                    data: 'order',
                },
                {
                    data: 'user.name',
                },
                {
                    data: 'store',
                },
                {
                    data: 'total',
                },
                {
                    data: 'created_at',
                    render: (data) => {
                    const date = new Date(data);
                    const formattedDate = date.toLocaleDateString('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    });
                    return formattedDate;
                    }
                },
                {
                    data: 'delivery_status',
                    render: (data, __, row) => {
                        console.log(row);
                        const badge = {
                            'selesaikan pesanan': `<span class="badge text-bg-danger">Selesaikan Pesanan</span>`,
                            'dikemas': `<span class="badge text-bg-warning">Di Kemas</span>`,
                            'diantar': `<span class="badge text-bg-warning">Di Antar</span>`,
                            'diterima': `<span class="badge text-bg-warning">Di Terima</span>`,
                            'selesai': `<span class="badge text-bg-success">Selesai</span>`,
                        }[data];
                        return badge || data;
                    }
                },
                {
                    data: 'status',
                    render: (data, __, row) => {
                        const badge = {
                            'UNPAID': `<span class="badge text-bg-danger">Belum Bayar</span>`,
                            'PAID': `<span class="badge text-bg-success">Sudah Bayar</span>`,
                            'EXPIRED': `<span class="badge text-bg-danger">Pembayaran Kadaluarsa</span>`,
                            'REFUND': `<span class="badge text-bg-warning">Produk Dikembalikan</span>`,
                            'FAILED': `<span class="badge text-bg-danger">Pembayaran Gagal</span>`,
                        }[data];
                        return badge || data;
                    }
                },
                // {
                //   data: 'id',
                //   orderable: false,
                //   searchable: false,
                //   render: (data, _, row) => {
                //     const status = `<form action="${"{{ route('admin.produk.update', ':id:') }}".replace(":id:", data)}" method="POST">
            //     @csrf
            //     @method('PUT')
            //     <div class="d-flex gap-2">
            //       <div>
            //         <input type="radio" onchange="submitForm(this)" class="btn-check" name="status"
            //           id="inactive" value="inactive"
            //           ${ row.status == 'inactive' ? 'checked' : '' } />
            //         <label class="btn btn-sm btn-danger" for="inactive">Tidak Aktif</label>
            //       </div>
            //       <div>
            //         <input type="radio" onchange="submitForm(this)" class="btn-check" name="status"
            //           id="active" value="active" ${ row.status == 'active' ? 'checked' : '' }
            //           />
            //         <label class="btn btn-sm btn-success" for="active">Aktif</label>
            //       </div>
            //     </div>
            //   </form>`;
                //     return status;
                //   }
                // },
                {
                    data: 'id',
                    className: 'text-center',
                    orderable: false,
                    searchable: false,
                    render: (data, _, row) => {
                        return `<button class="btn" type="button" id="detail">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12 16q1.875 0 3.188-1.312T16.5 11.5t-1.312-3.187T12 7T8.813 8.313T7.5 11.5t1.313 3.188T12 16m0-1.8q-1.125 0-1.912-.788T9.3 11.5t.788-1.912T12 8.8t1.913.788t.787 1.912t-.787 1.913T12 14.2m0 4.8q-3.35 0-6.113-1.8t-4.362-4.75q-.125-.225-.187-.462t-.063-.488t.063-.488t.187-.462q1.6-2.95 4.363-4.75T12 4t6.113 1.8t4.362 4.75q.125.225.188.463t.062.487t-.062.488t-.188.462q-1.6 2.95-4.362 4.75T12 19" />
            </svg>
          </button>`
          }
        },
        {
          data: 'type',
          searchable: true,
          visible: false
        },
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
    setupOrderButton($("#order-user"), ":Product:");
    setupOrderButton($("#order-seller"), ":ProductAuction:");

    table.on("click", "button#detail", function() {
      const modal = $('#detailModal');
      const data = table.row($(this).closest("tr")).data();

      const editedData = {
        ...data,
        name: typeof data.user === "object" ? data.user.name : data.user,
        created_at: formatDate(data.created_at),
      };

      modal.find("#detail_image").attr("src", "{{ asset('storage/') }}/" + editedData.image);

      modal.find("[data-row]").each(function() {
        $(this).text(editedData[$(this).data("row")]);
      });

      modal.modal("show");
    });
    table.on("click", "button.editStatus", function() {
      $(this).dropdown('toggle');
    });


    let searchTimeout;

    $('#searchInput').on('input', function() {
      clearTimeout(searchTimeout);

      searchTimeout = setTimeout(function() {
        const searchTerm = $('#searchInput').val().trim();
        table.search(searchTerm).draw();
      }, 750);
    });

    function formatDate(value) {
      const date = new Date(value);
      const formattedDate = date.toLocaleDateString('id-ID', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
      });
      return formattedDate;
    }
  </script>
@endpush
