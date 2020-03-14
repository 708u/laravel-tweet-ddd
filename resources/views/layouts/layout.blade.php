<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @yield('head')
    <title>@yield('title')</title>
</head>

<body>
    @yield('content')
    @yield('foot')

    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
