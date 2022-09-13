@extends('layouts.admin')
@section('title','Miniblog | User')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
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
                              <h5> All Users <span class="badge bg-info">{{$users->count()}}</span></h5>
                            </div>
                        </div>
                    


                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($users->count() > 0)
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>
                                        <img src="{{asset('uploads/user/'.$user->image)}}"
                                            style="height:100px; width: 100px;" class="img-fluid rounded-circle">
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>

                                    <td class="d-flex">                                       
                                        <form action="{{route('admin.user.destroy',$user->id)}}" method="post"
                                            id="delete-form-{{$user->id}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="submit" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"
                                                onclick="if(confirm('are you sure?to delete this user')){
    event.preventDefault();
    getElementById('delete-form-{{$user->id}}').
    submit();}"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5">
                                        <h5 class="text-center">No user Found</h5>
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