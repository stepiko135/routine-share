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
        名前：{{$user->name}}

        <button class="btn red lighten-2 right" type="submit" onclick="event.preventDefault();
        document.getElementById('delete{{$loop->index}}').submit();">削除</button>
        <a href="#" class="btn right" type="submit">投稿確認</a>
    </div>
</div>
<form id="delete{{$loop->index}}" action="/admin" method="POST">
    @csrf @method('DELETE')
    <input type="hidden" value="{{$user->id}}" name="userId">
</form>
@endforeach
@endsection