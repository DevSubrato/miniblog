<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comment.index',compact('comments'));
    }

    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();
        Toastr::warning('comment deleted successfully','deleted');
        return redirect()->route('admin.comment.index');
    }
}
