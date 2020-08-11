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
                {{-- <img src="images/sample-1.jpg">
                <span class="card-title">Card Title</span> --}}
            </div>
            <div class="card-content">
                <p>投稿者：{{$favorite->user->name}}</p>
                <p>タイトル：{{$favorite->name}}</p>
                <p>内容：{{$favorite->desc}}</p>
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
<h5>お気に入りに追加してみよう</h5>
<a class="btn" href="/home">探しに行く</a>
@endif
<button class="btn" type="button" onclick="history.back()">
    <span class="material-icons">
        keyboard_backspace
    </span>
    もどる</button>
@endsection