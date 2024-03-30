<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hotel</title>
    <link rel="stylesheet" href="{{asset('style/stylemain.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Great Vibes">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
</head>
<body>
@include('mainpages.include.navbar')
@yield('content')
@include('mainpages.include.bookingmodal')
@include('mainpages.include.footer')
@include('mainpages.include.videomodal')
@include('mainpages.include.360modal')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js"></script>
<script src="/script/navbar.js"></script>
<script src="/script/booking.js"></script>
<script src="/script/welcome.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
@yield('script')
<script>
    $('.btn-booking').on('click', function () {
        let roomType = $(this).data('room-type');
        $('#roomType').val(roomType);
        $('#checkin').val(new Date().toLocaleDateString());
        let tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        $('#checkout').val(tomorrow.toLocaleDateString());
        $('[name="number_of_adults"]').val(1);
        $('[name="number_of_children"]').val(0);
        $('[name="number_of_rooms"]').val(1);
    });

    $('.btn-booking-1').on('click', function () {
        $('#checkin').val($('#checkinsource').val());
        $('#checkout').val($('#checkoutsource').val());
        $('[name="number_of_adults"]').val(1);
        $('[name="number_of_children"]').val(0);
        $('[name="number_of_rooms"]').val(1);
    });
</script>
</body>
</html>
<?php
