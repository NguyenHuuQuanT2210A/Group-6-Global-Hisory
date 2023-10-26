
@php
    $categories = \App\Models\Category::all();
    $posts_trending = \App\Models\Post::orderByDesc("created_at")->limit(5)->get();
@endphp


<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
            <form action="#">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder='Search Keyword'
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                        <div class="input-group-append">
                            <button class="btns" type="button"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>
                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                        type="submit">Search</button>
            </form>
        </aside>
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Category</h4>
            <ul class="list cat-list">
                @foreach($categories as $item)
                    <li>
                        <a href="#" class="d-flex">
                            <p>{{ $item->name }}</p>
                            <p>({{ $item->Post->count()}})</p>
                        </a>
                    </li>
                @endforeach


            </ul>
        </aside>
        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title">Recent Post</h3>
            @foreach($posts_trending as $item)
                <div class="media post_item">
                    <img  src="{{ $item->thumbnail }}" style="width: 80px;height: 80px" alt="post">
                    <div class="media-body">
                        <a href="{{ url("single",['post'=>$item->slug]) }}">
                            <h3>{{ $item->title }}</h3>
                        </a>
                        <p>{{ $item->created_at->toDateString() }}</p>
                    </div>
                </div>
            @endforeach

        </aside>
        <aside class="single_sidebar_widget tag_cloud_widget">
            <h4 class="widget_title">Tag Clouds</h4>
            <ul class="list">
                <li>
                    <a href="#">project</a>
                </li>
                <li>
                    <a href="#">love</a>
                </li>
                <li>
                    <a href="#">technology</a>
                </li>
                <li>
                    <a href="#">travel</a>
                </li>
                <li>
                    <a href="#">restaurant</a>
                </li>
                <li>
                    <a href="#">life style</a>
                </li>
                <li>
                    <a href="#">design</a>
                </li>
                <li>
                    <a href="#">illustration</a>
                </li>
            </ul>
        </aside>
        <aside class="single_sidebar_widget newsletter_widget">
            <h4 class="widget_title">Newsletter</h4>
            <form action="#">
                <div class="form-group">
                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                </div>
                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                        type="submit">Subscribe</button>
            </form>
        </aside>
    </div>
</div>
