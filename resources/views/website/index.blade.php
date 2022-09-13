@extends('layouts.miniblog')

@section('content')

<div class="site-section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout-2">
            <div class="col-md-4">
                @foreach ($firstposts as $firstpost)       
                <a href="{{route('website.post',$firstpost->slug)}}" class="h-entry mb-30 v-height gradient" style="background-image: url({{asset('uploads/post/'.$firstpost->image)}});">
                  <div class="text">
                    <h2>{{$firstpost->title}}</h2>
                    <span class="date">{{$firstpost->created_at->diffForHumans()}}</span>
                  </div>
                </a>
                @endforeach
            </div>
            <div class="col-md-4">
              <a href="{{route('website.post',$middlepost->slug)}}" class="h-entry img-5 h-100 gradient" style="background-image: url({{asset('uploads/post/'.$middlepost->image)}});">     
                <div class="text">
                  <div class="post-categories mb-3">
                    @foreach ($middlepost->tags as $tag)
                    <span class="post-category bg-danger">{{$tag->name}}</span>
                    @endforeach
                  </div>
                  <h2>{{$middlepost->title}}</h2>
                  <span class="date">{{$middlepost->created_at->diffForHumans()}}</span>
                </div>
              </a>
            </div>
            <div class="col-md-4">
                @foreach ($lastposts as $lastpost)       
                <a href="{{route('website.post',$lastpost->slug)}}" class="h-entry mb-30 v-height gradient" style="background-image: url({{asset('uploads/post/'.$lastpost->image)}});">
                  <div class="text">
                    <h2>{{$lastpost->title}}</h2>
                    <span class="date">{{$lastpost->created_at->diffForHumans()}}</span>
                  </div>
                </a>
                @endforeach
            </div>
          </div>
        {{-- <div class="row align-items-stretch retro-layout-2">
            <div class="col-md-4">
                <a href="{{route('website.post',$post1->slug) }}" class="h-entry mb-30 v-height gradient"
                    style="background-image: url('{{asset('uploads/post/'.$post1->image)}}');">

                    <div class="text">
                        <h2>{{ $post1->title }}</h2>
                        <span class="date">July 19, 2019</span>
                    </div>
                </a>
                <a href="{{route('website.post',$post2->slug) }}" class="h-entry v-height gradient"
                    style="background-image: url('{{asset('uploads/post/'.$post2->image)}}'); ">

                    <div class="text">
                        <h2>{{ $post2->title }}</h2>
                        <span class="date">July 19, 2019</span>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('website.post',$post3->slug) }}" class="h-entry img-5 h-100 gradient"
                    style="background-image: url('{{asset('uploads/post/'.$post5->image)}}');">

                    <div class="text">
                        <div class="post-categories mb-3">
                            <span class="post-category bg-danger">Travel</span>
                            <span class="post-category bg-primary">Food</span>
                        </div>
                        <h2>{{ $post3->title }}</h2>
                        <span class="date">July 19, 2019</span>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('website.post',$post4->slug) }}" class="h-entry mb-30 v-height gradient"
                    style="background-image: url('{{asset('frontend/images/img_3.jpg')}}');">
                    <div class="text">
                        <h2>{{ $post4->title }}</h2>
                        <span class="date">July 19, 2019</span>
                    </div>
                </a>
                <a href="{{route('website.post',$post5->slug) }}" class="h-entry v-height gradient"
                    style="background-image: url('{{asset('frontend/images/img_4.jpg')}}');">
                    <div class="text">
                        <h2>{{ $post5->title }}</h2>
                        <span class="date">{{$post5->created_at->format('M d,y')}}</span>
                    </div>
                </a>
            </div>
        </div> --}}
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2>Recent Posts</h2>
            </div>
        </div>
        <div class="row">
            @foreach($recentposts as $recentpost)
            <div class="col-lg-3 mb-4">
                <div class="entry2">
                    <a href="{{route('website.post', $recentpost->slug)}}"><img
                            src="{{asset('uploads/post/'.$recentpost->image)}}" alt="Image"
                            class="img-fluid rounded" style="height:200px;width:300px"></a>
                    <div class="excerpt">
                        <span class="post-category text-white bg-secondary mb-3">{{$recentpost->category->name}}</span>

                        <h2><a href="{{route('website.post',$recentpost->slug) }}">{{$recentpost->title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left"><img
                                    src="{{asset('uploads/user/'.$recentpost->user->image)}}"
                                    style="height:35px; width: 35px;" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">{{$recentpost->user->name}}</a></span>
                            <span>&nbsp;-&nbsp; {{$recentpost->created_at->format('M d,y')}}</span>
                        </div>

                        <p>{!! Str::limit(strip_tags($recentpost->description), 100) !!}</p>
                        <a href="{{route('website.post',$recentpost->slug)}}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row text-center pt-5 border-top">
            <div class="col-md-12">
            {{$recentposts->links()}}
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">

        <div class="row align-items-stretch retro-layout">
          
            <div class="col-md-5 order-md-2">
              <a href="{{route('website.post',$relatedpost2->slug)}}" class="hentry img-1 h-100 gradient" style="background-image: url({{asset('uploads/post/'.$relatedpost2->image)}});">
                @foreach ($relatedpost2->tags as $tag)
                <span class="post-category text-white bg-danger">{{$tag->name}}</span>
                @endforeach
                <div class="text">
                  <h2>{{$relatedpost2->title}}</h2>
                  <span>{{$relatedpost2->created_at->diffForHumans()}}</span>
                </div>
              </a>
            </div>
  
            <div class="col-md-7">
              
              <a href="{{route('website.post',$relatedpost1->slug)}}" class="hentry img-2 v-height mb30 gradient" style="background-image: url({{asset('uploads/post/'.$relatedpost1->image)}});">
                @foreach ($relatedpost1->tags as $tag)
                <span class="post-category text-white bg-success">{{$tag->name}}</span>
                @endforeach
                <div class="text text-sm">
                  <h2>{{$relatedpost1->title}}</h2>
                  <span>{{$relatedpost1->created_at->diffForHumans()}}</span>
                </div>
              </a>
              
              <div class="two-col d-block d-md-flex">
                @foreach ($lowerposts as $lowerpost)
                    <a href="{{route('website.post',$lowerpost->slug)}}" class="hentry v-height img-2 gradient" style="background-image: url({{asset('uploads/post/'.$lowerpost->image)}});">
                        @foreach ($lowerpost->tags as $tag)
                        <span class="post-category text-white bg-primary">{{$tag->name}}</span>
                        @endforeach
                      <div class="text text-sm">
                        <h2>{{$lowerpost->title}}</h2>
                        <span>{{$lowerpost->created_at->diffForHumans()}}</span>
                      </div>
                    </a>
                @endforeach
              </div>  
              
            </div>
          </div>

    </div>
</div>


<div class="site-section bg-lightx">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5">
                <div class="subscribe-1 ">
                    <h2>Subscribe to our newsletter</h2>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a
                        explicabo, ipsam nostrum.</p>
                    <form action="{{route('subscriber.store')}}" method="POST"class="d-flex">
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