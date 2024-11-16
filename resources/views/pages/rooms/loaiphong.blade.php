@extends("layout.layout")
@section('content')
    <div class="container-fluid shadow px-3 py-2 mb-2 bg-body rounded" style="background: white">
        <h6 class="text-primary mb-0">Loại phòng</h6>
    </div>
    <div class="container-fluid shadow px-3 py-2 bg-body rounded" style="background: white">
        <div class="d-flex flex-row justify-content-between">
            <a type="button" class="btn btn-primary my-2 btn-sm text-light" data-bs-toggle="modal" data-bs-target="#roomsModal">Thêm</a>
            <form class="input-group input-group-sm w-25 justify-content-end my-2" action="{{route('rooms.search')}}" method="GET">
                <input type="text" name="search" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Tìm kiếm">
                <button class="btn btn-primary btn-sm" id="inputGroup-sizing-sm" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div id="table_data">
            @include('pages.rooms.roomsTable')
        </div>
        <div class="pagination justify-content-end mt-4">
            {{ $rooms->links('pages.views.bootstrap-4') }}
        </div>
    </div>
    @include('pages.rooms.modal')
@endsection
@section('script')
    <script src="script/rooms.js"></script>
@endsection
