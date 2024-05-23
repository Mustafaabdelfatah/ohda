<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>عقارات</title>
    <link rel="stylesheet" href="{{ asset('front/') }}/css/vendor/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{ asset('front/') }}/css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{ asset('front/') }}/css/style.css"/>
</head>
<body>


    @include('front.includes.haeder')
    @yield('content')
    @include('front.includes.footer')
    <script src="{{ asset('front/') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('front/') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('front/') }}/js/script.js"></script>
</body>
</html>
