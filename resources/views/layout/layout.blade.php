<!DOCTYPE html>
<html>
<head>
    <title>Du Lich</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/paginationjs@2.1.5/dist/pagination.min.css">
    <link href="{{asset('style/style.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@if(auth()->check())
    <div class="d-flex" style="background: rgba(236, 249, 250, 0.8)">
        <div class="d-flex flex-column">
            @include('include.navUser')
            <div class="d-flex flex-row">
                @include('include.navAdmin')
                <div class="container-fluid" style="width: calc(100vw - 250px);">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@else
    @yield('login')
@endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.6.0/pagination.min.js"></script>
    @yield('script')
</body>
</html>
<?php
