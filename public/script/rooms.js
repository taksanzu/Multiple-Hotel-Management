$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('contents')
    }
});
var editors = null;
ClassicEditor
    .create( document.querySelector( '#description' ), {
        ckfinder: {
            uploadUrl: "/ckeditor/upload?_token=" + $('meta[name="csrf-token"]').attr('content')
        }
    })
    .then( editor => {
        editors = editor;
    } )
    .catch( error => {
        console.error( error );
    } );

function clearRoom() {
    $('#id').val('');
    $('#name').val('');
    editors.setData('');
    $('#stars').val('');
    $('#number_of_rooms').val('');
    $('#videolink').val('');
    $('#link360').val('');
    $('#price').val(0);
    $('#image').val('');
    $('#output').empty();
    $('#image360').val('');
    $('#output360').empty();
    $('[name="status[]"]').prop('checked', false);
}

$('#roomsModal').on('hidden.bs.modal', function () {
    clearRoom();
    $('#roomsForm').validate().resetForm();
    $('#roomsForm').find('.is-invalid').removeClass('is-invalid');
})
function getRoomsId(id) {
    $.ajax({
        type: 'GET',
        url: '/rooms/' + id,
        success: function (data) {
            console.log(data.rooms);
            $('#id').val(data.rooms.id);
            $('#name').val(data.rooms.name);
            $('#stars').val(data.rooms.stars);
            editors.setData(data.rooms.description);
            $('#videolink').val(data.rooms.videolink);
            $('#price').val(data.rooms.price);
            $('#link360').val(data.rooms.link360);
            $('#number_of_rooms').val(data.rooms.number_of_rooms);
            data.rooms.service_user.forEach(service => {
                $('[name="status[]"][value="' + service.service_id + '"]').prop('checked', true);
            });
            if (data.rooms.image360){
                var outputContainer360 = $('#output360');
                let roomsImage360 = $('<img>').attr('src', '/images/rooms/' + data.rooms.image360).css({
                    'width': '200px',
                    'height': '150px',
                    'object-fit': 'cover',
                }).addClass('m-2');

                let imageContainer360 = $('<div>').css({
                    'position': 'relative', // Cho phép đặt vị trí tương đối
                }).append(roomsImage360);

                outputContainer360.append(imageContainer360);
            }
            var outputContainer = $('#output');
            if (data.images){
                data.images.forEach(image => {
                    let roomsImage = $('<img>').attr('src', '/images/rooms/' + image.name).css({
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
                    }).append(roomsImage, deleteButton);

                    deleteButton.on('click', function(e) {
                        deleteRoomsImage(image.id);
                        imageContainer.remove();
                        e.preventDefault();
                    });

                    outputContainer.append(imageContainer);
                });
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function deleteRoomsImage(id, e) {
    if (confirm('Bạn có chắc chắn muốn xóa ảnh này không?')) {
        $.ajax({
            type: 'GET',
            url: '/rooms/delete/image/' + id,
            success: function (data) {
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
}
function showConfirmModal(title, message, callback) {
    $('#modalTitle').text(title);
    $('#modalBody').html(message);

    $('#confirmActionBtn').off('click').on('click', function() {
        $('#confirmDeleteModal').modal('hide');
        callback();
    });

    $('#confirmModal').modal('show');
}

function deleteRooms(id) {
    var title = 'Xóa Phòng';
    var message = '<p>Bạn có chắc chắn muốn xóa phòng này không?</p>';

    showConfirmModal(title, message, function() {
        $.ajax({
            type: 'GET',
            url: '/rooms/delete/' + id,
            success: function (data) {
                alert('Xóa thành công');
                location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
}

function postRooms(id, status) {
    let action = status == 1 ? 'gỡ' : 'đăng';
    var title = action.charAt(0).toUpperCase() + action.slice(1) + ' Phòng';
    var message = '<p>Bạn có chắc chắn muốn ' + action + ' phòng này không?</p>';
    showConfirmModal(title, message, function() {
        $.ajax({
            type: 'GET',
            url: '/rooms/post/' + id,
            success: function (data) {
                alert(action + ' thành công');
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
                if (confirm('Bạn có chắc chắn muốn xóa ảnh này không?')) {
                    imageContainer.remove();
                    let index = filesArray.indexOf(files[i]);
                    filesArray.splice(index, 1);
                    updateInputFiles();
                }
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
    var input360 = document.getElementById('image360');
    var outputContainer360 = $('#output360');
    var filesArray360 = [];

    $('#image360').on('change', function(event) {
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
                if (confirm('Bạn có chắc chắn muốn xóa ảnh này không?')) {
                    imageContainer.remove();
                    let index = filesArray360.indexOf(files[i]);
                    filesArray360.splice(index, 1);
                    updateInputFiles360();
                }
            });

            outputContainer360.append(imageContainer);
            filesArray360.push(files[i]);
        }
    });

    function updateInputFiles360() {
        var dataTransfer = new DataTransfer();

        filesArray360.forEach(file => dataTransfer.items.add(file));

        input360.files = dataTransfer.files;
    }
    $('#roomsForm').validate({
        rules: {
            name: 'required',
            description: 'required',
            stars: {
                required: true,
                range: [0, 5] // Kiểm tra giá trị nằm trong khoảng từ 0 đến 5
            },
            number_of_rooms: {
                required: true,
                min: 0 // Số phòng phải lớn hơn hoặc bằng 0
            },
            videolink: 'url', // Kiểm tra xem link video có đúng định dạng URL không
            link360: 'url', // Kiểm tra xem link 360 có đúng định dạng URL không
            'image[]': {
                required: false,
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












