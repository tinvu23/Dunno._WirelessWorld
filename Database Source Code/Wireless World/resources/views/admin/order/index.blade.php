@extends('admin.master')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.order.index') }}">Order </a>
    <li class="breadcrumb-item"> <b>Index </b>  </li> 
@endsection('page')
@section('content')
<div class="d-flex justify-content-between mb-4">
    <div></div>
    <div>
        <form action=" {{ route('admin.order.search') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for orders">
                <div class="input-group-append">
                    <button class="input-group-text bg-transparent text-primary">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header bg-primary">
        <h3 class="card-title text-center">Order Table</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID </th>
                    <th class="text-center">Customer ID</th>
                    <th class="text-center">Detail </th>
                    <th class="text-center" style="width:85px">Price </th>
                    <th class="text-center">Status </th>
                    <th class="text-center">Created At </th>
                    <th class="text-center" style="width:75px" >Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td> {{ $order -> id}}</td>
                        @foreach ($members as $member)
                            @if ( $order -> customer_id == $member -> id)
                                <td> {{ $member -> username}}</td>
                            @endif
                        @endforeach
                        <td> {{ $order -> detail}}</td>
                        <td class="text-center" style="width:85px">$ {{ $order -> price}}</td>
                        @php 
                        if ($order -> status == "In Process") {
                            $class= "badge bg-success";
                        } elseif ($order -> status == "Shipped"){
                            $class="badge bg-info";
                        } elseif ($order -> status == "Delivered"){
                            $class="badge bg-warning";
                        } elseif ($order -> status == "Canceled"){
                            $class="badge bg-danger";
                        } elseif ($order -> status == "Delayed"){
                            $class="badge bg-dark";
                        } 
                        @endphp
                        <td class="text-center"> <p class="{{$class}}">{{ $order -> status}} </p></td>
                        <td> {{ $order -> created_at}}</td>
                        <th class="text-center" style="width:75px" > <a href="{{ route('admin.order.edit', ['id' => $order -> id])}}"> <b>Edit </b></a> </th>
                    </tr>
                @endforeach
            </tbody>   
        </table>
    </div>
    <div class="card-footer clearfix">
        <div class="pagination bg-primary pagination-sm m-0 float-right">
            {!! $orders->links() !!}
        </div>
    </div>
</div>
@endsection