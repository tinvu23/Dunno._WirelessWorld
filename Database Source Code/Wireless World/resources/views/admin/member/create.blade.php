@extends('admin.master')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.member.index') }}">Member </a>
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
        <h3 class="card-title ">Create a new member</h3>
    </div>
    <form action = "{{ route('admin.member.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="{{ old('username')}}"/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" value="{{ old('password')}}"/>
            </div>
            <div class="form-group">
                <label for="fullname">Fullname</label>
                <input type="text" name="fullname" class="form-control" id="fullname" value="{{ old('fullname')}}"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email')}}"/>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone')}}"/>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" id="address" value="{{ old('address')}}"/>
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label> <br/>
                <input type="file" name="avatar" id="avatar" />
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <select class="form-control" name="level" id="level"> 
                    <option value="1">Admin </option>
                    <option value="2">Member </option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection