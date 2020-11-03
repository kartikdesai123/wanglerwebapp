<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    
                </div>
                <ul class="breadcrumb">
                    @php 
                        $count = count($header['breadcrumb']); 
                        $temp = 1;
                        @endphp 
                        @foreach($header['breadcrumb'] as $key => $value)

                        @php $value = (empty($value)) ? 'javascript:;' : $value; @endphp
                            @if($temp!=$count)
                                <li class="breadcrumb-item">
                                    <a href="{{ $value }}">
                                        @if($temp == 1)<i class="feather icon-home"></i>@endif {{ $key }}
                                    </a>
                                </li>
                            @else
                                <li class="breadcrumb-item" style="color: white"> {{ $key }} </li>
                            @endif

                        @php $temp = $temp+1; @endphp
                        @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <!-- support-section start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card support-bar overflow-hidden">
                    <div class="card-body pb-0">
                        <h2 class="m-0">{{$header['title']}}</h2>
                        <span class="text-c-blue">&nbsp;</span>

                    </div>

                    <div class="card-footer bg-primary text-white">
                        <div class="row text-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>