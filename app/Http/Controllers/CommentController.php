<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $post)
    {
        $this->validate($request,[
            'comment' => 'required|max:1000',
        ]);

        $comments = new Comment();
        $comments->post_id = $post;
        $comments->user_id = Auth::user()->id;
        $comments->comment = $request->comment;
        $comments->save();
        Toastr::success('Your comment added successfully.','success');
        return redirect()->back();
    }

    public function replyStore(Request $request, $comment)
    {
        $this->validate($request,[
            'message' => 'required|max:1000',
        ]);

        $replies = new Comment();
        $replies->post_id = $request->post_id;
        $replies->user_id = Auth::user()->id;
        $replies->comment = $request->message;
        $replies->comment_id = $comment;
        $replies->save();
        Toastr::success('Your reply  added successfully.','success');
        return redirect()->back();
    }
}
