@extends('mainpages.mau2.layout.layout')
@section('content')
    <section class="image-singlePage" style="background-image: url('uploads/1/contact/88.jpg')">
    </section>
    <section class="introduce-hotel">
        <div class="container">
            <h2>Hình ảnh</h2>
        </div>
    </section>
    <section class="singlePage">
        <div class="main-wrap">
            <div class="wrap-section-content br-gray">
                <div class="container">
                    <div class="navigation-row row">
                            <div role="tabpanel" class="tab-pane  active " id="4">
                                <div class="fancy-box">
                                    <div class="imglist">
                                        @foreach($images as $image)
                                            <a class="fancybox-thumbs-2" data-fancybox-group="thumb" href="/images/hotel/{{$image->name}}">
                                                <img src="/images/hotel/{{$image->name}}" alt="" />
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
