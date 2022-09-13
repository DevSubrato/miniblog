@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">post </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route ('website')}}">Home</a></li>
                    <li class="breadcrumb-item active">post</li>
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
                            <h3 class="card-title">Create a new post</h3>
                            <a class="btn btn-primary" href="{{ route ('admin.post.index')}}">Go to post List</a>
                        </div>
                    </div>


                    <div class="card-body p-0">
                        <div class="card-row">
                            <div class="col-lg-6 col-12 offset-lg-3 col-md-8 offset-md-2">
                                <form action="{{ route ('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                    
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Post Title</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter name">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category</label>
                                            <select name="category" class="form-control">
                                                <option style="display:none" selected>select category</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Select Tag</label>
                                                @foreach($tags as $tag)
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" name="tags[]" type="checkbox"
                                                        id="tag{{$tag->id}}" value="{{$tag->id}}">
                                                    <label for="tag{{$tag->id}}"
                                                        class="custom-control-label">{{$tag->name}}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Image</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" id="publish" class="btn-check" name="status" value="0">
                                                <label for="publish">Publish</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control"
                                                placeholder="Enter description"></textarea>
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

@section('style')

<link rel="stylesheet" href="{{asset('backend/css/summernote-bs4.min.css')}}">

@endsection

@section('script')

<script src="{{asset('backend/js/summernote-bs4.min.js')}}"></script>
<script>
    $('#description').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 200
    });
</script>

@endsection
