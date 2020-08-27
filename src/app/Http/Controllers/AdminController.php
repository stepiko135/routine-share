<?php

namespace App\Http\Controllers;

use App\User;
use App\Routine;
use App\RoutineItem;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::paginate(6);

        return view('admin.index', compact('users'));
    }

    public function routine()
    {
        $routines = Routine::paginate(4);

        return view('admin.routine', compact('routines'));
    }

    // ユーザー削除
    public function delete(Request $request)
    {
        $userId = User::find($request->userId);
        $userId->delete();
        return redirect('/admin')->with('message','「'.$userId->name.'」は削除されました');

    }
}
