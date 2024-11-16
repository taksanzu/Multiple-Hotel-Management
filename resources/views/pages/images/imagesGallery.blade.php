<div class="row text-center text-lg-start">
    @forelse($images as $image)
        <div class="col-md-2 position-relative">
            <a href="#" class="d-block mb-3 position-relative">
                <img class="img-thumbnail img-fluid" src="/images/hotel/{{$image->name}}" id="imageGallery">
                <div class="overlay position-absolute top-50 start-50 translate-middle">
                    <a onclick="getImagesId('/images/hotel/{{$image->name}}')" class="btn btn-primary btn-sm text-light mx-2" data-bs-toggle="modal" data-bs-target="#imagesShowModal"><i class="fa-solid fa-eye"></i></a>
                    <a onclick="deleteImages({{$image->id}})" class="btn btn-danger btn-sm text-light mx-2"><i class="fa-solid fa-trash"></i></a>
                </div>
            </a>
        </div>
    @empty
        <div class="col-md-12">
            <p class="text-center">Không có dữ liệu</p>
        </div>
    @endforelse
</div>
<div class="pagination justify-content-end mt-4">
    {{ $images->links('pages.views.bootstrap-4') }}
</div>
