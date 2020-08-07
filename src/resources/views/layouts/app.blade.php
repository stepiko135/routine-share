<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Routine Share</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="nav-wrapper blue lighten-2">
            <a class="brand-logo" href="/home">
                <img src="{{asset('/img/logo.png')}}" alt="Routine Share" width="300px">
            </a>
            <!-- {{-- 導入したいもの　scrollspy Toasts  character-counter --}} -->
            <!-- Right Side Of Navbar -->
            <!-- Authentication Links -->
            @guest
            {{-- ログインしていないと表示 --}}
            <ul class="right">
                <li>
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
            </ul>
            {{-- ログインしてたら表示--}}
            @else
            <ul class="right">
                <li>
                    <a href="#">お気に入り</a>
                </li>
                <li>
                    <a href="/mypage">マイルーティン</a>
                </li>
                <li>
                    <a data-target="dropdown1" class="dropdown-trigger" href="#" role="button">
                        {{ Auth::user()->name }} <span><i class="material-icons right">arrow_drop_down</i></span>
                    </a>
                </li>
            </ul>
            <!-- Dropdown Structure -->
            <ul id="dropdown1" class="dropdown-content">
                <li>
                    <a href="#">プロフィール</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        ログアウト
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            @endguest
        </nav>

        <main>
            @yield('content')
        </main>
        <footer class="page-footer grey">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">フッター</h5>
                        <p class="grey-text text-lighten-4">ここへグリッドレイアウトなど併用してコンテンツ作成</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">リンク</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">リンク1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">リンク2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">リンク3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">リンク4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container center">
                    <small>© 2020 Copyright HIRO</small>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>