@extends('layouts.app')

@section('content')
<br>
<h5 class="font center">お気に入りルーティン一覧</h5>
<br>
@if (count($favorites)>0)
@foreach ($favorites as $favorite)
<div class="row">
    <div class="col s12 m8 offset-m2">
        <div class="card">
            <div class="card-image">
            </div>
            <div class="card-content">
                <a href="/profile/{{$favorite->user->name}}">
                    <span class="material-icons">
                        <img src="{{$favorite->user->image}}" class="circle" alt="account_circle" width="37px"
                            height="37px">
                    </span>
                    {{$favorite->user->name}}
                </a>
                <p>
                    <span class="material-icons">
                        import_contacts
                    </span>
                    ：{{$favorite->name}}
                </p>
                <p> {{$favorite->desc}}</p>
            </div>
            <div class="card-action">
                <a class="btn right" href="/routine/{{$favorite->id}}">ルーティンを見る
                    <span class="material-icons">forward</span>
                </a>
                <br>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<div class="center">
    <h5 class="font" >お気に入りに追加してみよう！</h5>
    <a class="btn" href="{{route('home')}}">探しに行く</a>
</div>
@endif
<button class="btn" type="button" onclick="history.back()">
    <span class="material-icons">
        keyboard_backspace
    </span>
    もどる</button>
@endsection