@extends('layouts.admin')
@section('title','Miniblog | Subscribers')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">All Subscribers <span class="badge bg-info">{{$subscribers->count()}}</span></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route ('website')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route ('admin.subscribers.index')}}">Subscribers</a></li>
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
                                All Subscribers <span class="badge bg-info">{{$subscribers->count()}}</span>
                            </h3>
                        </div>
                    </div>


                    <div class="card-body ">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Email</th>
                                    <th>Created_At</th>
                                    {{-- <th>Post_Count</th> --}}

                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($subscribers->count() > 0)
                                @foreach ($subscribers as $key => $subscriber)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$subscriber->email}}</td>
                                    <td>{{$subscriber->created_at}}</td>

                                    <td class="d-flex">
                                        <form action="{{ route('admin.subscribers.destroy',$subscriber->id)}}" method="post"
                                            id="delete-form-{{$subscriber->id}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="submit" onclick="if(confirm('are you sure?to delete this subscriber')){
    event.preventDefault();
    getElementById('delete-form-{{$subscriber->id}}').
    submit();}" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5">
                                        <h5 class="text-center">No Subscribers Found</h5>
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