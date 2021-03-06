<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/asset/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/asset/css/app.css') }}">
    <title>@yield('title-header')</title>
    <script src="/asset/js/jquery-3.6.0.min.js"></script>
    <script src="/asset/js/bootstrap.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('sharedLayout.header')
    <div class="container-fluid p-3 flex-fill" style="background-color: #80deea;">
        @yield('content')
    </div>
    @include('sharedLayout.footer')
</body>
</html>