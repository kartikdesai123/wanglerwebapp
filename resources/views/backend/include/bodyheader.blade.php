@php
$session = Session::all();
@endphp
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">


    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" ><span></span></a>
        <a href="#!" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                <div class="search-bar">
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            @if( $session['logindata'][0]['profileimage'] ==  '' || $session['logindata'][0]['profileimage'] == null )
                            <img class="img-radius img-fluid wid-100" src="{{ url('public/images/profileimages/images.png') }}" alt="User image">&nbsp;&nbsp;
                            <span>John Doe</span>
                            @else
                            <img class="img-radius img-fluid wid-100" src="{{ url('public/images/profileimages/'.$session["logindata"][0]["profileimage"]) }}" alt="User image">&nbsp;&nbsp;
                            <span><span>{{ $session['logindata'][0]['fname'] .' '. $session['logindata'][0]['lname'] }}</span></span>
                            @endif

                            <a href="{{ route("logout")}}" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="{{ route("profile")}}" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                            <li><a href="{{ route("changepassword")}}" class="dropdown-item"><i class="feather icon-edit-2"></i> Change Password</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>


</header>