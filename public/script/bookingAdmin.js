$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('contents')
    }
});

function getBookingId(id) {
    $.ajax({
        type: 'GET',
        url: '/userHome/' + id,
        success: function (data) {
            $('#id').val(data.booking.id);
            $('#name').val(data.booking.name);
            $('#email').val(data.booking.email);
            $('#phone').val(data.booking.phone);
            $('#notes').val(data.booking.notes);
            $('#checkin').val(data.booking.checkin);
            $('#checkout').val(data.booking.checkout);
            $('#number_of_adults').val(data.booking.number_of_adults);
            $('#number_of_children').val(data.booking.number_of_children);
            $('#number_of_rooms').val(data.booking.number_of_rooms);
            $('#roomType').val(data.booking.room.name);
            console.log(data.booking);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function acceptBooking(id) {
    if (confirm('Bạn có chắc muốn chấp nhận đơn đặt phòng này?')) {
        $.ajax({
            type: 'GET',
            url: '/userHome/accept/' + id,
            success: function (data) {
                location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
}

function cancelBooking(id) {
    if (confirm('Bạn có chắc muốn hủy đơn đặt phòng này?')) {
        $.ajax({
            type: 'GET',
            url: '/userHome/cancel/' + id,
            success: function (data) {
                location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
}
