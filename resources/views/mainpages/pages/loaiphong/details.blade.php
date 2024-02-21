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
                    <div class="rooms-btn-overlay">
                        <a href="{{$rooms->videolink}}" target="_blank" class="btn btn-danger btn-lg rounded-pill"><i class="fa-brands fa-youtube"></i></a>
                        <a href="{{$rooms->link360}}" target="_blank" class="btn btn-primary btn-lg rounded-pill">360</a>
                    </div>
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
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique massa vel nulla fermentum, non vulputate justo condimentum.
                    Proin et efficitur neque, vel euismod justo. Vivamus vitae posuere libero. In hac habitasse platea dictumst. Ut nec leo non libero tincidunt
                    tincidunt. Fusce at metus vitae nulla vestibulum suscipit. Nulla facilisi. Proin in ligula ac sapien tristique vulputate.
                </p>
                <a class="btn btn-primary rounded-pill border " style="background: #0b2046" data-bs-toggle="modal" data-bs-target="#bookingModal"><strong>BOOK NOW</strong></a>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/script/detailrooms.js"></script>
@endsection
