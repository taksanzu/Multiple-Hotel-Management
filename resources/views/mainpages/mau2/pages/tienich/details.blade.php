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
    <div class="container news-contents" style="padding-top: 3rem; padding-bottom: 3rem;">
        <h1 class="text-center">{{$service->title}}</h1>
        <div class="row" style="padding-top: 3rem; padding-bottom: 3rem;">
            <div class="col-xs-12 text-center">
                {!! $service->contents !!}
            </div>
        </div>
    </div>
@endsection
