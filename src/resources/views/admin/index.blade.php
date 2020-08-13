@extends('layouts.app')

@section('content')
<h5 class="center font">ユーザー一覧</h5>
    @foreach ($users as $user)
    <div class="row">
        <div class="col s12 m8 offset-m2 card">
            名前：{{$user->name}}
            <button class="btn red lighten-2 right" type="submit">削除</button>
        </div>
    </div>
    @endforeach
@endsection