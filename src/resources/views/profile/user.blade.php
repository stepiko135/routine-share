@extends('layouts.app')

@section('content')
<br>
@if (!$user->name)
<h5 class="font center">存在しないユーザーです。</h5>
@else
{{-- プロフィール表示部分 --}}
<div class="row">
    <div class="col s12 m8 offset-m2 card center">
        <br>
        <img src="{{$user->image}}"　alt="プロフィール画像" class="circle main-profile">
        <h5>
            <span class="material-icons">person_outline</span>
            {{$user->name}}
        </h5>
        <p>{{$user->profile}}</p>
        @if (Auth::id()===$user->id)
        <a class="btn right" href="/profile/{{$user->name}}/edit">
            <span class="material-icons">create</span>
        </a>
        @endif
    </div>
</div>
@endif

{{-- ルーティン表示部分 --}}
@if (!count($routines)>0)
<h5 class="font center">投稿はありません。</h5>
@else
@foreach ($routines as $routine)
<div class="row">
    <div class="col s10 offset-s1 m6 offset-m3 card">
        <br>
        <p class="font center"><b>{{$routine->name}}</b></p>
        <p class="font center" style="white-space: pre-wrap">{{$routine->desc}}</p>
        <span class="material-icons favorite">
            star
        </span>{{$routine->favorites->count()}}
        <a class="btn right" href="/routine/{{$routine->id}}">表示</a>
    </div>
</div>
@endforeach
@endif
@endsection