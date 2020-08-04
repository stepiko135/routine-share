@extends('layouts.app')

@section('content')
<a href="/mypage/create" class="right btn-floating btn-large waves-effect waves-light"><i
        class="material-icons">add</i></a>
this is routine.
@foreach ($routines as $routine)
<div class="container card">
    <p>投稿者：{{$routine->user->name}}</p>
    <p>ルーティン：{{$routine->name}}</p>
    <p>説明：{{$routine->desc}}</p>
    <a class="btn" href="/mypage/{{$routine->id}}/edit">編集</a>

    <a class="btn red lighten-2" href="/mypage/{{$routine->id}}" onclick="event.preventDefault();
        document.getElementById('delete').submit();">
        削除
    </a>
    <form id="delete" method="POST" action="/mypage/{{$routine->id}}">
        @csrf @method('DELETE')
    </form>
</div>
@endforeach
@endsection