<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app" class="main">
        <router-view></router-view>
        <parent-tab></parent-tab>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/master.js') }}"></script>

</body>
</html>
