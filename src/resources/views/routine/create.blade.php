@extends('layouts.app')

@section('content')
<br>
<h5 class="center font">新しいルーティンの作成</h5>
<br>
<div class="row">
    <div class="col s12 m8 offset-m2 card">
        <br>
        <form action="/routine" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::User()->id}}">

            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <label for="name">ルーティン名</label>
                    @error('name')
                    <p class="red-text">{{$message}}</p>
                    @enderror
                    <input type="text" name="name" id="name" placeholder="(例) 平日のルーティン" autofocus
                        value="{{old('name')}}">
                </div>
            </div>

            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <label for="desc">説明</label>
                    @error('desc')
                    <p class="red-text">{{$message}}</p>
                    @enderror
                    <textarea name="desc" id="desc" class="materialize-textarea"
                        placeholder="(例) 忙しい朝でもリラックスできる私のルーティンを紹介します！！">{{old('desc')}}</textarea>
                    <br>
                    <div class="center">
                        <button type="submit" class="btn">作成</button>
                        <button type="reset" class="btn">やりなおす</button>
                        <a class="btn" href="/">続けてアイテムを作る</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<button class="btn" type="button" onclick="history.back()">
    <span class="material-icons">
        keyboard_backspace
    </span>
    もどる</button>
@endsection