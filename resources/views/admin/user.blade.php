@extends('layouts.app')

@section('content')
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
                            <li><a class="dropdown-item {{ request()->routeIs('admin.user.index') && !request()->has('action') && !request()->has('role') ? 'active' : '' }}"
                                    href="{{ route('admin.user.index') }}">Semua Pengguna</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('admin.user.index') && request()->has('role') && request()->role == 'user' ? 'active' : '' }}"
                                    href="{{ route('admin.user.index', ['role' => 'user']) }}">Pengguna</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('admin.user.index') && request()->has('role') && request()->role == 'seller' ? 'active' : '' }}"
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
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Nama Akun</th>
                        <th>Tanggal</th>
                        <th>Peran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="{{ $user->avatar ? asset("storage/{$user->avatar}") : $user->getGravatarLink() }}"
                                        class="rounded-3 rounded-circle" height="48px" />

                                    <div class="d-flex flex-column gap-1">
                                        <strong>{{ $user->fullname }}</strong>
                                        <span class="text-muted">{{ $user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->locale('id')->isoFormat('D MMMM YYYY') }}
                            <td>
                                <span
                                    class="badge bg-{{ $user->getUserRoleInstance()->color() }}">{{ $user->getUserRoleInstance()->label() }}</span>
                            </td>
                            <td>
                                <span
                                    class="badge bg-{{ $user->getUserStatusInstance()['color'] }}">{{ $user->getUserStatusInstance()['label'] }}</span>
                            </td>
                            <td>
                                @if ($user->getUserRoleInstance()->value != 'admin')
                                    <form id="delete-form-{{ $user->id }}"
                                        action="{{ route('admin.user.destroy', ['user' => $user->id]) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" style="background: none"
                                            class="badge bg-label-danger me-1 border-0"
                                            onclick="confirmDeletion({{ $user->id }});">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                viewBox="0 0 24 24">
                                                <path fill="#FA7070"
                                                    d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
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

@section('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script>
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
@endsection
