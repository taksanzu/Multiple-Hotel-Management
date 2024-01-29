@extends('mainpages.layout.layout')
@section('content')
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Loại phòng</h1>
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
                    <input type="text" placeholder="Ngày nhận phòng" class="form-control datepicker" id="datepicker" name="datepicker">
                </div>
            </div>
            <div class="col-md-3 flex-column mb-3">
                <label class="text-center mb-2">Ngày đi</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    <input type="text" placeholder="Ngày trả phòng" class="form-control datepicker" id="datepicker" name="datepicker">
                </div>
            </div>
            <div class="col-md-3 flex-column mb-3">
                <label class="text-center mb-2">Điện thoại</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input type="text" placeholder="Số điện thoại" class="form-control" id="phone" name="phone">
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <a data-bs-toggle="modal" data-bs-target="#bookingModal" class="btn btn-primary btn-lg rounded-pill border mt-md-4" style="background: #0b2046"><strong>BOOK NOW</strong></a>
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
                                <h5 class="card-title">Phòng {{ $room->id }}</h5>
                                <p class="card-text">{{ $room->description }}</p>
                                <p class="card-text">
                                    @for($x = 0; $x < $room->stars; $x++)
                                        <i class="fa-solid fa-star text-warning"></i>
                                    @endfor
                                </p>
                                <div class="text-center d-flex flex-row" style="justify-content: space-between;">
                                    <a data-bs-toggle="modal" data-bs-target="#bookingModal" class="btn btn-primary rounded-pill border" style="background: #0b2046"><strong>BOOK NOW</strong></a>
                                    <a href="{{route('loaiphong.detail', ['id' => $room->id])}}" class="btn btn-outline-primary rounded-pill border border-primary"><strong>VIEW DETAIL</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div id="carouselExample{{ $room->id }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($room->roomImages->take(2) as $imgKey => $image)
                                    <div class="carousel-item {{ $imgKey == 0 ? 'active' : '' }}">
                                        <img src="/images/rooms/{{ $image->name }}" class="d-block w-100" alt="Ảnh phòng {{ $room->id }}">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample{{ $room->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                @else
                    <!-- Phòng {{ $room->id }} -->
                    <div class="col-md-10">
                        <div id="carouselExample{{ $room->id }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($room->roomImages->take(2) as $imgKey => $image)
                                    <div class="carousel-item {{ $imgKey == 0 ? 'active' : '' }}">
                                        <img src="/images/rooms/{{ $image->name }}" class="d-block w-100" alt="Ảnh phòng {{ $room->id }}">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample{{ $room->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card rounded-0 p-3 shadow" style="{{ $key % 2 == 0 ? 'left: 0' : 'right: 0' }}">
                            <div class="card-body">
                                <h5 class="card-title">Phòng {{ $room->id }}</h5>
                                <p class="card-text">{{ $room->description }}</p>
                                <p class="card-text">
                                    @for($x = 0; $x < $room->stars; $x++)
                                        <i class="fa-solid fa-star text-warning"></i>
                                    @endfor
                                </p>
                                <div class="text-center d-flex flex-row" style="justify-content: space-between;">
                                    <a data-bs-toggle="modal" data-bs-target="#bookingModal" class="btn btn-primary rounded-pill border" style="background: #0b2046"><strong>BOOK NOW</strong></a>
                                    <a href="{{route('loaiphong.detail', ['id' => $room->id])}}" class="btn btn-outline-primary rounded-pill border border-primary"><strong>VIEW DETAIL</strong></a>
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
    <script src="/script/mainrooms.js"></script>
@endsection
