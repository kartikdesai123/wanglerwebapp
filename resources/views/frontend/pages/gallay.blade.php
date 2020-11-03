@extends('frontend.layout.app')
@section('content')
<div class="banner"> <img src="{{ url("public/frontend/assets/images/about-bg.png") }}" alt=""> 
    <div class="about-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h1>Gallery</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="products wood-bg">

    <div id="img-section">
        <div class="row">
            @foreach($gallery as $value)
            <div class="col-md-3">
                <div class="img1" >
                    <a  href="{{ url('public/images/gallay/'.$value->gallayimage) }}" data-lightbox="roadtrip">

                        <img style="height: 186px;" src="{{ url('public/images/gallay/'.$value->gallayimage) }}"  alt=""  class="banner1-img1" />
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    .banner img{
        width: 100%;
    }
    .products{
        top: -94px;
    }
</style>
@endsection