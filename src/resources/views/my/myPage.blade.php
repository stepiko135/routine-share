@extends('layouts.app')

@section('content')
<br>
<a href="/routine/create" class="right btn-floating btn-large waves-effect waves-light"><i
        class="material-icons">add</i></a>
@if (!count($routines)>0)
<h5 class="font center">あたらしいルーティンを作ってみましょう！</h5>
@else
<br><br>
@foreach ($routines as $routine)
<div class="row">
    <div class="col s12 m8 offset-m2">
        <div class="card z-depth-3">
            <div class="card-image">

            </div>
            <div class="card-content">
                <p>
                    <span class="material-icons">
                        <img src="/images/profile/{{$routine->user->image}}" class="circle" alt="account_circle"
                            width="37px" height="37px">
                    </span>
                    {{$routine->user->name}}
                </p>
                <p>ルーティン：{{$routine->name}}</p>
                <p>説明：{{$routine->desc}}</p>
            </div>
            <div class="card-action">
                {{-- Favoriteボタン --}}
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
                {{-- Favoriteボタン終わり --}}
                <div class="right">
                    <a class="btn" href="routine/{{$routine->id}}">アイテムの確認</a>
                    <a class="btn" href="/routine/{{$routine->id}}/edit">編集</a>
                    <a class="btn red lighten-2" href="/routine/{{$routine->id}}" onclick="event.preventDefault();
                    document.getElementById('delete').submit();">
                        削除
                    </a>
                    <form id="delete" method="POST" action="/routine/{{$routine->id}}">
                        @csrf @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
<button class="btn" type="button" onclick="history.back()">
    <span class="material-icons">
        keyboard_backspace
    </span>
    もどる</button>
@endsection