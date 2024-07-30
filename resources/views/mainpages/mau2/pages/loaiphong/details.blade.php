@extends('mainpages.mau2.layout.layout')
@section('content')
    <section class="slide-home singlePage">
        <div class="boxedcontainer">
            <div class="slide-detail">
                <div>
                    <img src="{{asset('uploads/3/executive-fam/40.jpg')}}">
                </div>
            </div>
            <div class="overlay-background">
            </div>
        </div>
    </section>

    <section class="section-title">
        <div class="container">
            <h2 class="text-center">{{$rooms->name}}</h2>
            <div class="priceAndTax">
                <span class="price">{{ number_format($rooms->price) }} VNĐ</span>
            </div>
        </div>
    </section>
    <section class="wrap-section-content br-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-7 col-xs-12 content-singlePage">
                    {!! $rooms->description !!}
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
                                <div class="row mb-3">
                                    @foreach($service_category->services as $service)
                                        @if(optional($service->service_user->where('room_id', $rooms->id)->first())->status == 1)
                                            <div class="col-xs-6 col-sm-4 col-md-3">
                                                <div class="d-flex gap-2 align-items-center">
                                                    <img src="{{ asset('service').'/'.$service->image }}" alt="" style="width: 20px; height: 20px;">
                                                    <p class="mb-0">{{ $service->name }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach

                </div>
                <div class="col-md-4 col-sm-5 col-xs-12">

                    <form  id="booking-form-single" class="booking-form-detail" >
                        <div class="booking-form-row">
                            <span class="open-checkIn">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <input id="date-checkin" placeholder="Check In" value="">
                        </div>

                        <div class="booking-form-row">
                            <span class="open-checkOut">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <input id="date-checkout" placeholder="Check Out" value="">
                        </div>
                        <div class="text-center">
                            <a class="btn btn-normal btn-booking-detail" data-id="117" numberroom="1" data-toggle="modal" data-target="#continueBooking" id="btn-booking-detail">
                                <span>Book Now</span>
                            </a>
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="fancy-box">
                        <div class="imglist-thumb">
                            @foreach($images as $image)
                                <a class="fancybox-thumbs" data-fancybox-group="thumb" href="/images/rooms/{{$image->name}}">
                                    <img src="/images/rooms/{{$image->name}}" alt="" />
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
