@extends('admin.master')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.brand.index') }}">Brand </a>
    <li class="breadcrumb-item"> <b>Index </b>  </li> 
@endsection('page')
@section('content')
@if (Session::has('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ Session::get('success') }}</strong>
</div>
@endif

<div class="d-flex justify-content-between">
    <a class="btn btn-primary font-weight-bold  d-inlineblock p-2 mb-4" href=" {{route('admin.brand.create')}}"><i class="fa fa-plus"></i> Create a new brand</a>
    <div>
        <form action=" {{ route('admin.brand.search') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for brands">
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
        <h3 class="card-title text-center">Brand Table</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Brand Name </th>
                    <th class="text-center">Logo</th>
                    <th class="text-center">Banner</th>
                    <th class="text-center" style="width:75px">Delete</th>
                    <th class="text-center" style="width:75px" >Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                <tr>
                    <td> {{ $brand -> name }}</td>
                    <td> 
                        @php
                            $logo = NULL ? 'no-image.jpg' : $brand -> logo;
                            $image_logo = asset('images/'. $logo)
                        @endphp    
                        <img src="{{ $image_logo}}" width="100px" height="100px"> 
                    </td>
                    <td> 
                        @php
                            $banner = NULL ? 'no-image.jpg' : $brand -> banner;
                            $image_banner = asset('images/'. $banner)
                        @endphp    
                        <img src="{{ $image_banner}}"  height="100px"> 
                    </td>
                
                    <td class="text-center" style="width:75px"><b><a onclick="return confirmDelete()" href="{{ route('admin.brand.delete', ['id' => $brand -> id])}}">Delete</a></b></td>
                    <td class="text-center" style="width:75px"><b><a href="{{ route('admin.brand.edit', ['id' => $brand -> id])}}">Edit </a></b></td>
                </tr>
                @endforeach
        </table>
    </div>
    <div class="card-footer clearfix">
        <div class="pagination bg-primary pagination-sm m-0 float-right">
            {!! $brands->links() !!}
        </div>
    </div>
</div>
@endsection