@if (request()->routeIs(['register', 'login']))
    <div class="header-user">
        <a href="{{ url('/') }}" class="d-flex gap-2 align-items-center lh-1">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>
@elseif(auth()->check() && auth()->user()->getUserRoleInstance()->value === 'admin')
    <div class="header-user d-flex gap-4 h-100">
        <a href="{{ route('register') }}" class="d-flex gap-3 align-items-center lh-1">
            <span>Kembali Ke Dasbor</span>
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>
@elseif(auth()->check())
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown button
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
    </div>
@else
    <div class="header-user d-flex gap-4 h-100">
        <a href="{{ route('register') }}" class="d-flex gap-3 align-items-center lh-1">
            <i class="fas fa-user-plus"></i>
            <span>Daftar</span>
        </a>
        <div class="vr"></div>
        <a href="{{ route('login') }}" class="d-flex gap-3 align-items-center lh-1">
            <i class="fas fa-sign-in-alt"></i>
            <span>Masuk</span>
        </a>
    </div>
@endif
