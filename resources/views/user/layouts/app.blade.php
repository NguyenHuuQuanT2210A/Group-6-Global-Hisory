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

{{--<div style="position: absolute;width: 400px; top: 85px;left: 1060px;z-index: 10000000000000000000000000000">--}}
{{--    @if ($errors->any())--}}
{{--        <div>--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li class="text-danger">{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    @if(\Illuminate\Support\Facades\Session::has('success'))--}}
{{--        <div class="alert alert-success  fade show" style="display: flex" role="alert">--}}
{{--            <div>--}}
{{--            <strong>Success!</strong> {{ \Illuminate\Support\Facades\Session::get('success') }}</div>--}}
{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--</div>--}}

@include("user.layouts.header")

{{--@include("user.layouts.nav")--}}


    @yield("content")

@include("user.layouts.footer")

@yield("before_js")
@include("user.layouts.scripts")
@yield("after_js")
</body>
</html>
