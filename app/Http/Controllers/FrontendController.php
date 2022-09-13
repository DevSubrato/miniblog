<?php

namespace App\Http\Controllers;


use App\Models\Tag;
use App\Models\Post;
use App\Models\Team;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Contact; 
use App\Models\Setting; 
use App\Http\Controllers;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
   public function home()
   {

      $posts = Post::with('category','tags','user')->orderBy('created_at','DESC')->take(5)->get();
      $lastposts = $posts->splice(0,2);
      $firstposts = $posts->splice(0,2);
      $middlepost = $posts->splice(0,1)->first();

      $posts = Post::inRandomOrder()->limit(4)->get();
      $lowerposts=$posts->splice(0,2);
      $relatedpost1 = $posts->splice(0,1)->first();
      $relatedpost2 = $posts->splice(0,1)->first();

      $recentposts = Post::with('category','user')->orderBy('created_at','DESC')->Approved()->Published()->paginate(12);
      return view('website.index',compact(
         'posts',
         'recentposts',
         'firstposts',
         'middlepost',
         'lastposts',
         'relatedpost1',
         'relatedpost2',
         'lowerposts')
      );

   }
   public function post($slug)
   {
      $tags = Tag::all();
      $category = Category::all();
      $post = Post::with('category','user')->where('slug', $slug)->first();
      return $comments = Comment::where('post_id',$post->id)->with('replies')->get();
      $popularposts = Post::orderBy('view_count','DESC')->Approved()->Published()->limit(3)->get();
      
      $blogkey = 'blog_'.$post->id;
      if(!Session::has($blogkey))
      {
         $post->increment('view_count');
         Session::put($blogkey,1);
      }  
      if($post){
         return view('website.post',compact('post','category','tags','popularposts'));
      }else{
         return redirect('/');
      }

   }
   public function category($slug)
   {
      $category = Category::where('slug', $slug)->first();
      $posts = Post::where('category_id',$category->id)->paginate(6);
      if($category){
         return view('website.category',compact('category','posts'));
      }else{
         return redirect()->route('website');
      }
   }

   public function about()
   {
      $teams= Team::All();
      return view('website.about',compact('teams'));
   }

   public function contact()
   {
      $setting = Setting::first();
      return view('website.contact',compact('setting'));
   }

   public function message(Request $request)
   {
      $this->validate($request,[
         'fname'=>'required|max:20',
         'lname'=>'required|max:20',
         'subject'=>'required|max:100',
         'email'=>'required|max:100',
         'message'=>'required|max:200',
      ]);

         $contact = new Contact();
         $contact->fname = $request->fname;
         $contact->lname = $request->lname;
         $contact->email = $request->email;
         $contact->subject = $request->subject;
         $contact->message = $request->message;
         $contact->save();
         Toastr::success('Message send successfully.Thanks for your message', 'Success', ["positionClass" => "toast-top-right"]);
         return redirect()->back();
   }

   public function tag($slug)
   {
      $tag=Tag::where('slug',$slug)->first();
      $posts=$tag->posts()->paginate(6);
      return view('website.tag',compact('tag','posts'));
   }
   

}
