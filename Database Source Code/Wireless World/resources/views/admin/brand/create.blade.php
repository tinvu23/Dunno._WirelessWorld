@extends('admin.master')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.brand.index') }}">Brand </a>
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
        <h3 class="card-title ">Create a new brand</h3>
    </div>

    <form action="{{ route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name"  value="{{ old('name')}}"/>
            </div>
            <div class="form-group">
                <label for="logo">Logo</label> <br/>
                <input type="file" name="logo" id="logo" />
            </div>
            <div class="form-group">
                <label for="banner">Banner</label> <br/>
                <input type="file" name="banner" id="banner" />
            </div>
            <div class="form-group">
                <label for="intro">Intro</label>
                <textarea type="text" name="intro" class="form-control" id="intro"  value="{{ old('name')}}"> {{ old('intro')}}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection