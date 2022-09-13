@extends('layouts.admin')
@section('title','Miniblog | Profile')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Your Profile </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                    <li class="breadcrumb-item active">Your Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>



<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Your Profile</h3>
                        </div>
                    </div>


                    <div class="card-body p-0">
                        <div class="card-row">
                            <div class="col-12 col-lg-8 ">
                                <form action="{{route('author.profile.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf             
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="name"> Name</label>
                                                    <input type="name" name="name" class="form-control" id="name"
                                                        placeholder="Enter name" value="{{$user->name}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email"> Email</label>
                                                    <input type="email" name="email" class="form-control" id="email"
                                                        placeholder="Enter email" value="{{$user->email}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                        id="password" placeholder="Enter password">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="name">Image</label>
                                                    <input type="file" name="image" class="form-control" id="image">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">User Description</label>
                                                    <textarea name="description"  cols="20" id="description"
                                                        class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img class="img-fluid rounded-circle" src="{{asset('uploads/user/'.$user->image)}}" style="height:150px; width: 150px;">
                          <p class="card-text mt-3">{{$user->name}}</p>
                          <p class="card-text mt-3">{{$user->email}}</p>
                          <p class="card-text"><small class="text-muted">Last updated {{$user->updated_at->diffForHumans()}}</small></p>
                        </div>
                    </div>   
            </div>


        </div>
    </div>

</div>

@endsection