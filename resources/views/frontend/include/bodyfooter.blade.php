@php
$currentRoute = Route::current()->getName();
use App\Http\Controllers\frontend\HomeController;

$storetime = HomeController::getRecords()->hours;

@endphp
<footer id="footer" class="post7" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="footer-main">
		 <div class="col-md-2">
          <div class="f-logo">
            <figure><a href="index.html"><img src="{{ url('public/frontend/assets/images/foot-logo.png') }}" alt="" /></a></figure>
          </div>
          </div>
		   <div class="col-md-3">
          <div class="f-txt">
            <p><strong>Wagler Maple Products</strong><br/>
              2014 Perthline 56<br/>
             Wellesley,<br/>
             Ontario,Canada N0B 2T0
              </p>
          </div>
          </div>
		   <div class="col-md-4">
          <div class="f-txt">
            <p><strong>Store Hours:</strong><br/>
<!--              Monday-Friday 9:00am - 5:00pm<br/>
              Saturday 8:00am - 4:00pm-->
              {{ $storetime }}
            </p>
          </div>
            </div>
		   <div class="col-md-3">
		   </div>
		   <div class="col-md-12">
          <div class="f-menu">
            <ul>
              <li><a class='active' href="{{ route("home") }}" >Home</a></li>
			  <li><a  href="{{ route("history") }}">About us</a> </li>
			  <li><a  href="{{ route("product") }}">Products</a></li>
			  <li><a  href="{{ route("retailstores") }}">Where to buy?</a></li>
                            <!--<li><a  href="https://waglermapleproducts.ca/">Online Store</a></li>-->
			  <li><a  href="{{ route("news") }}">News</a></li>
			  <li><a  href="{{ route("contact-us") }}">Contact Us</a></li>
            </ul>
          </div>
		   </div>
		   <div class="col-md-12">
		  <div style=" color: #fff;float: right; font-size: 19px;  padding: 21px 13px 0 0;">Powered by <a target="_blank" style="color:red;" href="https://radiusimpact.ca/"> Radius Impact Technology</a></div>
        </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<script>
document.getElementById("footer").style.background = footer;
</script>