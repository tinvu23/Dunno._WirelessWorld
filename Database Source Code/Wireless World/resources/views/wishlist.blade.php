@extends('master')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <span class="breadcrumb-item active">Wishlist</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="container-fluid">
<h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="text-dark bg-secondary pr-3">Wishlist</span></h2>
<div class="row px-xl-5">
    @foreach ($wishlist as $item)
    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <div class="product-item p-4  bg-light mb-4">
            <div class="product-img position-relative overflow-hidden">
                @php
                    $product = DB::table('product') -> where('id',$item -> id) -> first();
                    $image = NULL ? 'no-avatar.jpg' : $product -> image;
                    $image_url = asset('images/'. $image)
                @endphp   
                <img class="img-fluid w-100 " style="height: 280px " src="{{ $image_url }}" alt="">
                <div class="product-action">
                    <a class="btn btn-outline-dark btn-square" href="{{ route('addCart', ['id' =>  $item -> id])}}"><i class="fa fa-shopping-cart"></i></a>
                    <a class="btn btn-outline-dark btn-square" href="{{ route('addWishlist',['id' => $item -> id]) }}"><i class="far fa-heart"></i></a>
                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                </div>
            </div>
            <div class="text-center py-4">
                <a class="h6 text-decoration-none text-truncate" href="{{ route('detail', ['id' => $item -> id])}}">{{ $item -> name}}</a>
                <div class="d-flex align-items-center justify-content-center mt-2">
                    <h5>${{ $item -> price }}</h5>
                </div>
                <div class="d-flex align-items-center justify-content-center mb-1">
                    <small class="fa fa-star text-primary mr-1"></small>
                    <small class="fa fa-star text-primary mr-1"></small>
                    <small class="fa fa-star text-primary mr-1"></small>
                    <small class="fa fa-star text-primary mr-1"></small>
                    <small class="fa fa-star text-primary mr-1"></small>
                    <small>({{DB::table('rating') -> where('product_id',$item -> id) -> count()}})</small>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection