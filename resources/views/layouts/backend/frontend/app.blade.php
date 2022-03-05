<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title')-{{ config('', 'LOOK AT ME') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/preview.css') }}">
    <link href='//fonts.googleapis.com/css?family=News+Cycle' rel='stylesheet' type='text/css'>
    @stack('css')

</head>
<body>
    <div class="container_12">

        @include('layouts.backend.frontend.inc.header')

        @yield('content')

    </div>

    @include('layouts.backend.frontend.inc.footer')

    <script type="text/javascript" src="https://ff.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B310-BB3FDD723AC1/main.js" charset="UTF-8"></script>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <script src="{{ asset('assets/frontend/js/libs/modernizr-1.6.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/thumbnails_generator.js') }}"></script>
    @stack('js')
</body>
</html>
