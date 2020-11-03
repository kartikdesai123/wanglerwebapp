<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>

    <meta name="description" content="Wagler Maple Products is a manufacturing leader in great taste and innovation. With years of experience, we are providing outstanding maple products in Canada. We are glad to be known for our exceptional taste and quality! Buy your maple products online!  "/>
    <meta name="keywords" content="maple products, wagler maple products, maple syrup supplies Ontario , maple products Canada, maple products toronto, maple syrup Wellesley Ontario , Wagler maple" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ url('public/backend/assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('public/frontend/assets/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ url('public/frontend/assets/css/fonts.css') }}" type="text/css" />
    <link href="{{ url('public/frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('public/frontend/assets/css/media-queries.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontend/assets/assets/animate.css') }}" />
    
    <link rel="stylesheet" href="{{ url('public/frontend/assets/css/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/frontend/assets/css/validationEngine.jquery.css') }}"> 
    <link href="{{ url('public/frontend/assets/css/lightbox.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('public/frontend/assets/css/superslides.css') }}">
    <script>
        var base_url = "{{ asset('/') }}";
    </script>
    @if (!empty($plugincss))
    @foreach ($plugincss as $value) 
    @if(!empty($value))
    <link rel="stylesheet" href="{{ url('public/frontend/assets/css/'.$value) }}">
    @endif
    @endforeach
    @endif


    @if (!empty($css)) 
    @foreach ($css as $value) 
    @if(!empty($value))
    <link rel="stylesheet" href="{{ url('public/frontend/assets/css'.$value) }}">
    @endif
    @endforeach
    @endif

</head>