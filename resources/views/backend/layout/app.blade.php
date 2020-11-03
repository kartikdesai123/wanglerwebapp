<!DOCTYPE html>
<html lang="en">
    @include('backend.include.header')
    <body class="background-img-2">
        @include('backend.include.sidebar')
            @include('backend.include.bodyheader')
            <div class="pcoded-main-container">
                <div class="pcoded-content">
                    @include('backend.include.breadcrumb')
                        @yield('content')
                </div>
            </div>
            @include('backend.include.bodyfooter')
        @include('backend.include.footer')
    </body>
</html>
