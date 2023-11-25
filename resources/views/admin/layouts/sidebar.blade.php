<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="./assets/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">James Brown</div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a href="{{ "admin/dashboard" }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Tables</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url("admin/user") }}">User</a>
                    </li>
                    <li>
                        <a href="{{ url("admin/category/") }}">Category</a>
                    </li>
                    <li>
                        <a href="{{ url("admin/tag/") }}">Tag</a>
                    </li>
                    <li>
                        <a href="{{ url("admin/post/") }}">Post</a>
                    </li>
                    <li>
                        <a href="{{ url("admin/blog/") }}">Blog</a>
                    </li>
                    <li>
                        <a href="{{ url("admin/event/") }}">Event</a>
                    </li>
                    <li>
                        <a href="{{ url("admin/event/user_event") }}">User Event</a>
                    </li>
                </ul>
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
