<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>xcar - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="{{ asset("images/favicon.png")}}" rel="shortcut icon" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Scripts -->
    <link  rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.min.css">
    <link  rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.bootstrap5.min.css">
    @vite(['resources/sass/app.scss', 'resources/css/style.css' , 'resources/js/app.js'])
</head>
<body>
    <div id="app">

        @if(auth()->user() && auth()->user()->role == 'admin' )
            @include('inc.sidebar')
        @endif
        @if(auth()->user() && auth()->user()->role == 'partner' )
            @include('inc.partner_sidebar')
        @endif
        <div class="@if(auth()->check()) content py-4 container-fluid @endif">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script defer src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.min.js" ></script>

    <script>
        let table = new DataTable('#table', {
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/ru.json',
            },
        });
    </script>

    @yield('js')
</body>
</html>
