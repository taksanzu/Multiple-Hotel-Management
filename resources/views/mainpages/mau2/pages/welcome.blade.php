@extends('mainpages.mau2.layout.layout')
@section('content')
    <section class="slide-home singlePage">
        <div class="boxedcontainer">
            <div class="slide-full-height">
                @if($user->settings->where('name', 'image1')->first())
                    <div>
                        <img src="{{ asset('images'.'/'.$user->settings->where('name', 'image1')->first()->value) }}">
                    </div>
                @else
                    <div>
                        <img src="uploads/3/slide/img-2.jpg">
                    </div>
                @endif
                @if($user->settings->where('name', 'image2')->first())
                    <div>
                        <img src="{{ asset('images'.'/'.$user->settings->where('name', 'image2')->first()->value) }}">
                    </div>
                @else
                    <div>
                        <img src="uploads/3/slide/img-3.jpg">
                    </div>
                @endif
            </div>
            <div class="overlay-background">

            </div>
        </div>
    </section>
    <section class="introduce-hotel">
        <div class="container">
            <h2>{{ optional($user->settings->where('name', 'name')->first())->value }}</h2>
            <p>{{ optional($user->settings->where('name', 'gioi_thieu_1')->first())->value }}</p>
        </div>
    </section>
    <section class="section-advertising br-gray">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 title-section">
                    <h2 class="text-center">PHÒNG NGHỈ</h2>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12 advertising">
                    <div class="advertising-content">
                        @if($user->settings->where('name', 'image4')->first())
                            <img
                                src="{{ asset('images'.'/'.$user->settings->where('name', 'image4')->first()->value) }}">
                        @else
                            <img src="uploads/3/img-1.jpg">
                        @endif
                    </div>
                    <div class="advertising-content">
                        @if($user->settings->where('name', 'image5')->first())
                            <img
                                src="{{ asset('images'.'/'.$user->settings->where('name', 'image5')->first()->value) }}">
                        @else
                            <img src="uploads/3/img-1-1.jpg">
                        @endif
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    @foreach($user->rooms->where('deleted',0)->where('status', 1)->take(4) as $room)
                    <div class="show-room-home">
                        <div class="wrapper-room-home">
                            <div class="col-sm-4 col-xs-12 show-img">
                                <a class="mouseover-img fancybox-thumbs-2" data-fancybox-group="thumb"
                                   href="images/rooms/{{$room->roomImages()->first()->name}}">
                                    <img src="images/rooms/{{$room->roomImages()->first()->name}}"
                                         alt="EXECUTIVE SUITE ROOM">
                                </a>
                            </div>
                            <div class="col-sm-8 col-xs-12 content-room-home">
                                <div class="row">
                                    <div class="content-room-left title-content">
                                        <h3>
                                            <a href="{{route('loaiphong.detail', ['id' => $room->id, 'slug' => $room->slug])}}">{{ $room->name }}</a>
                                        </h3>
                                    </div>
                                    <div class="col-sm-8 col-xs-12 content-room-left">
                                        <div class="content-room">
                                            {!! $room->description !!}
                                        </div>
                                        <br>
                                        <br>
                                        <a class="btn bottom"
                                           href="{{route('loaiphong.detail', ['id' => $room->id, 'slug' => $room->slug])}}">LEARN
                                            MORE</a>
                                    </div>
                                    <div class="col-sm-4 col-xs-12 content-room-right">
                                        <div class="room-price-info">
                                            <p class="price">{{ number_format($room->price) }} VNĐ</p>
                                            <a class="btn btn-normal btn-booking-detail room-listing" data-id="112"
                                               data-toggle="modal" data-target="#continueBooking">
                                                <span>Book Now</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="terminal"
             @if($user->settings->where('name', 'image6')->first()) style="background: url('{{ asset('images').'/'.optional($user->settings->where('name', 'image6')->first())->value }}') no-repeat; background-size: cover" @endif">
    <div class="overlay-color"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12 title-section">
                <h2 class="text-center">Đa dạng ẩm thực</h2>
            </div>
            <div class="col-sm-12 col-xs-12">
                <div class="slides-detail" style="width: 50%; margin: 0 auto; text-align: center;">
                    @for($i = 7; $i <= 10; $i++)
                        @if ($user->settings->where('name', 'image'.$i)->first())
                            <div>
                                <img
                                    src="{{ asset('images'.'/'.$user->settings->where('name', 'image'.$i)->first()->value) }}"
                                    alt="SPA"/>
                            </div>
                        @else
                            <div>
                                <img src="uploads/3/spa/vmcl0988.jpg" alt="SPA"/>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>
    </section>
    <section class="event br-gray">
        <div class="container">
            <div class="row multicol">
                @foreach($user->news->where('type', 1)->where('deleted',0)->where('status', 1)->take(2) as $new)
                    <div class="col-md-4 col-sm-12 col-xs-12 three-col">
                        <div class="multicol-image">
                            <a href="{{route('tintuc.detail', ['id' => $new->id, 'slug'=> $new->slug])}}">
                                <img src="/images/news/mainnews/{{$new->images}}" alt="SPA">
                            </a>
                        </div>
                        <div class="multicol-content">
                            <div class="multicol-title text-center">
                                <h3>{{$new->title}}</h3>
                                <p></p>
                                <p>{{$new->description}}</p>
                                <p></p>
                            </div>
                            <div class="multicol-action text-center">
                                <div class="book-now">
                                    <a href="{{route('tintuc.detail', ['id' => $new->id, 'slug'=> $new->slug])}}"
                                       class="btn btn-normal">
                                        <span>LEARN MORE</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
