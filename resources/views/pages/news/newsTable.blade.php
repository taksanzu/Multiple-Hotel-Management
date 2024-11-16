<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col" width="15%">Tên</th>
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
            <td>@if($new->status == 1)
                    <span class="badge rounded-pill bg-success">Đã đăng</span>
                @else
                    <span class="badge rounded-pill bg-warning text-dark">Chưa đăng</span>
                @endif</td>
            <td>{{ $new->created_at->format('d-m-Y')}}</td>
            <td>{{ $new->updated_at->format('d-m-Y')}}</td>
            <td>{{ $new->userCreated()->first()->name}}</td>
            <td>{{ $new->userUpdated()->first() != null ? $new->userUpdated()->first()->name : ''}}</td>
            <td>
                @if($new->status == 1)
                    <a type="button" class="btn btn-danger btn-sm text-light" onclick="postNews({{$new->id}}, {{$new->status}})"><i class="fa-solid fa-x fa-2xs"></i></a>
                @else
                    <a type="button" class="btn btn-success btn-sm text-light" onclick="postNews({{$new->id}}, {{$new->status}})"><i class="fa-solid fa-upload fa-2xs"></i></a>
                @endif
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
