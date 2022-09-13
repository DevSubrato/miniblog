@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">View Post </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route ('website')}}">Home</a></li>
                    <li class="breadcrumb-item active">View Post</li>
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
                            <h3 class="card-title">View Post</h3>
                            <a class="btn btn-primary" href="{{ route ('contact.index')}}">Go to post List</a>
                        </div>
                    </div>


                    <div class="card-body p-0">
                        <table class="table table-bordered ">
                            <tbody>
                                <tr>
                                    <th style="width: 200px;">First Name</th>
                                    <td>{{$contact->fname}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Last Name</th>
                                    <td>{{$contact->lname}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Email</th>
                                    <td>{{$contact->email}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Subject</th>
                                    <td>{{$contact->subject}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;">Message</th>
                                    <td>{{$contact->message}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                </div>

            </div>
        </div>

    </div>
</div>
@endsection