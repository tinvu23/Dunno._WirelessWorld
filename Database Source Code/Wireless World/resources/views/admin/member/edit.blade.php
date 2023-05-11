@extends('admin.edit')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.member.index') }}">Memeber </a>
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
        <h3 class="card-title">Edit member</h3>
    </div>

    <form action="{{ route('admin.member.update', ['id' => $id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control" id="username" value="{{ $member -> username}}"/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password"  />
            </div>
            <div class="form-group">
                <label for="fullname">Fullname</label>
                <input name="fullname" type="text" class="form-control" id="username" value="{{ $member -> fullname }}"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" value="{{ $member -> email}}"/>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input name="phone" type="text" class="form-control" id="phone" value="{{ $member -> phone }}"/>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input name="address" type="text" class="form-control" id="address" value="{{ $member -> address}}"/>
            </div>
            <div class="form-group">
                <label for="currentAvatar">Current Avatar</label><br/>
                <img width="200px" id="currentAvatar"  height="200px" src="{{ asset('images/'. $member-> avatar) }}"/> 
            </div>
            <div class="form-group">
                <label for="avatar">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input name="avatar" type="file" class="custom-file-input" id="avatar" />
                        <label class="custom-file-label" for="avatar">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <select class="form-control" name="level" id="level"> 
                    <option value="1"{{ ($member -> level) == 1 ? 'selected' : ''}}> Admin </option>
                    <option value="2"{{ ($member -> level) == 2 ? 'selected' : ''}}> Member </option>
                </select>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection