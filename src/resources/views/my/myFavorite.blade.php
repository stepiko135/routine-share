@extends('layouts.app')

@section('content')
<p>自分のお気に入り登録したルーティンの一覧です。</p>
@if (count($favorites)>0)
    @foreach ($favorites as $favorite)
    <div class="container card">
    <p>投稿者：{{$favorite->user->name}}</p>
    <p>タイトル：{{$favorite->name}}</p>
    <p>内容：{{$favorite->desc}}</p>
    <a class="btn" href="/routine/{{$favorite->id}}">ルーティンを見る</a>
    </div>
    @endforeach
@else
<h5>お気に入りに追加してみよう</h5>
<a class="btn" href="/home">探しに行く</a>
@endif
<button class="btn" type="button" onclick="history.back()">もどる</button>
@endsection