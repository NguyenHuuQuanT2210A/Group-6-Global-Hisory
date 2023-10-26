@php
    $categories = \App\Models\Category::all();
    $posts_trending = \App\Models\Post::orderByDesc("created_at")->limit(5)->get();
@endphp

<div class="header-bottom header-sticky">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                <!-- sticky -->
                <div class="sticky-logo">
                    <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                </div>
                <!-- Main-menu -->
                <div class="main-menu d-none d-md-block">
                    <nav>
                        <ul id="navigation">
                            <li><a href="{{ url("/") }}">Home</a></li>
                            <li><a href="{{ url("category") }}">Category</a>
                                <ul class="submenu">
                                    @foreach($categories as $item)
                                        <li><a href="{{ url("category",['category'=>$item->slug]) }}">{{ $item->name }}</a></li>
                                    @endforeach

                                </ul>
                            </li>
{{--                            <li><a href="{{ url("blog") }}">Blog</a></li>--}}
                            <li><a href="{{ url("event") }}">Event</a></li>
                            <li><a href="{{ url("about_us") }}">About</a></li>
                            <li><a href="{{ url("contact") }}">Contact</a></li>
                            <li><a href="{{ url("create_blog") }}">Create Blog</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="header-right f-right d-none d-lg-block">
                    <!-- Heder social -->
                    <ul class="header-social">
                        <li><a href="https://www.fb.com/sai4ull"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li> <a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                    <!-- Search Nav -->
                    <div class="nav-search search-switch">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl col-lg-4 col-md-4 header-flex">
                @auth()
                    <a href="#"><i class="fa fa-user"></i> {{ auth()->user()->name }}</a>
                    <form id="form-logout" action="{{ route("logout") }}" method="post">
                        @csrf
                    </form>
                    <a href="javascript:void(0);" onclick="$('#form-logout').submit();">
                        <i class="fa fa-align-right"></i>Logout</a>
                @endauth
                @guest()
                    <a href={{ route("login") }}><i class="fa fa-user"></i> Login</a>
                    <a href={{ route("register") }}><i class="fa fa-user"></i> Register</a>

                @endguest
            </div>
            <!-- Mobile Menu -->
            <div class="col-12">
                <div class="mobile_menu d-block d-md-none"></div>
            </div>
        </div>
    </div>
</div>
