
<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="wrap-menu-header gradient1 trans-0-4">
        <div class="container h-full">
            <div class="wrap_header trans-0-3">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{ url("/") }}">
                        <img src="https://www.globalhistorylab.com/wp-content/uploads/cropped-dark-red-logo-center.png" alt="IMG-LOGO" data-logofixed="https://www.globalhistorylab.com/wp-content/uploads/cropped-dark-red-logo-center.png">
                    </a>
                </div>

                <!-- Menu -->
                <div class="wrap_menu p-l-0-xl">
                    <nav class="menu">
                        <ul class="main_menu">
                            <li>
                                <a href="{{ url("/") }}">Home</a>
                            </li>

                            <li>
                                <a href="{{ url("forum/") }}">Forum</a>
                            </li>

                            <li>
                                <a href="{{ url("event/") }}">Event</a>
                            </li>

                            <li>
                                <a href="{{ url("about_us") }}">About</a>
                            </li>

                            <li>
                                <a href="{{ url("blog/") }}">Blog</a>
                            </li>

                            <li>
                                <a href="{{ url("contact") }}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Social -->
                <div class="social flex-w flex-l-m p-r-20">
                    <a href="#"><i class="fa-brands fa-instagram m-l-21" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook-f m-l-21" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter m-l-21" aria-hidden="true"></i></a>
                    <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                </div>

                <div class="social flex-w flex-l-m">
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

{{--                        <img src="images/avatar-01.jpg" class="user-pic" onclick="toggleMenu()">--}}
{{--                        <div class="sub-menu-wrap" id="subMenu">--}}
{{--                            <div class="sub-menu">--}}
{{--                                <div class="user-info">--}}
{{--                                    <img src="images/avatar-01.jpg">--}}
{{--                                    <h3> User1 </h3>--}}
{{--                                </div>--}}
{{--                                <hr>--}}

{{--                                <a href="#" class="sub-menu-link">--}}
{{--                                    <img src="images/avatar-01.jpg">--}}
{{--                                    <p>Edit Profile</p>--}}
{{--                                    <span> > </span>--}}
{{--                                </a>--}}

{{--                                <a href="#" class="sub-menu-link">--}}
{{--                                    <img src="images/setting.png">--}}
{{--                                    <p>Settings and Privacy</p>--}}
{{--                                    <span> > </span>--}}
{{--                                </a>--}}

{{--                                <a href="#" class="sub-menu-link">--}}
{{--                                    <img src="images/help.png">--}}
{{--                                    <p>Help & Support</p>--}}
{{--                                    <span> > </span>--}}
{{--                                </a>--}}

{{--                                <a href="#" class="sub-menu-link">--}}
{{--                                    <img src="images/logout.png">--}}
{{--                                    <p>Logout</p>--}}
{{--                                    <span> > </span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                </div>
                <!-- Sidebar -->
                <aside class="sidebar trans-0-4">
                    <!-- Button Hide sidebar -->
                    <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

                    <!-- - -->
                    <ul class="menu-sidebar p-t-95 p-b-70">
                        <li class="t-center m-b-13">
                            <a href="index.html" class="txt19">Home</a>
                        </li>

                        <li class="t-center m-b-13">
                            <a href="menu.html" class="txt19">Menu</a>
                        </li>

                        <li class="t-center m-b-13">
                            <a href="gallery.html" class="txt19">Gallery</a>
                        </li>

                        <li class="t-center m-b-13">
                            <a href="about.html" class="txt19">About</a>
                        </li>

                        <li class="t-center m-b-13">
                            <a href="blog.html" class="txt19">Blog</a>
                        </li>

                        <li class="t-center m-b-33">
                            <a href="contact.html" class="txt19">Contact</a>
                        </li>
                    </ul>
                </aside>
            </div>

        </div>
    </div>
</header>
