<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <base href="/">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield("title","Global History")</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">


    @yield("before_css")
    @include("user.layouts.head")
    @yield("after_css")
</head>

<body>
{{-- Preloader Start --}}
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div>
{{-- Preloader Start --}}

@include("user.layouts.header")

{{--@include("user.layouts.nav")--}}


    @yield("content")

@include("user.layouts.footer")

@yield("before_js")
@include("user.layouts.scripts")
@yield("after_js")
</body>
</html>
