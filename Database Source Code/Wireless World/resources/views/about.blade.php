@extends('master')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ route('index')}}">Home</a>
                <span class="breadcrumb-item active">About</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="text-dark bg-secondary pr-3">About Us</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-5">
            <div class="bg-light p-30">
                Wireless World was established in 1974 by Mr. John Barbuto, trading from a single store in East Keilor, Victoria. He had one simple philosophy: to deliver a specialist range of Hi-Fi and recorded music at Australia's lowest prices. <br/><br/>
                The business was sold in 1983 and by 1999 another nine stores were opened. In July 2000 Wireless World was purchased by private equity bankers and senior management with the aim of taking the successful model nationally. In October 2003, Wireless World was floated on the American Stock Exchange. Now, maintaining Barbuto's original philosophy, JB is one of American's fastest growing and largest retailer of home entertainment. <br/><br/>
                In July 2004, John Barbuto bought the Chicago Clive Anthony chain of stores which sell consumer electronics, white goods, cooking appliances and air-conditioning. These locations have now been converted into Wireless World HOME stores, where you can find everything you love about JB plus more.<br/><br/>
                WW offer the world's leading brands of Computers, Tablets, TVs, Cameras, Hi-Fi, Speakers, Home Theatre, Portable Audio, the largest range of games, recorded music, DVD music, Blu-Ray and DVD movies and TV shows and stacks more all at cheap prices! Everything you're after is available in one of our stores or online. Wireless World has it all - best brands, huge range, cheapest prices, convenient locations, but most importantly genuine personal service from our experienced specialist staff.                    
            </div>
        </div>
       
    </div>
</div>
@endsection('content')
