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
                <button id="submit{{$routine->id}}">aaaaa</button>
                {{-- Tesing --}}
                <button id="test{{$routine->id}}">test{{$routine->id}}</button>
                <script>
                    window.onload = function() {
            $('#submit{{$routine->id}}').on('click',function(){
                $.post(
                    "./favorite",
                    {_token: "{{ csrf_token() }}",
                    routine_id:{{$routine->id}}}
                ).done(function() {
            if($('#isFav{{$routine->id}}').html()=='star'){
                $('#isFav{{$routine->id}}').html('star_border')
            }else{
                $('#isFav{{$routine->id}}').html('star')
            }}).fail(function (jqXHR, textStatus, errorThrown) {
                    // 通信失敗時の処理
                    alert('ファイルの取得に失敗しました。');
                    console.log("ajax通信に失敗しました");
                    console.log("jqXHR          : " + jqXHR.status); // HTTPステータスが取得
                    console.log("textStatus     : " + textStatus);    // タイムアウト、パースエラー
                    console.log("errorThrown    : " + errorThrown.message); // 例外情報
                    console.log("URL            : " + url);
            });
        });
        // Tesing
        $('#test{{$routine->id}}').on('click',function(){
            $('#test{{$routine->id}}').html('bbbbb');
        });
    };

    var mas = 100*100+100/10;
console.log(mas);
                </script>
                @endguest
                {{-- Favoriteボタン終わり --}}
                <div class="right">
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
                    <a class="waves-effect waves-light btn modal-trigger btn red lighten-2" href="#delete-modal">
                        <span class="material-icons">delete_forever</span>
                    </a>

                    <!-- modal画面 -->
                    <div id="delete-modal" class="modal">
                        <div class="font modal-content">
                            <h5>ルーティンを削除します</h5>
                            <p>本当に削除してよろしいですか？</p>
                        </div>
                        <div class="modal-footer">
                            <a class="modal-close btn red lighten-2" href="/routine/{{$routine->id}}"
                                onclick="event.preventDefault();
                                document.getElementById('delete').submit();">
                                削除する
                            </a>
                            <a href="#!" class="modal-close btn ">やめておく</a>
                        </div>
                    </div>


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