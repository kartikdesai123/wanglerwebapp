@extends('frontend.layout.app')
@section('content')
<div class="banner">
    <div id="slides">
        <div class="slides-container">
            @foreach($slider as $value) 
            <img src="{{ url('public/images/silder/'.$value->silderimage) }}" width='100%' alt="slider10">
            @endforeach
        </div>

        <!--nav class="slides-navigation">
          <a href="#" class="next">Next</a>
          <a href="#" class="prev">Previous</a>
        </nav-->
    </div>

    <div class="banner-info" style="z-index: 999;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-shape">
                        <figure class="r-leaf"><img src="{{ url('public/frontend/assets/images/right-leaf.png') }}" alt="" /></figure>
                        <h2 class="p-txt">Quality Maple <br/>
                            <label class="syrup">Syrup Products </label>
                            <br/>
                            <label class="since"> Since 1921 </label>
                        </h2>
                        <p class="ample"><a href="{{ route('history') }}">Wagler History</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-head post5">
                    <h1>Featured Products</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-main">
                    @foreach($product as $result)
                    <div class="product1 post7">
                        <figure class="p-img" ><img style="height: 281px;" src="{{ url('public/images/product/'.$result->image) }}"  alt=""/></figure>
                        <h1 class="p-head">{{ $result->name }}</h1>    
                        <p class="p-info"> {{ '$'.$result->price }}</p>
                        <p class="click"><img src="{{ url('public/frontend/assets/images/small-leaf.png') }}" alt="" /><a href="{{ route('productdetails',$result->id) }}">Click Here for more</a></p>
                    </div>
                    @endforeach
                </div>
                <div class="shop-online post1"><a href="{{ route('contact-us') }}">Contact Us for orders</a></div>
            </div>
        </div>
    </div>
</div>
<div class="announcement">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-head post5">
                    <h1 style="color:#a72330;">News & Announcements</h1>
                </div>
                <div class="announce-main">
                    @if(!$announcement->isEmpty())
                     @foreach($announcement as $value)
                    <div class="product1 post7">
                        <figure class="p-img" ><img src="{{ url('public/images/news/'.$value->image) }}"  alt=""/></figure>
                        <h1 class="p-head">{{ $value->title }}</h1>    
                        <p class="p-info"> {!! $value->content !!}</p>
                        <p class="click"><img src="{{ url('public/frontend/assets/images/small-leaf.png') }}" alt="" /><a href="{{ route('newsdetails',$value->id) }}">Click Here For More</a></p>
                    </div>
                    @endforeach
                    @else
                    <h2>No news found</h2>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    @endif
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </div>
    <div class="left-leaft"><img src="{{ url('public/frontend/assets/images/news-left-leaf.png') }}" alt="" /></div>
    <div class="right-leaft"><img src="{{ url('public/frontend/assets/images/news-righ-leaf.png') }}" alt="" /></div>
</div>
<div class="clear"></div>


@endsection