@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12 m9">

        <div class="card">
            <div class="card-content">

                @if (!$routine->user)
                <a href="/profile/{{$routine->user->name}}">
                    <span class="material-icons">person_outline</span>
                    ：削除されたユーザー
                </a>
                @else
                <a href="/profile/{{$routine->user->name}}">
                    <span class="material-icons">
                        <img src="{{$routine->user->image}}" class="circle small-profile" alt="account_circle">
                    </span>
                    {{$routine->user->name}}
                </a>
                @endif
                <h5 class="font center">{{$routine->name}}</h5>
                <p class="font center" style="white-space: pre-wrap">{{$routine->desc}}</p>

                {{-- Favoriteボタン --}}
                @guest
                <a title="気に入りましたか？登録してみよう" class="favorite" href="/login">
                    <span class="material-icons">star_border
                    </span>
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

                {{-- 管理者削除ボタン --}}
                @can('isAdmin')
                {{-- 削除ボタン --}}
                <a class=" right waves-effect waves-light btn modal-trigger btn red lighten-2" href="#delete-modal">
                    <span class="material-icons">delete_forever</span>
                </a>
                <!-- modal画面 -->
                <div id="delete-modal" class="modal">
                    <div class="font modal-content">
                        <h5 class="center">ルーティンを削除します</h5>
                        <p class="center">本当に削除してよろしいですか？</p>
                    </div>
                    <div class="modal-footer">
                        <a class="modal-close btn red lighten-2" href="/routine/{{$routine->id}}" onclick="event.preventDefault();
                                document.getElementById('delete').submit();">
                            削除する
                        </a>
                        <a href="#!" class="modal-close btn ">やめておく</a>
                    </div>
                </div>
                <form action="/routine/{{$routine->id}}" id="delete" method="POST">
                    @csrf @method('DELETE')
                </form>
                @endcan

            </div>
        </div>

        @if (Auth::id() === $routine->user_id)
        {{-- 削除ボタン --}}
        <a class=" right waves-effect waves-light btn modal-trigger btn red lighten-2" href="#delete-modal">
            <span class="material-icons">delete_forever</span>
        </a>
        {{-- 編集ボタン --}}
        <a class="btn right" href="/routine/{{$routine->id}}/edit">
            <span class="material-icons">create</span>
        </a>
        <!-- modal画面 -->
        <div id="delete-modal" class="modal">
            <div class="font modal-content">
                <h5 class="center">ルーティンを削除します</h5>
                <p class="center">本当に削除してよろしいですか？</p>
            </div>
            <div class="modal-footer">
                <a class="modal-close btn red lighten-2" href="/routine/{{$routine->id}}" onclick="event.preventDefault();
                                document.getElementById('delete').submit();">
                    削除する
                </a>
                <a href="#!" class="modal-close btn ">やめておく</a>
            </div>
        </div>
        <form action="/routine/{{$routine->id}}" id="delete" method="POST">
            @csrf @method('DELETE')
        </form>
        @endif

        {{-- アイテムの表示 --}}
        <section class="timeline">
            <ul>
                @foreach ($routineItems as $routineItem)
                <li>
                    <div>
                        <time>
                            <p>
                                <span class="material-icons">
                                    schedule
                                </span>
                                {{substr($routineItem->time,0,5)}}
                            </p>
                        </time>
                        <p style="white-space: pre-wrap"><b>{{$routineItem->title}}</b></p>
                        <br>
                        <p style="white-space: pre-wrap">{{$routineItem->desc}}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </section>
    </div>
    <div class="col s12 m3">
        <br><br>
        {{-- コメント欄表示 --}}
        コメントはありません。
    </div>
</div>
<button class="btn" type="button" onclick="history.back()">もどる</button>
@endsection