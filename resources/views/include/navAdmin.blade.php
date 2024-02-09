<nav class="nav flex-column container shadow p-2 bg-body rounded d-sm-block d-none" style="max-width: 250px; height: 90vh" id="myDIV">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item mb-3">
            <a type="button" href="{{ route('userHome') }}" class="nav-link link-dark {{ request()->routeIs('userHome') ? 'active' : '' }}">
                <i class="fa-solid fa-house fa-2xs"></i>
                <strong>Trang Chủ</strong>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="{{ route('news', ['type' => 0]) }}" class="nav-link link-dark {{ request()->routeIs('news') && request()->input('type') == 0 ? ' active' : '' }}">
                <i class="fa-solid fa-hand-holding-dollar fa-2xs"></i>
                <strong>Tiện ích</strong>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="{{ route('news', ['type' => 1]) }}" class="nav-link link-dark {{ request()->routeIs('news') && request()->input('type') == 1 ? ' active' : '' }}">
                <i class="fa-solid fa-newspaper fa-2xs"></i>
                <strong>Tin tức & khuyến mãi</strong>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="{{ route('images') }}"  class="nav-link link-dark {{ request()->routeIs('images') ? 'active' : '' }}">
                <i class="fa-solid fa-image fa-2xs"></i>
                <strong>Hình ảnh</strong>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="{{ route('rooms') }}" class="nav-link link-dark {{ request()->routeIs('rooms') ? 'active' : '' }}">
                <i class="fa-solid fa-person-shelter fa-2xs"></i>
                <strong>Phòng</strong>
            </a>
        </li>
        @if(Auth::user()->roles == 0)
            <li class="nav-item mb-3">
                <a href="{{route('userList')}}" class="nav-link link-dark {{request()->routeIs('userList') ? 'active' : ''}}">
                    <i class="fa-solid fa-user fa-2xs"></i>
                    <strong>User</strong>
                </a>
            </li>
        @endif
        <li class="nav-item mb-3">
            <a href="" class="nav-link link-dark ">
                <i class="fa-solid fa-cog fa-2xs"></i>
                <strong>Setting</strong>
            </a>
        </li>
    </ul>
</nav>

