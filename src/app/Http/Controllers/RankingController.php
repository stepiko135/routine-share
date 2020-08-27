<?php

namespace App\Http\Controllers;

use App\Routine;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index(Request $request)
    {
        $routines = Routine::withCount('favorites')->orderBy('favorites_count','desc')->paginate(3);
        $sort = $request->sort;
        switch($sort){
            case 'name' :
                $routines = Routine::orderBy('name','desc')->paginate(3);
            break;
            case 'new' :
                $routines = Routine::orderBy('created_at','desc')->paginate(3);
            break;
            case 'favorite' :
                $routines = Routine::withCount('favorites')->orderBy('favorites_count','desc')->paginate(3);
                // $routines = $routine->favorite_users->count();
            break;
            // case 'name' :
            //     $routines = Routine::orderBy('name','desc')->paginate(3);
            // break;
        }
        // $routines = Routine::orderBy($sort,'desc')->paginate(3);
        // $routines = Routine::paginate(3);


        // $routines = Favorite::with('routine')->get();
        // $favRanking = Favorite::withCount('user')->orderBy('user_count','desc')->get();
        return view('ranking', compact('routines','sort'));
    }

}
