@extends('layouts.app')

@section('content')
<div class="container card">
    <p>ルーティン名：{{$routine->name}}</p>
    <p>説明：{{$routine->desc}}</p>
</div>

@if (Auth::id() === $routine->user_id)
<a class="btn" href="/routine/{{$routine->id}}/edit">編集</a>
@endif

{{-- アイテムの表示 --}}
@foreach ($routineItems as $routineItem)
<div class="container card">
    <p>時間：{{substr($routineItem->time,0,5)}}</p>
    <p>タイトル：{{$routineItem->title}}</p>
    <p>説明：{{$routineItem->desc}}</p>
</div>
@endforeach
@endsection