<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    <title>
        @section('title')
        @show
        | {{ config('app.name', 'Laravel') }}
    </title>
    @section('stylesheets')
        <link rel="stylesheet" href="{{asset('dashboard/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/styles.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/responsive.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    @show
</head>

<body>
    @include('layouts.partials.dashboard-navbar')

    <div class="dashboardUi">
        <div class="container-fluid">
            <div class="row">
                @include('layouts.partials.dashboard-sidebar')
                
                @yield('content')
            </div>
        </div>
    </div>



    <script type="text/javascript " src="js/jquery-3.2.1.min.js "></script>
    <script type="text/javascript " src="js/bootstrap.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="js/owl.carousel.min.js "></script>
    <script src=" js/scripts.js "></script>
    @include('layouts.partials.alert')
</body>

</html>