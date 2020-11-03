<!DOCTYPE html>
<html lang="en">
    @include('frontend.include.header')
    <body>
            @include('frontend.include.bodyheader')
            <div class="pcoded-main-container">
                <div class="pcoded-content">
                        @yield('content')
                </div>
            </div>
            @include('frontend.include.bodyfooter')
        @include('frontend.include.footer')
    </body>
</html>
