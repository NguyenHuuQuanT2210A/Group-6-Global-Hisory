<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title","Global History")</title>
    <meta name="description" content="">

    @yield("before_css")
    @include("user.layouts.head")
    @yield("after_css")
</head>

<body class="animsition">


@include("user.layouts.header")

{{--@include("user.layouts.nav")--}}


    @yield("content")

@include("user.layouts.footer")

@yield("before_js")
@include("user.layouts.scripts")
@yield("after_js")
</body>
</html>
