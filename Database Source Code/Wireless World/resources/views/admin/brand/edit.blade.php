@extends('admin.edit')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.brand.index') }}">Brand</a>
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
        <h3 class="card-title ">Edit brand</h3>
    </div>
    <form action="{{ route('admin.brand.update', ['id' => $id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name"  value="{{ $brand -> name }}"/>
            </div>
            <div class="form-group">
                <label for="currentLogo">Current Logo</label><br/>
                <img width="200px" id="currentLogo"  height="200px" src="{{ asset('images/'. $brand-> logo) }}"/> 
            </div>
            <div class="form-group">
                <label for="logo">New Logo</label> <br/>
                <input type="file" name="logo" id="logo" />
            </div>
            <div class="form-group">
                <label for="currentBanner">Current Banner</label><br/>
                <img  id="currentAvatar"  height="200px" src="{{ asset('images/'. $brand-> banner) }}"/> 
            </div>
            <div class="form-group">
                <label for="banner">New Banner</label> <br/>
                <input type="file" name="banner" id="banner" />
            </div>
            <div class="form-group">
                <label for="intro">Intro</label>
                <textarea type="text" name="intro" class="form-control" id="intro"  value="{{ old('intro')}}"> {{ $brand->intro}}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection