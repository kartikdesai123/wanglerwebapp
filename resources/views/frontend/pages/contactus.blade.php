@extends('frontend.layout.app')
@section('content')
<div class="banner"> <img src="{{ url('public/frontend/assets/images/about-bg.png') }}" alt=""  class="banner-img"/>
    <div class="about-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h1>Get In Touch!</h1>
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
                <div class="contact-map">
                    <figure>
                        <style>
                            #map {
                                height: 400px;
                                width: 100%;
                            }
                        </style>

                        <div id="map"></div>
                        <script>
                            function initMap() {
                                var uluru = {lat: 43.476383, lng: -80.816234};
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 15,
                                    center: uluru
                                });
                                var marker = new google.maps.Marker({
                                    position: uluru,
                                    map: map
                                });
                            }
                        </script>
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5f5NF1bP95nLFNIDKrC7xstHl096xg0c&callback=initMap">
                        </script>

                    </figure>
                </div>
            </div>
        </div>
        <div class="con-info">
            <p class="c-txt" style="font-size: 16px;font-weight: bold;">
                2014 Perthline 56 <br/>
                Wellesley,<br/>
                Ontario,Canada<br/>
                N0B 2T0(519) 656-2374<br/>
            </p>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="con-info">
                    <h1 class="send">Send us mail</h1>
                    <p class="c-txt">If you want to continue exploring more information on our products, then kindly fill the form below and we will get back to you as soon as possible.</p>
                    <form action="{{ route('contact-us') }}" method="post" name="contact_form" id="contact_form">
                        <div class="con-field">
                            <p><span>{{ csrf_field() }}
                                    <input type="text" name="first_name" value="" placeholder="First Name"  class= "validate[required]"/>
                                </span><span>
                                    <input type="text" name="last_name" value="" placeholder="Last Name" style="margin-right:0;"/>
                                </span></p>
                            <p><span>
                                    <input type="text" value="" placeholder="Email" name="u_email"  class= "validate[required,custom[email]]"/>
                                </span><span>
                                    <input type="text" value="" placeholder="Subject" name="u_subject" style="margin-right:0;"/>
                                </span></p>
                            <p>
                                <textarea name="u_message"  placeholder="Message"></textarea>
                            </p>
                            <p class="right" colspan="2">

                            </p>
                             <div class="">
                                 <div id="html_element"></div>
                                <!--<div class="g-recaptcha" data-sitekey="6Le5wHcUAAAAABDKHReiQ8xlGIVYdk7b5Nl7lqeP"></div>-->
                            </div>
                            <p><span>
                                    <input type="submit" value="Submit" id="submit"/>
                                </span>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
@endsection