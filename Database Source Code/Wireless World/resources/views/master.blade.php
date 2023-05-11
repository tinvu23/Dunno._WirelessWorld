<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Wireless World - Online Shop </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="dist/css/adminlte.css">
    <link href="css/style.css" rel="stylesheet">
     <!-- CKEditor 5 – Classic editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <style>
        .search-result{
            position: absolute;
            z-index: 100;
        }
        .owl-carousel{
            text-align: center;
        }
        .ticker-container {
            background: #ffd333;
            width: 100%;
            overflow: hidden;
            margin: 0 auto;
        }
        .ticker-text {
            height: 150%;
            color:#3d464d;
            white-space:nowrap;
            display:inline-block;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <!-- Topbar Start -->
    <div class="row bg-secondary  ">
            
        </div>
        <div class="align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href=" {{ route('index')}}" class="text-decoration-none">
                    <span class="h1 p-1 text-uppercase text-primary bg-dark px-2">Wireless</span>
                    <span class="h1 p-1 text-uppercase text-dark bg-primary px-2 ml-n1">World</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action=" {{ route('search') }}" method="POST" >
                    @csrf
                    <div class="input-group">
                        <input type="text" name="search" class="input-search form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <button class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        <div class="search-result"></div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                    <div class="d-inline-flex align-items-center">
                        @if (Auth::check())
                        <div class="dropdown">
                            <button class="btn " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                            <div class="user-panel d-flex">
                                <div class="image">
                                    @php
                                        $avatar = $user-> avatar == NULL ? 'no-avatar.jpg' : $user -> avatar;
                                        $image_url = asset('images/'. $avatar)
                                    @endphp     
                                <img src="{{ $image_url }}" class="img-circle border" alt="User Image">
                                </div>
                                <div class="info">
                                <a href="#" class="font-weight-bold  mt-1 d-block text-dark" > 
                                    {{ $user -> username }}
                                </a>
                                </div>
                                <i class="text-dark fa fa-angle-down mt-3 mr-2"></i>
                            </div>
                            </button>
                            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href=" {{route('user')}}">Profile</a>
                            <a class="dropdown-item" href=" {{route('listOrder')}}">My Order</a>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            </div>
                        </div>
                        @endif
                        @if (!Auth::check())
                        <div class="d-flex">
                            <a class="text-dark d-block mr-2" href=" {{ route('getLogin') }}">Login</a>  <span class="text-dark">| </span>
                            <a class="text-dark d-block ml-2" href= "  {{ route('getRegister') }}">  Register</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Products</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        @foreach ($category as $value)
                            @if ($value -> parent == 0)
                                <div class="nav-item dropdown dropright">
                                    <a href="#" class="text-dark nav-link dropdown-toggle" data-toggle="dropdown"> {{ $value->name }}<i class="fa fa-angle-right float-right mt-1"></i></a>
                                        <div class="dropdown-menu position-absolute rounded-0 border-0 m-0"> 
                                            @foreach ($category as $value1)
                                                @if($value1 -> parent == $value -> id)
                                                    <a class="nav-link nav-item" href="{{ route('category', ['id' => $value1 -> id])}}"> {{$value1 -> name}}</a>
                                                @endif
                                            @endforeach      
                                        </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <div class="">
                        <a class=" nav-item nav-link text-light btn d-flex align-items-center justify-content-between w-100" data-toggle="collapse" href="#navbar-brand" style="height: 65px; padding: 0 20px;">
                            Brands              
                        </a>
                        <nav class="text-dark collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-brand" style="width: calc(20% - 30px); z-index: 999;">
                            <div class="navbar-nav ">
                                <div class="nav-item dropdown dropright">
                                    @foreach ($brand as $value)
                                        <a href="{{ route('brand', ['id' => $value -> id]) }}" class="text-dark nav-link nav-item" > {{ $value->name }}</a>     
                                    @endforeach
                                </div>   
                            </div>
                        </nav>
                    </div>
                    <div class="">
                        <a class=" nav-item nav-link text-light btn d-flex align-items-center justify-content-between" data-toggle="collapse" href="#navbar-news" style="height: 65px; padding: 0 25px;">
                            News             
                        </a>
                        <nav class="text-dark collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-news" style="width: calc(20% - 30px); z-index: 999;">
                            <div class="navbar-nav ">
                                <div class="nav-item dropdown dropright" >
                                    <a href="{{ route('seller') }}" class="text-dark nav-link nav-item" >Top Sellers </a>   
                                    <a href="{{ route('budget') }}" class="text-dark nav-link nav-item" >Best Budget </a>
                                    <a href="{{ route('technology') }}" class="text-dark nav-link nav-item" > Technologies</a>
                                    <a href="{{ route('news') }}" class="text-dark nav-link nav-item" > All News</a>
                                </div>   
                            </div>
                        </nav>
                    </div>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ route('gallery')}}" class="nav-item nav-link mr-2">Gallery</a>
                            <a href="{{ route('about')}}" class="nav-item nav-link mr-3">About</a>
                            <a href=" {{ route('getContact') }} " class="nav-item nav-link">Contact </a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="{{ route('wishlist') }}" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">{{ $countWishlist}}</span>
                            </a>
                            <a href="{{ route('cart')}}" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"> {{ $countCart }}</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    @yield ('content')   
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">We're here to help from 9am - 6pm Monday to Wednesday and 9am - 6pm Thursday to Friday and 10am - 6pm on weekends.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>wirelessworld_info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-3 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="{{ route('index')}}"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="{{ route('gallery')}}"><i class="fa fa-angle-right mr-2"></i>Gallery</a>
                            <a class="text-secondary mb-2" href="{{ route('about')}}"><i class="fa fa-angle-right mr-2"></i>About</a>
                            <a class="text-secondary" href="{{ route('getContact')}}"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-3 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Sign up for Instant Deals and check your inbox in the next few minutes. </p>
                        <form action="{{ route('newsletter')}}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="email" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <img class="img-fluid" src="images/payments.png" alt="">
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
               
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <div class = "ticker-container">
        <div class = "ticker-text">
            <div id="current-time"></div>
        </div>
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <!-- CKEditor 5 -->
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:3,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        })
    </script>
    <script>
        $('.input-search').keyup(function(){
            var text = $(this).val();
            $.ajax({
                url: 'http://127.0.0.1:8000/api/ajaxSearch?search=' + text,
                type: 'GET',
                success: function(res){
                    var html = '';
                    for (var pro of res){
                        html += '<div class="d-flex bg-light" style="width:403px" >';
                        html += '<div class="p-2">';
                        html += '<a class="text-dark" href="">';
                        html += '<img width="80" height="80" src="images/1659049207.jpg"/>'; 
                        html += '</a>';
                        html += '</div>';
                        html += '<div class="ml-3 p-2">';
                        html += '<p><a class="text-dark" href="">' + pro.name + '</a></p>';
                        html += '<p>$ ' +  pro.price + '</p>';
                        html += '</div>';
                        html += '</div>';
                    }
                    $('.search-result').html(html)
                }
            });
        })
    </script>
    <script>
        var curDate = new Date();
        var curDay = curDate.getDate();
        var curMonth = curDate.getMonth() + 1;
        var curYear = curDate.getFullYear();
        var curMinutes = curDate.getMinutes();
        var curHours = curDate.getHours();
        var curSec = curDate.getSeconds();
        console.log(curDate);
        document.getElementById('current-time').innerHTML = curDay + "/" + curMonth + "/" + curYear + " | " + curHours + ':' + curSec + ':' + curMinutes  + " | ";
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var positionInfo = "Your current position is " + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude;
                document.getElementById("current-time").innerHTML += positionInfo;
            });
        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    </script>
    <script>
        var width = $('.ticker-text').width(),
        containerwidth = $('.ticker-container').width(),
        left = containerwidth;
        $(document).ready(function(e){
            function tick() {
                if(--left < -width){
                    left = containerwidth;
        }
        $(".ticker-text").css("margin-left", left + "px");
        setTimeout(tick, 8);
        }
        tick();
        });
    </script>
</body>

</html>