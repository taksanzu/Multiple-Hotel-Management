@extends('mainpages.layout.layout')
@section('content')
    <div id="carouselExample" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('https://tiffanyhotel.com.vn/Upload/images/Slide/1.jpg');">
                <div class="overlay"></div>
            </div>
            <div class="carousel-item" style="background-image: url('https://tiffanyhotel.com.vn/Upload/images/Slide/2.jpg');">
                <div class="overlay"></div>
            </div>
        </div>
        <div class="carousel-text">
            <h1>{{ optional($user->settings->where('name', 'gioi_thieu_1')->first())->value }}</h1>
            <h2>{{ optional($user->settings->where('name', 'name')->first())->value }}</h2>
            <a style="background: #0b2046" class="btn btn-primary btn-lg rounded-pill border" type="button" data-bs-toggle="modal" data-bs-target="#bookingModal"><strong>BOOK NOW</strong></a>
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
    <!-- Header -->
    <div class="container-fluid about-us-section">
        <div class="row">
            <div class="col-lg-6 mx-auto text-dark">
                <h2>TẬN HƯỞNG KỲ NGHỈ TẠI</h2>
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
           @foreach($user->rooms as $room)
                <div class="col-lg-6 mb-5">
                    <div class="card shadow">
                        <img src="https://tiffanyhotel.com.vn/Upload/images/gallery/Tiffany%20(5).jpg" class="card-img-top rounded h-lg-100 h-md-75 h-sm-50" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->name }}</h5>
                            <p class="card-text">
                                @for($x = 0; $x < $room->stars; $x++)
                                    <i class="fa-solid fa-star text-warning"></i>
                                @endfor
                            </p>
                        </div>
                    </div>
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
                <img src="https://tiffanyhotel.com.vn/Content/client/images/banner/bg-tienich-left.jpg" alt="Services" >
            </div>
        </div>
        <div class="col-lg-6 p-5" style="background-image: url('https://tiffanyhotel.com.vn/Content/client/images/banner/bg-tienich.jpg')">
            <div class="service-wrap">
                <div class="single-service-wrap mb-5" style="">
                    <div class="service-content">
                        <h1 class="service-content-title text-gradient-gold">TIỆN ÍCH TUYỆT VỜI</h1>
                    </div>
                </div>
                <div class="single-service-wrap mb-5" style="">
                    <div class="service-content">
                        <h3 class="service-content-title text-gradient-gold">View sân thượng</h3>
                        <p>View sân thượng nơi thư giãn lý tưởng để quý khách ngắm toàn cảnh Phan thiết khi về đêm.</p>
                    </div>
                </div>
                <div class="single-service-wrap" style="">
                    <div class="service-content">
                        <h3 class="service-content-title text-gradient-gold">Bãi tắm Đồi Dương</h3>
                        <p>Vị trí khách sạn cách bãi tắm Đồi Dương 100m rất thuận lợi cho quý khách khi tắm biển.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services -->
    <!-- News -->
    <div class="container p-5 news-section">
        <h1 class="text-center mb-5">Tin tức</h1>
        <div class="row mb-3">
            @foreach($user->news->where('type', 1) as $new)
                <div class="col-lg-6 mb-5">
                    <div class="card shadow">
                        <img src="/images/news/mainnews/{{$new->images}}" class="card-img-top rounded h-lg-100 h-md-75 h-sm-50" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title text-light">{{$new->title}}</h5>
                            <p class="card-text text-light limited-lines">{{$new->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{route('tintuc.index')}}" class="btn btn-primary btn-lg rounded-pill border" style="background: #0b2046"><strong>XEM THÊM</strong></a>
        </div>
    </div>
    <!-- Foods -->
    <div class="container-fluid foods-section">
        <div class="row">
            <div class="col-lg-6 mx-auto text-light">
                <h2>Đa dạng ẩm thực á âu</h2>
                <p>Mời bạn khám phá các trải nghiệm ẩm thực khác nhau, từ ẩm thực truyền thống Việt Nam đến ẩm thực Á Âu cao cấp sang trọng</p>
            </div>
        </div>
    </div>
    <div class="row mt-n1 pt-lg-0 pb-5 d-none d-lg-flex px-100">
        <div class="col-lg-3">
            <div class="foods-img">
                <img src="https://tiffanyhotel.com.vn/Upload/images/brand-logo/ga-ham-sam-2-min.jpeg" alt="Foods" height="300px" width="100%">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="foods-img">
                <img src="https://tiffanyhotel.com.vn/Upload/images/brand-logo/ga-ham-sam-2-min.jpeg" alt="Foods" height="300px" width="100%">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="foods-img">
                <img src="https://tiffanyhotel.com.vn/Upload/images/brand-logo/ga-ham-sam-2-min.jpeg" alt="Foods" height="300px" width="100%">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="foods-img">
                <img src="https://tiffanyhotel.com.vn/Upload/images/brand-logo/ga-ham-sam-2-min.jpeg" alt="Foods" height="300px" width="100%">
            </div>
        </div>
    </div>
    <div id="carouselExampleFade" class="carousel slide d-lg-none" data-bs-ride="carousel">
        <div class="carousel-inner p-3">
            <div class="carousel-item foods-img-sm active" style="background-image: url('https://tiffanyhotel.com.vn/Upload/images/brand-logo/ga-ham-sam-2-min.jpeg'); height: 50vh">
            </div>
            <div class="carousel-item foods-img-sm" style="background-image: url('https://tiffanyhotel.com.vn/Upload/images/brand-logo/ga-ham-sam-2-min.jpeg'); height: 50vh">
            </div>
            <div class="carousel-item foods-img-sm" style="background-image: url('https://tiffanyhotel.com.vn/Upload/images/brand-logo/ga-ham-sam-2-min.jpeg'); height: 50vh">
            </div>
            <div class="carousel-item foods-img-sm" style="background-image: url('https://tiffanyhotel.com.vn/Upload/images/brand-logo/ga-ham-sam-2-min.jpeg'); height: 50vh">
            </div>
        </div>
    </div>
    <!-- End Foods -->
@endsection
