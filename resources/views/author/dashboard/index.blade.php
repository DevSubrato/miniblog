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
                    <li class="breadcrumb-item"><a href="{{route('author.dashboard')}}">Home</a></li>
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
                                <p>Total Posts</p>
                                <h3>{{$post}}</h3>
                            </div>                    
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-success">
                            <div class="inner">                   
                                <p>Comments</p>
                                <h3>{{$user->comments->count()}}</h3>          
                            </div>
                            <div class="icon">
                                <i class="far fa-message"></i>
                            </div>              
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <p>Post Approved</p>
                               <h3>{{$approve_post}}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-check"></i>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <p>Total views</p>
                                <h3>{{$total_views}}</h3>
                                
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
                            <h3 class="card-title">Most Viewd Post list</h3>
                           
                        </div>
                    </div>


                    <div class="card-body ">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Comments</th>
                                    <th>Views</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($popular_posts->count() > 0)
                                @foreach ($popular_posts as $key => $post)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset('uploads/post/'.$post->image)}}" style="width: 50px;"></td>
                                    <td>{{$post->title}}</td>

                                    <td>{{$post->comments->count()}}</button></td>
                                    <td>{{$post->view_count}}</td>
                                    <td>{{$post->created_at}}</td>                                                          
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

