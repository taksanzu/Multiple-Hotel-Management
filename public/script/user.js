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
            $('#password').val(data.user.password);
        },
        error: function (error) {
            console.log(error);
        }
    });
}
function deleteUser(id) {
    showConfirmModal('Xác nhận xóa', 'Bạn có chắc muốn xóa người dùng này không?', function () {
        $.ajax({
            type: 'GET',
            url: '/userList/delete/' + id,
            success: function (response) {
                if (response.success) {
                    alert('Xóa người dùng thành công');
                    location.reload();
                }else if (response.error) {
                    alert('Không thể xóa người dùng đang đăng nhập');
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
}

function showConfirmModal(title, message, callback) {
    $('#modalTitle').text(title);
    $('#modalBody').html(message);

    $('#confirmActionBtn').off('click').on('click', function () {
        $('#confirmModal').modal('hide');
        callback();
    });

    $('#confirmModal').modal('show');
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
    $('#userAdminModal').on('hidden.bs.modal', function () {
        $('#usersForm').trigger('reset');
        $('#id').val('');
        $('#usersForm').validate().resetForm();
        $('#usersForm').find('.is-invalid').removeClass('is-invalid');
    });
});
