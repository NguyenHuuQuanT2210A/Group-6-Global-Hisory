
@php
//    $categories = \App\Models\Category::all();
//    $latestPosts = \App\Models\Post::latest()->limit(5)->get();
    $latestEvents = \App\Models\Event::latest()->limit(5)->get();
@endphp


<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
            <form action="#">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input value="{{app("request")->input("search")}}" type="text" name="search"
                               class="form-control" placeholder='Search Keyword'
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

            <aside class="single_sidebar_widget popular_post_widget">
                <h3 class="widget_title">Recent Post</h3>

                @foreach($latestEvents as $item)
                    <div class="media post_item">
                        <img  src="{{ $item->thumbnail }}" style="width: 80px;height: 80px" alt="post">
                        <div class="media-body">
                            <a href="{{ url("blog_event",['event'=>$item->slug]) }}">
                                <h3>{{ $item->name }}</h3>
                            </a>
                            <span>{{ date('d M Y', strtotime($item->created_at)) }}</span>
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
