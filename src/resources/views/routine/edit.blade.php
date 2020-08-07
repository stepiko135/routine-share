@extends('layouts.app')

@section('content')
<h5>ルーティンの編集</h5>
<div class="container card">
    <form action="/routine/{{$routine->id}}" method="POST">
        @csrf
        @method('PATCH')
        <input type="hidden" name="id" value="{{$routine->id}}">
        <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
        <label for="name">ルーティン名</label>

        @error('name')
        <p class="red-text">{{$message}}</p>
        @enderror

        <input type="text" name="name" id="name" placeholder="(例) 平日のルーティン" value="{{$routine->name}}" 　autofocus>
        <label for="desc">説明</label>

        @error('desc')
        <p class="red-text">{{$message}}</p>
        @enderror

        <textarea name="desc" id="desc" cols="50" rows="10"
            placeholder="(例) 忙しい朝でもリラックスできる私のルーティンを紹介します！！">{{$routine->desc}}</textarea>
        <button type="submit" class="btn">更新</button>
        <button type="reset" class="btn red lighten-2">クリア</button>
    </form>
</div>
<br><br>

{{-- 新規ルーティンアイテム作成 --}}
<h5>新しいアイテムを追加</h5>
@if ($errors)
<ul>
    @foreach ($errors->all() as $error)
    <li class="red-text" >{{$error}}</li>
    @endforeach
</ul>
@endif
<form action="/routine_item/" id="submitItems" class="items" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{Auth::id()}}">
    <input type="hidden" name="routine_id" value="{{$routine->id}}">
    <div class="container card">


        <label>時間<input type="time" name="time" value="{{old('time')}}" required></label>
        <label>アイテム名<input type="text" name="title" placeholder="(例) コーヒーを飲む" autofocus
                value="{{old('title')}}"></label>
        <label>説明<textarea name="desc" cols="50" rows="10"
                placeholder="(例) 濃いめのコーヒーがおすすめです！">{{old('desc')}}</textarea></label>
        <button type="submit" form="submitItems" id="submit" class="btn">アイテム送信</button>
    </div>
</form>

{{-- 既存ルーティンアイテム編集、削除 --}}
@foreach ($items as $item)
<form action="/routine_item/{{$item->id}}" method="POST">
    @csrf @method('PUT')
    <input type="hidden" name="user_id" value="{{Auth::id()}}">
    <input type="hidden" name="routine_id" value="{{$routine->id}}">
    <div class="container card">
        <label>時間<input type="time" name="time" value="{{$item->time}}" required></label>
        <label>アイテム名<input type="text" name="title" placeholder="(例) コーヒーを飲む" autofocus
                value="{{$item->title}}"></label>
        <label>説明<textarea name="desc" cols="50" rows="10"
                placeholder="(例) 濃いめのコーヒーがおすすめです！">{{$item->desc}}</textarea></label>
        <button type="submit" class="btn">編集</button>
</form>

<a href="/routine_item/{{$item->id}}" class="btn red lighten-2" onclick="event.preventDefault();
        document.getElementById('delete-item').submit()">削除</a>
<form id="delete-item" action="/routine_item/{{$item->id}}" method="POST">
    @csrf @method('DELETE')
</form>
</div>
</div>
@endforeach
@endsection