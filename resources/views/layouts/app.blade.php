<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gestão Educacional</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        @include('partials._navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script src="{{ asset('js/site.js') }}"></script>

    @include('partials._toastr')
</body>
</html>
