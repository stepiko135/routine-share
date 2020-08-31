@extends('layouts.app')

@section('content')
<br>
<h5 class="center font">1,新しいルーティンの作成</h5>
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
                    <input type="text" class="chara-count" name="name" id="name" placeholder="(例) 平日のルーティン" autofocus
                        value="{{old('name')}}" data-length="50">
                </div>
            </div>

            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <label for="desc">説明</label>
                    @error('desc')
                    <p class="red-text">{{$message}}</p>
                    @enderror
                    <textarea name="desc" id="desc" class="materialize-textarea chara-count"
                        placeholder="(例) 忙しい朝でもリラックスできる私のルーティンを紹介します！！" data-length="150">{{old('desc')}}</textarea>
                    <br>
                    <div class="center">
                        <button type="reset" class="btn red lighten-2">やりなおす</button>
                        <button type="submit" class="btn">作成</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<div class="font center">
    <span class="material-icons">
        arrow_drop_down
    </span><br>
    2,ルーティンアイテムの作成<br>
    <span class="material-icons">
        arrow_drop_down
    </span><br>
    3,完成！
</div>

<button class="btn" type="button" onclick="history.back()">
    <span class="material-icons">
        keyboard_backspace
    </span>
    もどる</button>
@endsection