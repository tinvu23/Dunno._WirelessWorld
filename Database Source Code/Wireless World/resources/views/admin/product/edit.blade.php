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
        <h3 class="card-title  ">Edit product</h3>
    </div>
    <form  action="{{ route('admin.product.update', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id"> 
                    {{ recursiveOption($parent_category,0,"") }}
                </select>
            </div>
            <div class="form-group">
                <label for="brand_id">Brand</label>
                <select class="form-control" name="brand_id"> 
                    @foreach ( $brand as $brand)
                        <option value="{{ $brand -> id }}"> {{ $brand -> name }} </option>  
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $product -> name}}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input class="form-control" type="text" name="price" id="price" value="{{ $product -> price}}">
            </div>
            <div class="form-group">
                <label for="intro">Intro</label>
                <textarea class="form-control" name="intro"  id="intro" > {{ $product -> intro}} </textarea>
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea class="form-control" name="desc"  id="desc" > {{ $product -> desc}} </textarea>
            </div>
            <div class="form-group">
                <label for="currentImage">Current Image</label><br/>
                <img width="200px" height="200px" src="{{ asset('images/'. $product-> image) }}"/> 
            </div>
            <div class="form-group">
                <label for="image">Current Image</label>
                <input class="form-control" type="file" name="image" id="image"/>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status"> 
                    <option value="1" {{ ($product -> status) == 1 ? 'selected' : ''}}>Status </option>
                    <option value="2" {{ ($product -> status) == 2 ? 'selected' : ''}}>Not Status </option>
                </select>
            </div>
            <div class="form-group">
                <label for="featured">Featured</label>
                <select class="form-control" name="featured" id="featured"> 
                    <option value="1" {{ ($product -> featured) == 1 ? 'selected' : ''}}>Featured </option>
                    <option value="2" {{ ($product -> featured) == 2 ? 'selected' : ''}}>Not Featured </option>
                </select>
            </div>
        </div>
        <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

   
@endsection