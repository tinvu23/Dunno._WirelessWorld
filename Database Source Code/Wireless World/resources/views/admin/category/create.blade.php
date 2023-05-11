@extends('admin.master')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.category.index') }}">Category </a>
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
        <h3 class="card-title ">Create a new category</h3>
    </div>

    <form action="{{ route('admin.category.store')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="parent">Parent</label>
                    <select class="form-control" name="parent" id="parent"> 
                        {{ recursiveOption($parent_category)}}
                    </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name"  value="{{ old('name')}}"/>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection