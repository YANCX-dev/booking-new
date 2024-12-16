<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fast booking hotel</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script defer src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
@include('inc.navbar')

@yield('content')

@include('inc.footer')
</body>
</html>
