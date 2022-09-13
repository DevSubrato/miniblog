<?php

namespace App\Http\Controllers\Author;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\AuthorNewPost;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;




class PostController extends Controller
{

    public function index()
    {
        
        $posts = Auth::User()->posts()->where('is_approved',true)->latest()->get();
        return view('author.post.index',compact('posts'));
    }

    
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('author.post.create',compact('categories','tags'));
    }

    public function store(Request $request)
    { 
        
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        $image=$request->file('image');
        $slug=str_slug($request->title);

        if(isset($image)){
            $currentdate=Carbon::now()->toDateString();
            $imagename=$slug.'-'.$currentdate.'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/post')){
                mkdir('uploads/post',077,true);
            }
            $image->move('uploads/post',$imagename);
        }else{
            $imagename='default.png';
        }
        $post=new Post();
        $post->user_id = auth::user()->id;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->category_id = $request->category;
        $post->description = $request->description;
        $post->image = $imagename;
        if(isset($request->status))
        {
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->is_approved = false;

        $post->published_at =Carbon::now();
        $post->save();

        $post->tags()->attach($request->tags);
        $user=User::where('role_id',1)->get();
        Notification::send($user, new AuthorNewPost($post));
        toastr::success('success','Post created Successfully');
        return redirect()->route('author.post.index');
        
    
    }

    public function show(Post $post)
    {
       if($post->user_id == Auth::user()->id)
       {
        return view('author.post.show',compact('post'));
       }else{
        toastr::warning('warning','You are not allowed to show this post');
        return redirect()->back();

       }
        
    }

    
    public function edit($id)
    {
        $tags=Tag::all();
        $categories=Category::all();
        $post=Post::find($id);
        if($post->user_id == Auth::user()->id)
       {
        return view('author.post.edit',compact('post','categories','tags'));
       }else{
        toastr::warning('warning','You are not allowed to edit this post');
        return redirect()->back();

       }
        
    }

  
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        $post=Post::find($id);
        $image=$request->file('image');
        $slug=str_slug($request->title);
        
        if(file_exists('uploads/post'.$post->image)){
            unlink('uploads/post'.$post->image);
        }

        if(isset($image)){
            $currentdate=Carbon::now()->toDateString();
            $imagename=$slug.'-'.$currentdate.'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/post')){
                mkdir('uploads/post',077,true);
            }
            $image->move('uploads/post',$imagename);
        }else{
            $imagename= $post->image;
        }

        $post->user_id = auth::user()->id;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->category_id = $request->category;
        $post->description = $request->description;
        $post->image = $imagename;
        if(isset($request->status))
        {
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->is_approved = false;     
        $post->update();
        
        $post->tags()->sync($request->tags);
        toastr::info('success','Post updated Successfully');
        return redirect()->route('author.post.index');
    }

    public function pending()
    {
        $pending_posts = Auth::User()->posts()->where('is_approved',false)->latest()->get();
        return view('author.post.pending',compact('pending_posts'));
    }


    
    public function destroy($id)
    {
        $post = Post::find($id);

        if($post->user_id == Auth::user()->id)
       {
        if(file_exists('uploads/post/'.$post->image)){
            unlink('uploads/post/'.$post->image);
        }
        
        $post->delete();
        return redirect()->back();
      }else{
        toastr::error('error','You are not allowed to delete this post');
        return redirect()->back();
      }
        
    }
        
}
