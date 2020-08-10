@extends('layouts.app')

@section('content')
<p>お気に入り登録数でランキング表示</p>
<table>
    <th>
    <td><a href="/ranking?sort=#">お気に入り</a></td>
    {{-- <td><a href="/ranking?sort=">新着順</a></td> --}}
    <td><a href="/ranking?sort=name">投稿者</a></td>
    </th>
</table>
{{-- {{dd($routines)}} --}}
@foreach ($routines as $routine)
<div class="container card">
    <p>投稿者：{{$routine->user->name}}</p>
    <p>{{$routine->name}}</p>
    <p>{{$routine->desc}}</p>
    <p>{{$routine->favorites->count()}}</p>
</div>

@endforeach
{{$routines->links()}}
{{-- {{$routines->appends(['sort' => $sort])->links()}} --}}
@endsection