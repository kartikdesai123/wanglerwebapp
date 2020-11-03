
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ url('public/frontend/assets/js/bootstrap.js') }}"></script>
    <script src="{{ url('public/frontend/assets/assets/viewportchecker.js') }}"></script>
    <script src="{{ url('public/frontend/assets/js/lightbox.min.js') }}"></script>
    
    <script src="{{ url('public/frontend/assets/js/jquery.validationEngine.js') }}"></script>
    <script src="{{ url('public/frontend/assets/js/jquery.validationEngine-en.js') }}"></script>
    <script src="{{ url('public/backend/assets/js/comman_function.js')}}"></script>
    <script src="{{ url('public/backend/assets/js/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ url('public/backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" ></script>
    <script src="{{ url('public/frontend/assets/js/jquery.superslides.js') }}" type="text/javascript" charset="utf-8"></script>
    @if(isset($loadgooglecaptchjs))
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"></script>
    @endif
    
    <script>
        jQuery(document).ready(function() {
        jQuery('#slides').superslides({
        animation: 'fade',
        play: true,
        animation_speed:10000
        });
        
        							
        
    });
    var onloadCallback = function () {

            grecaptcha.render('html_element', {
                'sitekey': '6Le_IP4UAAAAAA-yy3SikwPcq-JNTAZrIPFnxbDI'
            });
        };
</script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
        jQuery("#contact_form").validationEngine();
                jQuery('.post1').addClass("").viewportChecker({
                    classToAdd: 'visible animated slideInLeft', // Class to add to the elements when they are visible
                    offset: 100    
                   });
                   jQuery('.post3').addClass("").viewportChecker({
                    classToAdd: 'visible animated fadeInUpBig', // Class to add to the elements when they are visible
                    offset: 100    
                   });
                   jQuery('.post5').addClass("").viewportChecker({
                    classToAdd: 'visible animated fadeIn', // Class to add to the elements when they are visible
                    offset: 100    
                   });
                   jQuery('.post6').addClass("").viewportChecker({
                    classToAdd: 'visible animated slideInRight', // Class to add to the elements when they are visible
                    offset: 100    
                   });
                jQuery(".news_titl").next("p").addClass('p-info');

        });            
        </script>
@if (!empty($pluginjs)) 
@foreach ($pluginjs as $value) 
<script src="{{ url('public/frontend/assets/js/'.$value) }}" type="text/javascript"></script>
@endforeach
@endif

@if (!empty($js)) 
@foreach ($js as $value) 
<script src="{{ url('public/frontend/assets/js/customjs/'.$value) }}" type="text/javascript"></script>
@endforeach
@endif
<script>
    jQuery(document).ready(function() {
        
    @if (!empty($funinit))
            @foreach ($funinit as $value)
                {{  $value }}
            @endforeach
    @endif
    });
</script>
<script>
    
    $(document).ready(function() {
        checkCookie();
        
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url + "page-ajaxAction-new",
            data: {'action': 'getpage'},
            success: function (data) {
                var page = "";
                var i;
                for (i = 0; i < data.length; i++) {
                    page += '<a href="'+base_url+'about_us/'+data[i].id+'">' + data[i].title + '</a>';
                }
               
                $('.pages').html(page);
            }
        });
    });

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var ticks = getCookie("modelopen");
        if (ticks != "") {
            ticks++ ;
            setCookie("modelopen", ticks, 1);
            if (ticks == "2" || ticks == "1" || ticks == "0") {
                $('#exampleModalCenter').modal();
            }
        } else {
            // user = prompt("Please enter your name:", "");
            $('#exampleModalCenter').modal();
            ticks = 1;
            setCookie("modelopen", ticks, 1);
        }
    }
</script>
<script> 

</script>
<!--<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("slides-container");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>-->
