<?php

namespace App\Http\Controllers\Author;


use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::where('user_id','auth->user()->id')->latest()->get();
        return view('author.comment.index',compact('comments'));
    }

    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();
        Toastr::warning('comment deleted successfully','deleted');
        return redirect()->route('author.comment.index');
    }
}
