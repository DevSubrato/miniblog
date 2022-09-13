@extends('layouts.miniblog')

@section('content')


<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <img src="{{asset('frontend/images/img_1.jpg')}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-5 mr-auto order-md-1">
                <h2>We Love To Explore</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptate odit corrupti vitae cupiditate
                    explicabo, soluta quibusdam necessitatibus, provident reprehenderit, dolorem saepe non eligendi
                    possimus autem repellendus nesciunt, est deleniti libero recusandae officiis. Voluptatibus quisquam
                    voluptatum expedita recusandae architecto quibusdam.</p>
                <ul class="ul-check list-unstyled success">
                    <li>Onsectetur adipisicing elit</li>
                    <li>Dolorem saepe non eligendi possimus</li>
                    <li>Voluptate odit corrupti vitae</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-5 text-center">
                <h2>Meet The Team</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus commodi blanditiis, soluta magnam
                    atque laborum ex qui recusandae</p>
            </div>
        </div>
        <div class="row">
            @foreach($teams as $team)
            <div class="col-md-6 col-lg-4 mb-5 text-center">
                <img src="{{asset('uploads/team/'.$team->image)}}" style="height:200px; width:120px;" alt="Image"
                    class="img-fluid w-50 rounded-circle mb-4">
                <h2 class="mb-3 h5">{{$team->name}}</h2>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary rounded" data-toggle="modal" data-target="#team-{{$team->id}}">
                    Read More
                </button>
                
            </div>
            @endforeach

            {{-- <div class="col-md-6 col-lg-4 mb-5 text-center">
                <img src="{{asset('frontend/images/person_2.jpg')}}" alt="Image"
                    class="img-fluid w-50 rounded-circle mb-4">
                <h2 class="mb-3 h5">Richard Cook</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum neque nobis eos quam necessitatibus
                    rerum aliquid est tempore, cupiditate iure at voluptatum dolore, voluptates. Debitis accusamus,
                    beatae ipsam excepturi mollitia.</p>

                <p class="mt-5">
                    <a href="#" class="p-3"><span class="icon-facebook"></span></a>
                    <a href="#" class="p-3"><span class="icon-instagram"></span></a>
                    <a href="#" class="p-3"><span class="icon-twitter"></span></a>
                </p>
            </div>

            <div class="col-md-6 col-lg-4 mb-5 text-center">
                <img src="{{asset('frontend/images/person_3.jpg')}}" alt="Image"
                    class="img-fluid w-50 rounded-circle mb-4">
                <h2 class="mb-3 h5">Kevin Peters</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum neque nobis eos quam necessitatibus
                    rerum aliquid est tempore, cupiditate iure at voluptatum dolore, voluptates. Debitis accusamus,
                    beatae ipsam excepturi mollitia.</p>

                <p class="mt-5">
                    <a href="#" class="p-3"><span class="icon-facebook"></span></a>
                    <a href="#" class="p-3"><span class="icon-instagram"></span></a>
                    <a href="#" class="p-3"><span class="icon-twitter"></span></a>
                </p>
            </div> --}}
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('frontend/images/img_1.jpg')}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-5 ml-auto">
                <h2>Learn From Us</h2>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptate odit corrupti
                    vitae cupiditate explicabo, soluta quibusdam necessitatibus, provident reprehenderit, dolorem saepe
                    non eligendi possimus autem repellendus nesciunt, est deleniti libero recusandae officiis.
                    Voluptatibus quisquam voluptatum expedita recusandae architecto quibusdam.</p>

                <ul class="ul-check list-unstyled success">
                    <li>Onsectetur adipisicing elit</li>
                    <li>Dolorem saepe non eligendi possimus</li>
                    <li>Voluptate odit corrupti vitae</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="site-section bg-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5">
                <div class="subscribe-1 ">
                    <h2>Subscribe to our newsletter</h2>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a
                        explicabo, ipsam nostrum.</p>
                    <form action="{{route('subscriber.store')}}" method="POST" class="d-flex">
                        @csrf
                        <input type="text" name="email" class="form-control" placeholder="Enter your email address">
                        <input type="submit" class="btn btn-primary" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- Modal -->

@foreach($teams as $team)
<div class="modal fade" id="team-{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">My Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row form-group">
                <div class="col-lg-3">
                    <label class="form-control-label">Name</label>
                </div>
                <div class="col-lg-9">
                    <label class="form-control-static">{{$team->name}}</label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-lg-3">
                    <label class="form-control-label">Descripton</label>
                </div>
                <div class="col-lg-9">
                    <label class="form-control-static">{{$team->description}}</label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-lg-3">
                    <label class="form-control-label">Contact</label>
                </div>
                <div class="col-lg-9">
                    
                    <label class="form-control-static">
                        <a target="_blank" href="{{$setting->facebook}}">
                        <span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span>
                        </a>
                    </label>
                    <label class="form-control-static">
                        <a target="_blank" href="{{$setting->facebook}}">
                        <span class="icon-instagram pt-2 pr-2 pb-2 pl-0"></span>
                        </a>
                    </label>
                    <label class="form-control-static">
                        <a target="_blank" href="{{$setting->facebook}}">
                        <span class="icon-twitter pt-2 pr-2 pb-2 pl-0"></span>
                        </a>
                    </label>
                    
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> 
        </div>
      </div>
    </div>
</div>
@endforeach
