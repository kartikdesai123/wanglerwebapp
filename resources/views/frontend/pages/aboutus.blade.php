@extends('frontend.layout.app')
@section('content')
<div class="banner"> 
    <img src="{{ url("public/frontend/assets/images/about-bg.png") }}" alt="" width="100%" class="banner-img"> 
                          <div class="about-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h1>{{ isset($pages) ?  $pages[0]['title'] : '' }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="products wood-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-info"style="background:white;">
                    @foreach($pages as $result)
                    <!--<h2><strong><u>{{ $result->title }}</u></strong></h2>-->
                    {!! $result->content !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection