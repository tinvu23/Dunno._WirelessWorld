@extends('admin.master')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.carousel.index') }}">Category </a>
    <li class="breadcrumb-item"> <b>Create </b>  </li> 
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
        <h3 class="card-title ">Create a new carousel</h3>
    </div>

    <form action="{{ route('admin.carousel.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title"  value="{{ old('title')}}"/>
            </div>
            <div class="form-group">
                <label for="image">Image</label> <br/>
                <input type="file" name="image" id="image" />
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" class="form-control" id="link"  value="{{ old('link')}}"/>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection