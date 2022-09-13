@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Teams </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route ('website')}}">Home</a></li>
                    <li class="breadcrumb-item active">Teams</li>
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
                            <h3 class="card-title">Create a Team Member</h3>
                            <a class="btn btn-primary" href="{{ route ('admin.team.index')}}">Go to team List</a>
                        </div>
                    </div>


                    <div class="card-body p-0">
                        <div class="card-row">
                            <div class="col-lg-6 col-12 offset-lg-3 col-md-8 offset-md-2">
                                <form action="{{ route ('admin.team.update',$team->id)}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        @include('include.error')
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Enter name" value="{{$team->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="col-lg-4">
                                            <div
                                                class="style:max-width: 100px;max-height: 100px;overflow:hidden;margin-left:auto">

                                                <img src="{{asset('uploads/team/'.$team->image)}}"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        {{-- <div class="input-group mb-3">
                                            <div class="custom-file">
                                              <input type="file" class="custom-file-input" id="inputGroupFile02">
                                              <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" value="{{$team->email}}" class="form-control" id="email"
                                                        placeholder="Enter url">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="facebook">Facebook</label>
                                                    <input type="facebook" name="facebook" value="{{$team->facebook}}" class="form-control"
                                                        id="facebook" placeholder="Enter url">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="instagram">instagram</label>
                                                    <input type="instagram" name="instagram" value="{{$team->instagram}}" class="form-control"
                                                        id="instagram" placeholder="Enter url">
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="twitter">twitter</label>
                                                    <input type="twitter" name="twitter" value="{{$team->twitter}}" class="form-control"
                                                        id="twitter" placeholder="Enter url">
                                                </div>

                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" class="form-control" rows="5">{{$team->description}}</textarea>
                                                </div>

                                            </div>
                                        </div>


                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
@endsection
