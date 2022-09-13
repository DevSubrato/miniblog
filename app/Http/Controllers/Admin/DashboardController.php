<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Subscriber;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $tag=Tag::all()->count();
        $user=User::all()->count();
        $post = Post::all()->count();
        $comment=Comment::all()->count();
        $category = Category::all()->count();
        $subscribers = Subscriber::all()->count();
        $posts = Post::orderBy('view_Count','DESC')->withCount('comments')->take(5)->get();
        return view('admin.dashboard.index',compact('posts','category','tag','post','user','subscribers','comment'));
    }
}
