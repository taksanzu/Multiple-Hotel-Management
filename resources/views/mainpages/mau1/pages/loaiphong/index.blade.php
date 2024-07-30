@extends('mainpages.mau1.layout.layout')
@section('content')
    <div class="main-header" @if($user->settings->where('name', 'image11')->first()) style="background: url('{{ asset('images'.'/'.$user->settings->where('name', 'image11')->first()->value) }}')" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Loại phòng</h1>
                    <div class="d-lg-flex justify-content-center" style="gap:5px">
                        @if(optional($user->settings->where('name', 'bookinglink')->first())->value != null)
                            <a href="{{ optional($user->settings->where('name', 'bookinglink')->first())->value }}" target="_blank" class="btn btn-primary btn-lg rounded-pill border" style="background: #0b2046"><strong>BOOK NOW</strong></a>
                        @else
                            <a data-bs-toggle="modal" data-bs-target="#bookingModal" class="btn btn-primary btn-lg rounded-pill border" style="background: #0b2046"><strong>BOOK NOW</strong></a>
                        @endif
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
        </div>
    </div>
    <div class="container bg-white p-5 border rounded shadow position-relative mt-n1 booking">
        <h1 class="text-center">THÔNG TIN ĐẶT PHÒNG</h1>
        <form class="row">
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
                    <a id="bookingbtn" data-bs-toggle="modal" data-bs-target="#bookingModal" class="btn btn-primary btn-lg rounded-pill border mt-md-4 btn-booking-1" style="background: #0b2046"><strong>BOOK NOW</strong></a>
                @endif
            </div>
        </form>
    </div>
    <!-- Rooms -->
    <div class="container my-5 rooms-main-section">
        @foreach ($rooms as $key => $room)
            <div class="row mb-5 rooms-main-items">
                @if ($key % 2 == 0)
                    <!-- Phòng {{ $room->id }} -->
                    <div class="col-md-2">
                        <div class="card rounded-0 p-3 shadow" style="{{ $key % 2 == 0 ? 'left: 0' : 'right: 0' }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $room->name }}</h5>
                                <h5 class="card-subtitle mb-2 text-danger">{{ number_format($room->price) }} VNĐ</h5>
{{--                                <p class="card-text">--}}
{{--                                    @for($x = 0; $x < $room->stars; $x++)--}}
{{--                                        <i class="fa-solid fa-star text-warning"></i>--}}
{{--                                    @endfor--}}
{{--                                </p>--}}
                                <div class="text-center d-flex flex-row" style="justify-content: space-between;">
                                    @if(optional($user->settings->where('name', 'bookinglink')->first())->value != null)
                                        <a href="{{ optional($user->settings->where('name', 'bookinglink')->first())->value }}" target="_blank" class="btn btn-primary btn-lg rounded-pill border" style="background: #0b2046"><strong>BOOK NOW</strong></a>
                                    @else
                                        <a data-bs-toggle="modal" data-bs-target="#bookingModal" class="btn btn-primary btn-lg rounded-pill border btn-booking" data-room-type="{{ $room->id }}" style="background: #0b2046"><strong>BOOK NOW</strong></a>
                                    @endif
                                    <a href="{{route('loaiphong.detail', ['id' => $room->id, 'slug' => $room->slug])}}" class="btn btn-outline-primary rounded-pill border border-primary d-flex align-items-center"><strong>VIEW DETAIL</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div id="carouselExample{{ $room->id }}" class="carousel slide rooms-img-section" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($room->roomImages->take(2) as $imgKey => $image)
                                    <div class="carousel-item {{ $imgKey == 0 ? 'active' : '' }}">
                                        <img src="/images/rooms/{{ $image->name }}" class="d-block w-100" alt="Ảnh phòng {{ $room->id }}">
                                    </div>
                                @endforeach
                                    @if($room->image360)
                                        <div class="carousel-item">
                                            <a class="d-md-block d-none" data-bs-toggle="modal" data-bs-target="#webModal" data-web-link="{{$room->link360}}">
                                                <img src="/images/rooms/{{ $room->image360 }}" class="d-block w-100" alt="Ảnh phòng {{ $room->id }}" style="object-fit: cover">
                                            </a>
                                            <a class="d-block d-md-none" href="{{$room->link360}}" target="_blank">
                                                <img src="/images/rooms/{{ $room->image360 }}" class="d-block w-100" alt="Ảnh phòng {{ $room->id }}" style="object-fit: cover">
                                            </a>
                                        </div>
                                    @endif
                            </div>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample{{ $room->id }}" data-bs-slide="next" style="z-index: auto">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="rooms-btn-overlay d-md-block d-none">
                                <a data-bs-toggle="modal" data-bs-target="#videoModal" data-youtube-link="{{$room->videolink}}" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#webModal" data-web-link="{{$room->link360}}" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                            </div>
                            <div class="rooms-btn-overlay d-block d-md-none">
                                <a href="{{$room->videolink}}" target="_blank" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                                <a href="{{$room->link360}}" target="_blank" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Phòng {{ $room->id }} -->
                    <div class="col-md-10">
                        <div id="carouselExample{{ $room->id }}" class="carousel slide rooms-img-section" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($room->roomImages->take(2) as $imgKey => $image)
                                    <div class="carousel-item {{ $imgKey == 0 ? 'active' : '' }}">
                                        <img src="/images/rooms/{{ $image->name }}" class="d-block w-100" alt="Ảnh phòng {{ $room->id }}">
                                    </div>
                                @endforeach
                                    @if($room->image360)
                                        <div class="carousel-item">
                                            <a class="d-md-block d-none" data-bs-toggle="modal" data-bs-target="#webModal" data-web-link="{{$room->link360}}">
                                                <img src="/images/rooms/{{ $room->image360 }}" class="d-block w-100" alt="Ảnh phòng {{ $room->id }}" style="object-fit: cover">
                                            </a>
                                            <a class="d-block d-md-none" href="{{$room->link360}}" target="_blank">
                                                <img src="/images/rooms/{{ $room->image360 }}" class="d-block w-100" alt="Ảnh phòng {{ $room->id }}" style="object-fit: cover">
                                            </a>
                                        </div>
                                    @endif
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample{{ $room->id }}" data-bs-slide="prev" style="z-index: auto">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <div class="rooms-btn-overlay-r d-md-block d-none">
                                <a data-bs-toggle="modal" data-bs-target="#videoModal" data-youtube-link="{{$room->videolink}}" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#webModal" data-web-link="{{$room->link360}}" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                            </div>
                            <div class="rooms-btn-overlay-r d-block d-md-none">
                                <a href="{{$room->videolink}}" target="_blank" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                                <a href="{{$room->link360}}" target="_blank" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card rounded-0 p-3 shadow" style="{{ $key % 2 == 0 ? 'left: 0' : 'right: 0' }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $room->name }}</h5>
                                <h5 class="card-subtitle mb-2 text-danger">{{ number_format($room->price) }} VNĐ</h5>
{{--                                <p class="card-text">--}}
{{--                                    @for($x = 0; $x < $room->stars; $x++)--}}
{{--                                        <i class="fa-solid fa-star text-warning"></i>--}}
{{--                                    @endfor--}}
{{--                                </p>--}}
                                <div class="text-center d-flex flex-row" style="justify-content: space-between;">
                                    @if(optional($user->settings->where('name', 'bookinglink')->first())->value != null)
                                        <a href="{{ optional($user->settings->where('name', 'bookinglink')->first())->value }}" target="_blank" class="btn btn-primary btn-lg rounded-pill border" style="background: #0b2046"><strong>BOOK NOW</strong></a>
                                    @else
                                        <a data-bs-toggle="modal" data-bs-target="#bookingModal" class="btn btn-primary btn-lg rounded-pill border btn-booking" data-room-type="{{ $room->id }}" style="background: #0b2046"><strong>BOOK NOW</strong></a>
                                    @endif
                                    <a href="{{route('loaiphong.detail', ['id' => $room->id, 'slug' => $room->slug])}}" class="btn btn-outline-primary rounded-pill border border-primary d-flex align-items-center"><strong>VIEW DETAIL</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection
@section('script')
    <script src="script/mainrooms.js"></script>
@endsection
