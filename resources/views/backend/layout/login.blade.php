<!DOCTYPE html>
<html lang="en">

<head>

	<title>{{ $title }}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ url('public/backend/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ url('public/backend/assets/css/plugins/toastr/toastr.min.css') }}">
        
        @if (!empty($plugincss)) 
            @foreach ($plugincss as $value) 
                @if(!empty($value))
                    <link rel="stylesheet" href="{{ url('public/backend/assets/css/plugins'.$value) }}">
                @endif
            @endforeach
        @endif
        @if (!empty($css)) 
        @foreach ($css as $value) 
        @if(!empty($value))
            <link rel="stylesheet" href="{{ url('public/backend/assets/css/'.$value) }}">
        @endif
        @endforeach
        @endif
        <script>
                var baseurl = "{{ asset('/') }}";
        </script>
</head>

    @yield('content')
    

<script src="{{ url('public/backend/assets/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ url('public/backend/assets/js/vendor-all.min.js') }}"></script>
<script src="{{ url('public/backend/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ url('public/backend/assets/js/ripple.js') }}"></script>
<script src="{{ url('public/backend/assets/js/pcoded.min.js') }}"></script>
<script src="{{ url('public/backend/assets/js/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ url('public/backend/assets/js/comman_function.js') }}"></script>

    @if (!empty($pluginjs)) 
        @foreach ($pluginjs as $value) 
            <script src="{{ url('public/backend/assets/js/plugins/'.$value) }}" type="text/javascript"></script>
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

</body>