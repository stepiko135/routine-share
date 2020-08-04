@extends('layouts.app')

@section('content')
<h5>ルーティンの編集</h5>
<div class="container card">
<form action="/mypage/{{$routine->id}}" method="POST">
        @csrf 
        @method('PATCH')
        <input type="hidden" name="id" value="{{$routine->id}}">
        <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
        <label for="name">ルーティン名</label>
    <input type="text" name="name" id="name" placeholder="(例) 平日のルーティン" value="{{$routine->name}}"　autofocus>
        <label for="desc">説明</label>
    <textarea name="desc" id="desc" cols="50" rows="10" placeholder="(例) 忙しい朝でもリラックスできる私のルーティンを紹介します！！">{{$routine->desc}}</textarea>
        <button type="submit" class="btn">更新</button>
        <button type="reset" class="btn">クリア</button>
    </form>
</div>
@endsection