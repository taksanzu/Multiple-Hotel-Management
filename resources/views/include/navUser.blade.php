<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3 shadow rounded">
    <div class="container-fluid d-flex justify-content-between" style="">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand fs-6" href="{{route('userHome')}}">Du Lịch</a>
        @if(auth()->check())
            <div class="btn-group">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>{{$user->name}}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Đổi mật khẩu</a></li>
                </ul>
            </div>
        @endif
    </div>
</nav>
