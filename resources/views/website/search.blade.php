@extends('layouts.miniblog')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if($search)
                <h3>{{$search}}</h3> <span>({{$posts->count()}} match with your search)</span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-white">
    <div class="container">
        <div class="row justify-content-center">
            @if($posts->count() > 0)
            @foreach($posts as $post)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{route('website.post',$post->slug)}}"><img src="{{asset('uploads/post/'.$post->image)}}"
                            alt="Image" class="img-fluid rounded"></a>
                    <div class="excerpt">
                        <span class="post-category text-white bg-secondary mb-3">{{$post->category->name}}</span>
                        <h2><a href="{{route('website.post',$post->slug)}}">{{$post->title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left"><img
                                    src="{{asset('frontend/images/person_1.jpg')}}" alt="Image" class="img-fluid">
                            </figure>
                            <span class="d-inline-block mt-1">By <a href="#">{{$post->user->name}}</a></span>
                            <span>&nbsp;-&nbsp; {{$post->created_at->format('M d,y')}}</span>
                        </div>

                        <p>{!! Str::words(strip_tags($post->description), 20) !!}</p>
                        <p><a href="{{route('website.post',$post->slug)}}">Read More</a></p>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <th3><strong>No match found for your seach </strong> </th>
            @endif
        </div>
        <div class="row text-center pt-5 border-top">
            <div class="col-md-12">
                {{$posts->links()}}
            </div>
        </div>
    </div>
</div>

@endsection