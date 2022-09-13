@extends('layouts.admin')
@section('title','Miniblog | Dashboard')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i>Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$post}}</h3>
                        <p>All Post</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pen-square"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$subscribers}}</h3>
                        <p>Subscribers</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$comment}}</h3>                      
                        <p>Comments</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-message"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$user}}</h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-user"></i>
                    </div>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Most viewd posts list</h3>
                        </div>
                    </div>


                    <div class="card-body">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Views</th>
                                    <th>Comments</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($posts->count() > 0)
                                @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset('uploads/post/'.$post->image)}}" style="width: 50px;"></td>
                                    <td><a href="{{route('website.post',$post->slug)}}">{{$post->title}}</a></td>

                                    <td>{{$post->view_count}}</td>
                                    <td>{{$post->comments->count()}}</td>
                                    
                                    <td>{{$post->user->name}}</td>
                                    <td>{{$post->created_at}}</td>


                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              action
                                            </button>
                                            <div class="dropdown-menu">
                                              <a class="dropdown-item" href="{{route ('admin.post.show',$post->id) }}"> <i class="fas fa-eye text-primary"></i> <span class="text-bold font-italic text-primary">SHOW</span></a>
                                              <a class="dropdown-item" href="{{route ('admin.post.edit',$post->id) }}"><i class="fas fa-edit text-info"></i> <span class="text-bold font-italic text-info">EDIT</span></a>
                                              <form action="{{ route ('admin.post.destroy',$post->id)}}" method="POST" id="delete-post-{{$post->id}}">
                                                @csrf
                                                @method('DELETE')
                                              </form>
                                              <a class="dropdown-item" onclick="if(confirm('Are you sure? You want to delete this post')){
                                                event.preventDefault();
                                                document.getElementById('delete-post-{{$post->id}}').submit();
                                              }"><i class="fas fa-trash text-danger"></i> <span class="text-bold font-italic text-danger">DELETE</span></a>
                                            </div>
                                          </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7">
                                        <h5 class="text-center">No post Found</h5>
                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@endsection
