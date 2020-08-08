@extends('layouts.app')

@section('content')
@foreach ($routines as $routine)
<div class="container card">
    <p>投稿者：{{$routine->user->name}}</p>
    <p>ルーティン：{{$routine->name}}</p>
    <p>説明：{{$routine->desc}}</p>
    <a class="btn" href="routine/{{$routine->id}}">ルーティンを見る</a>
    {{-- Favoriteボタン --}}
@guest
    <a title="気に入りましたか？ログインしましょう！" href="/login"><span class="material-icons">star_border</span></a>

@else
    <a type="submit" href="#">
    <span class="material-icons" onclick="event.preventDefault(); document.getElementById('fav-submit{{$routine->id}}').submit();">
            @if (App\Favorite::where('routine_id',$routine->id)->where('user_id', Auth::id())->exists())
            star
            @else
            star_border
            @endif
        </span>
    </a>

<form id="fav-submit{{$routine->id}}" action="/favorite" method="POST">
        @csrf
        <input type="hidden" name="routine_id" value={{$routine->id}}>
    </form>
@endguest
    {{-- favoriteカウンター --}}
    {{count(App\Favorite::where('routine_id', $routine->id)->get())}}
    {{-- Favoriteボタン終わり --}}

    @if ($routine->user_id===$authId)
    <a class="btn" href="/routine/{{$routine->id}}/edit">編集</a>
    <a class="btn red lighten-2" href="/routine/{{$routine->id}}" onclick="event.preventDefault();
        document.getElementById('delete').submit();">
        削除
    </a>
    <form id="delete" method="POST" action="/routine/{{$routine->id}}">
        @csrf @method('DELETE')
    </form>
    @endif
</div>
@endforeach
<button class="btn" type="button" onclick="history.back()">もどる</button>
@endsection