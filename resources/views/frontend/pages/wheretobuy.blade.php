@extends('frontend.layout.app')
@section('content')
<div class="banner"> <img src="{{ url('public/frontend/assets/images/about-bg.png') }}" alt=""  class="banner-img"/>
    <div class="about-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h1> Retail stores  </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{ csrf_field() }}
<div class="clear"></div>
<div class="products wood-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sellerCategory">
                    <select class="seller selectcity">
                        <option value="">Select City</option>
                        @foreach($city as $result)
                        <option value="{{ $result->id }}">{{ $result->cityname }}</option>
                        @endforeach
                    </select>
                    <select class="store">
                        <option value="">Select Store</option>
                    </select>
                </div>
                <div class="news_info">
                    <div class="news_data" style="padding-bottom: 42px;">
					
					@foreach($viewsellers as $viewseller)
                        <h1> {{ $viewseller->sellername }} </h1>
                        <p> 
							<p><strong>&nbsp;Address</strong>: {{ $viewseller->selleraddress }}</p>
							<p><strong>Phone:</strong> {{ $viewseller->sellerphoneno }}</p> 
							
						</p>
					<br/>
					@endforeach
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
@endsection