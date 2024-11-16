@extends('mainpages.mau1.layout.layout')
@section('content')
    <div class="main-header" @if($user->settings->where('name', 'image11')->first()) style="background: url('{{ asset('images'.'/'.$user->settings->where('name', 'image11')->first()->value) }}')" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Tin tức & khuyến mãi</h1>
                    <div class="d-lg-flex justify-content-center" style="gap:5px">
                        <a style="background: #0b2046" class="btn btn-primary btn-lg rounded-pill border mb-2 mb-lg-0" type="button" href="{{route('loaiphong.index')}}"><strong>BOOK NOW</strong></a>
                        <div class="d-flex flex-row justify-content-center d-md-block d-none" style="gap:5px">
                            <a data-bs-toggle="modal" data-bs-target="#videoModal" data-youtube-link="{{optional($user->settings->where('name', 'youtube')->first())->value}}" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                            <a data-bs-toggle="modal" data-bs-target="#webModal" data-web-link="{{optional($user->settings->where('name', 'linkweb')->first())->value}}" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                        </div>
                        <div class="d-flex flex-row justify-content-center d-block d-md-none" style="gap:5px">
                            <a href="{{optional($user->settings->where('name', 'youtube')->first())->value}}" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                            <a href="{{optional($user->settings->where('name', 'linkweb')->first())->value}}" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container news-main-section my-5">
        @foreach($news as $new)
            <div class="row">
                <div class="col-md-4">
                    <div class="rooms-img-section">
                        <img src="/images/news/mainnews/{{$new->images}}" class="img-fluid">
                        <div class="rooms-btn-overlay d-md-block d-none">
                            @if($new->videolink)
                                <a data-bs-toggle="modal" data-bs-target="#videoModal" data-youtube-link="{{$new->videolink}}" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                            @endif
                            @if($new->link360)
                                <a data-bs-toggle="modal" data-bs-target="#webModal" data-web-link="{{$new->link360}}" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                            @endif
                        </div>
                        <div class="rooms-btn-overlay d-md-none d-block">
                            @if($new->videolink)
                                <a href="{{$new->videolink}}" class="btn btn-danger btn-lg rounded-circle"><i class="fa-brands fa-youtube fa-xs"></i></a>
                            @endif
                            @if($new->link360)
                                <a href="{{$new->link360}}" class="btn btn-primary btn-lg rounded-circle p-2"><label class="fs-5">360</label></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card p-3 h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{$new->title}}</h5>
                            <p class="card-text">{{$new->description}}
                            </p>
                            <a href="{{route('tintuc.detail', ['id' => $new->id, 'slug'=> $new->slug])}}" class="btn btn-primary btn-lg rounded-pill border mt-md-5" style="background: #0b2046"><strong>Xem thêm</strong></a>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mb-5">
        @endforeach
            <div class="pagination justify-content-center my-5">
                {{ $news->links('pages.views.bootstrap-4') }}
            </div>
    </div>
@endsection
