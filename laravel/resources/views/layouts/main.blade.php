<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @yield('menu')
    @yield('content')

    <style src="{{ asset('js/app.js') }}"></style>
</body>
</html>
