$(document).ready(function(){
    $('.images-show-btn').click(function(){
        var slideIndex = $(this).data('bs-slide-to');
        $('#carouselExample').carousel(slideIndex);
    });
});
