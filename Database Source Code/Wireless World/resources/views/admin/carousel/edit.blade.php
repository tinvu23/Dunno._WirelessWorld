@extends('admin.edit')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.carousel.index') }}">Carousel</a>
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
        <h3 class="card-title ">Edit carousel</h3>
    </div>
    <form action="{{ route('admin.carousel.update', ['id' => $id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title"  value="{{ $carousel -> title }}"/>
            </div>
            <div class="form-group">
                <label for="currentImage">Current Image</label><br/>
                <img id="currentAvatar"  height="200px" src="{{ asset('images/'. $carousel-> image) }}"/> 
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
                <label for="link">Link</label>
                <input type="text" name="link" class="form-control" id="link"  value="{{ $carousel -> link }}"/>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection