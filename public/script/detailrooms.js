var owl = $('.owl-carousel');
owl.owlCarousel({
    items: 1,
    loop: true,
    margin: 10,
    nav: true,
    autoHeight: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    lazyLoad: true,
    navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
    dots: true,
    onInitialized: customDots // Hàm callback được gọi khi carousel được khởi tạo
});

// Hàm callback để tạo ảnh nhỏ cho từng dot
function customDots(event) {
    var dotsContainer = this.$element.find('.owl-dots');
    dotsContainer.addClass('d-flex flex-row gap-3 justify-content-center align-items-center');

    function setDotImage(index) {
        var imgSrc = owl.trigger('to.owl.carousel', index).find('.owl-item.active img').attr('src');
        var dotImage = $('<img>').attr('src', imgSrc).addClass('owl-dot-image');
        dotImage.appendTo(dotsContainer.find('.owl-dot').eq(index).empty());

        // Thêm sự kiện click cho từng ảnh nhỏ
        dotImage.on('click', function(){
            // Chuyển đến ảnh trước đó thay vì ảnh tiếp theo
            owl.trigger('to.owl.carousel', index - 1);
        });
    }

    this.$element.find('.owl-item').each(function(index) {
        setTimeout(function() {
            setDotImage(index);
        }, 0);
    });
}



