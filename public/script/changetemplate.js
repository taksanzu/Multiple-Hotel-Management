function changeTemplateMau1() {
    showConfirmModal('Xác nhận', 'Bạn có chắc chắn muốn chọn mẫu này không?', function () {
        $.ajax({
            url: '/settingTemplate/changeTemplateMau1',
            type: 'GET',
            success: function (data) {
                alert('Chọn mẫu thành công');
                location.reload();
            }
        });
    });
}
function changeTemplateMau2() {
    showConfirmModal('Xác nhận', 'Bạn có chắc chắn muốn chọn mẫu này không?', function () {
        $.ajax({
            url: '/settingTemplate/changeTemplateMau2',
            type: 'GET',
            success: function (data) {
                alert('Chọn mẫu thành công');
                location.reload();
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
