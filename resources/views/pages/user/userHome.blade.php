@extends('layout.layout')
@section('content')
    <div class="container-fluid shadow px-3 py-2 mb-2 bg-body rounded" style="background: white">
        <h6 class="text-primary mb-0">Trang chủ</h6>
    </div>
    <div class="container-fluid shadow px-3 py-2 bg-body rounded" style="background: white">
        <div class="d-flex flex-row justify-content-between">
            <form class="input-group input-group-sm w-25 justify-content-end my-2">
                <input type="text" name="search" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Tìm kiếm">
                <button type="submit" class="btn btn-primary btn-sm" id="inputGroup-sizing-sm"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div id="table_data">
            @include('pages.user.bookingTable')
        </div>
        <div class="pagination justify-content-end mt-4">
            {{ $bookings->links('pages.views.bootstrap-4') }}
        </div>
    </div>
    @include('pages.user.bookingAdminModal')
@endsection
@section('script')
    <script src="script/bookingAdmin.js"></script>
@endsection
