<?php

namespace App\Http\Controllers\Admin;
        
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\NewPostNotify;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AuthorPostApprove;
use Illuminate\Support\Facades\Notification;


        
        
        
class PostController extends Controller
{


    
    public function index()
    {
        $tags=Tag::all();
        $category = Category::all();
        $posts = Post::where('is_approved',true)->latest()->get();
        return view('admin.post.index',compact('posts','category','tags'));
    }

   
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create',compact('categories','tags'));
    }


    public function store(Request $request)
    { 

    $this->validate($request,[
        'title' => 'required',
        'image' => 'required',
        'category' => 'required',
        'description' => 'required',
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
    $post->is_approved = true;

    $post->published_at =Carbon::now();
    $post->save();

    $post->tags()->attach($request->tags);
    toastr::success('success','Post created Successfully');
    return redirect()->route('admin.post.index');

    }


    public function show(Post $post)
    {
    return view('admin.post.show',compact('post'));
    }


    public function edit($id)
    {
        $tags=Tag::all();
        $categories=Category::all();
        $post=Post::find($id);
        return view('admin.post.edit',compact('post','categories','tags'));
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

            $post->is_approved = true;     
            $post->update();
            
            $post->tags()->sync($request->tags);
            toastr::info('success','Post updated Successfully');
            return redirect()->route('admin.post.index');

    }

    public function pending()
    {
        $posts= Post::where('is_approved',false)->latest()->get();
        return view('admin.post.pending',compact('posts'));
    }

    public function approve($id)
    {
        $post=Post::find($id);
        if($post->is_approved == false)
        {
            $post->is_approved = true;
            $post->save();
            $post->user->notify(new AuthorPostApprove($post));
            toastr::success('success','Post approved Successfully');
            $subscribers = Subscriber::all();
            foreach($subscribers as $subscriber)
            {
                Notification::route('mail', $subscriber->email)

                    ->notify(new NewPostNotify($post));
            }
        }else{
            toastr::info('success','Post is already approved');
        }
        return redirect()->back();
      
    }

        
    public function destroy($id)
    {
        $post = Post::find($id);
        if(file_exists('uploads/post/'.$post->image)){
            unlink('uploads/post/'.$post->image);
            }
            
        $post->delete();
        return redirect()->back();
    }
    }
