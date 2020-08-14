@extends('layouts.app')

@section('content')
<br>
@if (!count($routines)>0)
<h5 class="font center">表示できるルーティンはありません。</h5>
@else
@foreach($routines as $routine) <div class="row">

    <div class="col s12 m8 offset-m2 card">
        @if (!$routine->user)
        <p>投稿者：削除されたユーザー</p>
        @else
        <p>投稿者：{{$routine->user->name}}</p>
        @endif
        <p>タイトル：{{$routine->name}}</p>
        <p>説明：{{$routine->desc}}</p>

        <a class="btn red lighten-2 right" href="/routine{{$routine->id}}" type="submit" onclick="event.preventDefault();
            document.getElementById('delete').submit();">削除</a>
        <a class="btn right" href="/routine/{{$routine->id}}">確認</a>
    </div>
</div>
<form action="/routine/{{$routine->id}}" id="delete" method="POST">
    @csrf @method('DELETE')
</form>
@endforeach
@endif
@endsection