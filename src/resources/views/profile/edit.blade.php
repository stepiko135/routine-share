@extends('layouts.app')

@section('content')
<br>
@if (!$user->name)
<h5 class="font center">存在しないユーザーです。</h5>
@else
{{-- プロフィール表示部分 --}}
<div class="row">
    <div class="col s12 m8 offset-m2 card center">
        <br>
        <img src="{{($user->image)}}" alt="プロフィール画像" class="circle main-profile">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="red-text">{{$error}}</li>
            @endforeach
        </ul>
        <form action="/profile/{{$user->name}}" method="POST" enctype='multipart/form-data'>
            @csrf @method('PUT')
            <div class="file-field input-field">
                <div class="btn">
                    <span class="material-icons">camera_alt</span>
                    <input type="file" accept="image/*" id="image" name="image">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <h5>
                <span class="material-icons">person_outline</span>
                {{$user->name}}
            </h5>
            <textarea name="profile" id="profile" class="materialize-textarea chara-count" placeholder="よろしくお願いします！" data-length="100">{{$user->profile}}</textarea>
            <input type="submit" class="btn" value="更新">
        </form>
    </div>
</div>
@endif
@endsection