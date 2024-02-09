@extends('layout.layout')
@section('content')
    <div class="container-fluid shadow px-3 py-2 mb-2 bg-body rounded" style="background: white">
        <h6 class="text-primary mb-0">Cài đặt</h6>
    </div>
    <div class="container-fluid shadow px-3 py-2 bg-body rounded" style="background: white">
        <form id="settingForm" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <label for="name">Tên chức năng: </label>
                <select type="text" class="form-control" name="name" id="name"/>
                    <option value="1">Chức năng 1</option>
                    <option value="2">Chức năng 2</option>
                    <option value="3">Chức năng 3</option>
                </select>
            </div>
            <div class="modal-body">
                <label for="email">Mô tả: </label>
                <input type="text" class="form-control" name="" id="" disabled/>
            </div>
            <div class="modal-body">
                <label for="phone">Thông tin: </label>
                <input type="text" class="form-control" name="" id=""/>
            </div>
            <div class="modal-footer mt-3">
                <button type="submit" class="btn btn-primary" id="settingSave">Save</button>
            </div>
        </form>
    </div>
@endsection
