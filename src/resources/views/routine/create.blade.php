@extends('layouts.app')

@section('content')
<h5>新しいルーティンの作成</h5>
<div class="container card">
    <form action="/routine" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
        <label for="name">ルーティン名</label>
        <input type="text" name="name" id="name" placeholder="(例) 平日のルーティン" autofocus>
        <label for="desc">説明</label>
        <textarea name="desc" id="desc" cols="50" rows="10" placeholder="(例) 忙しい朝でもリラックスできる私のルーティンを紹介します！！"></textarea>
        <button type="submit" class="btn">作成</button>
        <button type="reset" class="btn">やりなおす</button>
        <a class="btn" href="/">続けてアイテムを作る</a>
    </form>
</div>
@endsection