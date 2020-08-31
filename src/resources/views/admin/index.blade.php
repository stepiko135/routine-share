@extends('layouts.app')

@section('content')
<h5 class="center font">ユーザー一覧</h5>
@foreach ($users as $user)
{{-- 管理者自身は非表示 --}}
@if ($loop->first)
@continue
@endif

<div class="row">
    <div class="col s12 m8 offset-m2 card">
        @if (!$user->name)
        <p>
            <span class="material-icons">person_outline</span>
            ：削除されたユーザー
        </p>
        @else
        <a href="/profile/{{$user->name}}">
            <span class="material-icons">
                <img src="{{$user->image}}" class="circle small-profile" alt="account_circle">
            </span>
            {{$user->name}}</a>
        @endif
        <div class="row">
            {{-- 左側表示 --}}
            <div class="col s12 m6">
                @if ($user->profile)
                <p class="font">{{$user->profile}}</p>
                @else
                <p class="font">コメントはありません。</p>
                @endif
                <div class="font">
                    <span class="material-icons">
                        article
                    </span>
                    ：{{count($user->routines)}}
                </div>
            </div>
            {{-- 右側表示 --}}
            <div class="col s12 m6 font">
                @if ($user->created_at)
                <p>作成日：{{substr($user->created_at,0,10)}}</p>
                @else
                <p>作成日：事前登録メンバーです</p>
                @endif

                <p><span class="material-icons">email</span>
                    ：{{$user->email}}
                </p>
                {{-- 削除ボタン --}}
                <a class="right modal-trigger btn red lighten-2" href="#delete-modal{{$user->id}}">
                    <span class="material-icons">delete_forever</span>
                </a>

                <!-- 削除modal画面 -->
                <div id="delete-modal{{$user->id}}" class="modal">
                    <div class="font modal-content">
                        <h5 class="center">このユーザーを削除します</h5>
                        <p class="center">本当に削除してよろしいですか？</p>
                        <p class="center">投稿は「削除されたユーザー」として残ります。</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn red lighten-2 right" type="submit" onclick="event.preventDefault();
                                            document.getElementById('delete{{$user->id}}').submit();">
                            削除する
                        </a>
                        <a href="#!" class="modal-close btn ">やめておく</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="delete{{$user->id}}" action="/admin" method="POST">
    @csrf @method('DELETE')
    <input type="hidden" value="{{$user->id}}" name="userId">
</form>
@endforeach
<div class="center">
    {{$users->links('vendor.pagination.materialize')}}
</div>
@endsection