$(document).ready(function () {
    $('#chagePasswordForm').validate({
        rules: {
            oldPassword: {
                required: true,
            },
            newPassword: {
                required: true,
                minlength: 6
            },
            renewPassword: {
                required: true,
                equalTo: "#newPassword"
            }
        },
        messages: {
            oldPassword: {
                required: "Vui lòng nhập mật khẩu cũ",
            },
            newPassword: {
                required: "Vui lòng nhập mật khẩu mới",
                minlength: "Mật khẩu phải chứa ít nhất 6 ký tự"
            },
            renewPassword: {
                required: "Vui lòng nhập lại mật khẩu mới",
                equalTo: "Mật khẩu nhập lại không khớp"
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "oldPassword") {
                error.insertAfter(element);
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid').addClass(validClass);
        },
        submitHandler: function (form) {
            $.ajax({
                url: '/changePassword',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    if (response.error) {
                        showConfirmModal('Thất bại', response.error, 'Thử lại')
                    } else {
                        showConfirmModal('Thành công', 'Đổi mật khẩu thành công', 'OK')
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
    $('#changePasswordModal').on('hidden.bs.modal', function () {
        $('#chagePasswordForm').trigger('reset');
    });
});
function showConfirmModal(title, message, action) {
    $('#modalTitle').text(title);
    $('#modalBody').html(message);
    $('#cancel').hide();
    $('#confirmActionBtn').text(action);
    if (title === 'Thành công') {
        $('#confirmActionBtn').off('click').on('click', function() {
            $('#confirmModal').modal('hide');
            location.reload();
        });
    } else {
        $('#confirmActionBtn').off('click').on('click', function() {
            $('#confirmModal').modal('hide');
        });
    }

    $('#confirmModal').modal('show');
}
