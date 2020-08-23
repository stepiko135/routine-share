<?php

namespace App\Http\Controllers;

use App\Routine;
use App\RoutineItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RoutineRequest;

class RoutineController extends Controller
{
    // ログインされていなければログイン画面に返す
    public function __construct()
    {
        $this->middleware('auth')->except('show');
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
        return view('routine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoutineRequest $request)
    {
        // バリデーションはRoutine requestに任せる
        $routine = new Routine;
        $forms = $request->all();
        unset($forms['_token']);
        $routine->fill($forms)->save();
        // そのまま作成したルーティンのアイテム作成ページへ遷移
        // return redirect('mypage/');
        $id = $routine->id;
        return redirect()->action('RoutineController@edit',['routine' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ルーティンアイテムを取得して時間順に並べる
        $routine = Routine::find($id);
        $routineItems = RoutineItem::where('routine_id',$id)->orderBy('time','asc')->get();

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
        //アイテムがあれば取得して時間順に表示させる
        $items = RoutineItem::where('routine_id',$id)->orderBy('time','asc')->get();

        // 自分以外の投稿を編集しようとしたら/homeへリダイレクト
        $longinUserId = Auth::id();
        $routineOwnerId = Routine::find($id)->user_id;

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
    public function update(RoutineRequest $request, $id)
    {
        // バリデーションはRoutineRequestに任せる
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
        if(Auth::user()->role===1)
        {
            return redirect('/admin/routine');
        }else{
            return back();
        }
    }
}
