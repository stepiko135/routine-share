@extends('layouts.app')

@section('content')
<a href="{{route('ranking')}}" class="btn">
    <span class="material-icons">
        sort
    </span>
    ランキング
</a>
<a href="/profile" class="btn">
    <span class="material-icons">
        group
    </span>
    ユーザー一覧
</a>
<a href="/routine/create" class="right btn-floating btn-large waves-effect waves-light tooltipped"
    data-position="bottom" data-tooltip="ルーティンを作る">
    <i class="material-icons">add</i>
</a>
<br>
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
                        <img src="{{$routine->user->image}}" class="circle small-profile" alt="account_circle">
                    </span>
                    {{$routine->user->name}}
                </a>
                @endif
                <p class="center font">
                    <b>{{$routine->name}}</b>
                </p>
                <p class="center font" style="white-space: pre-wrap">{{$routine->desc}}</p>
            </div>
            <div class="card-action">
                @guest
                <a title="気に入りましたか？登録してみよう" href="/login">
                    <span class="material-icons">star_border</span>
                    {{$routine->favorites->count()}}
                </a>
                @else
                {{-- お気に入りボタン --}}
                @if ($routine->favorites()->where('user_id', Auth::id())->exists())
                <a type="submit" class="favorite" href="#" onclick="event.preventDefault();">
                    <span class="material-icons 1">star</span>
                    <span class="material-icons 2 off">star_border</span>
                    <input type="hidden" name="routine_id" value="{{$routine->id}}">
                <span class="counter">{{$routine->favorites->count()}}</span>
                </a>
                @else
                <a type="submit" class="favorite" href="#" onclick="event.preventDefault();">
                    <span class="material-icons 2 off">star</span>
                    <span class="material-icons 1">star_border</span>
                    <input type="hidden" name="routine_id" value="{{$routine->id}}">
                    <span class="counter">{{$routine->favorites->count()}}</span>
                </a>
                @endif
                <script>
                    window.onload = (function(){
        $('.favorite').click(
            function(){
                // お気に入りボタンの見た目を変化させる。
                $(this).find('.1').toggleClass('off');
                $(this).find('.2').toggleClass('off');
                // $(this)をコールバック関数内で使うため、ここで変数に入れる。
                var button = $(this)
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type:'POST',
                    url:'/favorite',
                    timeout: 10000,
                    data:{
                        'routine_id': $(this).find('input[name=routine_id]').val(),
                    },
                }).done(function(count){
                    // buttonを呼び出す。
                    button.find('.counter').text(count.count);
                }).fail(function(jqXHR,textStatus,errorThrown){
                    alert('ファイルの取得に失敗しました。');
                    console.log("ajax通信に失敗しました")
                    console.log(jqXHR.status);
                    console.log(textStatus);
                    console.log(errorThrown.message);
                });
            }
        );
    });
                </script>
                @endguest
                {{-- Favoriteボタン終わり --}}
                <div class="right">
                    {{-- 確認ボタン --}}
                    <a class="btn" href="routine/{{$routine->id}}">
                        見る
                        <span class="material-icons">double_arrow</span>
                    </a>
                    @if ($routine->user_id===$authId)
                    {{-- 編集ボタン --}}
                    <a class="btn" href="/routine/{{$routine->id}}/edit">
                        <span class="material-icons">create</span>
                    </a>
                    {{-- 削除ボタン --}}
                    <a class="btn modal-trigger btn red lighten-2" href="#delete-modal{{$routine->id}}">
                        <span class="material-icons">delete_forever</span>
                    </a>

                    <!-- modal画面 -->
                    <div id="delete-modal{{$routine->id}}" class="modal">
                        <div class="font modal-content">
                            <h5 class="center">ルーティンを削除します</h5>
                            <p class="center">本当に削除してよろしいですか？</p>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="center">
    {{$routines->links('vendor.pagination.materialize')}}
</div>
<button class="btn" type="button" onclick="history.back()">
    <span class="material-icons">
        keyboard_backspace
    </span>
    もどる</button>

@endsection