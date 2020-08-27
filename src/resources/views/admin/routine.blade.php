@extends('layouts.app')

@section('content')
<br>
@if (!count($routines)>0)
<h5 class="font center">表示できるルーティンはありません。</h5>
@else
@foreach ($routines as $routine)
<div class="row">
    <div class="col s12 m8 offset-m2  ">
        <div class="card z-depth-3">
            <div class="card-image">

            </div>
            <div class="card-content">
                @if (!$routine->user)
                <p>
                    <span class="material-icons">person_outline</span>
                    ：削除されたユーザー
                </p>
                @else
                <a href="/profile/{{$routine->user->name}}">
                    <span class="material-icons">
                        <img src="{{$routine->user->image}}" class="circle" alt="account_circle" width="37px"
                            height="37px">
                    </span>
                    {{$routine->user->name}}
                </a>
                @endif
                <p class="center font">
                    <b>{{$routine->name}}</b>
                </p>
                <p class="center font">{{$routine->desc}}</p>
            </div>
            <div class="card-action">
                {{-- Favoriteボタン --}}
                @guest
                <a title="気に入りましたか？登録してみよう" href="/login">
                    <span class="material-icons">star_border</span>
                    {{$routine->favorites->count()}}
                </a>
                @else
                {{-- <form id="fav-submit{{$routine->id}}" action="/favorite" method="POST">
                @csrf
                <input type="hidden" name="routine_id" value={{$routine->id}}>
                </form> --}}

                <a type="submit" href="#" id="favorite{{$routine->id}}">
                    <span id="isFav{{$routine->id}}" class="material-icons">
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
                    {{-- 確認ボタン --}}
                    <a class="btn" href="routine/{{$routine->id}}">
                        見る
                        <span class="material-icons">double_arrow</span>
                    </a>
                    {{-- 削除ボタン --}}
                    <a class="btn modal-trigger btn red lighten-2" href="#delete-modal{{$routine->id}}">
                        <span class="material-icons">delete_forever</span>
                    </a>

                    <!-- modal画面 -->
                    <div id="delete-modal{{$routine->id}}" class="modal">
                        <div class="font modal-content">
                            <h5>ルーティンを削除します</h5>
                            <p>本当に削除してよろしいですか？</p>
                        </div>
                        <div class="modal-footer">
                            <a class="modal-close btn red lighten-2" href="/routine/{{$routine->id}}" onclick="event.preventDefault();
                                document.getElementById('delete{{$routine->id}}').submit();">
                                削除する
                            </a>
                            <a href="#!" class="modal-close btn ">やめておく</a>
                        </div>
                    </div>


                    <form id="delete{{$routine->id}}" method="POST" action="/routine/{{$routine->id}}"
                        style="display: none;">
                        @csrf @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="center">
    {{$routines->links('vendor.pagination.materialize')}}
</div>
@endif
<button class="btn" type="button" onclick="history.back()">
    <span class="material-icons">
        keyboard_backspace
    </span>
    もどる</button>





@endsection