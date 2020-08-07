@extends('layouts.app')

@section('content')
全員の投稿を表示
@foreach ($routines as $routine)
<div class="container card">
    <p>投稿者：{{$routine->user->name}}</p>
    <p>ルーティン：{{$routine->name}}</p>
    <p>説明：{{$routine->desc}}</p>
    <a class="btn" href="routine/{{$routine->id}}">ルーティンを見る</a>

    @if ($routine->user_id===$authId)
    <a class="btn" href="/routine/{{$routine->id}}/edit">編集</a>
    <a class="btn red lighten-2" href="/routine/{{$routine->id}}" onclick="event.preventDefault();
        document.getElementById('delete').submit();">
        削除
    </a>
    <form id="delete" method="POST" action="/routine/{{$routine->id}}">
        @csrf @method('DELETE')
    </form>
    @endif

</div>
@endforeach
@endsection