@php
    $categories = \App\Models\Category::all();
    $posts_trending = \App\Models\Post::orderByDesc("created_at")->limit(5)->get();
@endphp

<div class="header-bottom header-sticky">
    <div class="">
        <div class="row align-items-center " style="font-size:17px;">
            <div class="col-xl-2 col-lg-4 col-md-4 "><a href="{{ url("/") }}" style="margin-left:40px;"><img src="assets/img/logo/logo.png" alt=""></a> </div>
            <div class="col-xl-7 col-lg-8 col-md-8 header-flex" style="display: flex">
                <div class="main-menu d-none d-md-block" style="display:inline-flex; ">
                    <nav>
                        <ul class="naviagation-header" id="navigation">
                            <li ><a href="{{ url("/") }}">Home</a></li>
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
                <div class="nav-search search-switch">
                    <i class="fa fa-search" style="margin-top: 5px"></i>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-md-3 " >

                <div style=" float:right;margin-right: 40px; display: inline-block; width: 85%" >

                    @auth()
                        <a href="#"><i class="fa fa-user"></i> {{ auth()->user()->name }}</a>
                        <div style=" display:inline-block; margin-left: 12px">
                            <form id="form-logout" action="{{ route("logout") }}" method="post">
                                @csrf
                            </form>

                            <a style="margin-right: 10px" href="javascript:void(0);" onclick="$('#form-logout').submit();">
                                <i class="fa fa-align-right"></i> Logout</a>
                        </div>




                    @endauth

                    @guest()
<a href="{{ route("login") }}" style="margin-right: 12px;"><i class="fa fa-user" ></i> Login</a>
<a href="{{ route("register") }}"><i class="fa fa-user"></i> Register</a>

@endguest



</div>
</div>


<!-- Mobile Menu -->
<div class="col-12">
    <div class="mobile_menu d-block d-md-none"></div>
</div>
</div>
</div>
</div>
