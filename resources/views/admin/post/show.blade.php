@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">View Post </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route ('website')}}">Home</a></li>
                    <li class="breadcrumb-item active">View Post</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>



<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">View Post</h3>
                            {{-- <a class="btn btn-primary" href="{{ route ('admin.post.index')}}">Go to post List</a> --}}
                        </div>
                    </div>


                    <div class="card-body p-0">
                        <table class="table table-bordered ">
                            <tbody>
                                <tr>
                                    @if($post->is_approved == false)
                                    <button type="button" class="btn btn-success mb-2 mt-2" 
                                    onclick="if(confirm('Are you sure? you want to approve this post?'))
                                    {
                                        event.preventDefault();
                                        document.getElementById('approve-{{$post->id}}').submit();
                                    }">
                                    <i class="fas fa-pen-square"></i>
                                        <span>Approve</span>
                                    </button>
                                    <form action="{{route('admin.post.approve',$post->id)}}" style="display:none;" method="post"  id="approve-{{$post->id}}">
                                        @csrf
                                    </form>
                                    @else
                                    <button type="button" class="btn btn-success mb-2 mt-2" disabled><i
                                            class="fas fa-pen-square"></i>
                                        <span>Approved</span>
                                    </button>
                                    @endif
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Title</th>
                                    <td>{{$post->title}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Slug</th>
                                    <td>{{$post->slug}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Image</th>
                                    <td>
                                        <img src="{{asset('uploads/post/'.$post->image)}}"
                                            style="height: 90px; width: 120px;">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Category</th>
                                    <td>{{$post->category->name}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Tags</th>
                                    <td>
                                        @foreach($post->tags as $tag)
                                        <span class="badge badge-info">{{$tag->name}}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Description</th>
                                    <td>{!! $post->description !!}</td>
                                </tr>

                                <tr>
                                    <th style="width: 200px;">Author Name</th>
                                    <td>{{$post->user->name}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Publish</th>
                                    @if($post->status == true)
                                    <td>Published</td>
                                    @else($post->status == false)
                                    <td>Post is Pending</td>
                                    @endif

                                </tr>
                                <tr>
                                    <th style="width: 200px;">Approve</th>
                                    @if($post->is_approved == true)
                                    <td>Post Successfully approved by Admin</td>
                                    @else($post->status == false)
                                    <td>Post is not approved by admin</td>
                                    @endif
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection