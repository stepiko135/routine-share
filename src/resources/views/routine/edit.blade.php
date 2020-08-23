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
                        <button type="submit" class="btn">更新</button>
                        <button type="reset" class="btn red lighten-2">クリア</button>
                    </div>
                    <br>
                    <div class="center">
                        <a class="btn" href="{{action('RoutineController@show',['routine' => $routine->id ])}}">ページで確認する</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<br>
<br>

{{-- 新規ルーティンアイテム作成 --}}
<h5 class="font center">
    <span class="material-icons">
        add
    </span>
    新しいアイテムを追加
</h5>
@if ($errors)
<ul>
    @foreach ($errors->all() as $error)
    <li class="red-text">{{$error}}</li>
    @endforeach
</ul>
@endif
<div class="row">
    <div class="col s12 m8 offset-m2 card">
        <br>
        <form action="/routine-item" id="submitItems" class="items" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <input type="hidden" name="routine_id" value="{{$routine->id}}">

            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <label for="time">時間</label>
                    <input id="time" type="time" name="time" value="{{old('time')}}" required>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m8 offset-m2">
                    <label for="title">アイテム名</label>
                    <input type="text" id="title" name="title" placeholder="(例) コーヒーを飲む" autofocus
                        value="{{old('title')}}">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m8 offset-m2">
                    <label for="desc">説明</label>
                    <textarea name="desc" id="desc" class="materialize-textarea" wrap="hard"
                        placeholder="(例) 濃いめのコーヒーがおすすめです！">{{old('desc')}}</textarea>
                </div>
            </div>

            <div class="center">
                <button type="submit" form="submitItems" id="submit" class="btn">アイテム送信</button>
            </div>
            <br>
        </form>
    </div>
</div>

{{-- 既存ルーティンアイテム編集、削除 --}}
@if ($items->count()>0)
<h5 class="font center">
    <span class="material-icons">
        create
    </span>
    アイテムを編集
</h5>
@endif

@foreach ($items as $item)
<div class="row">
    <form action="/routine-item/{{$item->id}}" method="POST">
        @csrf @method('PUT')
        <input type="hidden" name="user_id" value="{{Auth::id()}}">
        <input type="hidden" name="routine_id" value="{{$routine->id}}">
        <div class="col s12 m8 offset-m2 card">
            <br>
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <label>時間<input type="time" name="time" value="{{$item->time}}" required></label>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <label>アイテム名<input type="text" name="title" placeholder="(例) コーヒーを飲む" autofocus
                            value="{{$item->title}}"></label>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <label>説明<textarea name="desc" class="materialize-textarea" wrap="hard"
                            placeholder="(例) 濃いめのコーヒーがおすすめです！">{{$item->desc}}</textarea></label>
                    <div class="center">
                        <button type="submit" class="btn">編集</button>
                        <a href="/routine-item/{{$item->id}}" class="btn red lighten-2" onclick="event.preventDefault();
                    document.getElementById('delete-item{{$item->id}}').submit()">削除</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form id="delete-item{{$item->id}}" action="/routine-item/{{$item->id}}" method="POST">
        @csrf @method('DELETE')
    </form>
</div>
@endforeach
<button class="btn" type="button" onclick="history.back()">
    <span class="material-icons">
        keyboard_backspace
    </span>
    もどる</button>
@endsection