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
        <p>名前：{{$user->name}}</p>
        <p>{{$user->profile}}</p>


        <button class="btn red lighten-2 right" type="submit" onclick="event.preventDefault();
        document.getElementById('delete{{$loop->index}}').submit();">削除</button>
        <a href="/profile/{{$user->name}}" class="btn right" type="submit">詳細</a>
    </div>
</div>
<form id="delete{{$loop->index}}" action="/admin" method="POST">
    @csrf @method('DELETE')
    <input type="hidden" value="{{$user->id}}" name="userId">
</form>
@endforeach
@endsection