<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // バリデーションはCommentRequestに任せる
        $comment = New Comment;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::id();
        // ページからhiddenで送らずにRoutine_idを指定する方法は無いのか？
        $comment->routine_id = $request->routine_id;
        $comment->save();

        return;
    }
    public function update(Request $request)
    {
        // バリデーションはCommentRequestに任せる
        // $comment = New Comment;
        // $comment->comment = $request->comment;
        // $comment->user_id = Auth::id();
        // $comment->routine_id = ;
        // $comment->save();

        return;
    }
    public function delete(Request $request)
    {
        // バリデーションはCommentRequestに任せる
        // $comment = New Comment;
        // $comment->comment = $request->comment;
        // $comment->user_id = Auth::id();
        // $comment->routine_id = ;
        // $comment->save();

        return;
    }
}
