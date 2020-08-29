<?php

namespace App\Http\Controllers;

use App\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function favorite( Request $request)
    {
        $routine = Routine::find($request->routine_id);
        $user_id = Auth::id();

        if($routine->favorites()->where('user_id',$user_id)->exists())
        {
            $routine->favorites()->detach($user_id);
        }else{
            $routine->favorites()->attach($user_id);
        }
        $count = $routine->favorites->count();
        // return back();
        // return response()->json(["count"=>$count]);


        // $return_array = compact('count');
        // return json_encode($return_array);

        return compact('count');
    }
}
