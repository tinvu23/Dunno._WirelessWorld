@extends('admin.master')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.product.index') }}">Product </a>
    <li class="breadcrumb-item"> <b> Index </b>   </li> 
@endsection('page')
@section('content')
@if (Session::has('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ Session::get('success') }}</strong>
</div>
@endif
<div class="d-flex justify-content-between">
    <a class="btn btn-primary font-weight-bold  d-inlineblock p-2 mb-4" href=" {{route('admin.product.create')}}"><i class="fa fa-plus"></i> Create a new product</a>
    <div>
        <form action=" {{ route('admin.product.search') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for products">
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
        <h3 class="card-title text-center">Product Table</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" style="width: 10px;">#</th>
                    <th class="text-center" >Image</th>
                    <th class="text-center">Category </th>
                    <th class="text-center">Brand </th>
                    <th class="text-center">Name</th>
                    <th class="text-center" style="width:85px">Price</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Featured</th>
                    <th class="text-center" style="width:75px" >Delete</th>
                    <th class="text-center" style="width:75px">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product -> id}}</td>
                    <td>
                        @php
                            $image = NULL ? 'no-avatar.jpg' : $product -> image;
                            $image_url = asset('images/'. $image)
                        @endphp    
                        <img src="{{ $image_url }}" width="100px" height="100px"> 
                    </td>
                    @foreach ($categories as $category )
                        @if ($product -> category_id == $category -> id)
                            <td> {{ $category -> name}}</td>
                        @endif
                    @endforeach 
                    @foreach ($brands as $brand) 
                        @if ($product -> brand_id == $brand -> id)
                            <td>{{ $brand -> name}}</td>
                        @endif
                    @endforeach
                    <td>{{ $product -> name}}</td>
                    <td class="text-center" style="width:85px">$ {{ $product -> price}}</td>
                    <td class="text-center">
                        @php
                            if ($product -> status == 1){
                                echo 'On stock';
                            } elseif ($product -> status == 2) {
                                echo 'None';
                            }
                        @endphp
                    </td>
                    <td class="text-center">
                        @php
                        if ($product -> featured == 1){
                            echo 'Featured';
                        } elseif ($product -> featured == 2) {
                            echo 'None';
                        }
                        @endphp
                    </td>
                    <td class="text-center"><b><a onclick="return confirmDelete()" href="{{ route('admin.product.delete', ['id' => $product -> id])}}">Delete</a></b></td>
                    <td class="text-center"><b><a href="{{ route('admin.product.edit', ['id' => $product -> id])}}">Edit </a></b></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        <div class="pagination bg-primary pagination-sm m-0 float-right">
            {!! $products->links() !!}
        </div>
    </div>
</div>
@endsection