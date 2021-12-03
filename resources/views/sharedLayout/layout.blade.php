<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/asset/css/bootstrap.css">
    <title>Keypedia</title>
</head>
<body>
    @include('sharedLayout.header')
    <div class="container-fluid mt-4">
        @yield('content')
    </div>
    @include('sharedLayout.footer')
</body>
    <script src="/asset/js/bootstrap.js"></script>
</html>