
<script src="{{ url('public/backend/assets/js/vendor-all.min.js') }}"></script>
<script src="{{ url('public/backend/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ url('public/backend/assets/js/ripple.js') }}"></script>
<script src="{{ url('public/backend/assets/js/pcoded.min.js') }}"></script>

<!--<script src="{{ url('public/backend/assets/js/plugins/apexcharts.min.js') }}"></script>-->
<script src="{{ url('public/backend/assets/js/plugins/toastr/toastr.min.js') }}"></script>
<!-- custom-chart js -->
<!--<script src="{{ url('public/backend/assets/js/pages/dashboard-main.js')}}"></script>-->
<script src="{{ url('public/backend/assets/js/comman_function.js')}}"></script>
<script src="{{ url('public/backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" ></script>
<script src="https://cdn.ckeditor.com/4.13.0/full-all/ckeditor.js"></script>
@if (!empty($pluginjs)) 
@foreach ($pluginjs as $value) 
<script src="{{ url('public/backend/assets/js/'.$value) }}" type="text/javascript"></script>
@endforeach
@endif

@if (!empty($js)) 
@foreach ($js as $value) 
<script src="{{ url('public/backend/assets/js/customjs/'.$value) }}" type="text/javascript"></script>
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
<script type="text/javascript">
    $(window).on('load', function() {
        ClassicEditor.create(document.querySelector('#classic-editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>