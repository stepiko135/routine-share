@extends('layouts.app')

@section('content')
<table class="centered">
    <thead>
        <tr>
            <th><a href="/ranking?sort=new">新着</a></th>
            <th><a href="/ranking?sort=favotrite">お気に入り</a></th>
            <th><a href="/ranking?sort=name">投稿者</a></th>
        </tr>
    </thead>
</table>
<br><br>
@foreach ($routines as $routine)
<div class="row">
    <div class="col s12 m8 offset-m2">
        <div class="card z-depth-3">
            <div class="card-image">
                {{-- <img src="images/sample-1.jpg">
                <span class="card-title">Card Title</span> --}}
            </div>
            <div class="card-content">
                <p>
                    <span class="material-icons">
                        <img src="/images/profile/{{$routine->user->image}}" class="circle" alt="account_circle"
                            width="37px" height="37px">
                    </span>
                    {{$routine->user->name}}
                </p>
                <p>タイトル：{{$routine->name}}</p>
                <p>説明：{{$routine->desc}}</p>
            </div>
            <div class="card-action">
                {{-- Favoriteボタン --}}
                @guest
                <a title="気に入りましたか？登録してみよう" href="/login"><span class="material-icons">star_border</span></a>
                @else
                <form id="fav-submit{{$routine->id}}" action="/favorite" method="POST">
                    @csrf
                    <input type="hidden" name="routine_id" value={{$routine->id}}>
                </form>
                <a type="submit" href="#">
                    <span class="material-icons"
                        onclick="event.preventDefault(); document.getElementById('fav-submit{{$routine->id}}').submit();">
                        @if ($routine->favorites()->where('user_id', Auth::id())->exists())
                        star
                        @else
                        star_border
                        @endif
                    </span>
                    {{$routine->favorites->count()}}
                </a>
                @endguest
                {{-- Favoriteボタン終わり --}}
                <div class="right">
                    <a class="btn" href="/routine/{{$routine->id}}">ルーティンを見る
                        <span class="material-icons">forward</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<button class="btn" type="button" onclick="history.back()">
    <span class="material-icons">
        keyboard_backspace
    </span>
    もどる</button>
{{$routines->appends(['sort'=> $sort])->links()}}
@endsection