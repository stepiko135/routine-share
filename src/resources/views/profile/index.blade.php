@extends('layouts.app')

@section('content')
@if (!count($users)>0)
<h5 class="font center">ユーザーがいません。</h5>
@else
<h5 class="font center">
    ユーザー一覧</h5>
@foreach ($users as $user)
{{-- 管理者非表示 --}}
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
        @if ($user->profile)
        <p class="font">{{$user->profile}}</p>
        @else
        <p class="font">コメントはありません。</p>
        @endif
        <p class="font">
            <span class="material-icons">
                article
            </span>
            ：{{count($user->routines)}}
        </p>
    </div>
</div>
@endforeach
<div class="center">
    {{$users->links('vendor.pagination.materialize')}}
</div>
@endif
<button class="btn" type="button" onclick="history.back()">
    <span class="material-icons">
        keyboard_backspace
    </span>
    もどる</button>
@endsection