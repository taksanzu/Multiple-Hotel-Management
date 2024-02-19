@extends('layout.layout')
@section('content')
    <div class="container-fluid shadow px-3 py-2 mb-2 bg-body rounded" style="background: white">
        <h6 class="text-primary mb-0">Cài đặt > Thông tin</h6>
    </div>
    <div class="container-fluid shadow py-3 bg-body rounded" style="background: white">
        <form id="settingForm" enctype="multipart/form-data" action="{{route('setting.store')}}" method="POST">
            @csrf
            <div class="row px-0">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Tên đơn vị: </label>
                        <input type="text" class="form-control" name="name" value="{{ optional($user->settings->where('name', 'name')->first())->value }}" id="value"/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại: </label>
                        <input type="text" class="form-control" name="phone" value="{{ optional($user->settings->where('name', 'phone')->first())->value }}" id="value"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="text" class="form-control" name="email" value="{{ optional($user->settings->where('name', 'email')->first())->value }}" id="value"/>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ: </label>
                        <input type="text" class="form-control" name="address" value="{{ optional($user->settings->where('name', 'address')->first())->value }}" id="value"/>
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" class="form-control" name="logo" id="logo"/>
                        @if($user->settings->where('name', 'logo')->first())
                            <img src="{{ asset('logo').'/'.optional($user->settings->where('name', 'logo')->first())->value }}" alt="" style="object-fit: contain; margin-top: 10px" width="200" height="100">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Facebook: </label>
                        <input type="text" class="form-control" name="facebook" value="{{ optional($user->settings->where('name', 'facebook')->first())->value }}" id="value"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Twitter: </label>
                        <input type="text" class="form-control" name="twitter" value="{{ optional($user->settings->where('name', 'twitter')->first())->value }}" id="value"/>
                    </div>
                    <div class="form-group">
                        <label for="address">Instagram: </label>
                        <input type="text" class="form-control" name="instagram" value="{{ optional($user->settings->where('name', 'instagram')->first())->value }}" id="value"/>
                    </div>
                    <div class="form-group">
                        <label for="address">Google map: </label>
                        <input type="text" class="form-control" name="googlemap" value="{{ optional($user->settings->where('name', 'googlemap')->first())->value }}" id="value"/>
                    </div>
                    <div class="form-group">
                        <label for="address">Giới thiệu 1: </label>
                        <input type="text" class="form-control" name="gioi_thieu_1" value="{{ optional($user->settings->where('name', 'gioi_thieu_1')->first())->value }}" id="value"/>
                    </div>
                    <div class="form-group">
                        <label for="address">Giới thiệu 2: </label>
                        <input type="text" class="form-control" name="gioi_thieu_2" value="{{ optional($user->settings->where('name', 'gioi_thieu_2')->first())->value }}" id="value"/>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary" id="settingSave">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
