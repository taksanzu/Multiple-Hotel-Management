$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('contents')
    }
});

function clearUser() {
    $('#name').val('');
    $('#email').val('');
    $('#password').val('');
    $('#phone').val('');
    $('#domain').val('');
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
$(document).ready(function () {
    $('#usersForm').validate({
        rules: {
            name: 'required',
            email: {
                required: true,
                email: true
            },
            phone: 'required',
            roles: 'required',
            domain: 'required'
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
        }
    });
});
