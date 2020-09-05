@extends('layouts.app')

@section('content')
<br>
{{-- 新規ルーティンアイテム作成 --}}
<div class="font center">
    1,ルーティンの作成<br>
    <span class="material-icons">
        arrow_drop_down
    </span><br>
</div>
<h5 class="font center">
    {{-- 2,<span class="material-icons">
        add
    </span> --}}
    2,ルーティンアイテムの作成
</h5>
@if ($errors)
<ul class="center">
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
            <input type="hidden" name="routine_id" value="{{$routineId}}">

            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <label for="time">時間</label>
                    <input id="time" type="time" name="time" value="{{old('time')}}" required placeholder="（例）7:00">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m8 offset-m2">
                    <label for="title">アイテム名</label>
                    <input type="text" id="title" class="chara-count" name="title" placeholder="(例) コーヒーを飲む" autofocus data-length="50"
                        value="{{old('title')}}">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m8 offset-m2">
                    <label for="desc">説明</label>
                    <textarea name="desc" id="desc" class="materialize-textarea chara-count" wrap="hard"
                        placeholder="(例) 濃いめのコーヒーがおすすめです！" data-length="150">{{old('desc')}}</textarea>
                </div>
            </div>

            <div class="center">
                <button type="reset" class="btn red lighten-2">やりなおす</button>
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
        <input type="hidden" name="routine_id" value="{{$routineId}}">
        <div class="col s12 m8 offset-m2 card">
            <br>
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <label>時間<input type="time" name="time" value="{{$item->time}}" required placeholder="（例）7:00"></label>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <label>アイテム名<input type="text" name="title" placeholder="(例) コーヒーを飲む" autofocus
                            value="{{$item->title}}" style="white-space: pre-wrap"></label>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <label>説明<textarea name="desc" class="materialize-textarea chara-count" wrap="hard"
                            placeholder="(例) 濃いめのコーヒーがおすすめです！" data-length="150" style="white-space: pre-wrap">{{$item->desc}}</textarea></label>
                    <div class="center">
                        <a href="/routine-item/{{$item->id}}" class="btn red lighten-2" onclick="event.preventDefault();
                    document.getElementById('delete-item{{$item->id}}').submit()">削除</a>
                            <button type="submit" class="btn">送信</button>
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
<div class="font center">
    <span class="material-icons">
        arrow_drop_down
    </span><br>
    <h5>3,完成！</h5>
    <a class="btn" href="{{action('RoutineController@show',['routine' => $routineId ])}}">投稿をみる</a>
</div>
<button class="btn" type="button" onclick="history.back()">
    <span class="material-icons">
        keyboard_backspace
    </span>
    もどる</button>
@endsection