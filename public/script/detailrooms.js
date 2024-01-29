var owl = $('.owl-carousel');
owl.owlCarousel({
    items:1,
    loop:true,
    margin:10,
    nav:true,
    autoHeight:true,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    lazyLoad:true,
    navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"]
});
