<?php

namespace App\Http\Controllers;

use App\Routine;
use App\RoutineItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutineController extends Controller
{
    // ログインされていなければログイン画面に返す
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // そのままRoutineItemの作成ページに遷移させる
        return view('routine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $routine = new Routine;
        // バリデーションはform requestに任せる
        $forms = $request->all();
        unset($forms['_token']);
        $routine->fill($forms)->save();
        // 今はmypageにリダイレクト
        return redirect('mypage/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $routine = Routine::find($id);
        $routineItems = RoutineItem::where('routine_id',$id)->get();
        return view('routine.show',compact('routine','routineItems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 自分以外の投稿を編集しようとしたら/homeへリダイレクト
        $longinUserId = Auth::id();
        $routineOwnerId = Routine::find($id)->user_id;

        //登録済みアイテムがあれば表示させる
        $items = RoutineItem::where('routine_id',$id)->get();
        
        if($longinUserId === $routineOwnerId)
        {
            $routine = Routine::find($id);
            return view('routine.edit', compact('routine','items'));
        }else{
            return redirect('/home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // バリデーションはform requestに任せる
        $routine = Routine::find($id);
        $forms = $request->all();
        unset($forms['_token']);
        $routine->fill($forms)->save();
        return redirect('/mypage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Routine::find($id)->delete();
        return redirect('/mypage');
    }
}
