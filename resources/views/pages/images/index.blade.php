@extends("layout.layout")
@section('content')
    <div class="container-fluid shadow px-3 py-2 mb-2 bg-body rounded" style="background: white">
        <h6 class="text-primary mb-0">Tin tức > Hình ảnh</h6>
    </div>
    <div class="container-fluid shadow px-3 py-2 bg-body rounded" style="background: white">
        <div class="d-flex flex-row justify-content-between">
            <a type="button" class="btn btn-primary my-2 btn-sm text-light" data-bs-toggle="modal" data-bs-target="#imagesModal">Thêm</a>
        </div>
        <div id="table_data">
            @include('pages.images.imagesGallery')
        </div>
        <div class="pagination justify-content-end mt-4">
        </div>
    </div>
    @include('pages.images.modal')
    @include('pages.images.showmodal')
@endsection
@section('script')
    <script src="script/images.js"></script>
@endsection
