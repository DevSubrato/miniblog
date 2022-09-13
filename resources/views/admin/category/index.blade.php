@extends('layouts.admin')
@section('title','Miniblog | Category')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">All Categories <span class="badge bg-info">{{$categories->count()}}</span></h1>
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
                              <h5> Create Post <a href="{{route('admin.category.create')}}"><button class="btn btn-primary mr-2"><i class="fa-solid fa-plus"></i></button></a></h5>
                            </div>
                        </div>
                    

                    <div class="card-body p-0">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Post_Count</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($categories->count() > 0)
                                @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>{{$category->posts->count()}}</td>
                                    <td class="d-flex">
                                        <a href=" {{route ('admin.category.edit',$category->id) }}"
                                            class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                        <form action="{{route('admin.category.destroy',$category->id)}}" method="post"
                                            id="delete-form-{{$category->id}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="submit" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"
                                                onclick="if(confirm('are you sure?to delete this category')){event.preventDefault();getElementById('delete-form-{{$category->id}}').submit();}"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5">
                                        <h5 class="text-center">No Category Found</h5>
                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection