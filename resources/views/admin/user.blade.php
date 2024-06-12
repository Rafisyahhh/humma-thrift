@extends('layouts.app')

@section('content')
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
        <h6 class="card-header pb-0 pt-0 mb-0 mt-4">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('user') && !request()->has('action') && !request()->has('role') ? 'active' : '' }}"
                            href="{{ route('admin.user.index') }}">Semua Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('user') && request()->has('role') && request()->role == 'user' ? 'active' : '' }}"
                            href="{{ route('admin.user.index', ['role' => 'user']) }}">Pengguna Aktif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('user') && request()->has('role') && request()->role == 'organizer' ? 'active' : '' }}"
                            href="{{ route('admin.user.index', ['role' => 'organizer']) }}">Seller Aktif</a>
                    </li>
                </ul>

                <form action="{{ request()->fullUrl() }}" method="GET" class="d-flex mt-n3">
                    @if (request()->input('role'))
                        <input type="hidden" name="role" value="{{ old('role', request()->input('role')) }}" />
                    @endif
                    @if (request()->input('action'))
                        <input type="hidden" name="action" value="{{ old('action', request()->input('action')) }}" />
                    @endif

                    <div class="input-group mb-3 mt-2">
                        <input type="search" name="search" class="form-control" placeholder="Cari User&hellip;"
                            value="{{ old('search', request('search')) }}" />
                        <button type="submit" class="btn btn-secondary">Cari</button>
                    </div>
                </form>
            </div>
        </h6>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>No.</th>
                        <th>Email</th>
                        <th>Profil</th>
                        <th>Tanggal</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->email }}</span></td>
                            <td><img src="{{ $user->avatar ? asset("storage/{$user->avatar}") : $user->getGravatarLink() }}" class="rounded-3 rounded-circle" height="64px" />
                            </td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->locale('id')->isoFormat('D MMMM YYYY') }}
                            <td>
                                <span
                                    class="badge bg-{{ $user->getUserRoleInstance()->color() }}">{{ $user->getUserRoleInstance()->label() }}</span>
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
                    @endforeach
                </tbody>
            </table>
        </div>
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
