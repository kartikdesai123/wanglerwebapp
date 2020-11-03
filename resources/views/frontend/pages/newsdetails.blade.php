@extends('frontend.layout.app')
@section('content')
<div class="banner"> <img src="{{ url("public/frontend/assets/images/about-bg.png") }}" alt=""> 
                          <div class="about-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h1>{{ isset($news) ?  $news[0]['title'] : '' }}</h1>
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
                    @foreach($news as $result)
                    <h2><strong><u>{{ $result->title }}</u></strong></h2>
                    <img src="{{ url('public/frontend/assets/images/',$result->image) }}" alt=""> 
                    {!! $result->content !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection