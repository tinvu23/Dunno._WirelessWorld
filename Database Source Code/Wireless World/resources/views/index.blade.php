@extends('master')
@section('content')
<!-- Carousel Start -->
<div class="container-fluid mb-3">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#header-carousel" data-slide-to="1"></li>
                    <li data-target="#header-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item position-relative active" style="height: 500px;">
                        <img class="position-absolute w-100 h-100" src="images/pcgaming.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Gaming Laptop</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="http://127.0.0.1:8000/category/13">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 500px;">
                        <img class="position-absolute w-100 h-100" src="images/1659049207.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">New Phones</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="http://127.0.0.1:8000/brand/1">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 500px;">
                        <img class="position-absolute w-100 h-100" src="images/1659050004.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Dell Gaming</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="http://127.0.0.1:8000/brand/7">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->
<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->
<!-- Categories Start -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="text-dark bg-secondary pr-3">Brands</span></h2>
    <div class="row px-xl-5 pb-3">
        @foreach ($brandLogo as $value)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="{{ route('brand', ['id' => $value -> id]) }}">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                        @php
                            $image = NULL ? 'no-avatar.jpg' : $value -> logo;
                            $image_url = asset('images/'. $image)
                        @endphp 
                            <img class="img-fluid" src="{{$image_url}}" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>{{ $value -> name }}</h6>
                            <small class="text-body">{{DB::table('product') -> where('brand_id',$value -> id) -> count()}} Products</small>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
<!-- Categories End -->
<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="text-dark bg-secondary pr-3">Featured Products</span></h2>
    <div class="row px-xl-5">
        @foreach ($featureds as $featured)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item p-4  bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        @php
                            $image = NULL ? 'no-avatar.jpg' : $featured -> image;
                            $image_url = asset('images/'. $image)
                        @endphp     
                        <img class="img-fluid w-100 " style="height: 280px " src="{{ $image_url }}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="{{ route('addCart', ['id' =>  $featured -> id])}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="{{ route('addWishlist',['id' => $featured -> id]) }}"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="{{ route('detail', ['id' => $featured -> id])}}">{{ $featured -> name}}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>${{ $featured -> price }}</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            @php
                                $star = DB::table('rating') -> where('product_id',$featured  -> id) ->avg('star');
                                if ($star <= 1.5 && $star >= 1){
                                    echo '<div class="text-primary mb-1 ">
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                    </div> ';
                                } else if($star <= 2.5 && $star > 1.5){
                                    echo '<div class="text-primary mb-1">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                    </div>';
                                } else if ($star <= 3.5 && $star > 2.5){
                                    echo '<div class="text-primary mb-1">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                    </div>';
                                } else if ($star <= 4.5 && $star >3.5){
                                    echo '<div class="text-primary mb-1">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star"></small>
                                    </div>';
                                } else if ($star <= 5 && $star >4.5){
                                    echo '<div class="text-primary mb-1">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                    </div>';
                                } else {
                                    echo '<div class="text-primary mb-1">
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                    </div>';
                                }         
                            @endphp
                            <small>({{DB::table('rating') -> where('product_id',$featured -> id) -> count()}})</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Products End -->
<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative  text-uppercase mx-xl-5 mb-4"><span class=" text-dark bg-secondary pr-3">Recent Products</span></h2>
    <div class="row px-xl-5">
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item p-4 bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        @php
                            $image = NULL ? 'no-avatar.jpg' : $product -> image;
                            $image_url = asset('images/'. $image)
                        @endphp   
                        <img class="img-fluid w-100" style="height: 280px " src="{{ $image_url }}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="{{ route('addCart', ['id' =>  $product -> id])}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="{{ route('addWishlist',['id' => $product -> id]) }}"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="{{ route('detail', ['id' => $product -> id])}}">{{ $product->name }}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$ {{ $product->price }}</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            @php
                                $star = DB::table('rating') -> where('product_id',$product -> id) ->avg('star');
                                if ($star <= 1.5 && $star >= 1){
                                    echo '<div class="text-primary mb-1 ">
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                    </div> ';
                                } else if($star <= 2.5 && $star > 1.5){
                                    echo '<div class="text-primary mb-1">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                    </div>';
                                } else if ($star <= 3.5 && $star > 2.5){
                                    echo '<div class="text-primary mb-1">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                    </div>';
                                } else if ($star <= 4.5 && $star >3.5){
                                    echo '<div class="text-primary mb-1">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star"></small>
                                    </div>';
                                } else if ($star <= 5 && $star >4.5){
                                    echo '<div class="text-primary mb-1">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                    </div>';
                                } else {
                                    echo '<div class="text-primary mb-1">
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                        <small class="far fa-star"></small>
                                    </div>';
                                }         
                            @endphp
                            <small class="ml-1">({{DB::table('rating') -> where('product_id',$product -> id) -> count()}})</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Products End -->
@endsection