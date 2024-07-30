@extends('mainpages.mau1.layout.layout')
@section('content')
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Tiện ích</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container news-contents py-5">
        <h1 class="text-center">{{$service->title}}</h1>
        <div class="d-flex flex-column align-items-center py-5">
            {!! $service->contents !!}
        </div>
    </div>
@endsection
