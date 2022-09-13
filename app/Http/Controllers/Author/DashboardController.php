<?php

namespace App\Http\Controllers\Author;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user= Auth::user();
        $posts = $user->posts;
        $tag=Tag::all()->count();
        $post = $posts->count();
        $category = Category::all()->count();
        $total_views=$posts->sum('view_count');
        $approve_post = $posts->where('is_approved',true)->count();
        $popular_posts=$user->posts()->withCount('comments')->orderBy('view_count','DESC')->take(5)->get();
        
         
        return view('author.dashboard.index',compact('posts','category','tag','post','user','approve_post','total_views','popular_posts'));
    }
}
