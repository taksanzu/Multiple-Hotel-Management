@extends('layout.layout')
@section('content')
    <div class="container-fluid shadow px-3 py-2 mb-2 bg-body rounded" style="background: white">
        <h6 class="text-primary mb-0">Cài đặt > Thông tin</h6>
    </div>
    <div class="container-fluid shadow px-3 py-2 bg-body rounded" style="background: white">
        <form id="settingForm" enctype="multipart/form-data" action="{{route('setting.store')}}" method="POST">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="modal-body">
                <label for="name">Tên chức năng: </label>
                <select type="text" class="form-control" name="name" id="name"/>
                    <option value="Địa chỉ">Địa chỉ</option>
                    <option value="Số điện thoại">Số điện thoại</option>
                    <option value="Email">Email</option>
                </select>
            </div>
            <div class="modal-body">
                <label for="email">Mô tả: </label>
                <input type="text" class="form-control" name="description" id="description" disabled/>
            </div>
            <div class="modal-body">
                <label for="phone">Thông tin: </label>
                <input type="text" class="form-control" name="value" id="value"/>
            </div>
            <div class="modal-footer mt-3">
                <button type="submit" class="btn btn-primary" id="settingSave">Save</button>
            </div>
        </form>
    </div>
@endsection
