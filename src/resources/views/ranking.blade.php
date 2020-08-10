@extends('layouts.app')

@section('content')
<p>お気に入り登録数でランキング表示</p>
<table>
    <th>
    <td><a href="/ranking?sort=favotrite">お気に入り</a></td>
    <td><a href="/ranking?sort=new">新着</a></td>
    <td><a href="/ranking?sort=name">投稿者</a></td>
    </th>
</table>
{{-- {{dd($routines)}} --}}
@foreach ($routines as $routine)
<div class="container card">
    <p>投稿者：{{$routine->user->name}}</p>
    <p>{{$routine->name}}</p>
    <p>{{$routine->desc}}</p>
    <a class="btn" href="/routine/{{$routine->id}}">ルーティンを見る</a>
    {{-- Favoriteボタン --}}
    @guest
    <a title="気に入りましたか？登録してみよう" href="/login"><span class="material-icons">star_border</span></a>
    @else

    <a type="submit" href="#">
        <span class="material-icons"
            onclick="event.preventDefault(); document.getElementById('fav-submit{{$routine->id}}').submit();">
            @if ($routine->favorites()->where('user_id', Auth::id())->exists())
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
    {{$routine->favorites->count()}}
    {{-- Favoriteボタン終わり --}}
</div>

@endforeach
{{$routines->appends(['sort'=> $sort])->links()}}
@endsection