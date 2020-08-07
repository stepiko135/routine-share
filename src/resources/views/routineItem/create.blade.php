{{-- @extends('layouts.app')

@section('content')
<h5>ルーティンアイテムの作成</h5>
<div class="container card">
    <form action="/routine_item/" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::id()}}">
        <input type="hidden" name="routine_id" value="{{$routine_id}}">
        <label for="time">時間</label>
        <input type="time" name="time" id="time">
        <label for="title">アイテム名</label>
        <input type="text" name="title" id="title" placeholder="(例) コーヒーを飲む" autofocus>
        <label for="desc">説明</label>
        <textarea name="desc" id="desc" cols="50" rows="10" placeholder="(例) 濃いめのコーヒーがおすすめです！"></textarea>
        <button type="submit" class="btn">作成</button>
        <button type="reset" class="btn red lighten-2">クリア</button>
    </form>
</div>

@endsection --}}