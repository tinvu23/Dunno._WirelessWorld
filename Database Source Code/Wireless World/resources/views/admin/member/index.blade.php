@extends('admin.master')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.member.index') }}">Member </a>
    <li class="breadcrumb-item"> <b>Index </b>  </li> 
@endsection('page')
@section('content')
@if (Session::has('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ Session::get('success') }}</strong>
</div>
@endif
<div class="d-flex justify-content-between">
    <a class="btn btn-primary font-weight-bold  d-inlineblock p-2 mb-4" href=" {{route('admin.member.create')}}"><i class="fa fa-plus"></i> Create a new member</a>
    <div>
        <form action=" {{ route('admin.member.search') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for members">
                <div class="input-group-append">
                    <button class="input-group-text bg-transparent text-primary">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="">
<div class="card card-primary">
    <div class="card-header bg-primary">
        <h3 class="card-title text-center">Member Table</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" style="width: 10px;">#</th>
                    <th class="text-center" >Avatar</th>
                    <th class="text-center" >Username</th>
                    <th class="text-center" >Fullname</th>
                    <th class="text-center" >Phone</th>
                    <th class="text-center" >Email</th>
                    <th class="text-center" >Level</th>
                    <th class="text-center"  style="width:75px">Delete</th>
                    <th class="text-center"  style="width:75px">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                <tr>
                    <td>{{ $member -> id}}</td>
                    <td>
                        @php
                            $avatar = NULL ? 'no-avatar.jpg' : $member -> avatar;
                            $image_url = asset('images/'. $avatar)
                        @endphp    
                        <img src="{{ $image_url }}" width="100px" height="100px"> 
                    </td>
                    <td> {{ $member -> username}}</td>
                    <td>{{ $member -> fullname}}</td>
                    <td>{{ $member -> phone}}</td>
                    <td>{{ $member -> email}}</td>
                    <td class="text-center">{{ $member -> level == 1 ? 'Admin' : 'Member' }} </td>
                    <td class="text-center"><b><a onclick="return confirmDelete()" href="{{ route('admin.member.delete', ['id' => $member -> id])}}">Delete</a></b></td>
                    <td class="text-center"> <b><a href="{{ route('admin.member.edit', ['id' => $member -> id])}}">Edit </a></b></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        <div class="pagination bg-primary pagination-sm m-0 float-right">
            {!! $members->links() !!}
        </div>
    </div>
</div>
@endsection