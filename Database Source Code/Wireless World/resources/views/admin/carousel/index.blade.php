@extends('admin.master')
@section('page')
    <a class="text-dark "href=" {{ route ('admin.carousel.index') }}">Carousel </a>
    <li class="breadcrumb-item"> <b>Index </b>  </li> 
@endsection('page')
@section('content')
@if (Session::has('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ Session::get('success') }}</strong>
</div>
@endif
<a class="btn btn-primary font-weight-bold  d-inlineblock p-2  mb-4" href=" {{route('admin.carousel.create')}}"><i class="fa fa-plus"></i> Create a new carousel</a>
<div class="card card-primary">
    <div class="card-header bg-primary">
        <h3 class="card-title text-center">Carousel Table</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" style="width:240px">Title </th>
                    <th class="text-center">Image </th>
                    <th class="text-center">Link </th>
                    <th class="text-center" style="width:75px">Delete</th>
                    <th class="text-center" style="width:75px" >Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carousels as $carousel)
                    <tr>
                        <td style="width:240px"> {{ $carousel -> title }}</td>              
                        <td> 
                        @php
                            $avatar = NULL ? 'no-avatar.jpg' : $carousel -> image;
                            $image_url = asset('images/'. $avatar)
                        @endphp   
                            <img style="height:150px" src="{{ $image_url }}"  alt="">
                        </td>
                        <td> {{ $carousel -> link }}</td>
                        <td class="text-center" style="width:75px"><b><a onclick="return confirmDelete()" href="{{ route('admin.carousel.delete', ['id' => $carousel -> id])}}">Delete</a></b></td>
                        <td class="text-center" style="width:75px"><b><a href="{{ route('admin.carousel.edit', ['id' => $carousel -> id])}}">Edit </a></b></td>
                    </tr>
                @endforeach
        </table>
    </div>
</div>
@endsection