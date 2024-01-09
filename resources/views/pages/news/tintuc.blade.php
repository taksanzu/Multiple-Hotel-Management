@extends("layout.layout")
@section('content')
    <div class="container shadow p-3 mb-5 bg-body rounded" style="background: white">
        <h1>Tin Tức</h1>
    </div>
    <div class="container shadow p-3 mb-5 bg-body rounded" style="background: white">
        <a type="button" class="btn btn-primary my-2 w-25 text-light" data-bs-toggle="modal" data-bs-target="#newsModal">Thêm</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Tên</th>
                <th scope="col">Mô tả</th>
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
                    <td>{{ $new->title }}</td>
                    <td>{{ $new->description}}</td>
                    <td>@if($new->status == 1)
                            Đã đăng
                        @else
                            Chưa đăng
                        @endif</td>
                    <td>{{ $new->created_at}}</td>
                    <td>{{ $new->updated_at}}</td>
                    <td>{{ $new->userCreated()->first()->name}}</td>
                    <td>{{ $new->userUpdated()->first() != null ? $new->userUpdated()->first()->name : ''}}</td>
                    <td>
                        <a type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#newsModal" onclick="getNewsId({{$new->id}})"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a type="button" class="btn btn-danger text-light" onclick="deleteNews({{$new->id}})"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Không có dữ liệu</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        @include('pages.news.modal')
    </div>
@endsection
