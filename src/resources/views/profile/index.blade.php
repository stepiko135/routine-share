@extends('layouts.app')

@section('content')
@if (!count($users)>0)
<h5 class="font center">ユーザーがいません。</h5>
@else
@foreach ($users as $user)
<div class="row">
    <div class="col s12 m8 offset-m2 card">
        @if (!$user->name)
        <p>
            <span class="material-icons">person_outline</span>
            ：削除されたユーザー
        </p>
        @else
        <p>
            <span class="material-icons">person_outline</span>
            ：{{$user->name}}</p>
        @endif
        <p>Profile：{{$user->profile}}</p>
    </div>
</div>
@endforeach
@endif
@endsection