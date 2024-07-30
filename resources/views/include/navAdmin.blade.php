<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <nav class="nav flex-column container p-2 bg-body" style=" height: 90vh" id="myDIV">
            <ul class="nav nav-pills flex-column">
                @if(Auth::user()->roles == 0)
                    <li class="nav-item mb-3">
                        <a href="{{route('userList')}}"
                           class="nav-link link-dark {{request()->routeIs('userList') ? 'active' : ''}}">
                            <i class="fa-solid fa-user fa-2xs"></i>
                            <strong>User</strong>
                        </a>
                    </li>
                @else
                    <li class="nav-item mb-3">
                        <a type="button" href="{{ route('userHome') }}"
                           class="nav-link link-dark {{ request()->routeIs('userHome') ? 'active' : '' }}">
                            <i class="fa-solid fa-house fa-2xs"></i>
                            <strong>Khách Đặt Phòng</strong>
                        </a>
                    </li>
                @endif
                <li class="nav-item mb-3">
                    <a href="{{ route('rooms') }}"
                       class="nav-link link-dark {{ request()->routeIs('rooms') ? 'active' : '' }}">
                        <i class="fa-solid fa-person-shelter fa-2xs"></i>
                        <strong>Phòng</strong>
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ route('news', ['type' => 0]) }}"
                       class="nav-link link-dark {{ request()->routeIs('news') && request()->input('type') == 0 ? ' active' : '' }}">
                        <i class="fa-solid fa-hand-holding-dollar fa-2xs"></i>
                        <strong>Dịch vụ</strong>
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ route('news', ['type' => 1]) }}"
                       class="nav-link link-dark {{ request()->routeIs('news') && request()->input('type') == 1 ? ' active' : '' }}">
                        <i class="fa-solid fa-newspaper fa-2xs"></i>
                        <strong>Tin tức & khuyến mãi</strong>
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ route('images') }}"
                       class="nav-link link-dark {{ request()->routeIs('images') ? 'active' : '' }}">
                        <i class="fa-solid fa-image fa-2xs"></i>
                        <strong>Hình ảnh</strong>
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link link-dark ">
                        <i class="fa-solid fa-cog fa-2xs"></i>
                        <strong>Cấu hình trang web</strong>
                    </a>
                    <ul class="nav flex-column mx-3">
                        <li class="nav-item">
                            <a href="{{ route('settingTemplate') }}"
                               class="nav-link link-dark {{ request()->routeIs('settingTemplate') ? 'active' : '' }}">
                                Mẫu website
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('setting') }}"
                               class="nav-link link-dark {{ request()->routeIs('setting') ? 'active' : '' }}">
                                Thông tin
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('settingImage')}}"
                               class="nav-link link-dark {{ request()->routeIs('settingImage') ? 'active' : '' }}">
                                Hình ảnh
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<nav class="nav flex-column container shadow p-2 bg-body rounded col-lg-2 d-lg-block d-none" style=" height: 90vh"
     id="myDIV">
    <ul class="nav nav-pills flex-column">
        @if(Auth::user()->roles == 0)
            <li class="nav-item mb-3">
                <a href="{{route('userList')}}"
                   class="nav-link link-dark {{request()->routeIs('userList') ? 'active' : ''}}">
                    <i class="fa-solid fa-user fa-2xs"></i>
                    <strong>User</strong>
                </a>
            </li>
        @else
            <li class="nav-item mb-3">
                <a type="button" href="{{ route('userHome') }}"
                   class="nav-link link-dark {{ request()->routeIs('userHome') ? 'active' : '' }}">
                    <i class="fa-solid fa-house fa-2xs"></i>
                    <strong>Khách Đặt Phòng</strong>
                </a>
            </li>
        @endif
        <li class="nav-item mb-3">
            <a href="{{ route('rooms') }}" class="nav-link link-dark {{ request()->routeIs('rooms') ? 'active' : '' }}">
                <i class="fa-solid fa-person-shelter fa-2xs"></i>
                <strong>Phòng</strong>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="{{ route('news', ['type' => 0]) }}"
               class="nav-link link-dark {{ request()->routeIs('news') && request()->input('type') == 0 ? ' active' : '' }}">
                <i class="fa-solid fa-hand-holding-dollar fa-2xs"></i>
                <strong>Dịch vụ</strong>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="{{ route('news', ['type' => 1]) }}"
               class="nav-link link-dark {{ request()->routeIs('news') && request()->input('type') == 1 ? ' active' : '' }}">
                <i class="fa-solid fa-newspaper fa-2xs"></i>
                <strong>Tin tức & khuyến mãi</strong>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="{{ route('images') }}"
               class="nav-link link-dark {{ request()->routeIs('images') ? 'active' : '' }}">
                <i class="fa-solid fa-image fa-2xs"></i>
                <strong>Hình ảnh</strong>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link link-dark ">
                <i class="fa-solid fa-cog fa-2xs"></i>
                <strong>Cấu hình trang web</strong>
            </a>
            <ul class="nav flex-column mx-3">
                <li class="nav-item">
                    <a href="{{ route('settingTemplate') }}"
                       class="nav-link link-dark {{ request()->routeIs('settingTemplate') ? 'active' : '' }}">
                        Mẫu website
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('setting') }}"
                       class="nav-link link-dark {{ request()->routeIs('setting') ? 'active' : '' }}">
                        Thông tin
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('settingImage')}}"
                       class="nav-link link-dark {{ request()->routeIs('settingImage') ? 'active' : '' }}">
                        Hình ảnh
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>

