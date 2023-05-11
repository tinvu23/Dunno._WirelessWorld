@extends('admin.master')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.category.index') }}">Category </a>
    <li class="breadcrumb-item"> <b>Index </b>  </li> 
@endsection('page')
@section('content')
@if (Session::has('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ Session::get('success') }}</strong>
</div>
@endif
<a class="btn btn-primary font-weight-bold  d-inlineblock p-2 mb-4" href=" {{route('admin.category.create')}}"><i class="fa fa-plus"></i> Create a new category</a>

<div class="card card-primary">
    <div class="card-header bg-primary">
        <h3 class="card-title text-center">Category Table</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Category Name </th>
                    <th class="text-center" style="width:75px">Delete</th>
                    <th class="text-center" style="width:75px" >Edit</th>
                </tr>
            </thead>
            <tbody>
                {{ recursiveTable($category)}}
            </tbody>
        </table>
    </div>
</div>

@endsection