<nav class="navbar navbar-expand-lg fixed-top navbar-dark">
       <div class="container">
           <a class="navbar-brand d-md-none" href="{{ route('welcome') }}">
               @if($user->settings->where('name', 'logo')->first())
                   <img src="{{ asset('logo').'/'.optional($user->settings->where('name', 'logo')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="100" height="75">
               @else
                   <img class="mx-auto align-middle" src="{{ asset('upload/placeholder.png') }}" alt="" width="70" height="50">
               @endif
           </a>
           <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav mx-auto d-flex align-items-center fs-5">
                   <li class="nav-item mx-3">
                       <a class="nav-link active" href="{{route('loaiphong.index')}}">Phòng nghỉ</a>
                   </li>
                   <li class="nav-item mx-3">
                       <a class="nav-link" href="{{route('tienich.index')}}">Dịch vụ</a>
                   </li>
{{--                   <li class="nav-item mx-3">--}}
{{--                       <a class="nav-link" href="https://lmtsupply.vn/">Điểm đến</a>--}}
{{--                   </li>--}}
                   <li class="nav-item mx-3">
                       <a class="nav-link" href="{{route('hinhanh.index')}}">Hình ảnh</a>
                   </li>
                   <a class="nav-item d-none d-sm-block text-center mx-3" href="{{route('welcome')}}">
                       @if($user->settings->where('name', 'logo')->first())
                           <img src="{{ asset('logo').'/'.optional($user->settings->where('name', 'logo')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="100" height="75">
                       @else
                           <img class="mx-auto align-middle" src="{{ asset('upload/placeholder.png') }}" alt="" >
                       @endif
                   </a>
                   <li class="nav-item mx-3">
                       <a class="nav-link" href="{{route('tintuc.index')}}">Tin tức & khuyến mãi</a>
                   </li>
{{--                   <li class="nav-item mx-3">--}}
{{--                       <a class="nav-link" href="https://lmtsupply.vn/" >Liên hệ</a>--}}
{{--                   </li>--}}
                   <li class="nav-item mx-3">
                       <a class="nav-link btn btn-outline-light rounded-pill w-100 p-2" href="{{route('loaiphong.index')}}" >Book now</a>
                   </li>
                   <li class="nav-item mx-3">
                       <a class="nav-link" href="{{ route('welcome') }}" ><i class="fa-solid fa-language"></i> EN</a>
                   </li>
               </ul>
           </div>
       </div>
</nav>
