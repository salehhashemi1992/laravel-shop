<!DOCTYPE html>
<html lang="fa" dir="rtl">
<?php $base = env('MAIN_PANEL_ASSETS_DIR') ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="{{$base}}/theme/css/bootstrap.css">

    <link rel="stylesheet" href="{{$base}}/theme/vendors/iconly/bold.css">

    <link rel="stylesheet" href="{{$base}}/theme/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{$base}}/theme/vendors/bootstrap-icons/bootstrap-icons.css">

    <link rel="stylesheet" href="{{asset('theme/css/admin.css')}}">
    <link rel="shortcut icon" href="/theme/images/favicon.svg" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v32.102/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="app">
    @include('admin.layouts.sidebar')
    <div id="main">
        @include('admin.layouts.navbar')

        @yield('content')

        @include('admin.layouts.footer')
    </div>
</div>
<script src="{{$base}}/theme/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{$base}}/theme/js/bootstrap.bundle.min.js"></script>

<script src="{{$base}}/theme/vendors/apexcharts/apexcharts.js"></script>
<script src="{{$base}}/theme/js/pages/dashboard.js"></script>

<script src="{{asset('theme/js/admin.js')}}"></script>
@include('sweet::alert')
</body>

</html>
