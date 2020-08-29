@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <div class="card">
        <br>
        <h4 class="font center">
            <span class="material-icons large">assignment_turned_in</span>
            登録</h4>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row">
                    <div class="input-field col s12 m8 offset-m2">
                        <label for="name">名前</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m8 offset-m2">
                        <label for="email">メールアドレス</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m8 offset-m2">
                        <label for="password">パスワード</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m8 offset-m2">
                        <label for="password-confirm">パスワード確認</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>
                <div class="center">
                    <button type="submit" class="btn btn-primary">
                        <span class="material-icons">done_outline</span>
                        登録する
                    </button>
                </div>
                <br>
            </form>
        </div>
    </div>


</div>
</div>
@endsection