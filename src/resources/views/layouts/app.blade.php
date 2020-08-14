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
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel=”shortcut icon” href="{{ asset('favicon.ico')}}" />
</head>

<body>
    <div id="app" class="main-bg">
        <nav class="nav-wrapper main-color">
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
                    <a href="{{ route('login') }}">
                        <span class="material-icons">
                            login
                        </span>
                        ログイン</a>
                </li>
                @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}">
                        <span class="material-icons">
                            assignment_turned_in
                        </span>
                        登録</a>
                </li>
                @endif
            </ul>
            {{-- ログインしてたら表示--}}
            @else
            <ul class="right">
                <li>
                    <a href="/my-favorite">
                        <span class="material-icons">
                            bookmark_border
                        </span>
                        お気に入り</a>
                </li>
                <li>
                    <a href="/mypage">
                        <span class="material-icons">
                            fact_check
                        </span>
                        マイページ</a>
                </li>
                <li>
                    <a data-target="dropdown1" class="dropdown-trigger" href="#" role="button">
                        <span class="material-icons">
                            account_circle
                        </span>
                        {{ Auth::user()->name }} <span><i class="material-icons right">arrow_drop_down</i></span>
                    </a>
                </li>
            </ul>
            <!-- Dropdown Structure -->
            <ul id="dropdown1" class="dropdown-content">
                <li>
                    <a href="/profile/{{Auth::user()->name}}">
                        <span class="material-icons">
                            build_circle
                        </span>
                        プロフィール</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        <span class="material-icons">
                            exit_to_app
                        </span>
                        ログアウト
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            @endguest
        </nav>
        @can('isAdmin')
        <nav>
            <div class="nav-wrapper red lighten-3">
                <a href="/admin" class=" font brand-logo left">管理者</a>
                <ul class="right">
                    <li>
                        <a href="/admin">
                            ユーザー管理
                        </a>
                    </li>
                    <li>
                        <a href="/admin/routine">
                            投稿管理
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        @endcan


        <main>
            @yield('content')
        </main>
        <footer class="page-footer footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5><a class="white-text" href="/">
                                <span class="material-icons">
                                    home
                                </span>トップ</a></h5>
                        <p class="grey-text text-lighten-4">みんなのルーティンを共有しよう</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">
                            <span class="material-icons">
                                attach_file
                            </span>
                            リンク</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="/ranking">
                                    <span class="material-icons">sort</span>ランキング</a></li>
                            <li><a class="grey-text text-lighten-3" href="/favorite">
                                    <span class="material-icons">bookmark_border</span>
                                    お気に入り
                                </a></li>
                            <li><a class="grey-text text-lighten-3" href="mypage">
                                    <span class="material-icons">fact_check</span>マイページ</a></li>
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