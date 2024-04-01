@extends('layout.layout')
@section('content')
    <div class="container-fluid shadow px-3 py-2 mb-2 bg-body rounded" style="background: white">
        <h6 class="text-primary mb-0">Cài đặt > Hình ảnh</h6>
    </div>
    <div class="container-fluid shadow px-3 py-3 bg-body rounded" style="background: white">
        <form id="settingForm" enctype="multipart/form-data" action="{{route('settingImage.store')}}" method="POST">
            @csrf
            <div class="row px-0">
                <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label>Logo</label>
                        <input type="file" class="form-control" name="logo" id="logo"/>
                        @if($user->settings->where('name', 'logo')->first())
                            <img src="{{ asset('logo').'/'.optional($user->settings->where('name', 'logo')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @else
                            <img src="{{ asset('logo/placeholder.png') }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label>Ảnh slide 1</label>
                        <input type="file" class="form-control" name="image1" id="logo"/>
                        @if($user->settings->where('name', 'image1')->first())
                            <img src="{{ asset('images').'/'.optional($user->settings->where('name', 'image1')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @else
                            <img src="{{ asset('upload/slide1.jpg') }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label>Ảnh slide 2</label>
                        <input type="file" class="form-control" name="image2" id="logo"/>
                        @if($user->settings->where('name', 'image2')->first())
                            <img src="{{ asset('images').'/'.optional($user->settings->where('name', 'image2')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @else
                            <img src="{{ asset('upload/slide2.jpg') }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label>Ảnh giới thiệu</label>
                        <input type="file" class="form-control" name="image3" id="logo"/>
                        @if($user->settings->where('name', 'image3')->first())
                            <img src="{{ asset('images').'/'.optional($user->settings->where('name', 'image3')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @else
                            <img src="{{ asset('upload/beach.jpg') }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @endif
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label>Ảnh tiện ích 1</label>
                        <input type="file" class="form-control" name="image4" id="logo"/>
                        @if($user->settings->where('name', 'image4')->first())
                            <img src="{{ asset('images').'/'.optional($user->settings->where('name', 'image4')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @else
                            <img src="{{ asset('upload/room.jpg') }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label>Ảnh tiện ích 2</label>
                        <input type="file" class="form-control" name="image5" id="logo"/>
                        @if($user->settings->where('name', 'image5')->first())
                            <img src="{{ asset('images').'/'.optional($user->settings->where('name', 'image5')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @else
                            <img src="{{ asset('upload/room2.jpg') }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label>Ảnh nền món ăn</label>
                        <input type="file" class="form-control" name="image6" id="logo"/>
                        @if($user->settings->where('name', 'image6')->first())
                            <img src="{{ asset('images').'/'.optional($user->settings->where('name', 'image6')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @else
                            <img src="{{ asset('upload/dish.jpg') }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label>Ảnh món ăn 1</label>
                        <input type="file" class="form-control" name="image7" id="logo"/>
                        @if($user->settings->where('name', 'image7')->first())
                            <img src="{{ asset('images').'/'.optional($user->settings->where('name', 'image7')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @else
                            <img src="{{ asset('upload/dishes.jpg') }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mb-3">
                        <label>Ảnh món ăn 2</label>
                        <input type="file" class="form-control" name="image8" id="logo"/>
                        @if($user->settings->where('name', 'image8')->first())
                            <img src="{{ asset('images').'/'.optional($user->settings->where('name', 'image8')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @else
                            <img src="{{ asset('upload/dishes.jpg') }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label>Ảnh món ăn 3</label>
                        <input type="file" class="form-control" name="image9" id="logo"/>
                        @if($user->settings->where('name', 'image9')->first())
                            <img src="{{ asset('images').'/'.optional($user->settings->where('name', 'image9')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @else
                            <img src="{{ asset('upload/dishes.jpg') }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label>Ảnh món ăn 4</label>
                        <input type="file" class="form-control" name="image10" id="logo"/>
                        @if($user->settings->where('name', 'image10')->first())
                            <img src="{{ asset('images').'/'.optional($user->settings->where('name', 'image11')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @else
                            <img src="{{ asset('upload/dishes.jpg') }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label>Ảnh bìa</label>
                        <input type="file" class="form-control" name="image11" id="logo"/>
                        @if($user->settings->where('name', 'image11')->first())
                            <img src="{{ asset('images').'/'.optional($user->settings->where('name', 'image11')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @else
                            <img src="{{ asset('upload/room3.jpg') }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @endif
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary" id="settingSave">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
