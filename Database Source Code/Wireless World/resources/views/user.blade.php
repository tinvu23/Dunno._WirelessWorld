@extends('master')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ route('index')}}">Home</a>
                <span class="breadcrumb-item active">Profile</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="text-dark bg-secondary pr-3">Profile</span></h2>
        <div class="row px-xl-5 ml-4">
            <div style="height:250px" class="p-30 card mr-5 col-lg-3 mb-5">
                <div class="user-panel d-flex border-bottom pb-3">
                    <div class="image">
                        @php
                            $avatar = $user-> avatar == NULL ? 'no-avatar.jpg' : $user -> avatar;
                            $image_url = asset('images/'. $avatar)
                        @endphp     
                    <img src="{{ $image_url }}" class="img-circle border" alt="User Image">
                    </div>
                    <div class="info"> 
                        <span class="font-weight-bold  mt-1 d-block text-dark" > 
                        Hello, {{ $user -> username }}
                        </span>
                    </div>
                </div>
            <div class="ml-4 mt-4 ">
                <a class="d-block mb-2 text-dark" href="{{ route('user') }}"><b><i style="width:18px" class="fa fa-user text-primary mr-3"></i>My Profile </b></a>
                <a class="d-block mb-2 text-dark" href="{{ route('listOrder') }}"><b><i style="width:18px" class="fa fa-shopping-cart text-primary mr-3"></i>My Order </b></a>
                <a class="d-block mb-2 text-dark" href="{{ route('wishlist') }}"><b><i style="width:18px" class="fas fa-heart text-primary mr-3"></i>My Wishlist </b></a>
            </div>
        </div>
        <div class="p-30 card col-lg-8 mb-5">
            <form action=" {{ route('admin.member.update' , ['id' => $id ]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label class="text-dark" for="username">Username</label>
                        <input name="username" disabled type="text" class="text-dark form-control" id="username" value="{{ $member -> username}}"/>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="password">Password</label>
                        <input name="password" type="text" class=" text-dark form-control" id="password"  />
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="fullname">Fullname</label>
                        <input name="fullname" type="text" class="text-dark form-control" id="username" value="{{ $member -> fullname }}"/>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="email">Email</label>
                        <input name="email" type="email" class="text-dark form-control" id="email" value="{{ $member -> email}}"/>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="phone">Phone</label>
                        <input name="phone" type="text" class="text-dark form-control" id="phone" value="{{ $member -> phone }}"/>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address">Address</label>
                        <input name="address" type="text" class="text-dark form-control" id="address" value="{{ $member -> address}}"/>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="currentAvatar">Current Avatar</label><br/>
                        <img width="200px" id="currentAvatar"  height="200px" src="{{ asset('images/'. $member-> avatar) }}"/> 
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="avatar">New Avatar</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="avatar" type="file" class="custom-file-input" id="avatar" />
                                <label class="custom-file-label" for="avatar">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class=" mt-3 mb-3 btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
       
    </div>
</div>
@endsection