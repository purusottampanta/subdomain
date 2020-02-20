<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')
    <title>
        @section('title')
        @show
        | {{ config('app.name', 'Laravel') }}
    </title>

    @section('stylesheets')
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">

    @show

</head>
<body>
    <div id="app">
        @include('layouts.partials.navbar')
        @yield('content')
        @include('layouts.partials.footer')
    </div>

    @section('javascripts')
        <script>
            const BASE_URL = "{{ url('/') }}";
            const CURRENT_URL = "{{ url()->current() }}";
        </script>
        {{-- <script type="text/javascript " src="{{asset('js/jquery-3.2.1.min.js')}} "></script> --}}
        {{-- <script type="text/javascript " src="{{asset('js/bootstrap.min.js')}} "></script> --}}
        <script type="text/javascript " src="{{asset('js/owl.carousel.min.js')}} "></script>
        <script src="{{asset('js/scripts.js')}} "></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    @show
</body>
</html>
