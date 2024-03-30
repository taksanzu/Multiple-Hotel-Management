<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Tên khách hàng</th>
        <th scope="col" >Số điện thoại</th>
        <th scope="col">Ngày nhận phòng</th>
        <th scope="col">Ngày trả phòng</th>
        <th scope="col">Loại phòng</th>
        <th scope="col">Trạng thái</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @forelse($bookings as $booking)
        <tr>
            <td class="text-start">{{ $booking->name }}</td>
            <td>{{ $booking->phone}}</td>
            <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $booking->checkin)->format('d/m/Y')}}</td>
            <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $booking->checkout)->format('d/m/Y')}}</td>
            <td>{{ optional($booking->room)->name}}</td>
            <td>
                @if($booking->status == 1)
                    <span class="badge rounded-pill bg-success">Đã xác nhận</span>
                @elseif($booking->status == 2)
                    <span class="badge rounded-pill bg-danger">Đã hủy</span>
                @else
                    <span class="badge rounded-pill bg-warning text-dark">Chưa xác nhận</span>
                @endif
            </td>
            <td>
                <a type="button" class="btn btn-primary btn-sm text-light" data-bs-toggle="modal" data-bs-target="#bookingAdminModal" onclick="getBookingId({{$booking->id}})" ><i class="fa-solid fa-eye fa-2xs"></i></a>
                <a type="button" class="btn btn-success btn-sm text-light" onclick="acceptBooking({{$booking->id}})" ><i class="fa-solid fa-check fa-2xs"></i></a>
                <a type="button" class="btn btn-danger btn-sm text-light" onclick="cancelBooking({{$booking->id}})"><i class="fa-solid fa-x fa-2xs"></i></a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7">Không có dữ liệu</td>
        </tr>
    @endforelse
    </tbody>
</table>
