$(document).ready(function () {
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
        errorElement: 'span',
        errorPlacement: function (error, element) {
            element.addClass('has-error');
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid').addClass(validClass);
        },
        submitHandler: function (form) {
            e.preventDefault();
            $.ajax({
                url: '/booking',
                type: 'POST',
                data: $('#bookingForm').serialize(),
                success: function (response) {
                    alert('Đặt phòng thành công');
                    location.reload();
                },
                error: function (xhr, status, error) {
                    alert('Đã có lỗi xảy ra, vui lòng thử lại sau');
                }
            })
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


