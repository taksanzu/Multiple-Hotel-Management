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
//             url: '/news', // Thay đổi đường dẫn tương ứng
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
            $('#id').val(data.news.id);
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
}

function deleteNews(id) {
    if (confirm('Bạn có chắc chắn muốn xóa không?')) {
        $.ajax({
            type: 'GET',
            url: '/news/delete/' + id,
            success: function (data) {
                location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
}
