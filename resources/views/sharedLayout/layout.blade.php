<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/asset/css/bootstrap.css">
    <title>@yield('title-header')</title>
</head>
<body>
    <div class="d-flex min-vh-100 flex-column">
        @include('sharedLayout.header')
        <div class="container-fluid bg-info p-3 flex-fill">
            @yield('content')
        </div>
        @include('sharedLayout.footer')
    </div>
</body>
    <script src="/asset/js/bootstrap.js"></script>
</html>