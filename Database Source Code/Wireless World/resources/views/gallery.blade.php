@extends('master')
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ route('index')}}">Home</a>
                <span class="breadcrumb-item active">Gallery</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="text-dark bg-secondary pr-3">Gallery</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-3">
            <div class="bg-light p-30">
            <h4 class="text-center mb-4"> Opening Hours </h4>
                <div > 
                    <table>
                        <tr>
                            <td> <p>Monday </p></td>
                            <td> <p class="ml-5">8:30am - 7:00pm </p></td>
                        </tr>
                        <tr>
                            <td> <p>Tuesday </p></td>
                            <td> <p class="ml-5">8:30am - 7:00pm </p></td>
                        </tr>
                        <tr>
                            <td> <p>Wednesday	 </p></td>
                            <td> <p class="ml-5">8:30am - 7:00pm </p></td>
                        </tr>
                        <tr>
                            <td> <p>Thursday </p></td>
                            <td> <p class="ml-5">8:30am - 7:00pm </p></td>
                        </tr>
                        <tr>
                            <td><p>Friday </p></td>
                            <td> <p class="ml-5">8:30am - 7:00pm </p></td>
                        </tr>
                        <tr>
                            <td> <p>Saturday </p></td>
                            <td><p class="ml-5"> 10:00am - 5:30pm </p></td>
                        </tr>
                        <tr>
                            <td> <p>Sunday </p></td>
                            <td> <p class="ml-5"> 10:00am - 5:30pm </p></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="bg-light p-30">
                <div class="owl-carousel owl-theme">
                    <div class="item"><img src="images/gallery/1.jpg" alt=""></div>
                    <div class="item"><img src="images/gallery/2.jpg" alt=""></div>
                    <div class="item"><img src="images/gallery/3.jpg" alt=""></div>
                    <div class="item"><img src="images/gallery/4.jpg" alt=""></div>
                    <div class="item"><img src="images/gallery/5.jpg" alt=""></div>
                    <div class="item"><img src="images/gallery/6.jpg" alt=""></div>
                    <div class="item"><img src="images/gallery/7.jpg" alt=""></div>
                    <div class="item"><img src="images/gallery/8.jpg" alt=""></div>
                </div>   
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection('content')
