@extends('edit')
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ route('index')}}">Home</a>
                <a class="breadcrumb-item dark" href="{{ route('news')}}">News</a>
                <span class="breadcrumb-item active">{{ $new -> type}}</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="text-dark bg-secondary pr-3">{{ $new -> type}}</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <div class=" bg-light" style="padding:60px">
                <div class="text-center mb-3">
                    <h1 class="mb-3"> {{ $new -> title}} </h1>
                    <p class="mb-5">{{ $new -> created_at}}</p>
                    @php
                        $image = NULL ? 'no-avatar.jpg' : $new -> image;
                        $image_url = asset('images/'. $image)
                    @endphp
                    <img src="{{$image_url}}" width="1200px" alt="">
                </div>
                <div style="overflow: hidden">
                    {!! $new -> desc !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection('content')
