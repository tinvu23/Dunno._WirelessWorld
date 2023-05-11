@extends('admin.edit')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.news.index') }}">News </a>
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
        <h3 class="card-title  ">Edit news</h3>
    </div>
    <form  action="{{ route('admin.news.update', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type" id="type"> 
                    <option value="1" {{ ($new -> type) == 'Top Sellers' ? 'selected' : ''}}>Top Sellers </option>
                    <option value="2" {{ ($new -> type) == 2 ? 'Best Budgets' : ''}}>Best Budgets </option>
                    <option value="3" {{ ($new -> type) == 3 ? 'New Techologies' : ''}}>New Technologies </option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ $new -> title}}">
            </div>
            <div class="form-group">
                <label for="intro">Intro</label>
                <textarea class="form-control" name="intro"  id="intro" > {{ $new -> intro}} </textarea>
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea class="form-control" name="desc"  id="desc" > {{ $new -> desc}} </textarea>
            </div>
            <div class="form-group">
                <label for="currentImage">Current Image</label><br/>
                <img height="200px" src="{{ asset('images/'. $new-> image) }}"/> 
            </div>
            <div class="form-group">
                <label for="image">Current Image</label>
                <input class="form-control" type="file" name="image" id="image"/>
            </div>
        </div>
        <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

   
@endsection