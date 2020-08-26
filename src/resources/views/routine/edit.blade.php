@extends('layouts.app')

@section('content')
<br>
<h5 class="font center">
    <span class="material-icons">
        create
    </span>
    ルーティンの編集
</h5>
<br>
<div class="row">
    <div class="col s12 m10 offset-m1 card">
        <form action="/routine/{{$routine->id}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{$routine->id}}">
            <input type="hidden" name="user_id" value="{{Auth::User()->id}}">

            <div class="row">
                <br>
                <div class="input-field col s12 m8 offset-m2">
                    <label for="name">ルーティン名</label>
                    @error('name')
                    <p class="red-text">{{$message}}</p>
                    @enderror
                    <input type="text" name="name" id="name" placeholder="(例) 平日のルーティン" value="{{$routine->name}}"
                        autofocus>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m8 offset-m2">
                    <label for="desc">説明</label>
                    @error('desc')
                    <p class="red-text">{{$message}}</p>
                    @enderror
                    <textarea name="desc" id="desc" wrap="hard" class="materialize-textarea"
                        placeholder="(例) 忙しい朝でもリラックスできる私のルーティンを紹介します！！">{{$routine->desc}}</textarea>
                    <div class="center">
                        <button type="reset" class="btn red lighten-2">クリア</button>
                        <button type="submit" class="btn">ルーティンアイテムの更新へ</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- <div class="center">
    <a class="btn"
        href="{{action('RoutineItemController@edit',['routine' => $routine->id ])}}">2,アイテム作成へ</a>
</div> --}}
<button class="btn" type="button" onclick="history.back()">
    <span class="material-icons">
        keyboard_backspace
    </span>
    もどる</button>
@endsection