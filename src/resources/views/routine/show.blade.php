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
                        <img src="{{$routine->user->image}}" class="circle" alt="account_circle" width="37px"
                            height="37px">
                    </span>
                    {{$routine->user->name}}
                </a>
                @endif
                <h5 class="font center">{{$routine->name}}</h5>
                <p class="font center">{{$routine->desc}}</p>

                {{-- Favoriteボタン --}}
                @guest
                <a title="気に入りましたか？登録してみよう" href="/login"><span class="material-icons">star_border</span></a>

                @else
                {{-- お気に入りボタン --}}
                @if ($routine->favorites()->where('user_id', Auth::id())->exists())
                <a type="submit" class="favorite" href="#" onclick="event.preventDefault();">
                    <span class="material-icons 1">star</span>
                    <span class="material-icons 2 off">star_border</span>
                    <input type="hidden" name="routine_id" value="{{$routine->id}}">
                    {{$routine->favorites->count()}}
                </a>
                @else
                <a type="submit" class="favorite" href="#" onclick="event.preventDefault();">
                    <span class="material-icons 2 off">star</span>
                    <span class="material-icons 1">star_border</span>
                    <input type="hidden" name="routine_id" value="{{$routine->id}}">
                    {{$routine->favorites->count()}}
                </a>
                @endif
                <script>
                    window.onload = (function(){
        $('.favorite').click(
            function(){
                $(this).find('.1').toggleClass('off');
                $(this).find('.2').toggleClass('off');
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type:'POST',
                    url:'/favorite',
                    timeout: 10000,
                    data:{
                        'routine_id': $(this).find('input[name=routine_id]').val(),
                    },
                }).done(function(count){
                    $(this).val(count);
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
                <a class="btn red lighten-2 right" href="/routine{{$routine->id}}" type="submit" onclick="event.preventDefault();
                document.getElementById('delete').submit();">削除</a>
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
                <h5>ルーティンを削除します</h5>
                <p>本当に削除してよろしいですか？</p>
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
                        <p><b>{{$routineItem->title}}</b></p>
                        <br>
                        <p>{{$routineItem->desc}}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </section>
    </div>
    <div class="col s12 m3">
        <br><br>
        {{-- コメント欄表示 --}}
        コメント欄
    </div>
</div>
<button class="btn" type="button" onclick="history.back()">もどる</button>
@endsection