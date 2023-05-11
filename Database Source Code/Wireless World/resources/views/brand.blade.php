@extends('edit')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Brand</a>
                    <span class="breadcrumb-item active">{{ $breadcrumb -> name}}</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 mb-4">
                        @php
                            $banner = NULL ? 'no-avatar.jpg' : $breadcrumb -> banner;
                            $image_url = asset('images/'. $banner)
                        @endphp
                        <div class="text-center align-items-center mb-4">
                            <img  src="{{ $image_url}}" alt="">
                        </div>
                        <div class="bg-light p-30">
                            {!! $breadcrumb -> intro !!}
                        </div>
                    </div>
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                            <div class="product-item p-4 bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    @php
                                        $image = NULL ? 'no-avatar.jpg' : $product -> image;
                                        $image_url = asset('images/'. $image)
                                    @endphp
                                    <img class="img-fluid w-100"  style="height: 280px " src="{{ $image_url }}" alt="">
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href="{{ route('addCart', ['id' => $product -> id]) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="{{ route('detail', ['id' => $product -> id])}}">{{$product -> name}}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>$ {{ $product -> price}}</h5>
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
                    <div class="col-12">
                        <nav>
                          {{ $products -> links() }}
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

@endsection('content')