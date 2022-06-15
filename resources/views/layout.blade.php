<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield('pageTitle') | User Profile </title>
    <head>
        @include('layouts.css.links')
    </head>
    @if (!Route::currentRouteNamed('login'))  
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('layouts.navbar')
            @include('layouts.sidebar')
            <div class="content-wrapper">
                @yield('body')
            </div>
            @include('layouts.footer')
        </div>
            @include('layouts.js.scripts')
    </body>
    @else
    <body class="hold-transition login-page">
            @yield('content')
            @include('layouts.js.scripts')
    </body>
    @endif
</html>