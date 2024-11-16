<div class="modal fade" id="continueBooking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thông tin đặt phòng</h4>
            </div>
            <form method="POST" action="{{route('booking.store')}}" accept-charset="UTF-8" id="booking-room-form-full">
                @csrf
                <div class="modal-body">
                    <div class="availability-form row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dateCheckinBooking">Ngày nhận phòng (<span style="color: red">*</span>)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="dateCheckinBooking" name="checkin" />
                                    <div class="input-group-addon"><i class="fas fa-calendar-alt"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dateCheckoutBooking">Ngày trả phòng (<span style="color: red">*</span>)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="dateCheckoutBooking" name="checkout" />
                                    <div class="input-group-addon"><i class="fas fa-calendar-alt"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Người lớn (<span style="color: red">*</span>)</label>
                                <select class="selectpicker" id="adultsBooking" name="number_of_adults">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Trẻ em</label>
                                <select class="selectpicker" id="childrenBooking" name="number_of_children">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="room_id">Loại phòng (<span style="color: red">*</span>)</label>
                                <select class="selectpicker awe-select" id="room_id" name="room_type">
                                    <option selected></option>
                                    @foreach($user->rooms->where('status', 1)->where('deleted', 0) as $roomType)
                                        <option value="{{$roomType->id}}">{{$roomType->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantum">Số phòng</label>
                                <select class="selectpicker awe-select" id="number_of_rooms" name="number_of_rooms">
                                    <option value="1">1 phòng</option>
                                    <option value="2">2 phòng</option>
                                    <option value="3">3 phòng</option>
                                    <option value="4">4 phòng</option>
                                    <option value="5">5 phòng</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fullNameBooking">Họ và tên (<span style="color: red">*</span>)</label>
                                <input type="text" class="form-control" id="fullNameBooking" placeholder="Fullname (*)" name="name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailBooking">Email (<span style="color: red">*</span>)</label>
                                <input type="email" class="form-control" id="emailBooking" placeholder="Email (*)" name="email">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phoneBooking">SĐT (<span style="color: red">*</span>)</label>
                                <input type="text" id="phoneBooking" class="form-control" placeholder="Phone (*)" name="phone">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="special_requirements">Ghi chú</label>
                                <textarea class="form-control" name="notes" id="special_requirements" placeholder="Special requirements" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="vailability-submit">
                        <div class="col-sm-12">
                            <div class="form-group"><p style="margin-bottom: 0;">Thông tin có (<span style='color: red'>*</span>) là bắt buộc.</p></div>
                        </div>
                        <button data-loader="IS BOOKING" type="submit" class="awe-btn awe-btn-13 book-now"><span>Book Now</span></button>
                        <label class="error error-booking" style="display: block;"></label>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
