<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
    {{-- cssファイルの呼び出し --}}
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__utilities">
                <a href="/" class="header__logo">
                    Todo
                </a>
                <nav>
                    <ul class="header-nav">
                        @if (Auth::check())
                        <li class="header-nav__item">
                            <a href="/categories" class="header-nav__link">カテゴリ一覧</a>
                        </li>
                        <li class="header-nav__item">
                            <form action="/logout" method="post">
                                @csrf
                                <button class="header-nav__button">ログアウト</button>
                            </form>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>