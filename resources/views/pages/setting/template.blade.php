@extends("layout.layout")
@section('content')
    <div class="container-fluid shadow px-3 py-2 mb-2 bg-body rounded" style="background: white">
        <h6 class="text-primary mb-0">Mẫu</h6>
    </div>
    <div class="container-fluid shadow px-3 py-2 bg-body rounded" style="background: white">
        <div id="table_data">
            <div class="row text-center text-lg-start">
                <div class="col-md-3 position-relative">
                    <a href="#" class="d-block mb-3 position-relative">
                        <img class="img-fluid" src="/template/mau1.png" id="imageGallery">
                        <div class="overlay position-absolute top-50 start-50 translate-middle">
                            <a onclick="" class="btn btn-primary btn-sm text-light mx-2" data-bs-toggle="modal"
                               data-bs-target="#imagesShowModal"><i class="fa-solid fa-eye"></i></a>
                            <a onclick="changeTemplateMau1()" class="btn btn-success btn-sm text-light mx-2"><i
                                    class="fa-solid fa-check"></i></a>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 position-relative">
                    <a href="#" class="d-block mb-3 position-relative">
                        <img class="img-fluid" src="/template/mau2.png" id="imageGallery">
                        <div class="overlay position-absolute top-50 start-50 translate-middle">
                            <a onclick="" class="btn btn-primary btn-sm text-light mx-2" data-bs-toggle="modal"
                               data-bs-target="#imagesShowModal"><i class="fa-solid fa-eye"></i></a>
                            <a onclick="changeTemplateMau2()" class="btn btn-success btn-sm text-light mx-2"><i
                                    class="fa-solid fa-check"></i></a>
                        </div>
                    </a>
                </div>
            </div>
            <div class="pagination justify-content-end mt-4">
            </div>
        </div>
        <div class="pagination justify-content-end mt-4">
        </div>
    </div>
@endsection
@section('script')
    <script src="/script/changetemplate.js"></script>
@endsection
