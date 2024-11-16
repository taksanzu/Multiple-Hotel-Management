<div class="modal fade" id="bookingAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="bookingForm" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" placeholder="Họ và tên" name="name" id="name" disabled>
                            </div>
                            <label class="text-center mb-2">Số điện thoại:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="text" class="form-control" placeholder="Số điện thoại" name="phone" id="phone" disabled>
                            </div>
                            <label class="text-center mb-2">Email: </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="text" class="form-control" placeholder="Email" name="email" id="email" disabled>
                            </div>
                            <label class="text-center mb-2">Ghi chú:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                                <textarea class="form-control" placeholder="Ghi chú" name="notes" id="notes" disabled></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-center mb-2">Ngày đến:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                <input type="text" class="form-control datepicker" placeholder="Ngày đặt phòng" id="checkin" name="checkin" disabled>
                            </div>
                            <label class="text-center mb-2">Ngày trả phòng:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                <input type="text" class="form-control datepicker" placeholder="Ngày trả phòng" id="checkout" name="checkout" disabled>
                            </div>
                            <label class="text-center mb-2">Số người:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-users"></i></span>
                                <input type="number" class="form-control" placeholder="Người lớn" name="number_of_adults" id="number_of_adults" disabled>
                                <input type="number" class="form-control" placeholder="Trẻ em" name="number_of_children" id="number_of_children" disabled>
                            </div>
                            <label class="text-center mb-2">Số lượng phòng:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-bed"></i></span>
                                <input type="number" class="form-control" placeholder="Số lượng phòng" name="number_of_rooms" id="number_of_rooms" disabled>
                            </div>
                            <label class="text-center mb-2">Loại phòng:</label>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="roomType"><i class="fas fa-bed"></i></label>
                                <input type="text" class="form-control" id="roomType" name="roomType" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

