<div class="modal fade" id="imagesMainModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content images-modal-contents">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <!-- Carousel -->
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($user->images as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" style="background-image: url('/images/hotel/{{$image->name}}');
                            background-size: cover;
                            background-position: center;
                            height: 70vh">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="z-index: auto">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #0b2046"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" style="z-index: auto">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #0b2046"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- End Carousel -->
            </div>
        </div>
    </div>
</div>
