@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Category List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route ('website')}}">Home</a></li>
                    <li class="breadcrumb-item active">Category</li>
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
                            <h3 class="card-title">Edit Category</h3>
                            <a class="btn btn-primary" href="{{ route ('admin.category.index')}}">Go to Category List</a>
                        </div>
                    </div>


                    <div class="card-body p-0">
                        <div class="card-row">
                            <div class="col-lg-6 col-12 offset-lg-3 col-md-8 offset-md-2">
                                <form action="{{ route ('admin.category.update',$category->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                      @include('include.error')
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category Name</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                                value="{{$category->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea name="description" class="form-control"
                                                placeholder="Enter description">{{$category->description}}</textarea>
                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
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