@extends('admin.edit')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.product.index') }}">Product </a>
    <li class="breadcrumb-item"> <b>Edit </b>  </li> 
@endsection('page')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title  ">Edit order</h3>
    </div>
    <form  action="{{ route('admin.order.update', ['id' => $id]) }}" method="post" >
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="id">Order ID</label>
                <input disabled class="form-control" type="text" name="id" id="id" value="{{ $order -> id}}">
            </div>
            <div class="form-group">
                <label for="created_at">Created At</label>
                <input disabled class="form-control" type="text" name="created_at" id="created_at" value="{{ $order -> created_at}}">
            </div>
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <input disabled class="form-control" type="text" name="price" id="price" value="{{ $order -> customer_id}}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input disabled class="form-control" type="text" name="price" id="price" value="{{ $order -> price}}">
            </div>
            <div class="form-group">
                <label for="detail">Detail</label>
                <textarea  disabled class="form-control" name="detail"  id="detail" > {{ $order -> detail}} </textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status"> 
                    <option value="1" {{ ($order -> status) == 'In Process' ? 'selected' : ''}}>In Process </option>
                    <option value="2" {{ ($order -> status) == 'Shipped' ? 'selected' : ''}}>Shipped </option>
                    <option value="3" {{ ($order -> status) == 2 ? 'Delivered' : ''}}>Delivered </option>
                    <option value="4" {{ ($order -> status) == 'Canceled' ? 'selected' : ''}}>Canceled</option>
                    <option value="5" {{ ($order -> status) == 2 ? 'Delayed' : ''}}>Delayed </option>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input class="form-control" type="text" name="address" id="address" value="{{ $order -> address}}">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input  class="form-control" type="text" name="phone" id="phone" value="{{ $order -> phone}}">
            </div>
          
        </div>
        <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

   
@endsection