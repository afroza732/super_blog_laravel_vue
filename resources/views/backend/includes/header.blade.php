<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style type="text/css">
        .notifyjs-corner {
            z-index: 10000 !important;
        }

    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" id="app">
