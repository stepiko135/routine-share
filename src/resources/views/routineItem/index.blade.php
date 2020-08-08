@extends('layouts.app')

@section('content')
routine item 一覧
<p>投稿した全部のルーティンアイテムからお気に入りされたランキングを表示します。</p>
<a href="/routine/create" class="right btn-floating btn-large waves-effect waves-light"><i
        class="material-icons">add</i></a>
@foreach ($routineItems as $item)
<div class="container card">
    <form action="/routine-item/{{$item->id}}" method="POST">
        @csrf @method('DELETE')
        <p>{{$item->time}}</p>
        <p>{{$item->title}}</p>
        <p>{{$item->desc}}</p>
        <p>~ {{$item->routine->name}}より ~</p>
        <input type="submit" class="btn red lighten-2" value="削除">
    </form>
</div>
@endforeach
@endsection