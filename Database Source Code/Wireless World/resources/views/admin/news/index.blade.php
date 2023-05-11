@extends('admin.master')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.news.index') }}">News </a>
    <li class="breadcrumb-item"> <b> Index </b>   </li> 
@endsection('page')
@section('content')
@if (Session::has('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ Session::get('success') }}</strong>
</div>
@endif
<div class="d-flex justify-content-between">
    <a class="btn btn-primary font-weight-bold  d-inlineblock p-2 mb-4" href=" {{route('admin.news.create')}}"><i class="fa fa-plus"></i> Create news</a>
    <div>
        <form action=" {{ route('admin.news.search') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for news">
                <div class="input-group-append">
                    <button class="input-group-text bg-transparent text-primary">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header bg-primary">
        <h3 class="card-title text-center">News Table</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" style="width: 10px;">#</th>
                    <th class="text-center" width="180px" >Type</th>
                    <th class="text-center">Title </th>
                    <th class="text-center" width="140px">Image </th>
                    <th class="text-center">Created At</th>
                    <th class="text-center" style="width:75px" >Delete</th>
                    <th class="text-center" style="width:75px">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $new)
                <tr>
                    <td>{{ $new -> id}}</td>
                    <td class="text-center"> {{ $new -> type}}</td>
                    <td> {{ $new -> title}}</td>
                    <td width="140px">
                        @php
                            $image = NULL ? 'no-avatar.jpg' : $new -> image;
                            $image_url = asset('images/'. $image)
                        @endphp    
                        <img src="{{ $image_url }}" height="100px"> 
                    </td>
                    <td> {{ $new -> created_at}}</td>
                    <td class="text-center"><b><a onclick="return confirmDelete()" href="{{ route('admin.news.delete', ['id' => $new -> id])}}">Delete</a></b></td>
                    <td class="text-center"><b><a href="{{ route('admin.news.edit', ['id' => $new -> id])}}">Edit </a></b></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        <div class="pagination bg-primary pagination-sm m-0 float-right">
            {!! $news->links() !!}
        </div>
    </div>
</div>
@endsection