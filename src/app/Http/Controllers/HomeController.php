<?php

namespace App\Http\Controllers;

use App\Routine;
use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $routines = Routine::orderBy('created_at','desc')->paginate(4);
        $authId = Auth::id();

        return view('home', compact('routines','authId'));
    }
}
