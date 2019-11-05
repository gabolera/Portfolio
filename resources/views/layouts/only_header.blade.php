<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link href="{{asset('tabler/css/dashboard.css')}}" rel="stylesheet" />
    <script src="{{asset('tabler/js/dashboard.js')}}"></script>
    <!-- c3.js Charts Plugin -->
    <link href="{{asset('tabler/plugins/charts-c3/plugin.css')}}" rel="stylesheet" />
    <script src="{{asset('tabler/plugins/charts-c3/plugin.js')}}"></script>
    <!-- Google Maps Plugin -->
    <link href="{{asset('tabler/plugins/maps-google/plugin.css')}}" rel="stylesheet" />
    <script src="{{asset('tabler/plugins/maps-google/plugin.js')}}"></script>
    <!-- Input Mask Plugin -->
    <script src="{{asset('tabler/plugins/input-mask/plugin.js')}}"></script>
</head>
<body>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
