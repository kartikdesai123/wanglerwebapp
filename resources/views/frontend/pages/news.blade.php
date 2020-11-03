@extends('frontend.layout.app')
@section('content')
<div class="banner"> <img src="{{ url('public/frontend/assets/images/about-bg.png') }}" alt=""  class="banner-img"/>
    <div class="about-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h1>News</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="products wood-bg">
    <div id="img-section">
        <div class="row">
            @foreach($news as $value)
            <div class="col-md-3">
                <div class="img1  text-center" >
                    <a  href="{{ url('public/images/news/'.$value->image) }}" data-lightbox="roadtrip">
                        <img style="height: 300px"  src="{{ url('public/images/news/'.$value->image) }}"  alt=""  class="banner1-img1" />
                    </a>
                    <h1 class="p-head">{{ $value->name }}</h1>
                    <p class="p-info"><b>{!! $value->content !!}</b></p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="clear"></div>
@endsection