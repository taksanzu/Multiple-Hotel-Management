$(document).ready(function () {
    const setActiveLink = function () {
        // Lấy URL hiện tại
        const currentUrl = window.location.pathname;

        // Tìm nav-link có href trùng với URL hiện tại
        const activeLink = $('.nav-link[href="' + currentUrl + '"]');

        // Thêm class "active" vào nav-link tìm được
        activeLink.addClass('active').removeClass('link-dark');

        // Xóa class "active" từ tất cả các nav-link
        $('.nav-link').removeClass('active').addClass('link-dark');

    };

    // Gọi hàm để thiết lập trạng thái active khi trang được tải
    setActiveLink();

    // Xử lý sự kiện click
    $('.nav-link').on('click', function () {
        // Lưu trạng thái active vào localStorage
        localStorage.setItem('activeLink', $(this).attr('href'));
    });

    // Gọi hàm để thiết lập trạng thái active khi trang được load lại
    const storedActiveLink = localStorage.getItem('activeLink');
    if (storedActiveLink) {
        $('.nav-link[href="' + storedActiveLink + '"]').addClass('active');
    }
});
