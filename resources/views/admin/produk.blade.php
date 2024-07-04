@extends('layouts.app')

@section('title', 'Merk')

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
  </style>
@endpush

@section('content')
  <!-- Bootstrap Table with Header - Light -->
  <div class="card">
    <h5 class="card-header">Daftar Produk</h5>
    {{-- <div class="card-header d-flex justify-content-between align-items-center">

      <a href=""></a>
      <form action="{{ route('admin.produk.index') }}" method="get">
        <div class="input-group mb-3">
          <input type="search" name="search" class="form-control" placeholder="Cari Produk&hellip;"
            value="{{ old('search', request('search')) }}" />
          <button type="submit" class="btn"
            style="background: linear-gradient(72.47deg, rgba(28, 56, 121, 1) 22.16%, rgba(115, 103, 240, 0.7) 76.47%); color:#fff;">Cari</button>
        </div>
      </form>

    </div> --}}

    <div class="table-responsive text-nowrap">
      <table class="table yajra-datatable w-100">
        <thead class="table-light">
          <tr>
            <th class="text-start">NO.</th>
            <th class="text-start">PRODUK</th>
            <th class="text-start">GAMBAR</th>
            <th class="text-start">TOKO</th>
            <th class="text-start">KATEGORI</th>
            <th class="text-start">HARGA</th>
            <th class="text-start">STATUS</th>
            <th class="text-start">DETAIL</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0"></tbody>
      </table>
      {{-- <table class="table">
        <thead class="table-light">
          <tr>
            <th>No.</th>
            <th>Produk</th>
            <th>Gambar</th>
            <th>Toko</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Detail</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @if ($products->isEmpty() && $product_auctions->isEmpty())
            <tr>
              <td colspan="8" class="text-center">Tidak ada data</td>
            </tr>
          @else
            @foreach ($products as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td><img src="{{ asset("storage/{$item->thumbnail}") }}" class="rounded-3" height="96px"> </td>
                <td>{{ $item->userstore->username }}</td>
                <td>
                  @foreach ($item->categories as $category)
                    {{ $category->title }}
                    @if (!$loop->last)
                      ,
                    @endif
                  @endforeach
                </td>
                <td>{{ $item->price }}</td>
                <td>
                  <form id="updateForm{{ $item->id }}" action="{{ route('admin.produk.update', $item->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex gap-2">
                      <div>
                        <input type="radio" onchange="submitForm(this)" class="btn-check" name="status" id="inactive"
                          value="inactive" {{ $item->status == 'inactive' ? 'checked' : '' }} autocomplete="off" />
                        <label class="btn btn-sm btn-danger" for="inactive">Tidak Aktif</label>
                      </div>

                      <div>
                        <input type="radio" onchange="submitForm(this)" class="btn-check" name="status" id="active"
                          value="active" {{ $item->status == 'active' ? 'checked' : '' }} autocomplete="off" />
                        <label class="btn btn-sm btn-success" for="active">Aktif</label>
                      </div>
                    </div>
                  </form>
                </td>
                <td>
                  <a data-bs-toggle="modal" class="btn" data-bs-target="#detailModal{{ $loop->iteration }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                      <path fill="currentColor"
                        d="M12 16q1.875 0 3.188-1.312T16.5 11.5t-1.312-3.187T12 7T8.813 8.313T7.5 11.5t1.313 3.188T12 16m0-1.8q-1.125 0-1.912-.788T9.3 11.5t.788-1.912T12 8.8t1.913.788t.787 1.912t-.787 1.913T12 14.2m0 4.8q-3.35 0-6.113-1.8t-4.362-4.75q-.125-.225-.187-.462t-.063-.488t.063-.488t.187-.462q1.6-2.95 4.363-4.75T12 4t6.113 1.8t4.362 4.75q.125.225.188.463t.062.487t-.062.488t-.188.462q-1.6 2.95-4.362 4.75T12 19" />
                    </svg>
                  </a>
                </td>
              </tr>
            @endforeach
            @foreach ($product_auctions as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td> {{ $item->title }}</td>
                <td> <img src="{{ asset("storage/{$item->thumbnail}") }}" class="rounded-3" height="96px"></td>
                <td>{{ $item->userstore->username }}</td>
                <td>
                  @foreach ($item->categories as $category)
                    {{ $category->title }}
                    @if (!$loop->last)
                      ,
                    @endif
                  @endforeach
                </td>
                <td>{{ $item->bid_price_start }} - {{ $item->bid_price_end }}</td>
                <td>
                  <form id="updateForm{{ $item->id }}" action="{{ route('admin.produk.update', $item->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex gap-2">
                      <div>
                        <input type="radio" onchange="submitForm(this)" class="btn-check" name="status"
                          id="inactive{{ $item->id }}" value="inactive"
                          {{ $item->status == 'inactive' ? 'checked' : '' }} autocomplete="off" />
                        <label class="btn btn-sm btn-danger" for="inactive{{ $item->id }}">Tidak Aktif</label>
                      </div>
                      <div>
                        <input type="radio" onchange="submitForm(this)" class="btn-check" name="status"
                          id="active{{ $item->id }}" value="active" {{ $item->status == 'active' ? 'checked' : '' }}
                          autocomplete="off" />
                        <label class="btn btn-sm btn-success" for="active{{ $item->id }}">Aktif</label>
                      </div>
                    </div>
                  </form>
                </td>
                <td>
                  <a data-bs-toggle="modal" class="btn" data-bs-target="#detailLelangModal{{ $loop->iteration }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                      <path fill="currentColor"
                        d="M12 16q1.875 0 3.188-1.312T16.5 11.5t-1.312-3.187T12 7T8.813 8.313T7.5 11.5t1.313 3.188T12 16m0-1.8q-1.125 0-1.912-.788T9.3 11.5t.788-1.912T12 8.8t1.913.788t.787 1.912t-.787 1.913T12 14.2m0 4.8q-3.35 0-6.113-1.8t-4.362-4.75q-.125-.225-.187-.462t-.063-.488t.063-.488t.187-.462q1.6-2.95 4.363-4.75T12 4t6.113 1.8t4.362 4.75q.125.225.188.463t.062.487t-.062.488t-.188.462q-1.6 2.95-4.362 4.75T12 19" />
                    </svg>
                  </a>
                </td>
              </tr>
            @endforeach
          @endif

        </tbody>
      </table> --}}
    </div>

  </div>
  {{-- @foreach ($products as $item)
    <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
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
                          <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="img" class="object-fit-cover">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="product-info-content" data-aos="fade-left">
                    <h5 style="margin-bottom:0;">{{ $item->title }}</h5>
                    <div class="price" style="display: flex; justify-content: space-between; align-items: center;">
                      <span class="new-price">Rp. {{ number_format($item->price, 0, ',', '.') }}</span>
                      <span style="display: flex; justify-content:center; align-items:center;">
                        <i class="fa-solid fa-store"
                          style="margin-right: 0.5rem; color: #215791; font-size: 1.2rem; margin-left:2rem;"></i>
                        <p
                          style="font-weight: bold; margin-top:1rem; display: flex; justify-content:center; align-items:center;">
                          {{ $item->userstore->username }}</p>
                      </span>
                    </div>
                    <hr>
                    <div class="product-details">
                      <table>
                        <tr>
                          <th>Kategori</th>
                          <td><span
                              class="inner-text">{{ implode(', ', array_column($item->categories->toArray(), 'title')) }}</span>
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
                          <td colspan="2"><span class="inner-text">{{ $item->description }}</span></td>
                        </tr>
                        <tr>
                          <th>Status</th>
                          <td><span class="inner-status" style="color: red">{{ $item->status }}</span></td>
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
  @foreach ($product_auctions as $item)
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
                          <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="img" class="object-fit-cover">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="product-info-content" data-aos="fade-left">
                    <h5 style="margin-bottom:0;">{{ $item->title }}</h5>
                    <div class="price" style="display: flex; justify-content: space-between; align-items: center;">
                      <span class="new-price">Rp. {{ number_format($item->bid_price_start, 0, ',', '.') }} -
                        {{ number_format($item->bid_price_end, 0, ',', '.') }}</span>
                      <span style="display: flex; justify-content:center; align-items:center;">
                        <i class="fa-solid fa-store"
                          style="margin-right: 0.5rem; color: #215791; font-size: 1.2rem; margin-left:2rem;"></i>
                        <p
                          style="font-weight: bold; margin-top:1rem; display: flex; justify-content:center; align-items:center;">
                          {{ $item->userstore->username }}</p>
                      </span>
                    </div>
                    <hr>
                    <div class="product-details">
                      <table>
                        <tr>
                          <th>Kategori</th>
                          <td><span
                              class="inner-text">{{ implode(', ', array_column($item->categories->toArray(), 'title')) }}</span>
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
                          <td colspan="2"><span class="inner-text">{{ $item->description }}</span></td>
                        </tr>
                        <tr>
                          <th>Status</th>
                          <td><span class="inner-status" style="color: red">{{ $item->status }}</span></td>
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
  @endforeach

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
                    <span class="new-price">Rp. <span data-row="price"></span></span>
                    <span style="display: flex; justify-content:center; align-items:center;">
                      <i class="fa-solid fa-store"
                        style="margin-right: 0.5rem; color: #215791; font-size: 1.2rem; margin-left:2rem;"></i>
                      <p style="font-weight: bold; margin-top:1rem; display: flex; justify-content:center; align-items:center;"
                        data-row="userstore"></p>
                    </span>
                  </div>
                  <hr>
                  <div class="product-details">
                    <table>
                      <tr>
                        <th>Kategori</th>
                        <td><span class="inner-text" data-row="categories"></span>
                        </td>
                      </tr>
                      <tr>
                        <th>Brand</th>
                        <td><span class="inner-text" data-row="brand"></span></td>
                      </tr>
                      <tr>
                        <th>Ukuran</th>
                        <td><span class="inner-text" data-row="size"></span></td>
                      </tr>
                      <tr>
                        <th>Warna</th>
                        <td><span class="inner-text" data-row="color"></span></td>
                      </tr>
                      <tr>
                        <th>Deskripsi</th>
                        <td colspan="2"><span class="inner-text" data-row="description"></span></td>
                      </tr>
                      <tr>
                        <th>Status</th>
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
    function submitForm(radioBtn) {
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
          topEnd: $(`<form action="#" method="get" id="search" class="me-4">
            <div class="input-group mb-3">
              <input type="search" name="search" class="form-control" placeholder="Cari Produk&hellip;"
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
      ajax: "{{ route('yajra.products') }}",
      columns: [{
          data: 'DT_RowIndex',
          orderable: false,
          searchable: false,
        },
        {
          data: 'title',
          render: (data, __, row) => {
            return data + `<span class="opacity-0 position-absolute">${row.type}</span>`;
          }
        },
        {
          data: 'thumbnail',
          orderable: false,
          searchable: false,
          render: (data, type) => `<img src="{{ asset('storage/') }}/${data}" class="rounded-3" height="96px">`
        },
        {
          data: 'type',
          searchable: true,
          visible: false
        },
        {
          data: 'userstore.username',
        },
        {
          data: 'categories',
          render: (data, _, row) => {
            return data.map(data => data.title).join(', ');
          }
        },
        {
          data: 'price',
        },
        // {
        //   data: 'id',
        //   orderable: false,
        //   searchable: false,
        //   render: (data, _, row) => {
        //     const inactive = `<button class="btn btn-sm btn-danger">Tidak Aktif</button>`;
        //     const active = `<button class="btn btn-sm btn-success">Aktif</button>`;
        //     const editButton = `<div class="dropdown">
      //       <button type="button" class="badge bg-label-warning me-1 border-0 edit" style="background: none" data-bs-toggle="dropdown" aria-expanded="false">
      //         <i class="ti ti-pencil"></i>
      //       </button>
      //       <ul class="dropdown-menu">
      //         <li><a class="dropdown-item" href="#">Action</a></li>
      //       </ul>
      //     </div>`;
        //     return `<div class="d-flex gap-2">${(row.status == 'inactive' ? inactive : active) + editButton}</div>`;
        //   }
        // },
        {
          data: 'id',
          orderable: false,
          searchable: false,
          render: (data, _, row) => {
            const status = `<form action="${"{{ route('admin.produk.update', ':id:') }}".replace(":id:", data)}" method="POST">
            @csrf
            @method('PUT')
            <div class="d-flex gap-2">
              <div>
                <input type="radio" onchange="submitForm(this)" class="btn-check" name="status"
                  id="inactive" value="inactive"
                  ${ row.status == 'inactive' ? 'checked' : '' } />
                <label class="btn btn-sm btn-danger" for="inactive">Tidak Aktif</label>
              </div>
              <div>
                <input type="radio" onchange="submitForm(this)" class="btn-check" name="status"
                  id="active" value="active" ${ row.status == 'active' ? 'checked' : '' }
                  />
                <label class="btn btn-sm btn-success" for="active">Aktif</label>
              </div>
            </div>
          </form>`;
            return status;
          }
        },
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
      });
    }

    setupOrderButton($("#order-all"), "");
    setupOrderButton($("#order-user"), ":Product:");
    setupOrderButton($("#order-seller"), ":ProductAuction:");

    table.on("click", "button#detail", function() {
      const modal = $('#detailModal');
      const data = table.row($(this).closest("tr")).data();
      let editedData = data;
      editedData['userstore'] = (typeof data['userstore'] == "object") ? data['userstore']['username'] : data[
        'userstore'];
      editedData['categories'] = (typeof data['categories'] == "object") ? data['categories'].map(data => data.title)
        .join(', ') : data['categories'];
      editedData['brand'] = (typeof data['brand'] == "object") ? data['brand']['title'] : data['brand'];
      modal.find("#detail_image").each(function() {
        $(this).attr("src", "{{ asset('storage/') }}/" + editedData.thumbnail);
      })
      modal.find("[data-row]").each(function() {
        $(this).text(editedData[$(this).data("row")]);
      });
      modal.modal("show");
    });
  </script>
@endpush
