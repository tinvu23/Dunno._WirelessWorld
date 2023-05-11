@extends('admin.edit')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.news.create') }}">News </a>
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
        <h3 class="card-title">Create news </h3>
    </div>

    <form action="{{ route('admin.news.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type" id="type"> 
                    <option value="1">Top Sellers </option>
                    <option value="2">Best Budgets </option>
                    <option value="3">New Technologies </option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control" id="title" value="{{ old('title')}}"/>
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
                <label for="intro">Intro</label>
                <textarea rows="6" name="intro" type="text" class="form-control" id="intro"  > {{ old('intro')}}</textarea>
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea rows="10" name="desc" type="text" class="form-control" id="desc" > {{ old('desc')}}</textarea>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection