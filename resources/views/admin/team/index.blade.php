@extends('layouts.admin')
@section('title','Miniblog | team')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">All Members <span class="badge bg-info">{{$teams->count()}}</span></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route ('website')}}">Home</a></li>
                    <li class="breadcrumb-item active">Team</li>
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
                          <h5> Add Members <a href="{{route('admin.team.create')}}"><button class="btn btn-primary mr-2"><i class="fa-solid fa-plus"></i></button></a></h5>
                        </div>
                    </div>


                    <div class="card-body ">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                   
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</i></th>
                                    <th>Facebook</th>
                                    <th>Instagram</th>
                                    <!-- <th>Category</th> -->
                                    <!-- <th>Tags</th> -->
                                    {{-- <th>Twitter</th> --}}
                                                              
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($teams->count() > 0)
                                @foreach ($teams as $key => $team)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset('uploads/team/'.$team->image)}}" class="img-responsive" style="width: 50px;"></td>
                                    <td>{{$team->name}}</td>
                                    <td>{{$team->email}}</td>
                                    <td><a href="{{$team->facebook}}"></a>{{$team->facebook}}</td>
                                    
                                    <td><a href="{{$team->instagram}}"></a>{{$team->instagram}}</td>
                                    {{-- <td>{{$team->twitter}}</td> --}}
                                    
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              action
                                            </button>
                                            <div class="dropdown-menu">
                                              <a class="dropdown-item" href="{{route ('admin.team.show',$team->id) }}"> <i class="fas fa-eye text-primary"></i> <span class="text-bold font-italic text-primary">SHOW</span></a>
                                              <a class="dropdown-item" href="{{route ('admin.team.edit',$team->id) }}"><i class="fas fa-edit text-info"></i> <span class="text-bold font-italic text-info">EDIT</span></a>
                                              <form action="{{ route ('admin.team.destroy',$team->id)}}" method="POST" id="delete-team-{{$team->id}}">
                                                @csrf
                                                @method('DELETE')
                                              </form>
                                              <a class="dropdown-item" onclick="if(confirm('Are you sure? You want to delete this team'))
                                              {event.preventDefault();
                                                document.getElementById('delete-team-{{$team->id}}').submit();}">
                                                <i class="fas fa-trash text-danger"></i> <span class="text-bold font-italic text-danger">DELETE</span></a>
                                            </div>
                                          </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7">
                                        <h5 class="text-center">No team Found</h5>
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