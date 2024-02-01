@extends('mainpages.layout.layout')
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
    <div class="container news-main-section my-5">
        @foreach($news as $new)
            <div class="row">
                <div class="col-md-4">
                    <img src="/images/news/mainnews/{{$new->images}}" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="card p-3 h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{$new->title}}</h5>
                            <p class="card-text">{{$new->description}}
                            </p>
                            <a href="{{route('tintuc.detail', ['id' => $new->id])}}" class="btn btn-primary btn-lg rounded-pill border mt-md-5" style="background: #0b2046"><strong>Xem thêm</strong></a>
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
