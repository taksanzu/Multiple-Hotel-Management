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
    $('#checkinsource').on('input', function () {
        var checkin = $(this).val();
        $('#checkin').val(checkin);
    });
    $('#checkoutsource').on('input', function () {
        var checkout = $(this).val();
        $('#checkout').val(checkout);
    });
    $('#phonesource').on('input', function () {
        var phone = $(this).val();
        $('#phone').val(phone);
    });
    $('#bookingbtn').on('click', function () {
        $('#checkinsource').trigger('input');
        $('#checkoutsource').trigger('input');
        $('#phonesource').trigger('input');
    });
});


