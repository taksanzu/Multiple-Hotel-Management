@extends('mainpages.mau2.layout.layout')
@section('content')
    <section class="image-singlePage" style="background-image: url('uploads/1/contact/88.jpg')">
    </section>

    <section class="introduce-hotel">
        <div class="container">
            <h2>Phòng nghỉ</h2>
        </div>
    </section>
    <section class="singlePage singlePage_slide">
        <div class="main-wrap">
            <div class="wrap-section-content br-black">
                <div class="container">
                    <div class="row multicol">
                        @foreach($rooms as $room)
                            <div class="col-md-6 col-sm-6 col-xs-12 col">
                                <div class="multicol-image">
                                    <img src="/images/rooms/{{ $room->roomImages->take(1)->first()->name }}" alt="DELUXE DOUBLE/TWIN ROOM">
                                </div>
                                <div class="multicol-content multicol-contentDetail">
                                    <div class="multicol-title text-center title-detail restaurant">
                                        <h3>
                                            <a href="{{route('loaiphong.detail', ['id' => $room->id, 'slug' => $room->slug])}}">{{ $room->name }}</a>
                                        </h3>
                                    </div>
                                    <div class="multicol-action text-center multicol-actionDetail">
                                        <div class="priceAndTax">
                                            <h3 class="price" style="color: red; font-weight: bold">{{ number_format($room->price) }} VNĐ</h3>
                                        </div>
                                        <div class="row">
                                            <div class="reditect col-md-6 col-sm-12 col-xs-12">
                                                <a href="{{route('loaiphong.detail', ['id' => $room->id, 'slug' => $room->slug])}}">
                                                    <span>LEARN MORE</span>
                                                </a>
                                            </div>
                                            <div class="book-now col-md-6 col-sm-12 col-xs-12">
                                                <a href="#" class="btn btn-normal btn-booking-detail room-listing" data-id="104" numberroom="1" data-toggle="modal" data-target="#continueBooking">
                                                    <span>Book Now</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
