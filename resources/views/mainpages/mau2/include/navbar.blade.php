<div class="container-fluid top-header navbar-fixed-top">
    <nav class="navbar navbar-default navbar-main navbar-fixed-top " role="navigation">
        <div class="container-fluid" id="wrapMenuTopScroll">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="logo" href="{{ route('welcome') }}" rel="">
                    @if($user->settings->where('name', 'logo')->first())
                        <img class="logo-normal" src="{{ asset('logo').'/'.optional($user->settings->where('name', 'logo')->first())->value }}" />
                        <img class="logo-light" src="{{ asset('logo').'/'.optional($user->settings->where('name', 'logo')->first())->value }}" />
                    @else
                        <img class="logo-normal" src="uploads/1/logo.png" />
                        <img class="logo-light" src="uploads/1/logo.png" />
                    @endif
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="{{route('loaiphong.index')}}" target="_self">
                            Phòng nghỉ
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('tienich.index')}}" target="_self">
                            Dịch vụ
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('hinhanh.index')}}" target="_self">
                            Hình ảnh
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('tintuc.index')}}" target="_self">
                            Tin tức và khuyến mãi
                        </a>
                    </li>

                </ul>
            </div>
            </li>

            </ul>
        </div>
        <!-- Booking -->
        <div id="booking-mask-wrapper" class="booking no-mobile map-no-print closed ">
            <div class="booking-header">
                <div class="booking-button">
                    <a class="btn btn-normal" href="#" target="_blank">
                        <span>Book Now</span>
                    </a>
                </div>
            </div>
            <div id="booking-mask" class="booking-wpr bg-intermidate">
                <div id="availability-checker" class="container">
                    <form id="booking-form" class="booking-form" action="#" method="get" target="_blank">
                        <div class="row">

                            <input type="hidden" name="locale" value="en">

                            <div class="dateInpicker" id="dateInpicker"></div>
                            <div class="dateOutpicker" id="dateOutpicker"></div>

                            <div class="col-sm-12 col-xs-12 title-checkDate">
                                <h4 class="text-center">Choose date</h4>
                            </div>

                            <div class="col-sm-6 col-xs-12 date-1">
                                <div class="date datein booking-field">
                                    <label for="date-in">Check In</label>
                                    <input type="text" id="date-in" name="eudatein" placeholder="..." readonly="readonly" />
                                    <span class="pointer"></span>
                                    <label id="date-format-helper" class="date-helper" for="date-in">//</label>
                                    <input type="hidden" id="bookingdate" name="arrivalDate" value="" />
                                    <input type="hidden" id="nightscount" name="nightsStay" value="" />
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-12 date-2">
                                <div class="date dateout booking-field">
                                    <label for="date-out">Check Out</label>
                                    <input type="text" id="date-out" name="eudateout" placeholder="..." readonly="readonly" />
                                    <span class="pointer"></span>
                                    <label id="date-out-format-helper" class="date-helper" for="date-out">//</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <!-- <div class="clearspace"></div> -->
                                <div id="booking-content-area" class="en">
                                    <div class="calendardate"></div>
                                    <div class="clearspace"></div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 block-adults">
                                        <div class="Children choose booking-field">
                                            <label>Người lớn</label>
                                            <select id="adults" name="adults" class="intermediate-color">
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

                                    <div class="col-md-6 col-sm-12 col-xs-12 block-children">
                                        <div class="Children choose booking-field">
                                            <label>Trẻ em</label>
                                            <select id="children" name="children" class="intermediate-color">
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



                                    <input type="hidden" id="buildingCode" name="buildingCode" value="any" />
                                    <input type="hidden" id="roomType" name="roomType" value="any" />
                                    <input type="hidden" id="numberRooms" name="numberRooms" value="1" />
                                    <div class="clearspace"></div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="go btn btn-normal tracking-link check-date" id="btnContinueBooking" data-toggle="modal" data-target="#continueBooking">
                            <span>Book Now</span>
                        </button>

                        <button type="button" class="go btn btn-normal tracking-link show-calendar" value="" title="Book Now">
                            <span>Book Now</span>
                        </button>
                    </form>
                    <div class="clearspace">
                    </div>
                </div>
                <div id="booking-close">
                    <i class="fas fa-times"></i>
                </div>
            </div>
        </div>
        <!-- Booking -->
</div>
</nav>
</div>
