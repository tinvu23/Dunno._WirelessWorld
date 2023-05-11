@extends('master')
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ route('index')}}">Home</a>
                <a class="breadcrumb-item text-dark" href="{{ route('news')}}">News</a>
                <span class="breadcrumb-item active">{{ $type}}</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="text-dark bg-secondary pr-3">{{ $type}}</span></h2>
    <div class="row px-xl-5">
        @foreach ($news as $new)
        <div class="col-lg-12 mb-4">
            <div class="d-flex bg-light p-30">
                <div>
                    @php
                        $image = NULL ? 'no-avatar.jpg' : $new -> image;
                        $image_url = asset('images/'. $image)
                    @endphp
                    <img src="{{$image_url}}" width="400px" height="300px" alt="">
                </div>
                <div class="p-30">
                    <h3><a class="text-dark" href="{{ route('pages',['id' => $new -> id])}}"> {{ $new -> title}} </a></h3>
                    <p> {!! $new -> intro !!}</p> 
                    <a class="text-dark" href="{{ route('pages',['id' => $new -> id])}}"> <b> Read more .... </b> </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-right px-xl-5">
        {{ $news -> links()}}
    </div>
</div>
<!-- Contact End -->
@endsection('content')
