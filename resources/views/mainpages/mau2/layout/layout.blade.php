<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.majesticnhatranghotel.com/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 May 2024 13:37:59 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ optional($user->settings->where('name', 'name')->first())->value }}</title>
    <meta name="description" content="{{ optional($user->settings->where('name', 'name')->first())->value }}">
    <meta name="keywords" content="{{ optional($user->settings->where('name', 'name')->first())->value }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Home">
    <meta property="og:description" content="{{ optional($user->settings->where('name', 'name')->first())->value }}">
    <meta property="og:image" content="{{ asset('logo').'/'.optional($user->settings->where('name', 'logo')->first())->value }}">
    <meta name="twitter:title" content="Home">
    <meta name="twitter:description" content="{{ optional($user->settings->where('name', 'name')->first())->value }}">

    <link media="all" type="text/css" rel="stylesheet" href="{{asset('vendor/core/plugins/gallery/css/gallery.css')}}">
    <link media="all" type="text/css" rel="stylesheet" href="{{asset('vendor/core/plugins/language/css/language-public.css')}}">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="icon shortcut" href="{{ asset('logo').'/'.optional($user->settings->where('name', 'logo')->first())->value }}">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('../cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700&amp;subset=latin,vietnamese" rel="stylesheet" type="text/css" />

    <!-- Calendar -->
    <link rel="stylesheet" href="{{asset('majestic/asset/css/datedropper.min.css')}}">
    <link rel="stylesheet" href="{{asset('majestic/asset/css/custom-calendar.css')}}">
    <!-- Slick Slide -->
    <link rel="stylesheet" type="text/css" href="{{asset('majestic/asset/css/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('majestic/asset/css/slick-theme.css')}}" />
    <!-- Date Range Picker -->
    <link rel="stylesheet" href="{{asset('majestic/asset/css/daterangepicker.min.css')}}">
    <!-- Style Fancy box  -->
    <link rel="stylesheet" type="text/css" href="{{asset('majestic/asset/css/jquery.fancybox8cbb.css?v=2.1.5')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('majestic/asset/css/jquery.fancybox-thumbsf2ad.css?v=1.0.7')}}" />
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('majestic/asset/css/top-menu.css')}}">
    <link rel="stylesheet" href="{{asset('majestic/asset/css/book-now.css')}}">
    <link rel="stylesheet" href="{{asset('majestic/asset/css/style.css')}}">

    <style type="text/css">
        .selectLanguage button{
            text-transform: uppercase;
        }
        .introduce-hotel h2{
            text-transform: uppercase;
        }
    </style>

</head>

<body>
<header>
@include('mainpages.mau2.include.navbar')
</header>
@yield('content')
@include('mainpages.mau2.include.footer')

<style type="text/css">
    #continueBooking .form-group label.error{
        position: absolute;
        font-size: 10px;
        color: red;
        text-transform: none;
    }
    #continueBooking .form-group .awe-select  label.error, #continueBooking .form-group .input-group  label.error{
        left: 0;
        bottom: -20px;
    }
    #continueBooking .form-group .bootstrap-select .btn-default{
        border: none;
    }
</style>
<!-- popup form booking room -->
@include('mainpages.mau2.include.bookingModal')
<!-- end popup form booking room -->

<!-- jQuery -->
@include('mainpages.mau2.include.script')
<!--End of Tawk.to Script-->
</body>
</html>
