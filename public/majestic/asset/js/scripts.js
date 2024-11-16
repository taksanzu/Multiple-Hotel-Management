// Menu and fancybox
jQuery(document).ready(function () {
	//menu
	if (!(jQuery('body').hasClass('single-page'))) {
		jQuery(window).scroll(function (event) {
			var scroll = $(window).scrollTop();
			if (scroll > 40) {
				jQuery(".top-header, .top-header .navbar-main").addClass("lightHeader");
				jQuery("#wrapMenuTopScroll").removeClass("container-fluid");
				jQuery("#wrapMenuTopScroll").addClass("container");
			}
			else {
				jQuery(".top-header, .top-header .navbar-main").removeClass("lightHeader");
				jQuery("#wrapMenuTopScroll").removeClass("container");
				jQuery("#wrapMenuTopScroll").addClass("container-fluid");
			}
		});
	}

	// Fancybox
	if($('.imglist-thumb').length > 0){
		$('.fancybox-thumbs').fancybox({
			prevEffect: 'none',
			nextEffect: 'none',

			closeBtn: true,
			arrows: true,
			nextClick: true,

			helpers: {
				thumbs: {
					width: 50,
					height: 50
				}
			}
		});
	}
});

jQuery('.selectpicker').selectpicker({
	style: 'btn-info',
	size: 4
});

jQuery('.selectpickerLanguage').selectpicker();

