<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function favorite( Request $request)
    {
        $routine_id = $request->routine_id;
        $user_id = Auth::id();
        $favRequest = Favorite::where('routine_id',$routine_id)->where('user_id',$user_id);

        if($favRequest->exists())
        {
            $favRequest->delete();
        }else{
            $favorite = new Favorite;
            $favorite->routine_id = $routine_id;
            $favorite->user_id = $user_id;
            $favorite->save();
        }
        return back();
        // return [''];
    }
}
