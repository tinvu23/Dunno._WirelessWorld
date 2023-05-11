@extends('master')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ route('index')}}">Home</a>
                <span class="breadcrumb-item active">My Order</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="text-dark bg-secondary pr-3">My Order</span></h2>
    <div class="row px-xl-5 ml-4">
        <div style="height:250px" class="p-30 card mr-5 col-lg-3 mb-5">
            <div class="user-panel d-flex border-bottom pb-3">
                <div class="image">
                    @php
                        $avatar = $user-> avatar == NULL ? 'no-avatar.jpg' : $user -> avatar;
                        $image_url = asset('images/'. $avatar)
                    @endphp     
                <img src="{{ $image_url }}" class="img-circle border" alt="User Image">
                </div>
                <div class="info"> 
                    <span class="font-weight-bold  mt-1 d-block text-dark" > 
                    Hello, {{ $user -> username }}
                    </span>
                </div>
            </div>
            <div class="ml-4 mt-4 ">
                <a class="d-block mb-2 text-dark" href="{{ route('user') }}"><b><i style="width:18px" class="fa fa-user text-primary mr-3"></i>My Profile </b></a>
                <a class="d-block mb-2 text-dark" href="{{ route('listOrder') }}"><b><i style="width:18px" class="fa fa-shopping-cart text-primary mr-3"></i>My Order </b></a>
                <a class="d-block mb-2 text-dark" href="{{ route('wishlist') }}"><b><i style="width:18px" class="fas fa-heart text-primary mr-3"></i>My Wishlist </b></a>
            </div>
        </div>
        <div class=" col-lg-8 mb-5">
            @foreach ($orders as $order)
                <div class=" card col-lg-12 mb-3">
                    <div class="d-flex bg-light p-30">
                        <div class="d-flex col-lg-4">
                            <div class="d-flex justify-content-between">
                                <b> Order ID:</b>
                                <p class="ml-2"> {{ $order->id}}</p>
                            </div>
                        </div> 
                        <div class="d-flex col-lg-4">
                            <div class="d-flex justify-content-between">
                                <b> Status:</b>
                                @php 
                                if ($order -> status == "In Process") {
                                    $class= "ml-2 btn btn-sm btn-success";
                                } elseif ($order -> status == "Shipped"){
                                    $class="ml-2 btn btn-sm btn-primary";
                                } elseif ($order -> status == "Delivered"){
                                    $class="ml-2 btn btn-sm btn-warning";
                                }
                                @endphp
                                <p class="{{$class}}"><b> {{ $order->status}} </b></p>
                            </div>
                        </div> 
                        <div class="d-flex col-lg-4">
                            <div class="d-flex justify-content-between">
                                <b> Created at:</b>
                                <p class="ml-2"> {{ $order->created_at}}</p>
                            </div>
                        </div> 
                    </div>
                    <div class=" bg-light border-top p-30">
                        <div class="d-flex justify-content-between">
                            <b>Detail:</b>
                            <p> {{ $order-> detail}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <b>Reciptient:</b>
                            <p> {{ $order-> recipient}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <b>Address:</b>
                            <p> {{ $order-> address}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <b>Phone:</b>
                            <p> {{ $order-> phone}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <b>Totol Price:</b>
                            <p>$ {{ $order-> price}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-8 d-flex flex-row-reverse">
            {{ $orders -> links ()}}
        </div>
</div>
@endsection('content')
