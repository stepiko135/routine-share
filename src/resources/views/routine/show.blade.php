@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12 m9">

        <div class="card">
            <div class="card-content">

                @if (!$routine->user)
                <p>
                    <span class="material-icons">person_outline</span>
                    ：削除されたユーザー
                </p>
                @else
                <p>
                    <span class="material-icons">
                        <img src="/images/profile/{{$routine->user->image}}" class="circle" alt="account_circle"
                            width="37px" height="37px">
                    </span>
                    {{$routine->user->name}}
                </p>
                @endif
                <br>
                <p>
                    <span class="material-icons">
                        import_contacts
                    </span>
                    ：{{$routine->name}}
                </p>
                <p>{{$routine->desc}}</p>

                {{-- Favoriteボタン --}}
                @guest
                <a title="気に入りましたか？登録してみよう" href="/login"><span class="material-icons">star_border</span></a>

                @else
                <a type="submit" class="favorite" href="#">
                    <span class="material-icons"
                        onclick="event.preventDefault(); document.getElementById('fav-submit').submit();">
                        @if ($routine->favorites()->where('user_id', Auth::id())->exists())
                        star
                        @else
                        star_border
                        @endif
                    </span>
                    {{$routine->favorites->count()}}
                </a>

                <form id="fav-submit" action="/favorite" method="POST">
                    @csrf
                    <input type="hidden" name="routine_id" value="{{$routine->id}}">
                </form>
                @endguest
                {{-- Favoriteボタン終わり --}}

                {{-- 管理者削除ボタン --}}
                @can('isAdmin')
                <a class="btn red lighten-2 right" href="/routine{{$routine->id}}" type="submit" onclick="event.preventDefault();
                document.getElementById('delete').submit();">削除</a>
                <form action="/routine/{{$routine->id}}" id="delete" method="POST">
                    @csrf @method('DELETE')
                </form>
                @endcan

            </div>
        </div>

        @if (Auth::id() === $routine->user_id)
        <a class="btn" href="/routine/{{$routine->id}}/edit">編集</a>
        @endif


        {{-- アイテムの表示 --}}
        <section class="timeline">
            <ul>
                @foreach ($routineItems as $routineItem)
                <li>
                    <div>
                        <time>
                            <p>
                                <span class="material-icons">
                                    schedule
                                </span>
                                {{substr($routineItem->time,0,5)}}
                            </p>
                        </time>
                        <p><b>{{$routineItem->title}}</b></p>
                        <br>
                        <p>{{$routineItem->desc}}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </section>
    </div>
    <div class="col s12 m3">
        {{-- コメント欄表示 --}}
        コメント欄表示
    </div>
</div>
<button class="btn" type="button" onclick="history.back()">もどる</button>
@endsection