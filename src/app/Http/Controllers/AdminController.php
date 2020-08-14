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
        $users = User::all();

        return view('admin.index', compact('users'));
    }

    public function routine()
    {
        $routines = Routine::all();

        return view('admin.routine', compact('routines'));
    }

    // ユーザー削除
    public function delete(Request $request)
    {
        $userId = $request->userId;
        User::find($userId)->delete();

        return redirect('/admin');
    }
}
