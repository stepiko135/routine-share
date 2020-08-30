<?php

namespace App\Http\Controllers;

use App\User;
use App\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


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
        // 管理者ユーザー（id=1）は除外してページネーション
        $users = User::where('id', '!=', 1)->paginate(6);

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
        if ($request->image) {
            // 設定済みの写真があれば削除する
            // $user->imageは画像のフルパスの為ファイル名だけ取り出す。
            $oldImage = basename($user->image);
            if ($oldImage !== 'default.png') {
                // S3のprofileフォルダにあるため"profile/"を追記
                Storage::disk('s3')->delete("profile/" . $oldImage);
            }
            $image = $request->file('image');
            // 画像を比率維持のまま幅を500pxに自動調整。画像拡大なし。
            Image::make($image)->resize(500,null,function($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($image);
            $path = Storage::disk('s3')->putFile('profile', $image, 'public');
            $user->image = Storage::disk('s3')->url($path);
        }
        $user->save();

        return redirect('/profile/' . $userName)->with('message','プロフィールを更新しました！');
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
