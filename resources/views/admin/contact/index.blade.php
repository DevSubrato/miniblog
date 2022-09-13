@extends('layouts.admin')
@section('title','Miniblog | Contact')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Messages</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                    <li class="breadcrumb-item active">Messages</li>
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
                            <h3 class="card-title">Messages List</h3>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $message)
                                <tr>
                                    <td>{{$message->id}}</td>
                                    <td>{{$message->fname}}</td>
                                    <td>{{$message->lname}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->subject}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.contact.show',$message->id)}}"class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                                        <form action="{{route('admin.contact.destroy',$message->id)}}" id="delete-form-{{$message->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="submit" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"
                                                onclick="if(confirm('are you sure?to delete this message')){event.preventDefault(); getElementById('delete-form-{{$message->id}}').submit();}"></i>
                                            </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
@endsection