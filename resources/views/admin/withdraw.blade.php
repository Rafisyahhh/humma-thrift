@extends('layouts.app')
@section('content')
<!-- Bootstrap Table with Header - Light -->
<div class="card">
    <div class="table-responsive text-nowrap">
      {{-- <table class="table yajra-datatable w-100">
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
      </table> --}}
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Requested at</th>
            <th>Nama seller</th>
            <th>Nama Bank</th>
            <th>No Rekening</th>
            <th>Jumlah Penarikan</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          {{-- @forelse ($users as $user) --}}
            <tr>
              <td>
                <div class="d-flex gap-3 align-items-center">
                  <p>12 Juni 2024</p>
                </div>
              </td>
              <td>
                <div class="d-flex gap-3 align-items-center">
                  <p>Dummy. Shop</p>
                </div>
              </td>
              <td>
                <div class="d-flex gap-3 align-items-center">
                  <p>BCA</p>
                </div>
              </td>
              <td>
                <div class="d-flex gap-3 align-items-center">
                  <p>00837645272</p>
                </div>
              </td>
              <td>
                <div class="d-flex gap-3 align-items-center">
                  <p>Rp. 12.000.000</p>
                </div>
              </td>
              <td>
                <div class="d-flex gap-3 align-items-center">
                    <span
                    class="badge bg-danger">Pending</span>
                </div>
              </td>
            </tr>
        </tbody>
      </table>
    </div>

    {{-- @if ($users->hasPages())
      <div class="border-top p-3">
        {{ $users->links() }}
      </div>
    @endif --}}
  </div>
  <!-- Bootstrap Table with Header - Light -->
@endsection
