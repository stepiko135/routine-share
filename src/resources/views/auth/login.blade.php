@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <div class="row">
        <div class="col　m8">
            <div class="card">
                <br>
                <h4 class="font center">
                    <span class="material-icons large">
                        login
                    </span>
                    ログイン</h4>
                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col s12 m8 offset-m2 input-field">
                                <label for="email">メールアドレス</label>
                                <input id="email" type="email" class=" @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m8 offset-m2 input-field">
                                <label for="password">パスワード</label>
                                <input id="password" type="password" class="@error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s6 offset-s4">

                                <label for="remember">
                                    <input type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <span>記憶する</span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s6 offset-s4">
                                <button type="submit" class="btn-large">
                                    <span class="material-icons">
                                        login
                                    </span>
                                    ログイン
                                </button>
                                <br>
                                @if (Route::has('password.request'))
                                <a class="grey-text" href="{{ route('password.request') }}">
                                    <span class="material-icons">
                                        error_outline
                                    </span>
                                    <small>
                                        パスワードを忘れましたか？
                                    </small>
                                </a>
                                @endif
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection