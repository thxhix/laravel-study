<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Learn - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <header class="container">
        <ul class="header-nav">
            <div class="left">
                <li class="header-nav__item"><a href="/">Главная</a></li>
                <li class="header-nav__item"><a href="/posts">Посты</a></li>
                <li class="header-nav__item"><a href="/contact">Контакты</a></li>
            </div>

            <div class="right">
                @guest
                    <li class="header-nav__item"><a href="{{ route('login') }}">Войти</a></li>
                    @if (Route::has('register'))
                        <li class="header-nav__item"><a href="{{ route('register') }}">Регистрация</a></li>
                    @endif
                @else
                    <li class="header-nav__item"><a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); getElementById('logout').submit()">({{ Auth::user()->name }}) Выйти</a></li>
                    <form method="POST" id="logout" action="{{ route('logout') }}">@csrf</form>
                @endguest

            </div>
        </ul>
    </header>
    <main class="container">@yield('content')</main>
</body>

</html>
