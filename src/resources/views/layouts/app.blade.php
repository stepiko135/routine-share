<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-176138945-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-176138945-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- OGP設定 --}}
    <meta property="og:url" content="http://www.routine-share.work">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Routine Share" />
    <meta property="og:title" content="Routine Share">
    <meta property="og:description" content="あなたのルーティン、シェアしませんか？">
    <meta property="og:image" content="https://routine-share.s3-ap-northeast-1.amazonaws.com/others/ogp.png" />
    <meta name="twitter:card" content="summary_large_image" />

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
            <a class="brand-logo" href="{{route('home')}}">
                <img src="{{asset('/img/logo.png')}}" alt="Routine Share" width="220px">
            </a>
            <!-- {{-- 導入したいもの　scrollspy Toasts  character-counter --}} -->
            <!-- Right Side Of Navbar -->
            <!-- Authentication Links -->
            <a href="#" data-target="for-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            @guest
            {{-- ログインしていないとき表示 --}}
            <ul class="right hide-on-med-and-down">
                <li>
                    <form method="POST" action="{{ route('login') }}">@csrf
                        <input type="hidden" name="email" value="guest@test.com">
                        <input type="hidden" name="password" value="mA7SkEJU">
                        <button class="btn red lighten-2" type="submit">
                            <span class="material-icons">
                                done_outline
                            </span>
                            かんたんログイン
                        </button>
                    </form>
                </li>
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
            <ul class="right hide-on-med-and-down">
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
                            <img src="{{Auth::user()->image}}" class="circle small-profile" alt="account_circle">
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
        {{-- モバイルでログインしていないとき表示 --}}
        @guest
        <ul class="sidenav" id="for-mobile">
            <li>
                <form method="POST" action="{{ route('login') }}">@csrf
                    <input type="hidden" name="email" value="guest@test.com">
                    <input type="hidden" name="password" value="mA7SkEJU">
                    <button class="btn red lighten-2" type="submit">
                        <span class="material-icons">
                            done_outline
                        </span>
                        かんたんログイン
                    </button>
                </form>
            </li>
            <li>
                <a class="font" 　href="{{ route('login') }}">
                    <span class="material-icons">
                        login
                    </span>
                    ログイン</a>
            </li>
            @if (Route::has('register'))
            <li>
                <a class="font" 　href="{{ route('register') }}">
                    <span class="material-icons">
                        assignment_turned_in
                    </span>
                    登録</a>
            </li>
            @endif
        </ul>
        @else
        {{-- モバイルでログインしているとき表示 --}}
        <ul class="sidenav" id="for-mobile">
            <li>
                <div class="user-view">
                    <div class="background main-color">
                        {{-- <img src="{{Auth::user()->image}}"> --}}

                    </div>
                    <a href="/profile/{{Auth::user()->name}}"><img class="circle" src="{{Auth::user()->image}}"></a>
                    <a href="/profile/{{Auth::user()->name}}"><span class="white-text name">{{ Auth::user()->name }}</span></a>
                    <a href="/profile/{{Auth::user()->name}}"><span class="white-text email">{{ Auth::user()->email }}</span></a>
                </div>
            </li>
            <li>
                <a class="font" 　href="/profile/{{Auth::user()->name}}">
                    <span class="material-icons">
                        build_circle
                    </span>
                    プロフィール</a>
            </li>
            <li>
                <a class="font" 　href="/my-favorite">
                    <span class="material-icons">
                        bookmark_border
                    </span>
                    お気に入り</a>
            </li>
            <li>
                <a class="font" 　href="/mypage">
                    <span class="material-icons">
                        fact_check
                    </span>
                    マイページ</a>
            </li>
            <li>
                <a class="font" 　href="{{ route('logout') }}" onclick="event.preventDefault();
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
                            <li><a class="grey-text text-lighten-3" href="/my-favorite">
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
                    <a class="white-text" href="https://github.com/stepiko135" target="_blank"><small>© 2020 Copyright HIRO</small></a>
                </div>
            </div>
        </footer>
    </div>
    @if(Session::has('message'))
    <script>
        // Materialize 初期化
document.addEventListener('DOMContentLoaded', function() {
    M.AutoInit();
    M.toast({html: '{{ session('message') }}'})
    });
    </script>
    @endif
</body>

</html>