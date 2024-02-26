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

    $('#bookingForm').validate({
        rules: {
            name: 'required',
            phone: 'required',
            email: {
                required: true,
                email: true
            },
            checkin: {
                required: true,
                validDate: true,
                afterToday: true
            },
            checkout: {
                required: true,
                validDate: true,
                afterCheckin: true,
                afterToday: true
            },
            number_of_adults: 'required',
            number_of_children: 'required',
            number_of_rooms: 'required',
            roomType: 'required'
        },
        messages: {
            name: 'Vui lòng nhập họ và tên',
            phone: 'Vui lòng nhập số điện thoại',
            email: {
                required: 'Vui lòng nhập địa chỉ email',
                email: 'Địa chỉ email không hợp lệ'
            },
            checkin: {
                required: 'Vui lòng chọn ngày đến',
                date: 'Vui lòng nhập ngày hợp lệ',
                validDate: 'Vui lòng nhập ngày hợp lệ theo định dạng dd/mm/yy',
                minDate: 'Ngày đến phải sau ngày hiện tại'
            },
            checkout: {
                required: 'Vui lòng chọn ngày trả phòng',
                date: 'Vui lòng nhập ngày hợp lệ',
                validDate: 'Vui lòng nhập ngày hợp lệ theo định dạng dd/mm/yy',
                greaterThanCheckin: 'Ngày trả phòng phải sau ngày đến'
            },
            number_of_adults: 'Vui lòng nhập số người lớn',
            number_of_children: 'Vui lòng nhập số trẻ em',
            number_of_rooms: 'Vui lòng nhập số lượng phòng',
            roomType: 'Vui lòng chọn loại phòng'
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid').addClass(validClass);
        }
    });

    $.validator.addMethod("validDate", function(value, element) {
        var date = parseDate(value, 'dd/mm/yyyy');
        return !isNaN(date.getTime());
    }, "Ngày không hợp lệ");

    $.validator.addMethod("afterToday", function(value, element) {
        var today = new Date();
        today.setHours(0, 0, 0, 0);
        var selectedDate = parseDate(value, 'dd/mm/yyyy');
        return selectedDate > today;
    }, "Ngày phải sau ngày hiện tại");

    $.validator.addMethod("afterCheckin", function(value, element) {
        var checkinDate = parseDate($('#checkin').val(), 'dd/mm/yyyy');
        var selectedDate = parseDate(value, 'dd/mm/yyyy');
        return selectedDate > checkinDate;
    }, "Ngày trả phòng phải sau ngày đến");

    function parseDate(input, format) {
        format = format || 'yyyy-mm-dd';
        var parts = input.match(/(\d+)/g),
            i = 0,
            fmt = {};
        format.replace(/(yyyy|dd|mm)/g, function(part) {
            fmt[part] = i++;
        });
        return new Date(parts[fmt['yyyy']], parts[fmt['mm']] - 1, parts[fmt['dd']]);
    }
});


