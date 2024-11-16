(function($) {
    "use strict";
   	// Validate and send form booking
   	$(document).ready(function() {

        if ($('#booking-room-form-full').length > 0 && $('#booking-form-single').length == 0 && $('.btnBookingInRooms').length == 0) {
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
        }


        var filter_select = 'data-filter';
        changeSelectOption($("select#room_id"), $('select#quantum'), filter_select);
        $("select#room_id").on('change', function(e) {
            changeSelectOption($(this), $('select#quantum'), filter_select);
        });
        function changeSelectOption($this, select2, $filter){
            if ($this.data('options') === undefined) {
                /*Taking an array of all options-2 and kind of embedding it on the select1*/
                $this.data('options', select2.find('option').clone());
            }

            var id = $this.val() ? $this.val() : 0;
            if($this.data('options')){
                var options = $this.data('options').filter('['+$filter+'=' + id + ']');
                select2.html(options);
                if(!id || id==0){
                    select2.prop('disabled', 'disabled');
                }else{
                    select2.prop('disabled', false);
                }
                $("select#quantum").val($("select#quantum option:first").val());
                $('#booking-room-form-full .awe-select').each(function(index, el) {
                    $(this).selectpicker('refresh');
                });
            }

            $('.price-room').html($this.find('option:selected').attr('data-price'));
        }

        $('.btn-booking-detail').on('click', function(){
            var strOptionRoom = '';

            var valDateIn = $('#booking-form-single #date-checkin').val();

            var valDateOut = $('#booking-form-single #date-checkout').val();

            var kindRoom = $(this).attr('data-id');

            var valNumberRoom = parseInt($(this).attr('numberroom'));

            if(!valDateIn) $('#dateCheckinBooking').val(getTimeNow());
            else $('#dateCheckinBooking').val(valDateIn);

            if(!valDateOut) $('#dateCheckoutBooking').val(getTimeNow());
            else $('#dateCheckoutBooking').val(valDateOut);

            if($("select#room_id option[value='"+kindRoom+"']").length > 0){
                $("select#room_id").selectpicker('val', kindRoom);

                changeSelectOption($("select#room_id"), $('select#quantum'), filter_select);
            }


        });

         jQuery.validator.addMethod("greaterThan",
         function(value, element, params) {
            var from = value.split("-");
            var f = new Date(from[2], from[1], from[0]);
            var date_string = f.getFullYear() + "/" + f.getMonth() + "/" + f.getDate();

            var to = $(params).val().split("-");
            var t = new Date(to[2], to[1], to[0]);
            var date_string_t = t.getFullYear() + "/" + t.getMonth() + "/" + t.getDate();

             if (!/Invalid|NaN/.test(new Date(date_string))) {

                 return new Date(date_string) > new Date(date_string_t);
             }

             return isNaN(value) && isNaN($(params).val())
                 || (Number(value) > Number($(params).val()));
         },'Must be greater than {0}.');

         $(function () {
           $('[data-toggle="tooltip"]').tooltip()
         })


   	    $('#form-booking-room').validate({
   	         rules: {
   	            arrive_date: {
   	                required: true,
   	                minlength: 10
   	            },
   	            departure_date: {
   	                required: true,
   	                minlength: 10
   	            },
   	            adults:{
   	                required: true,
   	                minlength: 1
   	            },
   	            children:{
   	               required:false
   	            }
   	         },
   	         messages: {

   	        },
   	        submitHandler: submitForm

   	    });

   	    function submitForm()
   	    {
   	        var data = $("#form-booking-room").serializeArray();
   	        $.each(data, function(i, v){
   	            $('#booking-room-form-full input[name=' +v['name'] + '], #booking-room-form-full select[name=' +v['name'] + ']').val(v['value']);
   	        });
            changeSelectOption($("select#room_id"), $('select#quantum'), filter_select);

   	        $('#bookRoomDialog').modal('show');
   	        return false;
   	    }
        const booking_form = $('#booking-room-form-full');
   	    booking_form.validate({
   	         rules: {
   	            arrive_date: {
   	                required: true,
   	                minlength: 10
   	            },
   	            departure_date: {
   	                required: true,
   	                minlength: 10,
                      greaterThan: "#dateCheckinBooking"
   	            },
   	            adults:{
   	                required: true,
   	                minlength: 1
   	            },
   	            children:{
   	               required:false
   	            },
                quantum:{
                    required: true
                },
                room_id:{
                    required: true
                },
   	            full_name: {
   	                required: true,
   	                minlength: 5,
   	                maxlength: 150,
   	            },
   	            phone: {
   	                required: true,
   	                minlength: 5,
   	                maxlength: 150,
   	            },
   	            email: {
   	                required: true,
   	                minlength: 5,
   	                maxlength: 150,
   	                email: true
   	            },
   	            company: {
   	                maxlength: 200,
   	            },
   	            special_requirements: {
   	                maxlength: 500,
   	            },
   	            pickup_requirements: {
   	                maxlength: 500,
   	            },
   	        },
   	        messages: {

   	        },
   	        submitHandler: submitFormAjax

   	    });

   	    function submitFormAjax()
   	    {
            var $data = booking_form.serialize();
            var $url = booking_form.attr('action');
            var $button = $('#booking-room-form-full button.book-now');
            var text = $button.html();
            var loader = $button.data('loader');

            $.ajax({
                url: "/booking",
                type: 'POST',
                data: $data,
                beforeSend: function() {
                    $button.attr('disabled', true).html('<span><i class="fa fa-spinner fa-spin"></i> ' + loader +'</span>');
                }
            })
            .done(function(data) {
                if(data.error == false){

                    $('#booking-room-form-full input[type=text]').val('');

                    $('#continueBooking').modal('hide');

                    $('#bookRoomSuccessfully .message-booking-successfully').html(data.message);

                    $('#bookRoomSuccessfully').modal('show');
                }else{
                    $('label.error-booking').html(data.message);
                }
            })
            .fail(function(data) {
                $('label.error-booking').html(data.message);
            })
            .always(function(data) {
                $button.attr('disabled', false).html(text);
            });

   	        return false;
   	    }

   	    $('.btn-booking-slider').on('click', function(){
   	        submitForm();
   	    });
   	});

})(jQuery);
