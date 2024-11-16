<table class="table table-bordered ">
    <thead>
    <tr>
        <th scope="col" class="w-25">Tên</th>
        <th scope="col">Số sao</th>
        <th scope="col">Số phòng</th>
        <th scope="col">Người tạo</th>
        <th scope="col">Ngày tạo</th>
        <th scope="col">Ngày sửa</th>
        <th scope="col">Trạng thái</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @forelse($rooms as $room)
        <tr>
            <td class="w-25 text-start" >{{ $room->name }}</td>
            <td >@for($x = 0; $x < $room->stars; $x++)
                    <i class="fa-solid fa-star text-warning"></i>
                @endfor</td>
            <td>{{ $room->number_of_rooms}}</td>
            <td>{{ $room->userCreated()->first()->name}}</td>
            <td>{{ $room->created_at->format('d-m-Y')}}</td>
            <td>{{ $room->updated_at->format('d-m-Y')}}</td>
            <td>@if($room->status == 1)
                    <span class="badge rounded-pill bg-success">Đã đăng</span>
                @else
                    <span class="badge rounded-pill bg-warning text-dark">Chưa đăng</span>
                @endif</td>
            <td>
                @if($room->status == 1)
                    <a type="button" class="btn btn-danger btn-sm text-light" onclick="postRooms({{$room->id}}, {{$room->status}})"><i class="fa-solid fa-x fa-2xs"></i></a>
                @else
                    <a type="button" class="btn btn-success btn-sm text-light" onclick="postRooms({{$room->id}}, {{$room->status}})"><i class="fa-solid fa-upload fa-2xs"></i></a>
                @endif
                <a type="button" class="btn btn-primary btn-sm text-light" data-bs-toggle="modal" data-bs-target="#roomsModal" onclick="getRoomsId({{$room->id}})"><i class="fa-solid fa-pen-to-square fa-2xs"></i></a>
                <a type="button" class="btn btn-danger btn-sm text-light" onclick="deleteRooms({{$room->id}})"><i class="fa-solid fa-trash fa-2xs"></i></a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7">Không có dữ liệu</td>
        </tr>
    @endforelse
    </tbody>
</table>

