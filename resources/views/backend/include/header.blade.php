<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ url('public/backend/assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ url('public/backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('public/backend/assets/css/plugins/toastr/toastr.min.css') }}">
    <script>
        var base_url = "{{ asset('/') }}";
    </script>
    @if (!empty($plugincss))
    @foreach ($plugincss as $value) 
    @if(!empty($value))
    <link rel="stylesheet" href="{{ url('public/backend/assets/css/'.$value) }}">
    @endif
    @endforeach
    @endif


    @if (!empty($css)) 
    @foreach ($css as $value) 
    @if(!empty($value))
    <link rel="stylesheet" href="{{ url('public/backend/assets/css'.$value) }}">
    @endif
    @endforeach
    @endif
    <script>
        var baseurl = "{{ asset('') }}";
    </script>
</head>