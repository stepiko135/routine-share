<?php

namespace App\Http\Controllers;

use App\User;
use App\Routine;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // ユーザーの一覧表示
    public function index()
    {
        $users = User::all();

        return view('profile.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userName)
    {
        $user = User::where('name', $userName)->first();
        $routines = Routine::where('user_id', $user->id)->get();

        return view('profile.user', compact('user', 'routines'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($userName)
    {
        $user = User::where('name', $userName)->first();
        if ($user->id === Auth::id()) {
            return view('profile.edit', compact('user'));
        } else {
            return redirect('/profile/' . $userName);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $userName)
    {
        $user = User::where('name', $userName)->first();
        $user->profile = $request->profile;
        if($request->image)
        {
            $filePath = $request->file('image')->store('images/profile');
            $user->image = basename($filePath);
        }
        $user->save();

        return redirect('/profile/' . $userName);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
