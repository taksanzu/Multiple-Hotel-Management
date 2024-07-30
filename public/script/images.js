$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('contents')
    }
});
function clearImage() {
    $('#image').val('');
    $('#output').html('');
}
function showConfirmModal(title, message, callback) {
    $('#modalTitle').text(title);
    $('#modalBody').html(message); // Thay đổi nội dung của phần thân modal

    $('#confirmActionBtn').off('click').on('click', function() {
        $('#confirmModal').modal('hide');
        callback();
    });

    $('#confirmModal').modal('show');
}

function deleteImages(id) {
    showConfirmModal('Xác nhận xóa', 'Bạn có chắc chắn muốn xóa ảnh này không?', function() {
        $.ajax({
            type: 'GET',
            url: '/imagesgallery/delete/' + id,
            success: function (data) {
                alert('Xóa ảnh thành công');
                location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
}
function getImagesId(src) {
    $('#imageShow').attr('src', src);
}
$(document).ready(function() {
    var input = document.getElementById('image');
    var outputContainer = $('#output');
    var filesArray = [];

    $('#image').on('change', function(event) {
        var files = event.target.files;

        for (let i = 0; i < files.length; i++) {
            let image = $('<img>').attr('src', URL.createObjectURL(files[i])).css({
                'width': '200px',
                'height': '150px',
                'object-fit': 'cover',
            }).addClass('m-2');

            let deleteButton = $('<button>').html('&times;').addClass('btn btn-danger btn-sm delete-btn').css({
                'position': 'absolute',
                'top': '0',
                'right': '0',
            });

            let imageContainer = $('<div>').css({
                'position': 'relative', // Cho phép đặt vị trí tương đối
            }).append(image, deleteButton);

            deleteButton.on('click', function() {
                imageContainer.remove();
                let index = filesArray.indexOf(files[i]);
                filesArray.splice(index, 1);
                updateInputFiles();
            });

            outputContainer.append(imageContainer);
            filesArray.push(files[i]);
        }
    });

    function updateInputFiles() {
        var dataTransfer = new DataTransfer();

        filesArray.forEach(file => dataTransfer.items.add(file));

        input.files = dataTransfer.files;
    }
    $('#imageForm').validate({
        rules: {
            // Đặt các quy tắc kiểm tra tại đây
            'image[]': {
                required: true,
                accept: 'image/*'
            }
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


