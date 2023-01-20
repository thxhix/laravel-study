<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Learn - @yield('title')</title>
</head>

<body>
    <header>
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/posts">Посты</a></li>
        </ul>
    </header>
    <main>@yield('content')</main>
</body>

</html>
