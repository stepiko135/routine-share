<?php

namespace App\Http\Controllers;

use App\Routine;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index(Request $request)
    {
        switch($request->sort){
            case 'name' :
                $routines = Routine::orderBy('name','desc')->paginate(3);
            break;
            case 'created-at' :
                $routines = Routine::orderBy('created_at','desc')->paginate(3);
            break;
            case 'favorite' :
                $routines = Routine::withCount('favorite_users')->orderByDesc('favotrite_users_count')->paginate(3);
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
        return view('ranking', compact('routines'));
    }

}
