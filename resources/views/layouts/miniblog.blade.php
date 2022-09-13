<!DOCTYPE html>
<html lang="en">

<head>
    <title>miniblog @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>

<body>

    <div class="site-wrap">

        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <header class="site-navbar" role="banner">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-2 site-logo">
                        <a href="{{route('website')}}" class="text-black h2 mb-0">Mini Blog</a>
                    </div>

                    <div class="col-10 text-right">
                        <nav class="site-navigation" role="navigation">
                            <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                                @foreach($categories as $category)
                                <li><a href="{{route('website.category', $category->slug)}}">{{$category->name}}</a>
                                </li>
                                @endforeach
                                @guest
                                <li><a href="{{route('login')}}">Login</a></li>
                                <li><a href="{{route('register')}}">Register</a></li>
                                @else
                                <li>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary rounded dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="true">
                                                @if(auth()->user()->image)
                                                <img class="img-fluid rounded-circle elevation-3" src="{{asset('uploads/user/'.Auth::user()->image)}}" style="height:35px; width: 35px;"> 
                                                @endif
                                                <span >{{str_limit(auth()->user()->name,8)}}</span></button>
                                            <div class="dropdown-menu">
                                                @if( Auth::user()->role_id=1)
                                                
                                                <a class="dropdown-item"
                                                    href="{{route ('admin.dashboard')}}"><strong>Dashboard</strong></a>
                                                @elseif( Auth::user()->role_id=2)
                                                <a class="dropdown-item"
                                                    href="{{route ('author.dashboard')}}"><strong>Dashboard</strong></a>
                                                @endif
                                                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><strong>logout</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <form action="{{route('logout')}}" style="display: none;" method="POST" id="logout-form">
                                    @csrf
                                </form>
                                @endguest
                                <li>
                                    <form action="{{route('search')}}" method="GET">
                                        <input type="text" class="form-control"  name="search" placeholder="Search....">
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </header>


        @yield('content')


        <div class="site-footer">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-4">
                        <h3 class="footer-heading mb-4">About Us</h3>
                        <p>{{$setting->description}}</p>
                    </div>
                    <div class="col-md-3 ml-auto">
                        <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
                        <ul class="list-unstyled float-left mr-5">
                            <li><a href="{{route('website')}}">Home</a></li>
                            <li><a href="{{route('website.about')}}">About Us</a></li>
                            <li><a href="{{route('website.contact')}}">Contact Us</a></li>
                        </ul>
                        <ul class="list-unstyled float-left">
                            @foreach($categories as $category)
                            <li><a href="{{route('website.category',$category->slug)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <h3 class="footer-heading mb-4">Connect With Us</h3>
                            <p>
                                @if($setting->facebook)<a target="_blank" href="{{$setting->facebook}}"><span
                                        class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>@endif
                                @if($setting->twitter)<a href="{{$setting->twitter}}"><span
                                        class="icon-twitter p-2"></span></a>@endif
                                @if($setting->instagram)<a href="{{$setting->instagram}}"><span
                                        class="icon-instagram p-2"></span></a>@endif
                                @if($setting->reddit)<a href="{{$setting->reddit}}"><span
                                        class="icon-rss p-2"></span></a>@endif
                                @if($setting->email)<a href="{{$setting->email}}"><span
                                        class="icon-envelope p-2"></span></a>@endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy; <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="icon-heart text-danger"
                                aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib---</a>Downloaded from <a href="https://themeslab.org/"
                                target="_blank">Themeslab</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('frontend/js/aos.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    
    {!! Toastr::message() !!}
    <script>
        @if($errors -> any())
        @foreach($errors -> all() as $error)
        toastr.error('{{$error}}', 'Error', {
            closeButton: true,
            progressBar: true,
        })
        @endforeach
        @endif
    </script>


</body>

</html>
