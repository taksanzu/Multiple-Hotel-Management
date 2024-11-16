@extends('mainpages.mau1.layout.layout')
@section('content')
    <div class="main-header" @if($user->settings->where('name', 'image11')->first()) style="background: url('{{ asset('images'.'/'.$user->settings->where('name', 'image11')->first()->value) }}')" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Hình ảnh</h1>
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
    <div class="container p-3 images-main-gallery">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($images as $index => $image)
                <div class="col-lg-3">
                    <div class="card">
                        <div class="images-container">
                            <img src="/images/hotel/{{$image->name}}" class="card-img-top">
                            <a class="images-show-btn" data-bs-slide-to="{{ $index }}" data-bs-toggle="modal" data-bs-target="#imagesMainModal">
                                <div class="images-overlay">
                                    <i class="fas fa-search"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination justify-content-center my-5">
            {{ $images->links('pages.views.bootstrap-4') }}
        </div>
    </div>
    @include('mainpages.mau1.pages.hinhanh.modal')
@endsection
@section('script')
    <script src="/script/mainimages.js"></script>
@endsection
