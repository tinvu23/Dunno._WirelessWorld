
@extends('edit')
@section('content')

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
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
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                       
                    </div>
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                            <div class="product-item p-4 bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    @php
                                        $image = NULL ? 'no-avatar.jpg' : $product -> image;
                                        $image_url = asset('images/'. $image)
                                    @endphp
                                    <img class="img-fluid w-100"  style="height: 280px " src="{{ $image_url }}" alt="">
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href="{{ route('addCart', ['id' => $product -> id]) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href="{{ route('addWishlist',['id' => $product -> id]) }}"><i class="far fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="{{ route('detail', ['id' => $product -> id])}}">{{$product -> name}}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>$ {{ $product -> price}}</h5>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                    @php
                                    $star = DB::table('rating') -> where('product_id',$product -> id) ->avg('star');
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
                                        <small class="ml-1">({{DB::table('rating') -> where('product_id',$product -> id) -> count()}})</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12">
                        {{ $products -> links()}}
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

@endsection('content')