@extends('admin.edit')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.product.create') }}">Product </a>
    <li class="breadcrumb-item"> <b> Create </b>   </li> 
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
        <h3 class="card-title">Create a new product</h3>
    </div>

    <form action="{{ route('admin.product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category_id" id="category"> 
                    {{ recursiveOption($parent_category,0,"") }}
                </select>
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <select class="form-control" name="brand_id" id="brand"> 
                    @foreach ( $brand as $brand)
                        <option value="{{ $brand -> id }}"> {{ $brand -> name }} </option>  
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" value="{{ old('name')}}"/>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input name="price" type="text" class="form-control" id="price" value="{{ old('price')}}" />
            </div>
            <div class="form-group">
                <label for="intro">Intro</label>
                <textarea rows="6" name="intro" type="text" class="form-control" id="intro"  > {{ old('intro')}}</textarea>
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea rows="10" name="desc" type="text" class="form-control" id="desc" > {{ old('desc')}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input" id="image" />
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status"> 
                    <option value="1">Stock </option>
                    <option value="2">None </option>
                </select>
            </div>
            <div class="form-group">
                <label for="featured">Featured</label>
                <select class="form-control" name="featured" id="featured"> 
                    <option value="1">Featured </option>
                    <option value="2">None </option>
                </select>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection