@extends('mainpages.layout.layout')
@section('content')
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Hình ảnh</h1>
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
    @include('mainpages.pages.hinhanh.modal')
@endsection
@section('script')
    <script src="/script/mainimages.js"></script>
@endsection
