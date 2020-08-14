@extends('layouts.app')

@section('content')
<br>
@if (!$user->name)
<h5 class="font center">存在しないユーザーです。</h5>
@else
{{-- プロフィール表示部分 --}}
<div class="row">
    <div class="col s12 m8 offset-m2 card">
        <p>
            <span class="material-icons">person_outline</span>
            ：{{$user->name}}
        </p>
        <p>Profile：{{$user->profile}}</p>
        @if (Auth::id()===$user->id)
        <a class="btn right" href="">編集</a>
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
        <p>タイトル：{{$routine->name}}</p>
        <p>説明：{{$routine->desc}}</p>
        <span class="material-icons favorite">
            star
        </span>{{$routine->favorites->count()}}
        <a class="btn right" href="/routine/{{$routine->id}}">表示</a>
    </div>
</div>
@endforeach
@endif
@endsection