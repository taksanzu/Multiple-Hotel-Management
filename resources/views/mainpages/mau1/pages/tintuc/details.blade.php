@extends('mainpages.mau1.layout.layout')
@section('content')
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Tin tức & khuyến mãi</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5 news-contents">
        <h1 class="text-center">{{$news->title}}</h1>
        <div class="d-flex flex-column align-items-center py-5">
            {!! $news->contents !!}
        </div>
    </div>
    <style>
        .news-contents img {
            width: 100%;
            height: auto;
        }
    </style>
@endsection
