@extends('mainpages.layout.layout')
@section('content')
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5">
        <div class="owl-carousel owl-theme">
            @foreach($images as $image)
                <div class="item rooms-img-section">
                    <img src="/images/rooms/{{$image->name}}" alt="">
                    @if((new \Jenssegers\Agent\Agent())->isDesktop())
                        <div class="rooms-btn-overlay">
                            <a data-bs-toggle="modal" data-bs-target="#videoModal" data-youtube-link="{{$rooms->videolink}}" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                            <a data-bs-toggle="modal" data-bs-target="#webModal" data-web-link="{{$rooms->link360}}" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                        </div>
                    @else
                        <div class="rooms-btn-overlay">
                            <a href="{{$rooms->videolink}}" target="_blank" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                            <a href="{{$rooms->link360}}" target="_blank" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div class="container my-5 rooms-detail">
        <!-- Khối đầu tiên -->
        <div class="row">
            <div class="col-md-6">
                <h1>{{$rooms->name}}</h1>
                <h2>1.000.000VND</h2>
                <p>{{$rooms->description}}</p>
            </div>
        </div>

        <!-- Khối thứ hai -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Mô tả dài của phòng</h3>
                <p>
                    {{$rooms->longdesc}}
                </p>
                <a class="btn btn-primary rounded-pill border " style="background: #0b2046" data-bs-toggle="modal" data-bs-target="#bookingModal"><strong>BOOK NOW</strong></a>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/script/detailrooms.js"></script>
@endsection
