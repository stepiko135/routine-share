<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="nav-wrapper light-blue">
            <a class="brand-logo" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
                <!-- {{-- 導入したいもの　scrollspy Toasts  character-counter --}} -->
                <!-- Right Side Of Navbar -->
                <!-- Authentication Links -->
                @guest
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
                {{-- ログインしてたら表示される --}}
                @else
                <ul class="right">
                    <li>
                        <a data-target="dropdown1" class="dropdown-trigger" href="!#" role="button">
                            {{ Auth::user()->name }} <span><i class="material-icons right">arrow_drop_down</i></span>
                        </a>
                    </li>
                </ul>
                <!-- Dropdown Structure -->
                <ul id="dropdown1" class="dropdown-content">
                    <li>
                        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                @endguest
        </nav>

        <main class="">
            @yield('content')
        </main>
        <script>
            $(document).ready(function(){
            $(".dropdown-trigger").dropdown()});
        </script>
    </div>
</body>

</html>