@extends('layouts.app')

@section('content')
<a href="/routine/create" class="right btn-floating btn-large waves-effect waves-light tooltipped"
    data-position="bottom" data-tooltip="ルーティンを作る"><i class="material-icons">add</i></a><br>
@if (!count($routines)>0)
<br><br>
<h5 class="font center">あたらしいルーティンを作ってみましょう！</h5><br><br>
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
                        <img src="{{$routine->user->image}}" class="circle small-profile" alt="account_circle">
                    </span>
                    {{$routine->user->name}}
                </p>
                <p class="font center"><b>{{$routine->name}}</b></p>
                <p class="font center" style="white-space: pre-wrap">{{$routine->desc}}</p>
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
                    <a class="btn" href="routine/{{$routine->id}}">
                        見る
                        <span class="material-icons">double_arrow</span>
                    </a>
                    {{-- 編集ボタン --}}
                    <a class="btn" href="/routine/{{$routine->id}}/edit">
                        <span class="material-icons">create</span>
                    </a>
                    {{-- 削除ボタン --}}
                    <a class="modal-trigger btn red lighten-2" href="#delete-modal{{$routine->id}}">
                        <span class="material-icons">delete_forever</span>
                    </a>
                    <!-- modal画面 -->
                    <div id="delete-modal{{$routine->id}}" class="modal">
                        <div class="font modal-content">
                            <h5 class="center">ルーティンを削除します</h5>
                            <p class="center">本当に削除してよろしいですか？</p>
                        </div>
                        <div class="modal-footer">
                            <a class="modal-close btn red lighten-2" href="/routine/{{$routine->id}}"
                                onclick="event.preventDefault();
                                document.getElementById('delete{{$routine->id}}').submit();">
                                削除する
                            </a>
                            <a href="#!" class="modal-close btn ">やめておく</a>
                        </div>
                    </div>

                    <form id="delete{{$routine->id}}" method="POST" action="/routine/{{$routine->id}}">
                        @csrf @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
<div class="center">
    {{$routines->links('vendor.pagination.materialize')}}
</div>
<button class="btn" type="button" onclick="history.back()">
    <span class="material-icons">
        keyboard_backspace
    </span>
    もどる</button>
@endsection