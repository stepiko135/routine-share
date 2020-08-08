@extends('layouts.app')

@section('content')
<a href="/routine/create" class="right btn-floating btn-large waves-effect waves-light"><i
        class="material-icons">add</i></a>
@if (!count($routines)>0)
    <h5>あたらしいルーティンを作ってみましょう！</h5>

@else
@foreach ($routines as $routine)
<div class="container card">
    <p>投稿者：{{$routine->user->name}}</p>
    <p>ルーティン：{{$routine->name}}</p>
    <p>説明：{{$routine->desc}}</p>
    <a class="btn" href="routine/{{$routine->id}}">アイテムの確認</a>
    <a class="btn" href="/routine/{{$routine->id}}/edit">編集</a>

    <a class="btn red lighten-2" href="/routine/{{$routine->id}}" onclick="event.preventDefault();
        document.getElementById('delete').submit();">
        削除
    </a>
    <form id="delete" method="POST" action="/routine/{{$routine->id}}">
        @csrf @method('DELETE')
    </form>

</div>
@endforeach
@endif
@endsection