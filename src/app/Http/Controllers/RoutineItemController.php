<?php

namespace App\Http\Controllers;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $routineItems = RoutineItem::where('user_id',$userId)->get();
        return view('routineItem.index',compact('routineItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        //リンク元からroutine_idを取得 
        $routine_id = $request->id;

        return view('routineItem.create',compact('routine_id'));
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
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoutineItem::find($id)->delete();
        return back();
    }
}
