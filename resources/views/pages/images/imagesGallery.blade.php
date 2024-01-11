<!-- Page Content -->
<div class="container">
    <div class="row text-center text-lg-start">
        @foreach($images as $image)
            <div class="col-lg-2 col-md-4 col-6">
                <a href="" class="d-block h-75">
                    <img class="img-thumbnail img-fluid" src="/images/hotel/{{$image->name}}" id="imageGallery">
                </a>
            </div>
        @endforeach
    </div>

</div>
