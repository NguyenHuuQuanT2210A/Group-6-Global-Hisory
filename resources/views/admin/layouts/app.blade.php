<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title","AdminLTE 3 | Dashboard")</title>
    @yield("before_css")
    @include('admin.layouts.head')
    @yield("after_css")
</head>
<body class="fixed-navbar">
<div class="page-wrapper">

{{--    @include('admin.layouts.navbar')--}}
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
            @yield('content')
        <!-- END PAGE CONTENT-->
        @include('admin.layouts.footer')
    </div>


</div>

<!-- BEGIN THEME CONFIG PANEL-->
@include('admin.layouts.config_panel')
<!-- END THEME CONFIG PANEL-->

<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->

@yield("before_js")
@include('admin.layouts.scripts')
@yield("after_js")
</body>
</html>
