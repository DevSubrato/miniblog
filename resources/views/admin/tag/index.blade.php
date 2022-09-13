@extends('layouts.admin')
@section('title','Miniblog | Tag')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">All Tags <span class="badge bg-info">{{$tags->count()}}</span></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route ('website')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route ('admin.tag.index')}}">tag</a></li>
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
                          <h5> Create Tag <a href="{{route('admin.tag.create')}}"><button class="btn btn-primary mr-2"><i class="fa-solid fa-plus"></i></button></a></h5>
                        </div>
                    </div>


                    <div class="card-body">
                        <table id="table" class="table table-striped table-bordered">
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
                                @if($tags->count() > 0)
                                @foreach ($tags as $key => $tag)
                                <tr>
                                    <td>{{$tag->id}}</td>
                                    <td>{{$tag->name}}</td>
                                    <td>{{$tag->slug}}</td>
                                    <td>{{$tag->posts->count()}}</td>

                                    <td class="d-flex">
                                        <a href=" {{route('admin.tag.edit',$tag->id)}}" class="btn btn-sm btn-primary mr-1">
                                            <i class="fas fa-edit"></i> </a>

                                        <form action="{{ route('admin.tag.destroy',$tag->id)}}" method="post"
                                            id="delete-form-{{$tag->id}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="submit" onclick="if(confirm('are you sure?to delete this tag')){
                                            event.preventDefault();
                                            getElementById('delete-form-{{$tag->id}}').
                                            submit();}" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5">
                                        <h5 class="text-center">No Tags Found</h5>
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
