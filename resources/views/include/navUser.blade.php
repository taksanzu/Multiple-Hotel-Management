<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3 shadow rounded">
    <div class="container-fluid d-flex justify-content-between" style="">
        <a class="navbar-brand fs-6" href="{{route('userHome')}}">Du Lịch</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if(auth()->check())
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <div class="btn-group">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>{{$user->name}}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('logout')}}">Sign out</a></li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
</nav>
