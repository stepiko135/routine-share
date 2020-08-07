<?php

namespace App\Http\Controllers;

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

    public function index()
    {
        $userId = Auth::user()->id;
        $routines = Routine::where('user_id',$userId)->get();
        return view('mypage', compact('routines'));
    }
}
