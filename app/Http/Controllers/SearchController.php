<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $posts = Post::where('title','LIKE',"%$search%")->paginate(2);
        return view('website.search',compact('posts','search'));   
    }
}
