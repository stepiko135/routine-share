<?php

namespace App\Http\Controllers;

use App\User;
use App\Routine;
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
        $routines = Routine::where('user_id',$userId)->orderBy('created_at','desc')->paginate(3);
        return view('my.myPage', compact('routines'));
    }

    public function myFavorite()
    {
        $userId = Auth::user()->id;
        $favorites = User::find($userId)->favorites;

        return view('my.myFavorite',compact('favorites'));
    }
}
