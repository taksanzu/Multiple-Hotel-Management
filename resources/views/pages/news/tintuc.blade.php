@extends("layout.layout")
@section('content')
    <div class="container-fluid shadow px-3 py-2 mb-2 bg-body rounded" style="background: white">
        <h6 class="text-primary mb-0">Tin Tức > @if($type == 0)
                Dịch vụ
            @elseif($type == 1)
                Tin tức & khuyến mãi
        @endif</h6>
    </div>
    <div class="container-fluid shadow px-3 py-2 bg-body rounded" style="background: white">
        <div class="d-flex flex-row justify-content-between">
            <a type="button" class="btn btn-primary my-2 btn-sm text-light" data-bs-toggle="modal" data-bs-target="#newsModal">Thêm</a>
            <form class="input-group input-group-sm w-25 justify-content-end my-2" action="{{route('news.search')}}" method="GET">
                <input type="text" name="search" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Tìm kiếm">
                <button type="submit" class="btn btn-primary btn-sm" id="inputGroup-sizing-sm"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div id="table_data">
            @include('pages.news.newsTable')
        </div>
        <div class="pagination justify-content-end mt-4">
            {{ $news->links('pages.views.bootstrap-4') }}
        </div>
        @include('pages.news.modal')
    </div>
@endsection
@section('script')
    <script src="script/news.js"></script>
@endsection
