@extends('layouts.admin')
@section('title','Miniblog | Post')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">All Posts <span class="badge bg-info">{{$posts->count()}}</span></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route ('website')}}">Home</a></li>
                    <li class="breadcrumb-item active">Post</li>
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
                          <h5> Create Post <a href="{{route('admin.post.create')}}"><button class="btn btn-primary mr-2"><i class="fa-solid fa-plus"></i></button></a></h5>
                        </div>
                    </div>
                

                    <div class="card-body ">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                   
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Comments</th>
                                    <th><i class="fas fa-eye"></i></th>
                                    <th>Status</th>
                                    <th>Is_Approved</th>
                                    <!-- <th>Category</th> -->
                                    <!-- <th>Tags</th> -->
                                    <th>Created_At</th>

                                    


                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($posts->count() > 0)
                                @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ str_limit($post->title,10)}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>{{$post->comments->count()}}</td>
                                    <td>{{$post->view_count}}</td>
                                    <td>
                                        @if($post->status == true)
                                        <h4> <span class="badge badge-primary">Published</span></h4>
                                        @else
                                        <h4> <span class="badge badge-danger">Pending</span></h4>
                                        @endif
                                    </td>
                                    <td>
                                        @if($post->is_approved == true)
                                        <h4> <span class="badge badge-success">Approved</span></h4>
                                        @else
                                        <h4> <span class="badge badge-danger">Pending</span></h4>
                                        @endif
                                    </td>
                                    <!-- <td>{{$post->category->name}}</td> -->
                                    <!-- <td>
                                        @foreach($post->tags as $tag)
                                        <span class="badge badge-info">{{$tag->name}}</span>
                                        @endforeach
                                    </td> -->
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

    </div>
</div>
@endsection
@push('js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
    $('#table').DataTable();
});
</script>

@endpush
