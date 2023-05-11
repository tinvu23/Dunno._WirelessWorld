@extends('edit')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href=" {{ route('index') }}">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shop Detail</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Shop Detail Start -->
<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
        @php
            $avatar = NULL ? 'no-avatar.jpg' : $product -> image;
            $image_url = asset('images/'. $avatar)
        @endphp     
        <img class="w-100" src="{{ $image_url }}" alt="">
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3>{{ $product -> name}}</h3>
                <div class="d-flex mb-3">
                @php
                    if ($star <= 1.5 && $star >= 1){
                        echo '<div class="text-primary mb-2">
                            <small class="fas fa-star"></small>
                            <small class="far fa-star"></small>
                            <small class="far fa-star"></small>
                            <small class="far fa-star"></small>
                            <small class="far fa-star"></small>
                        </div> ';
                    } else if($star <= 2.5 && $star > 1.5){
                        echo '<div class="text-primary mb-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="far fa-star"></small>
                            <small class="far fa-star"></small>
                            <small class="far fa-star"></small>
                        </div>';
                    } else if ($star <= 3.5 && $star > 2.5){
                        echo '<div class="text-primary mb-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="far fa-star"></small>
                            <small class="far fa-star"></small>
                        </div>';
                    } else if ($star <= 4.5 && $star >3.5){
                        echo '<div class="text-primary mb-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="far fa-star"></small>
                        </div>';
                    } else if ($star <= 5 && $star >4.5){
                        echo '<div class="text-primary mb-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                        </div>';
                    } else {
                        echo '<div class="text-primary mb-2">
                            <small class="far fa-star"></small>
                            <small class="far fa-star"></small>
                            <small class="far fa-star"></small>
                            <small class="far fa-star"></small>
                            <small class="far fa-star"></small>
                        </div>';
                    }           
                @endphp                 
                    <small class="pt-1 pl-1">({{DB::table('rating') -> where('product_id',$product -> id) -> count()}})</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">$ {{ $product -> price}}</h3>
                <strong>Key features </strong>
                <p class="mb-4"> {!! $product -> intro !!}</p>
                <div class="d-flex align-items-center mb-4 pt-2 mt-4">
                    <a href=" {{ route('addCart',['id' => $product -> id])}}" style="width:300px" class=" btn btn-primary px-5"><i class="fa fa-shopping-cart mr-1"></i> <b>Add To
                        Cart </b></a>
                </div>
                <div class="d-flex pt-2">
                    <strong class="text-dark mr-2">Share on:</strong>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">
                        Reviews ({{DB::table('rating') -> where('product_id',$product -> id) -> count()}})
                    </a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <div>
                            {!!$product -> desc!!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">{{DB::table('rating') -> where('product_id',$product -> id) -> count()}} review for {{ $product -> name}}</h4>
                                @foreach ($ratings as $rating)
                                    <div class="media mb-4">
                                        <div class="media-body">
                                            <h6>{{$rating -> name}}<small> - <i>{{$rating -> created_at}}</i></small></h6>
                                            @php
                                                if ($rating -> star == 1){
                                                    echo '<div class="text-primary mb-2">
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div> ';
                                                } else if($rating -> star == 2){
                                                    echo '<div class="text-primary mb-2">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>';
                                                } else if ($rating -> star == 3){
                                                    echo '<div class="text-primary mb-2">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>';
                                                } else if ($rating -> star == 4){
                                                    echo '<div class="text-primary mb-2">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>';
                                                } else if ($rating -> star == 5){
                                                    echo '<div class="text-primary mb-2">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>';
                                                } else {
                                                    echo '<div class="text-primary mb-2">
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>';
                                                }
                                               
                                            @endphp
                                            <p>{{$rating -> review}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <form class="mt-3" action="{{ route('rating',['id' => $product -> id])}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <p><b>Your Rating *</b></p>
                                        <input type="radio" id="1" name="star" value="1">
                                        <label for="1"><i class="text-primary  fas fa-star"></i></label><br>
                                        <input type="radio" id="2" name="star" value="2">
                                        <label for="2"><i class="text-primary fas fa-star"></i><i class="text-primary fas fa-star"></i></label><br>
                                        <input type="radio" id="3" name="star" value="3">
                                        <label for="3"><i class="text-primary fas fa-star"></i><i class="text-primary fas fa-star"></i></label><br>
                                        <input type="radio" id="4" name="star" value="4">
                                        <label for="4"><i class="text-primary fas fa-star"></i><i class="text-primary fas fa-star"></i><i class="text-primary fas fa-star"></i><i class="text-primary fas fa-star"></i></label><br>
                                        <input type="radio" id="5" name="star" value="5">
                                        <label for="5"><i class="text-primary fas fa-star"></i><i class="text-primary fas fa-star"></i><i class="text-primary fas fa-star"></i><i class="text-primary fas fa-star"></i><i class="text-primary fas fa-star"></i></label><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="review">Your Review *</label>
                                        <textarea id="review" name="review" cols="30" rows="5" class="form-control">{{ old('review')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email')}}">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
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
<!-- Shop Detail End -->

<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative  text-uppercase mx-xl-5 mb-4"><span class=" text-dark bg-secondary pr-3">YOU MAY ALSO LIKE</span></h2>
    <div class="row px-xl-5">
        @foreach ($like as $like)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item p-4 bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        @php
                            $image = NULL ? 'no-avatar.jpg' : $like -> image;
                            $image_url = asset('images/'. $image)
                        @endphp   
                        <img class="img-fluid w-100" style="height: 280px " src="{{ $image_url }}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="{{ route('addCart', ['id' =>  $like -> id])}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="{{ route('addWishlist',['id' => $like -> id]) }}"><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="{{ route('detail', ['id' => $like -> id])}}">{{ $like->name }}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$ {{ $like->price }}</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Products End -->
@endsection('content')