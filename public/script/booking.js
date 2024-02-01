$(document).ready(function () {
    $('#bookingForm').submit(function (e) {
        e.preventDefault(); // Ngăn chặn form submit mặc định

        // Gửi yêu cầu AJAX đến server
        $.ajax({
            url: '/booking', // Đặt URL tương ứng với route Laravel của bạn
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                // Xử lý phản hồi từ server nếu cần
                console.log(response);

                // Sau khi xử lý, bạn có thể thực hiện reset trang
                window.location.reload();
            },
            error: function (error) {
                console.error('Error submitting booking: ', error);
            }
        });
    });
});
