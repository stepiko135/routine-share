<?php

namespace App\Http\Controllers;

use App\Routine;
use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    // ログインされていなければログイン画面に返す
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myPage()
    {
        $userId = Auth::user()->id;
        $routines = Routine::where('user_id',$userId)->get();
        return view('my.myPage', compact('routines'));
    }

    public function myFavorite()
    {
        $userId = Auth::user()->id;
        $favorites = Favorite::where('user_id',$userId)->get();

        return view('my.myFavorite',compact('favorites'));
    }
}
