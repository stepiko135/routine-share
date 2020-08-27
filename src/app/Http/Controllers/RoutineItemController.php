<?php

namespace App\Http\Controllers;

use App\Routine;
use App\RoutineItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RoutineItemRequest;
use Symfony\Component\Routing\RouterInterface;

class RoutineItemController extends Controller
{
    // ログインされていなければログイン画面に返す
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoutineItemRequest $request)
    {
        $routineItem = new RoutineItem;
        $forms = $request->all();
        unset($forms['_token']);
        $routineItem->fill($forms)->save();
        $id = $request->routine_id;
        return back()->with('message','保存されました');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($routineId)
    {
        // 自分以外の投稿を編集しようとしたら/homeへリダイレクト
        $longinUserId = Auth::id();
        $routineOwnerId = Routine::find($routineId)->user_id;

        if ($longinUserId === $routineOwnerId) {
            //アイテムがあれば取得して時間順に表示させる
            $items = RoutineItem::where('routine_id', $routineId)->orderBy('time', 'asc')->get();
            return view('routineItem.edit', compact('items','routineId'));
        } else {
            return redirect(route('home'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoutineItemRequest $request, $id)
    {
        $routineItem = RoutineItem::find($id);
        $forms = $request->all();
        unset($forms['_token']);
        $routineItem->fill($forms)->save();
        $routineId = $routineItem->routine_id;
        // return redirect()->route('home');
        return redirect()->action('RoutineItemController@edit', ['routineId' => $routineId])->with('message','更新されました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $routineItem = RoutineItem::find($id);
        $routineItem->delete();
        // return redirect('/routine/'.$id->routine_id.'/edit');
        $routineId = $routineItem->routine_id;
        return redirect()->action('RoutineItemController@edit', ['routineId' => $routineId])->with('message','削除しました');
    }
}
