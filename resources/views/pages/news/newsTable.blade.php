<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col" width="15%">Tên</th>
        <th scope="col" width="20%">Mô tả</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Ngày tạo</th>
        <th scope="col">Ngày sửa</th>
        <th scope="col">Người tạo</th>
        <th scope="col">Người sửa</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @forelse($news as $new)
        <tr>
            <td class="text-start" width="15%">{{ $new->title }}</td>
            <td width="20%">{{ $new->description}}</td>
            <td>@if($new->status == 1)
                    Đã đăng
                @else
                    Chưa đăng
                @endif</td>
            <td>{{ $new->created_at->format('d-m-Y')}}</td>
            <td>{{ $new->updated_at->format('d-m-Y')}}</td>
            <td>{{ $new->userCreated()->first()->name}}</td>
            <td>{{ $new->userUpdated()->first() != null ? $new->userUpdated()->first()->name : ''}}</td>
            <td>
                <a type="button" class="btn btn-primary btn-sm text-light " data-bs-toggle="modal" data-bs-target="#newsModal" onclick="getNewsId({{$new->id}})"><i class="fa-solid fa-pen-to-square fa-2xs"></i></a>
                <a type="button" class="btn btn-danger btn-sm text-light " onclick="deleteNews({{$new->id}})"><i class="fa-solid fa-trash fa-2xs"></i></a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7">Không có dữ liệu</td>
        </tr>
    @endforelse
    </tbody>
</table>
