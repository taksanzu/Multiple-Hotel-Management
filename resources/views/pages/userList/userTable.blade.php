<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Tên nguời dùng</th>
        <th scope="col" >Số điện thoại</th>
        <th scope="col">Ngày tạo</th>
        <th scope="col">Ngày sửa</th>
        <th scope="col">Quyền</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Domain</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @forelse($userLists as $userList)
        <tr>
            <td class="text-start">{{ $userList->name }}</td>
            <td>{{ $userList->phone}}</td>
            <td>{{ $userList->created_at->format('d-m-Y')}}</td>
            <td>{{ $userList->updated_at->format('d-m-Y')}}</td>
            <td>
                @if($userList->roles == 0)
                    <span class="badge rounded-pill bg-primary ">Admin</span>
                @else
                    <span class="badge rounded-pill bg-secondary">Khách hàng</span>
                @endif
            </td>
            <td>
                @if($userList->status == 0)
                    <span class="badge rounded-pill bg-success">Đang kích hoạt</span>
                @else
                    <span class="badge rounded-pill bg-danger">Hủy kích hoạt</span>
                @endif
            </td>
            <td>{{ $userList->domain }}</td>
            <td>
                <a type="button" class="btn btn-primary btn-sm text-light" data-bs-toggle="modal" data-bs-target="#userAdminModal" onclick="getUserId({{$userList->id}})" ><i class="fa-solid fa-pen-to-square fa fa-2xs"></i></a>
                <a type="button" class="btn btn-danger btn-sm text-light " onclick="deleteUser({{$userList->id}})"><i class="fa-solid fa-trash fa-2xs"></i></a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7">Không có dữ liệu</td>
        </tr>
    @endforelse
    </tbody>
</table>
