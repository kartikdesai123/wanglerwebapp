@extends('frontend.layout.app')
@section('content')
<div class="banner"> <img src="{{ url('public/frontend/assets/images/about-bg.png') }}" alt=""  class="banner-img"/>
    <div class="about-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h1> Video  </h1>
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
                <div class="sellerCategory">

                </div>
                @foreach($video as $value)
                @if($value->type == "youtube")
                <div class="news_info" >
                    <div class="news_data" style="padding-bottom: 0px;">
                        <h1> {{ $value->title }} </h1>
                        @php
                            $whatIWant = substr($value->videoname, strpos($value->videoname, 'src') + 5);    
                            $variable = substr($whatIWant, 0, strpos($whatIWant, '"'));
                        @endphp
                        <iframe width="100%" height="450px" src="{{ $variable }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>      
                    </div>
                </div>
                @else
                <div class="news_info" >
                    <div class="news_data" style="padding-bottom: 0px;">
                        <h1> {{ $value->title }} </h1>
                        <video width="100%" height="100%" controls><source src="public/video/{{ $value->videoname }} " type="video/mp4"></video>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
@endsection