@extends('layouts.miniblog')

@section('content')


<div class="site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url('{{asset('uploads/post/'.$post->image)}}');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <span class="post-category text-white bg-success mb-3">{{$post->category->name}}</span>
                    <h1 class="mb-4"><a href="javascript:void()">{{$post->title}}</a></h1>
                    <div class="post-meta align-items-center text-center">
                        <figure class="author-figure mb-0 mr-3 d-inline-block"><img
                                src="{{asset('uploads/user/'.$post->user->image)}}" style="height:35px; width: 35px;"
                                alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By {{$post->user->name}}</span>
                        <span>&nbsp;-&nbsp; {{$post->created_at->format('M d ,y')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section py-lg">
    <div class="container">
        <div class="row blog-entries element-animate">
            <div class="col-md-12 col-lg-8 main-content">
                <div class="post-content-body">
                    {!! $post->description !!}
                </div>
                <div class="pt-5">
                    <p> Categories: <a
                            href="{{route('website.category',$post->category->slug)}}">{{$post->category->name}}</a>
                        Tags:
                        @if($post->tags->count() > 0)
                        @foreach ($post->tags as $tag)
                        <a href="{{route('website.tag',$tag->slug)}}">{{$tag->name}}</a>
                        @endforeach
                        @endif
                    </p>
                </div>

                <div class="post-content-body">
                    @if($post->view_count)
                    <i class="fa-solid fa-eye"></i>
                    @else
                    <p>no views counted </p>
                    @endif
                </div>


                <div class="pt-5">
                    @if($post->comments->count()> 0)
                    <h3 class="mb-5">{{$post->comments->count()}} Comments</h3>

                    @foreach($post->comments as $comment)

                    <ul class="comment-list">
                        <li class="comment">
                            <div class="vcard">
                                <img class="img-fluid rounded-circle elevation-3"
                                    src="{{asset('uploads/user/'.$comment->user->image)}}"
                                    style="height:35px; width: 35px;" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>{{$comment->user->name}}</h3>
                                <div class="meta"><strong
                                        class="text-dark">{{$comment->created_at->diffForHumans()}}</strong></div>
                                <p>{{$comment->comment}}</p>
                            </div>

                            @foreach($comment->replies as $reply)
                            <ul class="children">
                                <li class="comment">
                                    <div class="vcard">
                                        @if($reply->user->image)
                                        <img class="img-fluid rounded-circle elevation-3"
                                            src="{{asset('uploads/user/'.$reply->user->image)}}"
                                            style="height:35px; width: 35px;" alt="Image placeholder">
                                        @endif
                                    </div>
                                    <div class="comment-body">
                                        <h3>{{$reply->user->name}}</h3>
                                        <div class="meta"><strong
                                                class="text-dark">{{$reply->created_at->diffForHumans()}}</strong></div>
                                        <p>{{$reply->comment}}</p>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                            <div class="p-4">
                                <form action="{{route('reply.store',$comment->id)}}" method="post" class="ps-5  ms-5">
                                    @csrf
                                    <div class="form-group">

                                        <input type="text" name="message" class="form-control">
                                        <input type="hidden" name="post_id" value="{{$post->id }}">
                                        <input type="hidden" name="comment_id" value="{{$comment->id }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Reply" class="btn btn-primary rounded">
                                    </div>

                                </form>
                            </div>

                        </li>
                    </ul>


                    @endforeach
                    @endif
                    <!-- END comment-list -->

                    <div class="comment-form-wrap ">
                        <h3 class="mb-5">Leave a comment</h3>
                        @guest

                        <h3 class="font-italic">Please login first to comment on this post</h3>

                        @else
                        <form action="{{route('comment.store',$post->id)}}" method="post" class="ps-5 bg-light">
                            @csrf
                            <div class="form-group">
                                <label for="comment">Comment</label>
                                <textarea name="comment" id="comment" cols="10" rows="5"
                                    class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary rounded">
                            </div>

                        </form>
                        @endguest
                    </div>
                </div>

            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box search-form-wrap">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <div class="bio text-center">
                        @if($post->user->image)
                        <img src="{{asset('uploads/user/'.$post->user->image)}}" style="height: 150px; width: 200px;"
                            alt="Image Placeholder" class="img-fluid mb-5">
                        @else
                        <p>user does not set image yet</p>
                        @endif
                        <div class="bio-body">
                            <h2>{{$post->user->name}}</h2>
                            <button class="btn btn-outline-primary rounded" data-toggle="modal" data-target="#exampleModal">Read my bio</button>
                        </div>
                    </div>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            @foreach($popularposts as $post)
                            <li>
                                <a href="{{route('website.post',$post->slug)}}">
                                    <img src="{{asset('uploads/post/'.$post->image)}}" alt="Image placeholder"
                                        class="mr-4">
                                    <div class="text">
                                        <h4>{{$post->title}}</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">{{$post->created_at->format('M d ,y')}}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        @if($categories)
                        @foreach ($categories as $category)
                        <li><a href="{{route('website.category',$category->slug)}}">{{$category->name}}
                                <strong><span>{{$category->posts->count()}}</span></strong> </a></li>
                        @endforeach
                        @endif
                    </ul>
                </div>
                 <!-- END sidebar-box -->


                    <div class="sidebar-box">
                        <h3 class="heading">Tags</h3>
                        <ul class="tags">
                            @if($tags)
                            @foreach ($tags as $tag)
                            <li>
                                <a href="{{route('website.tag',$tag->slug)}}">{{$tag->name}}(<strong><span>{{$tag->posts->count()}}</span></strong>)</a>
                            </li>
                            @endforeach
                            @endif

                        </ul>
                    </div>
            </div>
            <!-- END sidebar -->

        </div>
    </div>
</section>

{{-- <div class="site-section bg-light">
    <div class="container">

        <div class="row mb-5">
            <div class="col-12">
                <h2>More Related Posts</h2>
            </div>
        </div>

        <div class="row align-items-stretch retro-layout">

            <div class="col-md-5 order-md-2">
                <a href="single.html" class="hentry img-1 h-100 gradient"
                    style="background-image: url('{{asset('frontend/images/img_4.jpg')}}');">
                    <span class="post-category text-white bg-danger">Travel</span>
                    <div class="text">
                        <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                        <span>February 12, 2019</span>
                    </div>
                </a>
            </div>

            <div class="col-md-7">

                <a href="single.html" class="hentry img-2 v-height mb30 gradient"
                    style="background-image: url('{{asset('frontend/images/img_1.jpg')}}');">
                    <span class="post-category text-white bg-success">Nature</span>
                    <div class="text text-sm">
                        <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                        <span>February 12, 2019</span>
                    </div>
                </a>

                <div class="two-col d-block d-md-flex">
                    <a href="single.html" class="hentry v-height img-2 gradient"
                        style="background-image: url('{{asset('frontend/images/img_2.jpg')}}');">
                        <span class="post-category text-white bg-primary">Sports</span>
                        <div class="text text-sm">
                            <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                            <span>February 12, 2019</span>
                        </div>
                    </a>
                    <a href="single.html" class="hentry v-height img-2 ml-auto gradient"
                        style="background-image: url('{{asset('frontend/images/img_3.jpg')}}');">
                        <span class="post-category text-white bg-warning">Lifestyle</span>
                        <div class="text text-sm">
                            <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                            <span>February 12, 2019</span>
                        </div>
                    </a>
                </div>

            </div>
        </div>

    </div>
</div> --}}


<div class="site-section bg-lightx">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5">
                <div class="subscribe-1 ">
                    <h2>Subscribe to our newsletter</h2>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a
                        explicabo, ipsam nostrum.</p>
                    <form action="{{route('subscriber.store')}}" method="POST" class="d-flex">
                        @csrf
                        <input type="text" name="email" class="form-control" placeholder="Enter your email address">
                        <input type="submit" class="btn btn-primary" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{$post->user->name}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
