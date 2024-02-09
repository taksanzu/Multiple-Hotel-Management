$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('contents')
    }
});

function clearUser() {
    $('#name').val('');
    $('#email').val('');
    $('#password').val('');
}

function getUserId(id) {
    $.ajax({
        type: 'GET',
        url: '/userList/' + id,
        success: function (data) {
            $('#id').val(data.user.id);
            $('#name').val(data.user.name);
            $('#email').val(data.user.email);
            $('#phone').val(data.user.phone);
            $('#roles').val(data.user.roles);
            $('#domain').val(data.user.domain);
        },
        error: function (error) {
            console.log(error);
        }
    });
}
