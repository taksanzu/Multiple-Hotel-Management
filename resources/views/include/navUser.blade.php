<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3 shadow rounded">
    <div class="container-fluid d-flex justify-content-between" style="">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand fs-6" href="{{route('userHome')}}">Du Lịch</a>
        @if(auth()->check())
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                @if(Auth::user()->roles == 1)
                   <div class="btn-group me-3">
                       <a class="nav-link dropdown-toggle position-relative" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                          aria-expanded="false">
                           <i class="fa-solid fa-bell"></i>
                           @if($bookingStatus->where('user_id', $user->id)->count() != 0)
                               <span
                                   class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                           @endif
                       </a>
                       <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                           @if($bookingStatus->where('user_id', $user->id)->count() != 0)
                               <li><a class="dropdown-item" href="{{route('userHome')}}">Có <b><span class="text-success">{{$bookingStatus->where('user_id', $user->id)->count()}}</span></b> đơn
                                           đặt phòng mới</a></li>
                           @else
                               <li><a class="dropdown-item" href="{{route('userHome')}}"><strong>Không có thông báo
                                           mới</strong></a></li>
                           @endif
                       </ul>
                    </div>
                @endif
                <div class="btn-group">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <strong>{{$user->name}}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                               data-bs-target="#changePasswordModal">Đổi
                                mật khẩu</a></li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
</nav>
