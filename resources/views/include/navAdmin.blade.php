<nav class="nav flex-column container shadow p-2 bg-body rounded" style="max-width: 250px; height: 90vh" id="myDIV">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a type="button" href="{{ route('userHome') }}" class="nav-link link-dark {{ request()->routeIs('userHome') ? 'active' : '' }}">
                <i class="fa-solid fa-house fa-2xs"></i>
                <strong>Trang Chủ</strong>
            </a>
        </li>
        <li>
            <a class="nav-link link-dark">
                <i class="fa-solid fa-newspaper fa-2xs"></i>
                <strong>Tin Tức</strong>
            </a>
            <div class="list-group list-group-flush px-4">
                <a href="{{ route('news', ['type' => 0]) }}" class="list-group-item list-group-item-action border-0{{ request()->routeIs('news') && request()->input('type') == 0 ? ' active' : '' }}">Tiện ích</a>
                <a href="{{ route('news', ['type' => 1]) }}" class="list-group-item list-group-item-action border-0{{ request()->routeIs('news') && request()->input('type') == 1 ? ' active' : '' }}">Tin tức & khuyến mãi</a>
                <a href="{{ route('images') }}" class="list-group-item list-group-item-action border-0 {{ request()->routeIs('images') ? 'active' : '' }}">Hình ảnh</a>
            </div>
        </li>
        <li>
            <a href="{{ route('rooms') }}" class="nav-link link-dark {{ request()->routeIs('rooms') ? 'active' : '' }}">
                <i class="fa-solid fa-person-shelter fa-2xs"></i>
                <strong>Phòng</strong>
            </a>
        </li>
    </ul>
</nav>

