@extends('mainpages.mau1.layout.layout')
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
        <div class="owl-carousel owl-theme" id="main-carousel">
            @foreach($images as $image)
                <div class="item rooms-img-section">
                    <img src="/images/rooms/{{$image->name}}" alt="">
                    <div class="rooms-btn-overlay d-md-block d-none">
                        <a data-bs-toggle="modal" data-bs-target="#videoModal" data-youtube-link="{{$rooms->videolink}}" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                        <a data-bs-toggle="modal" data-bs-target="#webModal" data-web-link="{{$rooms->link360}}" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                    </div>
                    <div class="rooms-btn-overlay d-block d-md-none">
                        <a href="{{$rooms->videolink}}" target="_blank" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                        <a href="{{$rooms->link360}}" target="_blank" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                    </div>
                </div>
            @endforeach
            @if($rooms->image360)
                    <div class="item">
                        <a class="d-block d-md-none" href="{{$rooms->link360}}" target="_blank">
                            <img src="/images/rooms/{{$rooms->image360}}" alt="">
                        </a>
                        <a class="d-md-block d-none" data-bs-toggle="modal" data-bs-target="#webModal" data-web-link="{{$rooms->link360}}">
                            <img src="/images/rooms/{{$rooms->image360}}" alt="">
                        </a>
                    </div>
            @endif
        </div>
    </div>
    <div class="container my-5 rooms-detail">
        <!-- Khối đầu tiên -->
        <div class="row">
            <div class="col-md-6">
                <h1>{{$rooms->name}}</h1>
                <h3 class="card-subtitle mb-2 text-danger">{{ number_format($rooms->price) }} VNĐ</h3>
            </div>
        </div>

        <!-- Khối thứ hai -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Mô tả của phòng</h3>
                {!! $rooms->description !!}
                <hr>
                <h3>Tiện ích</h3>
                @foreach($service_categories as $service_category)
                    <div class="mb-4">
                         <?php
                             $a = true;
                            foreach ($service_category->services as $service) {
                                $service_user = $service->service_user
                                    ->where('room_id', $rooms->id)
                                    ->where('status', 1)
                                    ->first();
                                if ($service_user) {
                                    $a = false;
                                    break;
                                }
                            }
                        ?>
                        @if(!$a)
                            <h6>{{ $service_category->name }}</h6>
                            <div class="d-flex flex-wrap gap-5 mb-3">
                                @foreach($service_category->services as $service)
                                    @if(optional($service->service_user->where('room_id', $rooms->id)->first())->status == 1)
                                        <div class="d-flex gap-2 align-items-center">
                                            <img src="{{ asset('service').'/'.$service->image }}" alt="" style="width: 20px" height="20px">
                                            <p class="mb-0">{{ $service->name }}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
                @if(optional($user->settings->where('name', 'bookinglink')->first())->value != null)
                    <a href="{{ optional($user->settings->where('name', 'bookinglink')->first())->value }}" target="_blank" class="btn btn-primary btn-lg rounded-pill border" style="background: #0b2046"><strong>BOOK NOW</strong></a>
                @else
                    <a data-bs-toggle="modal" data-bs-target="#bookingModal" class="btn btn-primary btn-lg rounded-pill border btn-booking" data-room-type="{{ $rooms->id }}" style="background: #0b2046"><strong>BOOK NOW</strong></a>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/script/detailrooms.js"></script>
@endsection
