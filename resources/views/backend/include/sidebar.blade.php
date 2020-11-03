@php
$currentRoute = Route::current()->getName();
$session = Session::all();
@endphp
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >

            <div class="">
                <div class="main-menu-header">
                   <div class="logo"><img style='height: 100px' src="{{ url('public/frontend/assets/images/logo.png') }}" alt="" /></div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="user-profile.html" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
                        <li class="list-inline-item"></li>
                        <li class="list-inline-item"><a href="{{ route("logout") }}" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>

                <li class="nav-item">
                    <a href="{{ route("admin-dashboard") }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-aperture"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>

<!--                <li class="nav-item">
                    <a href="{{ route("ckeditor") }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-edit"></i></span><span class="pcoded-mtext">CKeditor</span></a>
                </li>-->

               <li class="nav-item">
                    <a href="{{ route("imageeditor") }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-image"></i></span><span class="pcoded-mtext">Image Editor</span></a>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a class="nav-link "><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">Admin Settings</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route("profile")}}">My Profile</a></li>
                        <li><a href="{{ route("changepassword")}}">Change Password</a></li>
						<li><a href="{{ route("color-change")}}">Color Change</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a class="nav-link "><span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span><span class="pcoded-mtext">Products</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route("manage-product")}}">Manage Products</a></li>
                        <li><a href="{{ route("category")}}">Category</a></li>
                    </ul>
                </li>

                <li class="nav-item {{ ($currentRoute == 'addpages' || $currentRoute == 'editpages'   ? 'active' : '') }}">
                    <a href="{{ route("pages") }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Static Pages</span></a>
                </li>

                <li class="nav-item {{ ($currentRoute == 'silder'   ? 'active' : '') }}">
                    <a href="{{ route("silder") }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-film"></i></span><span class="pcoded-mtext">Silder</span></a>
                </li>

                <li class="nav-item {{ ($currentRoute == 'admin-news' ||  $currentRoute == 'addnews' || $currentRoute == 'editnews'  ? 'active' : '') }}">
                    <a href="{{ route("admin-news") }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-volume-2"></i></span><span class="pcoded-mtext">News</span></a>
                </li>

                <li class="nav-item {{ ($currentRoute == 'gallay-image'  ? 'active' : '') }}">
                    <a href="{{ route("gallay-image") }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-image"></i></span><span class="pcoded-mtext">Gallery Images</span></a>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a class="nav-link "><span class="pcoded-micon"><i class="feather icon-package"></i></span><span class="pcoded-mtext">Stores</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route("manage-city")}}">Manage City</a></li>
                        <li><a href="{{ route("stores")}}">Stores</a></li>
                    </ul>
                </li>

                <li class="nav-item {{ ($currentRoute == 'admin-video'  ? 'active' : '') }}">
                    <a href="{{ route("admin-video") }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-video"></i></span><span class="pcoded-mtext">Video</span></a>
                </li>


            </ul>



        </div>
    </div>
</nav>