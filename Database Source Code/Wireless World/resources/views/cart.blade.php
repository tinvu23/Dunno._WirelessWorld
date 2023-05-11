@extends('master')
@section('content')
       <!-- Breadcrumb Start -->
       <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Image </th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($cart as $item)
                            <tr>
                                @php
                                    $product = DB::table('product') -> where('id',$item -> id) -> first();
                                    $image = NULL ? 'no-avatar.jpg' : $product -> image;
                                    $image_url = asset('images/'. $image)
                                @endphp             
                                <td> 
                                    <img class="img-fluid" style="height: 100px; width: 100px"  src="{{ $image_url }}" alt="">
                                </td>
                                <td class="align-middle">{{ $item -> name}}</td>
                                <td class="align-middle">$ {{ $item -> price}}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <a href=" {{ route('minusCart', ['id' => $item -> rowId]) }}" class="btn btn-sm btn-primary btn-minus" >
                                            <i class="fa fa-minus"></i>
                                            </a>
                                        </div>
                                        <input type="text" class="text-dark form-control form-control-sm bg-secondary border-0 text-center" value=" {{ $item -> qty}}">
                                        <div class="input-group-btn">
                                            <a href=" {{ route('plusCart', ['id' => $item -> rowId])}}" class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">$ {{ $item -> price * $item -> qty }}</td>
                                <td class="align-middle"><a href=" {{ route('deleteCart', ['id' => $item -> rowId]) }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="text-dark bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>$ {{ $totalCart}}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Free</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$ {{ $totalCart}}</h5>
                        </div>
                        <a href="{{ route('getOrder') }}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection