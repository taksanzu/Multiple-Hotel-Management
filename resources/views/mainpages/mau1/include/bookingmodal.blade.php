<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="bookingForm" enctype="multipart/form-data" action="{{route('booking.store')}}" method="POST">
                @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin đặt phòng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="text-center mb-2">Loại phòng<label class="text-danger">(*)</label>:</label>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="roomType"><i class="fas fa-bed"></i></label>
                                <select class="form-select" id="roomType" name="room_type">
                                    <option selected></option>
                                    @foreach($user->rooms->where('status', 1)->where('deleted', 0) as $roomType)
                                        <option value="{{$roomType->id}}">{{$roomType->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="text-center mb-2">Ngày nhận phòng<label class="text-danger">(*)</label>:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                <input type="text" class="form-control datepicker" placeholder="Ngày đặt phòng" id="checkin" name="checkin">
                            </div>
                            <label class="text-center mb-2">Ngày trả phòng<label class="text-danger">(*)</label>:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                <input type="text" class="form-control datepicker" placeholder="Ngày trả phòng" id="checkout" name="checkout">
                            </div>
                            <label class="text-center mb-2">Số người<label class="text-danger">(*)</label>:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-users"></i></span>
                                <input type="number" class="form-control" placeholder="Người lớn" name="number_of_adults">
                                <input type="number" class="form-control" placeholder="Trẻ em" name="number_of_children">
                            </div>
                            <label class="text-center mb-2">Số lượng phòng<label class="text-danger">(*)</label>:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-bed"></i></span>
                                <input type="number" class="form-control" placeholder="Số lượng phòng" name="number_of_rooms">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-center mb-2">Họ và tên<label class="text-danger">(*)</label>:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Họ và tên" name="name" id="name">
                            </div>
                            <label class="text-center mb-2">Số điện thoại<label class="text-danger">(*)</label>:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="text" class="form-control" placeholder="Số điện thoại" name="phone" id="phone">
                            </div>
                            <label class="text-center mb-2">Email<label class="text-danger">(*)</label>: </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>
                            <label class="text-center mb-2">Ghi chú:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                                <textarea class="form-control" placeholder="Ghi chú" name="notes" rows="4"></textarea>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button style="background: #0b2046" class="btn btn-primary btn-lg rounded-pill border" type="submit"><strong>Đặt phòng</strong></button>
            </div>
            </form>
        </div>
    </div>
</div>

