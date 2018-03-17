<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
{{--Title--}}
@yield('title')
<!-- Styles -->
    @include('layouts.styles')
</head>
<body>
<!-- Navigation -->
@include('layouts.nav')
<!-- All_content (content and sidebar) -->

{{--@yield('all_content')--}}

<div class="container">
    <div class="row">
        <!-- content page -->
        <div class="col-md-8" style="margin-top: 25px">
            @yield('content')
        </div>

        <!-- sidebar page -->
        <div class="col-md-4">
            @yield('sidebar')
        </div>
    </div>
</div>


<!-- Footer -->
@include('layouts.footer')
<!-- Scripts -->
@include('layouts.scripts')
</body>
</html>