<!DOCTYPE html>
<html>
    <head>
        @include('sections/head')
    </head>
    <body>
        @include('sections.header')
        @yield('banner')
        <!--content-->
        <div class="content">
            @yield('content')
        </div>
        @include('sections.footer')
        @include('sections.script.script')
    </body>   
</html>   