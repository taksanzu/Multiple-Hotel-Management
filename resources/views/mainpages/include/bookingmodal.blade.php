<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin đặt phòng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="text-center mb-2">Họ và tên:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Họ và tên">
                        </div>
                        <label class="text-center mb-2">Số điện thoại:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" class="form-control" placeholder="Số điện thoại">
                        </div>
                        <label class="text-center mb-2">Email: </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                        <label class="text-center mb-2">Ghi chú:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                            <textarea class="form-control" placeholder="Ghi chú"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-center mb-2">Ngày đến:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            <input type="text" class="form-control datepicker" placeholder="Ngày đặt phòng" id="datepicker" name="datepicker">
                        </div>
                        <label class="text-center mb-2">Ngày trả phòng:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            <input type="text" class="form-control datepicker" placeholder="Ngày trả phòng" id="datepicker" name="datepicker">
                        </div>
                        <label class="text-center mb-2">Số người:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                            <input type="number" class="form-control" placeholder="Người lớn">
                            <input type="number" class="form-control" placeholder="Trẻ em">
                        </div>
                        <label class="text-center mb-2">Số lượng phòng:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-bed"></i></span>
                            <input type="number" class="form-control" placeholder="Số lượng phòng">
                        </div>
                        <label class="text-center mb-2">Loại phòng:</label>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="roomType"><i class="fas fa-bed"></i></label>
                            <select class="form-select" id="roomType">
                                <option selected>Chọn loại phòng...</option>
                                <option value="standard">Standard</option>
                                <option value="deluxe">Deluxe</option>
                                <option value="suite">Suite</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a style="background: #0b2046" class="btn btn-primary btn-lg rounded-pill border" type="button"><strong>Đặt phòng</strong></a>
            </div>
        </div>
    </div>
</div>
