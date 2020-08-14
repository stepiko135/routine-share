@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12 m9">

        <div class="card">
            <p>投稿者：{{$routine->user->name}}</p>
            <p>ルーティン名：{{$routine->name}}</p>
            <p>説明：{{$routine->desc}}</p>

            {{-- Favoriteボタン --}}
            @guest
            <a title="気に入りましたか？登録してみよう" href="/login"><span class="material-icons">star_border</span></a>

            @else
            <a type="submit" href="#">
                <span class="material-icons"
                    onclick="event.preventDefault(); document.getElementById('fav-submit').submit();">
                    @if ($routine->favorites()->where('user_id', Auth::id())->exists())
                    star
                    @else
                    star_border
                    @endif
                </span>
            </a>

            <form id="fav-submit" action="/favorite" method="POST">
                @csrf
                <input type="hidden" name="routine_id" value="{{$routine->id}}">
            </form>
            @endguest

            {{$routine->favorites->count()}}
            {{-- Favoriteボタン終わり --}}

            {{-- 管理者削除ボタン --}}
            @can('isAdmin')
            <a class="btn red lighten-2 right" href="/routine{{$routine->id}}" type="submit"
                onclick="event.preventDefault();
                document.getElementById('delete').submit();">削除</a>
            <form action="/routine/{{$routine->id}}" id="delete" method="POST">
                @csrf @method('DELETE')
            </form>
            @endcan

        </div>

        @if (Auth::id() === $routine->user_id)
        <a class="btn" href="/routine/{{$routine->id}}/edit">編集</a>
        @endif

        {{-- アイテムの表示 --}}
        @foreach ($routineItems as $routineItem)
        <div class="card">
            <p>時間：{{substr($routineItem->time,0,5)}}</p>
            <p>タイトル：{{$routineItem->title}}</p>
            <p>説明：{{$routineItem->desc}}</p>
        </div>
        @endforeach
    </div>
    <div class="col s12 m3">
        {{-- コメント欄表示 --}}
        コメント欄表示
    </div>
</div>
<button class="btn" type="button" onclick="history.back()">もどる</button>
@endsection