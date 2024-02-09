$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('contents')
    }
});

function clearRoom() {
    $('#name').val('');
    $('#description').val('');
    $('#stars').val('');
    $('#number_of_rooms').val('');
    $('#image').val('');
    $('#output').empty();

}
function getRoomsId(id) {
    $.ajax({
        type: 'GET',
        url: '/rooms/' + id,
        success: function (data) {
            $('#id').val(data.rooms.id);
            $('#name').val(data.rooms.name);
            $('#stars').val(data.rooms.stars);
            $('#description').val(data.rooms.description);
            $('#number_of_rooms').val(data.rooms.number_of_rooms);
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
function deleteRooms(id) {
    if (confirm('Bạn có chắc chắn muốn xóa phòng này không?')) {
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
    }
}

function postRooms(id) {
    if (confirm('Bạn có chắc chắn muốn đăng phòng này không?')) {
        $.ajax({
            type: 'GET',
            url: '/rooms/post/' + id,
            success: function (data) {
                alert('Đăng phòng thành công');
                location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
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
});












