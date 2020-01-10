<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request){

        $comment = new Comment;
        $comment->title = $request['title'];
        $comment->content = $request['content'];
        $comment->article_id = $request['id'];
        $comment->user_id = auth()->id();
        $comment->save();

        return redirect(url()->current());
    }
}
