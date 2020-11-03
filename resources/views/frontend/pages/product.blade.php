@extends('frontend.layout.app')
@section('content')

<style>
    .selectCategory select{
        padding: 10px;
    }
    .product1 figure img{ min-height: 300px;}
</style>
<div class="banner"> <img src="{{ url('public/frontend/assets/images/about-bg.png') }}" alt=""  class="banner-img"/>
    <div class="about-head">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="banner1"> <img src="{{ url('public/frontend/assets/images/img1.png') }}" alt=""  /></div>
                </div>
                <div class="col-md-3">
                    <div class="banner2"> <img  src="{{ url('public/frontend/assets/images/img2.png') }}" alt=""  /></div>
                </div>
                <div class="col-md-5">
                    <div class="heading">
                        <h1>Our Products</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="products wood-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{ csrf_field() }}

                <div class="contact-map1">
                    <div class="product-main1 selectCategory">
                        <select class="category">
                            <option value="">Select Category</option>
                            @foreach($category as $value)
                            <option value="{{ $value->id }}">{{ $value->category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="product-main1 productlist">
                        @foreach($product as $result)
                        <div class="product1 post7" style="margin: 10px">
                            <figure class="p-img"><img src="{{ url('public/images/product/'.$result->image) }}" alt="" /></figure>
                            <h1 class="p-head">{{ substr($result->name,0,17) }}</h1>
                            <p class="p-info">{{ substr($result->description,0,17) }} {{ '$'.$result->price }}</p>
                            <p class="click"><img src="{{ url('public/frontend/assets/images/small-leaf.png') }}" alt="" /><a href="{{ route('productdetails',$result->id) }}">Click Here for more</a></p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="clear"></div>
@endsection