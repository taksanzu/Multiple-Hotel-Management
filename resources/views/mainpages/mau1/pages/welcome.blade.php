@extends('mainpages.mau1.layout.layout')
@section('content')
    <div id="carouselExample" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-inner">
            @if($user->settings->where('name', 'image1')->first())
                <div class="carousel-item active" style="background-image: url('{{ asset('images').'/'.optional($user->settings->where('name', 'image1')->first())->value }}');">
                    <div class="overlay"></div>
                </div>
            @else
                <div class="carousel-item active" style="background-image: url('upload/slide2.jpg');">
                    <div class="overlay"></div>
                </div>
            @endif
            @if($user->settings->where('name', 'image2')->first())
                <div class="carousel-item active" style="background-image: url('{{ asset('images').'/'.optional($user->settings->where('name', 'image2')->first())->value }}');">
                    <div class="overlay"></div>
                </div>
            @else
                <div class="carousel-item" style="background-image: url('upload/slide1.jpg');">
                    <div class="overlay"></div>
                </div>
            @endif
        </div>
        <div class="carousel-text">
            <h1>{{ optional($user->settings->where('name', 'gioi_thieu_1')->first())->value }}</h1>
            <h2>{{ optional($user->settings->where('name', 'name')->first())->value }}</h2>
            <div class="d-lg-flex justify-content-center" style="gap:5px">
                <a style="background: #0b2046" class="btn btn-primary btn-lg rounded-pill border mb-2 mb-lg-0" type="button" href="{{route('loaiphong.index')}}"><strong>BOOK NOW</strong></a>
                <div class="d-flex flex-row justify-content-center d-md-block d-none" style="gap:5px">
                    <a data-bs-toggle="modal" data-bs-target="#videoModal" data-youtube-link="{{optional($user->settings->where('name', 'youtube')->first())->value}}" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                    <a data-bs-toggle="modal" data-bs-target="#webModal" data-web-link="{{optional($user->settings->where('name', 'linkweb')->first())->value}}" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                </div>
                <div class="d-flex flex-row justify-content-center d-block d-md-none" style="gap:5px">
                    <a href="{{optional($user->settings->where('name', 'youtube')->first())->value}}" target="_blank" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                    <a href="{{optional($user->settings->where('name', 'linkweb')->first())->value}}" target="_blank" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-white p-5 border rounded shadow position-relative mt-n1 booking">
        <h1 class="text-center">THÔNG TIN ĐẶT PHÒNG</h1>
        <div class="row">
            <div class="col-md-3 flex-column mb-3">
                <label class="text-center mb-2">Ngày đến</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    <input type="text" placeholder="Ngày nhận phòng" class="form-control datepicker" id="checkinsource" name="checkinsource">
                </div>
            </div>
            <div class="col-md-3 flex-column mb-3">
                <label class="text-center mb-2">Ngày đi</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    <input type="text" placeholder="Ngày trả phòng" class="form-control datepicker" id="checkoutsource" name="checkoutsource">
                </div>
            </div>
            <div class="col-md-3 flex-column mb-3">
                <label class="text-center mb-2">Điện thoại</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input type="text" placeholder="Số điện thoại" class="form-control" id="phonesource" name="phonesource">
                </div>
            </div>
            <div class="col-md-2 mb-3">
                @if(optional($user->settings->where('name', 'bookinglink')->first())->value != null)
                    <a href="{{ optional($user->settings->where('name', 'bookinglink')->first())->value }}" target="_blank" class="btn btn-primary btn-lg rounded-pill border mt-md-4" style="background: #0b2046"><strong>BOOK NOW</strong></a>
                @else
                    <a data-bs-toggle="modal" data-bs-target="#bookingModal" class="btn btn-primary btn-lg rounded-pill border mt-md-4 btn-booking-1" style="background: #0b2046"><strong>BOOK NOW</strong></a>
                @endif
            </div>
        </div>
    </div>
    <!-- Header -->
    <div class="container-fluid about-us-section" @if($user->settings->where('name', 'image3')->first()) style="background: url('{{ asset('images').'/'.optional($user->settings->where('name', 'image3')->first())->value }}') no-repeat; background-size: cover" @endif>
        <div class="row">
            <div class="col-lg-6 mx-auto text-dark">
                <h1 style="font-family: 'great vibes', sans-serif; font-size: 5rem; color: #0940a3">{{ optional($user->settings->where('name', 'name')->first())->value }}</h1>
                <p>
                    {{ optional($user->settings->where('name', 'gioi_thieu_2')->first())->value }}
                </p>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Rooms Infomations -->
    <div class="container py-5 rooms-section">
        <h1 class="text-center mb-5">CÁC LOẠI PHÒNG</h1>
        <div class="row mb-3">
           @foreach($user->rooms->where('deleted',0)->where('status', 1)->take(2) as $room)
                <div class="col-lg-6 mb-5">
                    <a href="{{route('loaiphong.detail', ['id' => $room->id, 'slug' => $room->slug])}}" style="text-decoration:none">
                        <div class="card shadow">
                            <div class="rooms-img-section">
                                <img src="images/rooms/{{$room->roomImages()->first()->name}}" class="card-img-top rounded h-lg-100 h-md-75 h-sm-50" alt="...">
                                <div class="rooms-btn-overlay d-md-block d-none">
                                    <a data-bs-toggle="modal" data-bs-target="#videoModal" data-youtube-link="{{$room->videolink}}" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                                    <a data-bs-toggle="modal" data-bs-target="#webModal" data-web-link="{{$room->link360}}" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                                </div>
                                <div class="rooms-btn-overlay d-block d-md-none">
                                    <a href="{{$room->videolink}}" target="_blank" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                                    <a href="{{$room->link360}}" target="_blank" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">{{ $room->name }}</h5>
                                <h5 class="card-subtitle mb-2 text-danger">{{ number_format($room->price) }} VNĐ</h5>
{{--                                <p class="card-text">--}}
{{--                                    @for($x = 0; $x < $room->stars; $x++)--}}
{{--                                        <i class="fa-solid fa-star text-warning"></i>--}}
{{--                                    @endfor--}}
{{--                                </p>--}}
                            </div>
                        </div>
                    </a>
                </div>
           @endforeach
        </div>
        <div class="text-center">
            <a href="{{route('loaiphong.index')}}" class="btn btn-primary btn-lg rounded-pill border" style="background: #0b2046"><strong>XEM THÊM</strong></a>
        </div>
    </div>
    <!-- End Rooms Infomations -->
    <!-- Services -->
    <div class="row">
        <div class="col-lg-6 p-0">
            <div class="services-img">
                @if($user->settings->where('name', 'image4')->first())
                    <img src="{{ asset('images').'/'.optional($user->settings->where('name', 'image4')->first())->value }}" alt="Services" >
                @else
                    <img src="upload/room.jpg" alt="Services" >
                @endif
            </div>
        </div>
        <div class="col-lg-6 p-5" @if($user->settings->where('name', 'image5')->first()) style="background-image: url('{{ asset('images').'/'.optional($user->settings->where('name', 'image5')->first())->value }}')" @else style="background-image: url('upload/room2.jpg'); background-size: cover; background-position: center"  @endif>

        </div>
    </div>
    <!-- End Services -->
    <!-- News -->
    <div class="container p-5 news-section">
        <h1 class="text-center mb-5">Tin tức</h1>
        <div class="row mb-3">
            @foreach($user->news->where('type', 1)->where('deleted',0)->where('status', 1)->take(2) as $new)
                <div class="col-lg-6 mb-5">
                    <a href="{{route('tintuc.detail', ['id' => $new->id, 'slug'=>$new->slug])}}" style="text-decoration:none">
                        <div class="card shadow">
                            <img src="/images/news/mainnews/{{$new->images}}" class="card-img-top rounded h-lg-100 h-md-75 h-sm-50" alt="...">
                            <div class="card-img-overlay">
                                <h5 class="card-title text-light">{{$new->title}}</h5>
                                <p class="card-text text-light limited-lines">{{$new->description}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{route('tintuc.index')}}" class="btn btn-primary btn-lg rounded-pill border" style="background: #0b2046"><strong>XEM THÊM</strong></a>
        </div>
    </div>
    <!-- Foods -->
    <div class="container-fluid foods-section" @if($user->settings->where('name', 'image6')->first()) style="background: url('{{ asset('images').'/'.optional($user->settings->where('name', 'image6')->first())->value }}') no-repeat; background-size: cover" @endif>
        <div class="row">
            <div class="col-lg-6 mx-auto text-light">
                <h2 class="service-content-title">Đa dạng ẩm thực</h2>
            </div>
        </div>
    </div>
    <div class="row mt-n1 pt-lg-0 pb-5 d-none d-lg-flex px-100">
        @for($i = 7; $i <= 10; $i++)
            @if ($user->settings->where('name', 'image'.$i)->first())
                <div class="col-lg-3 ">
                    <div class="foods-img" >
                        <img style="height: 300px; object-fit: cover" src="{{ asset('images').'/'.optional($user->settings->where('name', 'image'.$i)->first())->value }}" alt="Foods">
                    </div>
                </div>
            @else
                <div class="col-lg-3 ">
                    <div class="foods-img">
                        <img style="height: 300px; object-fit: cover" src="upload/dishes.jpg" alt="Foods">
                    </div>
                </div>
            @endif
        @endfor
    </div>
    <div id="carouselExampleFade" class="carousel slide d-lg-none" data-bs-ride="carousel">
        <div class="carousel-inner p-3">
            @for($i = 7; $i <= 10; $i++)
                @if ($user->settings->where('name', 'image'.$i)->first())
                    <div @if($i == 7)
                             class="carousel-item foods-img-sm active"
                         @else
                             class="carousel-item foods-img-sm"
                         @endif
                         style="background-image: url('{{ asset('images').'/'.optional($user->settings->where('name', 'image'.$i)->first())->value }}'); height: 50vh">
                    </div>
                @else
                    <div class="carousel-item foods-img-sm" style="background-image: url('https://tiffanyhotel.com.vn/Upload/images/brand-logo/ga-ham-sam-2-min.jpeg'); height: 50vh">
                    </div>
                @endif
            @endfor
        </div>
    </div>
    <!-- End Foods -->
@endsection

