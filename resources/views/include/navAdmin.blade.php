<nav class="d-flex flex-lg-column flex-shrink-0 p-3 border container" style="width: 280px; height: 100vh; background: #f7fafc" id="myDIV">
    <a href="{{route('userHome')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Du Lịch</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{route('userHome')}}" class="nav-link link-dark" aria-current="page">
                <i class="fa-solid fa-house px-1"></i>
                Trang Chủ
            </a>
        </li>
        <li>
            <a href="{{route('news')}}" class="nav-link link-dark">
                <i class="fa-regular fa-newspaper px-1"></i>
                Tin tức
            </a>
        </li>
        <li>
            <a href="{{route('rooms')}}" class="nav-link link-dark">
                <i class="fa-solid fa-person-shelter px-1"></i>
                Loại Phòng
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <strong>{{$user->name}}</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="{{route('logout')}}">Sign out</a></li>
        </ul>
    </div>
</nav>
