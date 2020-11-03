@php
$currentRoute = Route::current()->getName();
use App\Http\Controllers\frontend\HomeController;

$header = HomeController::getcolor()->headercolor;
$footer = HomeController::getcolor()->footercolor;


@endphp
<script>
        var footer = "{{ $footer }}";
    </script>
<header id="header" style="background:{{ $header }};">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="logo"> <a href="{{ route("home") }}"><img src="{{ url('public/frontend/assets/images/logo.png') }}" alt="" /></a></div>
            </div>
            <div class="col-md-9 col-sm-9">
                <div class="top-nav">
                    <nav class="navbar navbar-default navbar_costum" role="navigation">
                        <div class="container-fluid row row_margin"> 
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse padding pad" id="bs-example-navbar-collapse-1">
                                <ul class="nav-bar1">
                                    <li><a class='{{ ($currentRoute == 'home'   ? 'active' : '') }} ' href="{{ route("home") }}" >Home</a></li>
                                    
                                    <li class="dropdown"> <a href=''  class="dropdown-toggle {{ ($currentRoute == 'gallay'   ? 'active' : '') }} {{ ($currentRoute == 'history'   ? 'active' : '') }} {{ ($currentRoute == 'video'   ? 'active' : '') }}" data-toggle="dropdown" role="button" aria-expanded="false">About Us<span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a class="{{ ($currentRoute == 'gallay'   ? 'active' : '') }}" href="{{ route('gallay') }}">Gallery</a></li>
                                            <li class='pages'></li>
                                            <li><a  class="{{ ($currentRoute == 'videos'   ? 'active' : '') }}" href="{{ route('videos') }}">Videos</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li><a class='{{ ($currentRoute == "product"   ? "active" : "") }} '  href="{{ route('product') }}">Products</a></li>
                                    <li><a  class='{{ ($currentRoute == "retailstores"   ? "active" : "") }}'  href="{{ route('retailstores') }}">Where to buy?</a></li>
                                    <li><a  class='{{ ($currentRoute == "news" || $currentRoute == "newsdetails"  ? "active" : "") }}'  href="{{ route('news') }}">News</a></li>
                                    <li><a  class='{{ ($currentRoute == "contact-us"   ? "active" : "") }}'  href="{{ route('contact-us') }}">Contact Us</a></li>
                                    <li>
                                        <a href="https://www.facebook.com/Wagler-Maple-Products-1168262946536627/"><img src="{{ url('public/frontend/assets/images/facebook.png') }}"></a>
                                        <a href="https://plus.google.com/+WaglerMapleProductsWellesley"><img src="{{ url('public/frontend/assets/images/google.png') }}"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>