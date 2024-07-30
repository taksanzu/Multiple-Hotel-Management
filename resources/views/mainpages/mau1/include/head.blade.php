<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta property="og:locale" content="vi_VN">
<meta property="og:type" content="website">
@if($user->settings->where('name', 'name')->first())
    <meta property="og:title" content="{{ optional($user->settings->where('name', 'name')->first())->value }}">
    <meta property="og:description" content="{{optional($user->settings->where('name', 'name')->first())->value}}">
    <meta property="og:site_name" content="{{optional($user->settings->where('name', 'name')->first())->value}}">
@else
    <meta property="og:title" content="link 360">
    <meta property="og:description" content="link 360">
    <meta property="og:site_name" content="link 360">
@endif
<meta property="og:url" content="https://link360.vn/">
@if($user->settings->where('name', 'logo')->first())
    <meta property="og:image"
          content="{{ asset('logo').'head.blade.php/'.optional($user->settings->where('name', 'logo')->first())->value }}">
@else
    <meta property="og:image" content="{{ asset('upload/placeholder.png') }}">
@endif
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css"
      rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
