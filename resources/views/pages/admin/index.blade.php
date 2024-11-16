@extends('layout.layout')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Admin Dashboard</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Số lượng người dùng:</span>
                                        <span class="info-box-number" id="userCount">{{$usercount}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.user.bookingAdminModal')
@endsection
