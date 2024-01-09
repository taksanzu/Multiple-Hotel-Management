@extends("layout.layout")
@section('content')
    <h1>Loại phòng</h1>
    <a type="button" class="btn btn-primary my-2 w-25 text-light" data-bs-toggle="modal" data-bs-target="#roomsModal">Thêm</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Tên</th>
            <th scope="col">Số sao</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Số phòng</th>
            <th scope="col">Trạng thái</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>@for($x = 0; $x < $room->stars; $x++)
                        <i class="fa-solid fa-star text-warning"></i>
                @endfor</td>
                <td>{{ $room->description}}</td>
                <td>{{ $room->number_of_rooms}}</td>
                <td>{{ $room->status}}
                <td>
                    <a type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#roomsModal" onclick="getRoomsId({{$room->id}})"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a type="button" class="btn btn-danger text-light" onclick="deleteRooms({{$room->id}})"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Không có dữ liệu</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    @include('pages.rooms.modal')
@endsection
