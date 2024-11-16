$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('contents')
    }
});
var editors = null;
ClassicEditor
    .create( document.querySelector( '#contents' ), {
        ckfinder: {
            uploadUrl: "/ckeditor/upload?_token=" + $('meta[name="csrf-token"]').attr('content')
        }
    })
    .then( editor => {
        console.log( editor );
        editors = editor;
    } )
    .catch( error => {
        console.error( error );
    } );
// $(document).ready(function () {
//     $('#newsSave').on('click', function (e) {
//         var id = $('#id').val();
//         var title = $('#title').val();
//         var description = $('#description').val();
//         var contents = $('#contents').val()
//         e.preventDefault();
//         $.ajax({
//             type: 'POST',
//             url: '/tintuc', // Thay đổi đường dẫn tương ứng
//             data: {
//                 id: id,
//                 title: title,
//                 description: description,
//                 contents: contents
//             },
//             success: function (data) {
//                 // Xử lý khi Ajax request thành công
//                 $('#newsModal').modal('hide'); // Đóng modal sau khi lưu thành công
//                 // Cập nhật hoặc làm gì đó sau khi tạo mới dữ liệu
//                 location.reload();
//             },
//             error: function (error) {
//                 // Xử lý khi có lỗi trong quá trình Ajax request
//                 console.log(error);
//             }
//         });
//     });
// });
function getNewsId(id) {
    $.ajax({
        type: 'GET',
        url: '/news/' + id,
        success: function (data) {
            $('#title').val(data.news.title);
            $('#description').val(data.news.description);
            editors.setData(data.news.contents);
            $('#id').val(data.news.id)
            $('#videolink').val(data.news.videolink);
            $('#link360').val(data.news.link360);
            var outputContainer = $('#output');
            if (data.news.images){
                let newsImage = $('<img>').attr('src', '/images/news/mainnews/' + data.news.images).css({
                    'width': '200px',
                    'height': '150px',
                    'object-fit': 'cover',
                }).addClass('m-2');

                let imageContainer = $('<div>').css({
                    'position': 'relative', // Cho phép đặt vị trí tương đối
                }).append(newsImage);

                outputContainer.append(imageContainer);
            }

        },
        error: function (error) {
            console.log(error);
        }
    });
}
function clearNews() {
    $('#title').val('');
    $('#description').val('');
    editors.setData('');
    $('#id').val('');
    $('#imageNews').val('');
    $('#output').empty();
    $('#videolink').val('');
    $('#link360').val('');
}
function showConfirmModal(title, message, callback) {
    $('#modalTitle').text(title);
    $('#modalBody').html(message); // Thay đổi nội dung của phần thân modal

    $('#confirmActionBtn').off('click').on('click', function() {
        $('#confirmDeleteModal').modal('hide');
        callback();
    });

    $('#confirmModal').modal('show');
}

function deleteNews(id) {
    showConfirmModal('Xác nhận xóa', 'Bạn có chắc chắn muốn xóa tin này không?', function() {
        $.ajax({
            type: 'GET',
            url: '/news/delete/' + id,
            success: function (data) {
                alert('Xóa tin thành công');
                location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
}
function postNews(id, status) {
    let action = status == 1 ? 'hủy' : 'đăng';
    showConfirmModal('Xác nhận ' + action, 'Bạn có chắc chắn muốn ' + action + ' tin này không?', function() {
        $.ajax({
            type: 'GET',
            url: '/news/post/' + id,
            success: function (data) {
                alert(action + ' tin thành công');
                location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
}
$(document).ready(function() {
    var input = document.getElementById('image');
    var outputContainer = $('#output');
    var filesArray = [];

    $('#imageNews').on('change', function(event) {
        outputContainer.empty();
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
    $('#newsForm').validate({
        rules: {
            title: 'required',
            description: 'required',
            videolink: 'url',
            link360: 'url',
            imageNews: {
                accept: 'image/*'
            },
            contents: 'required'
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
