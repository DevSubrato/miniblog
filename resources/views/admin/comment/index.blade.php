@extends('layouts.admin')
@section('title','Miniblog | Comments')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Comments List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route ('website')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route ('admin.comment.index')}}">Comments</a></li>
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
                            <h3 class="card-title">
                                All Comments <span class="badge bg-info">{{$comments->count()}}</span>
                            </h3>

                        </div>
                    </div>


                    <div class="card-body">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Comment</th>
                                    <th>Post</th>
                                    <th>User</th>
                                    <th>Created_at</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($comments->count() > 0)
                                @foreach ($comments as $key =>$comment) 
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{str_limit($comment->comment,20)}}</td>
                                    <td><a href="{{route('website.post',$comment->post->slug)}}">{{$comment->post->title}}</a></td>
                                    <td>{{$comment->user->name}}</td>
                                    <td>{{$comment->created_at->diffForHumans()}}</td>

                                    <td class="d-flex">
                                        <form action="{{ route('admin.comment.destroy',$comment->id)}}" method="POST"
                                            id="delete-form-{{$comment->id}}">
                                            @csrf
                                            @method('DELETE')
                                        
                                        </form>
                                        <button type="submit" onclick="if(confirm('are you sure?to delete this comment')){
                                            event.preventDefault();
                                            getElementById('delete-form-{{$comment->id}}').
                                            submit();}" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"></i>
                                                                                </button>

                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7">
                                        <h5 class="text-center">NO comments found</h5>
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