@extends('master')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <span class="breadcrumb-item active">Order</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="container-fluid">
<h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="text-dark bg-secondary pr-3">Your Order</span></h2>
<div class="row px-xl-5">
    <div class="col-lg-7 mb-5">
        <div class="bg-light p-30">
            @csrf
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Image</th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
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
                                <b class="text-dark"> {{ $item -> qty}}</b>
                            </td>
                            <td class="align-middle">$ {{ $item -> price * $item -> qty }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="thead-dark">
                    <tr> 
                        <td colspan="2"><b> Total </b></td>
                        <td> <b> {{ $countCart }} </b></td>
                        <td> <b> $ {{ $totalCart }} </b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="col-lg-5">
    <h5 class="section-title position-relative text-uppercase mb-3"><span class="text-dark bg-secondary pr-3">Customer Information</span></h5>
        <div class="bg-light p-30 mb-5">
            <form action=" {{ route('postOrder') }}" method="POST">
                @csrf
                <div class="d-none">
                    <textarea name="detail">
                        @foreach ($cart as $item)
                            {{ $item -> name }} - {{ $item -> qty}} qty 
                        @endforeach
                    </textarea>
                </div>
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Recipient</h6>
                        <input class="border-0 text-right" name="recipient" value="{{ $user -> fullname}}"/>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Address</h6>
                        <input class="border-0 text-right" name="address" value="{{ $user -> address}}">
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Phone</h6>
                        <input class="border-0 text-right" name="phone" value="{{ $user -> phone}}">
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$30</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5> $ {{ $totalCart + 30 }}</h5>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Confirm Your Order</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection