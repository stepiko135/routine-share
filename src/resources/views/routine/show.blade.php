@extends('layouts.app')

@section('content')
<div class="container card">
    <p>ルーティン名：{{$routine->name}}</p>
    <p>説明：{{$routine->desc}}</p>

    {{-- Favoriteボタン --}}
    @guest
    <a title="気に入りましたか？登録してみよう" href="/login"><span class="material-icons">star_border</span></a>

    @else
    <a type="submit" href="#">
        <span class="material-icons" onclick="event.preventDefault(); document.getElementById('fav-submit').submit();">
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

</div>

@if (Auth::id() === $routine->user_id)
<a class="btn" href="/routine/{{$routine->id}}/edit">編集</a>
@endif

{{-- アイテムの表示 --}}
@foreach ($routineItems as $routineItem)
<div class="container card">
    <p>時間：{{substr($routineItem->time,0,5)}}</p>
    <p>タイトル：{{$routineItem->title}}</p>
    <p>説明：{{$routineItem->desc}}</p>
</div>
@endforeach
<button class="btn" type="button" onclick="history.back()">もどる</button>
@endsection