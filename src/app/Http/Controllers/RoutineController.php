<?php

namespace App\Http\Controllers;

use App\Routine;
use Illuminate\Http\Request;

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
    public function index()
    {
        $routines =Routine::all();
        return view('routine.index',compact('routines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // このまま新規でRoutine Itemを作成させる。
        // 今はmypageにリダイレクト
        return redirect('/mypage');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 自分の投稿のみ編集できるようにする。
        $routine = Routine::find($id);
        return view('routine.edit',compact('routine'));
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
         // このままRoutine Itemを編集させる。
        // 今はmypageにリダイレクト
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
