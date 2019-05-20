<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('app.name', 'Login system') }}</title>
    <!-- Main style file -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    <main class="manual">
        @yield('content')
    </main>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Font-awesome script -->
    <script src="https://use.fontawesome.com/3ad7240f2b.js"></script>
    <!-- Datatables plugin script -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- Main script -->
    
    <script src="{{ URL::asset('js/script.js') }}" defer></script>

</body>

</html>