// Check Date 
jQuery(function ($) {
	var languagaDateTime = $('html').attr('lang');

	if(languagaDateTime == 'vi'){
		$.datepicker.regional['vi-GB'] = {
			closeText: 'Đóng',
			prevText: 'Trước',
			nextText: 'Sau',
			currentText: 'Ngày',
			monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
				'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
			monthNamesShort: ['Th1', 'Th2', 'Th3', 'Th4', 'Th5', 'Th6',
				'Th7', 'Th8', 'Th9', 'Th10', 'Th11', 'Th12'],
			dayNames: ['Chủ nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'],
			dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
			dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
			weekHeader: 'Tuần',
			dateFormat: 'dd-mm-yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['vi-GB']);
	}else{
		$.datepicker.regional['en-GB'] = {
			closeText: 'Done',
			prevText: 'Prev',
			nextText: 'Next',
			currentText: 'Today',
			monthNames: ['January', 'February', 'March', 'April', 'May', 'June',
				'July', 'August', 'September', 'October', 'November', 'December'],
			monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
				'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			dayNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
			dayNamesShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
			dayNamesMin: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
			weekHeader: 'Wk',
			dateFormat: 'dd-mm-yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['en-GB']);
	}
});

jQuery(document).on("ready", function () {

	if ($('#booking-mask-wrapper').hasClass("no-slide")) {
		$('#booking-mask-wrapper').addClass('hide-check-date');
	}
	/*Function to scroll the page to the content section, when arrow is clicked on home page main visual*/
	jQuery('#home_scroll_arrow').click(function () {
		$('html, body').animate({ scrollTop: ($('#main').offset().top - 70) }, 1000, 'easeInOutQuart');
	});

	/*Function of booking mask functionality*/
	jQuery('#booking-mask-wrapper .show-calendar').click(function () {
		if ($('#booking-mask-wrapper').hasClass("closed")) {
			$('#booking-mask-wrapper').toggleClass('open closed');
			$('html').addClass('overflow-hidden');
			$('#booking-mask-wrapper').removeClass('hide-check-date');
			$('#booking-mask-wrapper #date-in').parent().addClass('active');
			$("#booking-mask-wrapper #booking-content-area").slideToggle("500");
		}
	});
	jQuery('#booking-mask-wrapper #date-in').click(function () {
		if ($('#booking-mask-wrapper').hasClass("closed")) {
			$('#booking-mask-wrapper').toggleClass('open closed');
			$('html').addClass('overflow-hidden');
			$('#booking-mask-wrapper #date-in').parent().addClass('active');
			$("#booking-mask-wrapper #booking-content-area").slideToggle("500");
		}
	});
	jQuery('#booking-mask-wrapper #date-out').click(function () {
		if ((jQuery("#date-in").val() != "") && (jQuery('#booking-mask-wrapper').hasClass("closed"))) {
			jQuery('#booking-mask-wrapper').toggleClass('open closed');
			$('html').addClass('overflow-hidden');
			jQuery('#booking-mask-wrapper #date-out').parent().addClass('active');
			jQuery("#booking-mask-wrapper #booking-content-area").slideToggle("500");
		}
	});
	jQuery('#booking-close').click(function () {
		if ($('#booking-mask-wrapper').hasClass("no-slide")) {
			$('#booking-mask-wrapper').addClass('hide-check-date');
		}

		if ($('#booking-mask-wrapper').hasClass("open")) {
			$('#booking-mask-wrapper').toggleClass('open closed');
			$('html').removeClass('overflow-hidden');
			$('#booking-mask-wrapper #date-in, #booking-mask-wrapper #date-out').parent().removeClass('active');
			$("#booking-mask-wrapper #booking-content-area").slideToggle("500");
		}
	});

	/** SCROLL **/
	var bk = jQuery('.booking'),
		hdr = jQuery('.header'),
		bkBtn = 0,
		bkWpr = jQuery('.booking-wpr').outerHeight(),
		hdrScr = function () {
			var hH = hdr.outerHeight(),
				winPos = jQuery(window).scrollTop() + 110,
				bkTop = (bk.is('.open')) ? hH - (bkWpr + bkBtn) : hH - bkBtn;

			(winPos >= bkTop) ? hdr.addClass('fixed') : hdr.removeClass('fixed');
			/*((winPos - 70) >= bkTop) ? bk.addClass('fixed-bk') : bk.removeClass('fixed-bk');*/
		};

	jQuery('.booking-button').on('click', function () {
		mqHdrScr();
	});
});
function get_tomorrows(){
	var currentDate = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
	var day = currentDate.getDate();
	var month = currentDate.getMonth() + 1;
	var year = currentDate.getFullYear();
	return day + "-" + month + "-" + year
}

jQuery(document).ready(function () {

	
	var newDate = new Date();

	var datestring = ("0" + newDate.getDate()).slice(-2) + "-" + ("0" + (newDate.getMonth() + 1)).slice(-2) + "-" + newDate.getFullYear();

	

	jQuery("#date-in").attr('value', datestring);
	jQuery("#date-out").attr('value', get_tomorrows());

	/** Booking mask functionality **/
	if (jQuery().datepicker) { // validation error
		jQuery(".date-helper").remove();
		jQuery('.dateInpicker').attr('data-altfield', '#date-in');
		jQuery('.dateOutpicker').attr('data-altfield', '#date-out');
	}

	function setDate(val) {
		if (val) {
			var date = jQuery.datepicker.parseDate("dd-mm-yy", val);
			var day = date.getDate();
			var month = date.getMonth() + 1;
			var year = date.getFullYear();
			var usDate = day + '-' + month + '-' + year;

			date = jQuery.datepicker.parseDate("dd-mm-yy", usDate);
			return date;
		}
		return false;
	}

	var dp1 = 0,
		dp2 = 0,
		bookingMask = function (ac) {
			$ac = jQuery(ac);
			$ac.datepicker({
				firstDay: 7,
				dateFormat: 'dd-mm-yy',
				minDate: new Date(),
				beforeShowDay: function (date) {
					var highliterCls = {
						def: 'ini-highlight',
						active: 'dp-highlight'
					},
						classFlag;
					var date1 = setDate(jQuery("#date-in").val());
					var date2 = setDate(jQuery("#date-out").val());
					if (date1) {
						if (date.getTime() == date1.getTime() || (date2 && date >= date1 && date <= date2 && !(date < date2))) {
							classFlag = highliterCls.active;
						} else if (date2 && date >= date1 && date <= date2) {
							classFlag = highliterCls.def;
						} else {
							classFlag = "";
						}
					}
					return [true, classFlag];
				},
				onSelect: function (dateText, inst) {

					var date1 = setDate(jQuery("#date-in").val());
					var date2 = setDate(jQuery("#date-out").val());

					var date = jQuery.datepicker.parseDate("dd-mm-yy", dateText);
					var day = date.getDate();
					if (day < 10) {
						var day2 = '0' + day;
					} else {
						var day2 = day;
					}
					var month = date.getMonth() + 1;
					if (month < 10) {
						var month2 = '0' + month;
					} else {
						var month2 = month;
					}

					var year = date.getFullYear();
					var usDate = day + '-' + month + '-' + year;
					var usDate2 = day2 + '' + month2 + '' + year;

					if (dp1 == 0) {
						jQuery("#date-in").val(dateText).parent().removeClass('active');
						jQuery("#us-date-in").val(usDate);
						jQuery("#bookingdate").val(usDate2);
						jQuery(this).datepicker("option", "minDate", dateText);

						// jQuery(".datein label").hide();

						setTimeout(function () {
							jQuery("#date-out").val("").parent().addClass("active");
							jQuery("#us-date-out").val('');
							dp1 = 1;
							dp2 = 0;
						}, 100);
					} else if (dp1 == 1 && dp2 == 0) {
						jQuery("#date-out").val(dateText).addClass("active");
						jQuery("#date-in").parent().removeClass("active");
						jQuery("#us-date-out").val(usDate);
						jQuery(this).datepicker("option", "minDate", "today");
						date2 = jQuery("#date-out").val(dateText);
						// jQuery(".dateout label").hide();

						setTimeout(function () {
							dp1 = 0;
							dp2 = 1;
						}, 100);
					}
					jQuery("#date-out").parent().removeClass("active");
				},
				numberOfMonths: 1
			});
		}('#availability-checker #booking-content-area .calendardate');
	/** End Booking mask functionality **/

	// jQuery("#booking-form").submit(function (e) {
	// 	if (jQuery('#availability-checker #date-in').val() == "") {
	// 		var bookingMaskAlert = "Please select Check In!";
	// 		alert(bookingMaskAlert);
	// 		return false;
	// 	}
	// 	else {
	// 		if (jQuery('#availability-checker #date-out').val() == "") {
	// 			var bookingMaskAlert = "Please select Check Out!";
	// 			alert(bookingMaskAlert);
	// 			return false;
	// 		}
	// 		else {
	// 			if (jQuery('#availability-checker #adults').val() == "ADULTS") {
	// 				var bookingMaskAlert = "Please select Adults!";
	// 				alert(bookingMaskAlert);
	// 				return false;
	// 			}
	// 			else {
	// 				if (jQuery('#availability-checker #children').val() == "CHILDREN") {
	// 					var bookingMaskAlert = "Please select Children!";
	// 					alert(bookingMaskAlert);
	// 					return false;
	// 				}
	// 			}
	// 		}
	// 	}

	// 	if (jQuery('#availability-checker #date-in').val() != "" && jQuery('#availability-checker #date-out').val() != "") {
	// 		var bookingDateIn = jQuery('#availability-checker #date-in').val().split("/")
	// 		var bookingDateOut = jQuery('#availability-checker #date-out').val().split("/")

	// 		var bookDate = new Date(bookingDateIn[2], bookingDateIn[0] - 1, bookingDateIn[1]);
	// 		var bookDateOut = new Date(bookingDateOut[2], bookingDateOut[0] - 1, bookingDateOut[1]);

	// 		var dif = new Date(bookDateOut - bookDate);
	// 		var days = Math.floor(dif / 1000 / 60 / 60 / 24);

	// 		jQuery('#nightscount').val(days);
	// 	}
	// });
});

// Slick Slide
jQuery(document).ready(function () {
	var sliderFullHeight = jQuery('.slide-full-height');
	if (sliderFullHeight.length) {
		sliderFullHeight.slick({
			arrows: false,
			fade: true,
			infinite: true,
			dots: true,
			autoplay: true,
			autoplaySpeed: 5000,
			swipe: false
		});
	}

	if ($('.thumbail-img').length) {
		$('.thumbail-img').slick({
			slidesToShow: 3,
			slidesToScroll: 3,
			arrows: false,
			fade: false,
			infinite: true,
			dots: false,
			autoplay: true,
			autoplaySpeed: 3000,
		});
	}

	if ($('.slide-terminal').length) {
		$('.slide-terminal').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: false,
			infinite: true,
			dots: false,
			autoplay: true,
			autoplaySpeed: 3000,
		});
	}

	if ($('.fancybox-thumbs-1').length) {
		jQuery('.fancybox-thumbs-1').fancybox({
			prevEffect: 'none',
			nextEffect: 'none',

			closeBtn: true,
			arrows: true,
			nextClick: true,

			helpers: {
				thumbs: {
					width: 50,
					height: 50
				}
			}
		});
	}

	if ($('.fancybox-thumbs-1').length) {
		jQuery('.fancybox-thumbs-1').fancybox({
			prevEffect: 'none',
			nextEffect: 'none',

			closeBtn: true,
			arrows: true,
			nextClick: true,

			helpers: {
				thumbs: {
					width: 50,
					height: 50
				}
			}
		});
	}

	if ($('.fancybox-thumbs-2').length) {
		jQuery('.fancybox-thumbs-2').fancybox({
			prevEffect: 'none',
			nextEffect: 'none',

			closeBtn: true,
			arrows: true,
			nextClick: true,

			helpers: {
				thumbs: {
					width: 50,
					height: 50
				}
			}
		});
	}
	if ($('.fancybox-thumbs-3').length) {
		jQuery('.fancybox-thumbs-3').fancybox({
			prevEffect: 'none',
			nextEffect: 'none',

			closeBtn: true,
			arrows: true,
			nextClick: true,

			helpers: {
				thumbs: {
					width: 50,
					height: 50
				}
			}
		});
	}
	if ($('.fancybox-thumbs-4').length) {
		jQuery('.fancybox-thumbs-4').fancybox({
			prevEffect: 'none',
			nextEffect: 'none',

			closeBtn: true,
			arrows: true,
			nextClick: true,

			helpers: {
				thumbs: {
					width: 50,
					height: 50
				}
			}
		});
	}
	if ($('.fancybox-thumbs-5').length) {
		jQuery('.fancybox-thumbs-5').fancybox({
			prevEffect: 'none',
			nextEffect: 'none',

			closeBtn: true,
			arrows: true,
			nextClick: true,

			helpers: {
				thumbs: {
					width: 50,
					height: 50
				}
			}
		});
	}

	if ($('.imglist-thumb').length) {
		$('.imglist-thumb').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			arrows: true,
			fade: false,
			infinite: true,
			dots: false,
			autoplay: true,
			autoplaySpeed: 3000,
			responsive: [
				{
					breakpoint: 991,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
	}

	if ((jQuery('.slides-detail').length === 1)) {
		jQuery('.slides-detail').slick({
			dots: false,
			fade: true,
			autoplay: true,
			autoplaySpeed: 3000,
			cssEase: 'linear'
		});
	}

	if ((jQuery('#date-checkin').length === 1) && (jQuery('#date-checkout').length === 1)) {
		function eventCheckIn(event) {
			var target = jQuery(event.target);
			if (target.is(".open-checkIn, .open-checkIn *")) {
				event.stopPropagation();
				jQuery('#date-checkin').data('dateRangePicker').open();
			}
			else {
				event.stopPropagation();
				jQuery('#date-checkin').data('dateRangePicker').close();
			}
		}

		function eventCheckOut(event) {
			var target = jQuery(event.target);
			if (target.is(".open-checkOut, .open-checkOut *")) {
				event.stopPropagation();
				jQuery('#date-checkout').data('dateRangePicker').open();
			}
			else {
				event.stopPropagation();
				jQuery('#date-checkout').data('dateRangePicker').close();
			}
		}
		var languagaDateTime = $('html').attr('lang');
		jQuery('#date-checkin').dateRangePicker(
			{
				language: languagaDateTime,
				startDate: new Date(),
				autoClose: true,
				singleDate: true,
				showShortcuts: false,
				singleMonth: true,
				selectForward: true,
				format:'DD-MM-YYYY'
			});

		jQuery('#date-checkout').dateRangePicker(
			{
				language: languagaDateTime,
				startDate: new Date(),
				autoClose: true,
				singleDate: true,
				showShortcuts: false,
				singleMonth: true,
				selectForward: true,
				format:'DD-MM-YYYY'
			});

		$(document).ready(function () {
			jQuery('#booking-form-single .booking-form-row').click(eventCheckIn);
			jQuery('#booking-form-single .booking-form-row').click(eventCheckOut);
			$("#booking-form-single .booking-form-row").off("click", ".open-checkIn", '.open-checkIn', '#btnContinueBooking');
		});
	}
});

function getTimeNow(){
	var dateNow = new Date();

	var getDate = dateNow.getDate();
	if(getDate < 10) getDate = 0 +''+ getDate;

	var getMonth = dateNow.getMonth() + 1;
	if(getMonth < 10) getMonth = 0 +''+ getMonth;

	var getYear = dateNow.getFullYear();

	return getDate +'-'+ getMonth +'-'+ getYear;
}

// Update continue booking
$('#btnContinueBooking').click(function(){
	var valDateIn = $('#booking-mask #date-in').val();

	var valDateOut = $('#booking-mask #date-out').val();

	var valNumberAdults = $('#booking-mask #adults').val();

	var valNumberChildren = $('#booking-mask #children').val();

	$('#dateCheckinBooking').val(valDateIn);

	$('#dateCheckoutBooking').val(valDateOut);

	$('#adultsBooking').selectpicker('val', valNumberAdults);

	$('#childrenBooking').selectpicker('val', valNumberChildren);

	if($('#booking-form-single').length > 0 || $('.btnBookingInRooms').length > 0){
		$('#numberRoom').html('<option>Select number of rooms</option>');
		$('#numberRoom').selectpicker('refresh');
	}
});

$('#btnBookingDetailRoom').click(function(){
	var strOptionRoom = '';

	var valDateIn = $('#booking-form-single #date-checkin').val();

	var valDateOut = $('#booking-form-single #date-checkout').val();

	var kindRoom = $(this).attr('kindroom');

	var valNumberRoom = parseInt($(this).attr('numberroom'));

	if(valDateIn == '') $('#dateCheckinBooking').val(getTimeNow());
	else $('#dateCheckinBooking').val(valDateIn);

	if(valDateOut == '') $('#dateCheckoutBooking').val(get_tomorrows());
	else $('#dateCheckoutBooking').val(valDateOut);

	$('#kindRoomBooking').selectpicker('val', kindRoom);

	// changeHtmlNumberRoom(kindRoom);
});

if ($('#booking-form-single').length > 0 || $('.btnBookingInRooms').length > 0) {
	var languagaDateTime = $('html').attr('lang');
	
	jQuery('#dateCheckinBooking').dateRangePicker(
	{
		language: languagaDateTime,
		startDate: new Date(),
		autoClose: true,
		singleDate: true,
		showShortcuts: false,
		singleMonth: true,
		selectForward: true,
		format:'DD-MM-YYYY'
	});

	jQuery('#dateCheckoutBooking').dateRangePicker(
	{
		language: languagaDateTime,
		startDate: new Date(),
		autoClose: true,
		singleDate: true,
		showShortcuts: false,
		singleMonth: true,
		selectForward: true,
		format:'DD-MM-YYYY'
	});
	$('#date-checkin').val(getTimeNow());
	$('#date-checkout').val(get_tomorrows());
}

$('.btnBookingInRooms').click(function(){
	$('#dateCheckinBooking').val(getTimeNow());

	$('#dateCheckoutBooking').val(get_tomorrows());

	var kindRoom = $(this).attr('kindroom');
	$('#kindRoomBooking').selectpicker('val', kindRoom);
	// changeHtmlNumberRoom(kindRoom);
});

// block number room
$('#kindRoomBooking').change(function(){
	var valKindRoom = $(this).val();
	// changeHtmlNumberRoom(valKindRoom);
});

// function changeHtmlNumberRoom(valKindRoom){
// 	$('#kindRoomBooking option').each(function(){
// 		var valOptionKindRoom = $(this).attr('value');
// 		var valNumberRoom = parseInt($(this).attr('numberroom'));
// 		var strOptionRoom = '';
// 		if(valKindRoom == valOptionKindRoom){
// 			for (i = 1; i <= valNumberRoom; i++) { 
// 			    strOptionRoom = strOptionRoom + '<option value="'+ i +'">'+ i +'</option>';
// 			}

// 			$('#numberRoom').html(strOptionRoom);
// 			$('#numberRoom').selectpicker('refresh');
// 			return false;
// 		};
// 	});
// }

/* quang cao */
if($('.quangCao').length > 0){
	$('#closeQC').click(function(){
		$('.quangCao').addClass('closeQC');
	});

	$('#showQC').click(function(){
		$('.quangCao').removeClass('closeQC');
	});
}
/* end quang cao */


$(document).ready(function(){
	$('.room-listing.btn-booking-detail').on('click', function(){
		setTimeout(function(){
			$('#dateCheckoutBooking').val(get_tomorrows());
		}, 500);
		
	});
});

document.addEventListener('DOMContentLoaded', function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
}, false);