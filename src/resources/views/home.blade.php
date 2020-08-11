@extends('layouts.app')

@section('content')
<a href="{{route('ranking')}}" class="btn">
    <span class="material-icons">
        sort
    </span>
    ランキング</a>

@foreach ($routines as $routine)
<div class="row">
    <div class="col s12 m8 offset-m2  ">
        <div class="card z-depth-3">
            <div class="card-image">
                
            </div>
            <div class="card-content">
                <p>
                    <span class="material-icons">
                        person_outline
                    </span>
                    ：{{$routine->user->name}}</p>
                <p>タイトル：{{$routine->name}}</p>
                <p>説明：{{$routine->desc}}</p>
            </div>
            <div class="card-action">
                {{-- Favoriteボタン --}}
                @guest
                <a title="気に入りましたか？登録してみよう" href="/login">
                    <span class="material-icons">star_border</span>
                    {{$routine->favorites->count()}}
                </a>
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
                    <a class="btn" href="routine/{{$routine->id}}">
                        ルーティンを見る
                        <span class="material-icons">forward</span>
                    </a>
                    @if ($routine->user_id===$authId)
                    <a class="btn" href="/routine/{{$routine->id}}/edit">編集</a>
                    <a class="btn red lighten-2" href="/routine/{{$routine->id}}" onclick="event.preventDefault();
                            document.getElementById('delete').submit();">
                        削除
                    </a>
                    <form id="delete" method="POST" action="/routine/{{$routine->id}}" style="display: none;">
                        @csrf @method('DELETE')
                    </form>
                    @endif
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
{{$routines->links()}}
@endsection