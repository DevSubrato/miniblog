@extends('layouts.admin')
@section('title','Miniblog | Setting')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Settings</h1> </h1>
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
                            <h3>Change Settings <button class="btn btn-primary mr-2"><i class="fas fa-edit"></i></button></h3>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="card-row">
                            <div class="col-lg-6 col-12 offset-lg-3 col-md-8 offset-md-2">
                                <form action="{{route('admin.setting.update')}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Site Name</label>
                                            <input type="name" name="name" class="form-control" id="name"
                                                placeholder="Enter name" value="{{$setting->name}}">
                                        </div>                                       
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="facebook">Facebook</label>
                                                    <input type="facebook" name="facebook" class="form-control" id="facebook"
                                                        placeholder="Enter url" value="{{$setting->facebook}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="twitter">Twitter</label>
                                                    <input type="twitter" name="twitter" class="form-control" id="twitter"
                                                        placeholder="Enter url" value="{{$setting->twitter}}">
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="instagram">Instagram</label>
                                                    <input type="instagram" name="instagram" class="form-control" id="instagram"
                                                        placeholder="Enter url" value="{{$setting->instagram}}">
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="reddit">Reddit</label>
                                                    <input type="reddit" name="reddit" class="form-control" id="reddit"
                                                        placeholder="Enter url" value="{{$setting->reddit}}">
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" class="form-control" id="email"
                                                        placeholder="Enter url" value="{{$setting->email}}">
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="number">Contact Number</label>
                                                    <input type="number" name="number" class="form-control" id="number"
                                                        placeholder="Enter url" value="{{$setting->phone}}">
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">Location</label>
                                                    <textarea name="address" rows="1" class="form-control" id="address">{{$setting->address}}</textarea>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="copyright">Copyright</label>
                                                    <input type="copyright" name="copyright" class="form-control" id="copyright"
                                                        placeholder="Enter url" value="{{$setting->copyright}}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <label for="image">Site Logo</label>
                                                    <input type="file" name="image" class="form-control" id="image">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div
                                                    class="style:max-width: 100px;max-height: 100px;overflow:hidden;margin-left:auto">

                                                    <img src="{{asset('uploads/setting/'.$setting->image)}}"
                                                        class="img-fluid">
                                                </div>


                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control"
                                                placeholder="Enter description">{{$setting->description}}</textarea>
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

