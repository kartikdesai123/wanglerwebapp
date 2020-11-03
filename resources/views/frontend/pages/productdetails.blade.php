    @extends('frontend.layout.app')
@section('content')
<div class="banner"> <img src="{{ url("public/frontend/assets/images/about-bg.png") }}" alt=""  class="banner-img"/>
    <div class="about-head">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="banner1"> <img src="{{ url("public/frontend/assets/images/img1.png") }}" alt=""  /></div>
                </div>
                <div class="col-md-3">
                    <div class="banner2"> <img  src="{{ url("public/frontend/assets/images/img2.png") }}" alt=""  /></div>
                </div>
                <div class="col-md-5">
                    <div class="heading">
                        <h1>Product View</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="products wood-bg">
    <div class="container">
        <div class="col-md-12 space">
            <div class="row">
                <div class="prod_info post2">
                    <div class="col-md-4 col-sm-4">
                        <div class="prod_pic">
                            <figure class="img_zoom">
                                <a  href="{{ url('public/images/product/'. $product['image']) }}" data-lightbox="roadtrip">
                                    <img style="height: 350px" src="{{ url('public/images/product/'. $product['image']) }}" alt="" />
                                </a>	
                            </figure>
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-8">
                        <div class="prod_data">
                            <h1>{{ $product['name'] }}</h1>
                            <!--<h2>{{ '$'.$product['price'] }}</h2>-->
                            <ul>
                                @for($i = 0 ; $i < count($viewproductSizePrize) ; $i++)
                                <li><b style="color:#de9027;"> Size : </b> {{ $viewproductSizePrize[$i]->productsize }} , <b style="color:#de9027;">Price : ${{ $viewproductSizePrize[$i]->productprize }}</b></li>
                                @endfor
                            </ul>
                            <p>@php echo str_replace("," , "<br>" , $product["description"]); @endphp</p>
                            <p class="click"><img src="{{ url("public/frontend/assets/images/small-leaf.png") }}" alt="" /><a href="{{ route('contact-us') }}">Contact us for order</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>

@endsection