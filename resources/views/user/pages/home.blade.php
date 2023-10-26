@extends("user.layouts.app")

@section("content")
    <main>

        <!-- Trending Area Start -->
        <div class="trending-area fix pt-25 gray-bg">
            <div class="container">
                <div class="trending-main">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            <div class="slider-active">
                                <!-- Single -->
                                @foreach($post_slider as $item)
                                    <div class="single-slider">
                                        <div class="trending-top mb-30">
                                            <div class="trend-top-img">
                                                <img src="{{ $item->thumbnail }}" style="width: 770px;height: 662px" alt="">
                                                <div class="trend-top-cap">
                                                    <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">{{ $item->Category->name }}</span>
                                                    <h2><a href="{{ url("single",['post'=>$item->slug]) }}" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{ $item->title }}</a></h2>
                                                    <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">by  {{ $item->User->name}}  -   {{ $item->created_at->toDateString() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- Right content -->
                        <div class="col-lg-4">
                            <!-- Trending Top -->
                            <div class="row">
                                @foreach($post_slider_row as $item)
                                    <div class="col-lg-12 col-md-6 col-sm-6">
                                        <div class="trending-top mb-30">
                                            <div class="trend-top-img">
                                                <img src="{{ $item->thumbnail }}" style="width: 370px;height: 200px" alt="">
                                                <div class="trend-top-cap trend-top-cap2">
                                                    <span class="bgb">{{ $item->Category->name }}</span>
                                                    <h2><a href="{{ url("single",['post'=>$item->slug]) }}">{{ $item->title }}</a></h2>
                                                    <p>by  {{ $item->User->name}}  -   {{ $item->created_at->toDateString() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->

        <!--   Weekly2-News start -->
        <div class="weekly2-news-area pt-50 pb-30 gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <div class="row">
                        <!-- Banner -->
                        <div class="col-lg">
                            <div class="slider-wrapper">
                                <!-- section Tittle -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-tittle mb-30">
                                            <h3>Trending</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Slider -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="weekly2-news-active d-flex">
                                            <!-- Single -->
                                            @foreach($posts_trending as $item)
                                                <div class="weekly2-single">
                                                    <div class="weekly2-img">
                                                        <img src="{{ $item->thumbnail }}" style="width: 345px; height: 222px" alt="">
                                                    </div>
                                                    <div class="weekly2-caption">
                                                        <h4><a href="{{ url("single",['post'=>$item->slug]) }}">{{ $item->title }}</a></h4>
                                                        <p>{{ $item->User->name }}  |  2 hours ago</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->

        <!--   Weekly2-News start -->
        <div class="weekly2-news-area pt-50 pb-30 gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <div class="row">
                        <!-- Banner -->
                        <div class="col-lg">
                            <div class="slider-wrapper">
                                <!-- section Tittle -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-tittle mb-30">
                                            <h3>Most Popular</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Slider -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="weekly2-news-active d-flex">
                                            <!-- Single -->
                                            @foreach($posts_trending as $item)
                                                <div class="weekly2-single">
                                                    <div class="weekly2-img">
                                                        <img src="{{ $item->thumbnail }}" style="width: 345px; height: 222px" alt="">
                                                    </div>
                                                    <div class="weekly2-caption">
                                                        <h4><a href="{{ url("single",['post'=>$item->slug]) }}">{{ $item->title }}</a></h4>
                                                        <p>{{ $item->User->name }}  |  2 hours ago</p>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->

        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="whats-news-wrapper">
                            <!-- Heading & Nav Button -->
                            <div class="row justify-content-between align-items-end mb-15">
                                <div class="col-xl">
                                    <div class="section-tittle mb-30">
                                        <h3>Lịch sử phương Đông</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab content -->
                            <div class="row">
                                <div class="col-12">
                                    <!-- Nav Card -->
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- card one -->
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                @foreach($post_view_top as $item)
                                                    <div class="col-xl-6 col-lg-12">
                                                        <div class="whats-news-single mb-40 mb-40">
                                                            <div class="whates-img">
                                                                <img src="{{ $item->thumbnail }}" style="width: 320px;height: 218px" alt="">
                                                            </div>
                                                            <div class="whates-caption">
                                                                <h4><a href="{{ url("single",['post'=>$item->slug]) }}">{{ $item->title }}</a></h4>
                                                                <span>by {{ $item->User->name }}   -   {{ $item->created_at->toDateString() }}</span>
                                                                <p>{{\Illuminate\Support\Str::limit($item->body , 100 ,'...') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <!-- Right single caption -->

                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        @foreach($posts_trending as $item)
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20">
                                                                    <div class="whats-right-img">
                                                                        <img src="{{ $item->thumbnail }}" style="width: 124px;height: 104px" alt="">
                                                                    </div>
                                                                    <div class="whats-right-cap">
                                                                        <h4><a href="{{ url("single",['post'=>$item->slug]) }}">{{ $item->title }}</a></h4>
                                                                        <p>by {{ $item->User->name }}   -  {{ $item->created_at->toDateString() }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card two -->
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                <div class="col-xl-6">
                                                    <div class="whats-news-single mb-40">
                                                        <div class="whates-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="#">Secretart for Economic Air
                                                                    plane that looks like</a></h4>
                                                            <span>by Alice cloe   -   Jun 19, 2020</span>
                                                            <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right single caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorg">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorr">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card three -->
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                <div class="col-xl-6">
                                                    <div class="whats-news-single mb-40">
                                                        <div class="whates-img">
                                                            <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="#">Secretart for Economic Air
                                                                    plane that looks like</a></h4>
                                                            <span>by Alice cloe   -   Jun 19, 2020</span>
                                                            <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right single caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorg">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorr">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card fure -->
                                        <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                <div class="col-xl-6">
                                                    <div class="whats-news-single mb-40">
                                                        <div class="whates-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="#">Secretart for Economic Air
                                                                    plane that looks like</a></h4>
                                                            <span>by Alice cloe   -   Jun 19, 2020</span>
                                                            <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right single caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorg">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorr">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card Five -->
                                        <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                <div class="col-xl-6">
                                                    <div class="whats-news-single mb-40">
                                                        <div class="whates-img">
                                                            <img src="assets/img/gallery/whats_news_details1.png" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="#">Secretart for Economic Air
                                                                    plane that looks like</a></h4>
                                                            <span>by Alice cloe   -   Jun 19, 2020</span>
                                                            <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right single caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorg">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorr">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Nav Card -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">

                        <!-- Most Recent Area -->
                        <div class="most-recent-area" style="padding: 30px 10px 6px">
                            <!-- Section Tittle -->
                            <div class="small-tittle mb-20">
                                <h4>Most Recent</h4>
                            </div>
                            <!-- Details -->
                            <div class="most-recent mb-40">
                                <div class="most-recent-img">
                                    <img src="assets/img/gallery/most_recent.png" style="width: 330px;height: 220px" alt="">
                                    <div class="most-recent-cap">
                                        <span class="bgbeg">Vogue</span>
                                        <h4><a href="latest_news.html">What to Wear: 9+ Cute Work <br>
                                                Outfits to Wear This.</a></h4>
                                        <p>Jhon  |  2 hours ago</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single -->
                            <div class="most-recent-single">
                                <div class="most-recent-images">
                                    <img src="assets/img/gallery/most_recent1.png"  alt="">
                                </div>
                                <div class="most-recent-capt">
                                    <h4><a href="latest_news.html">Scarlett’s disappointment at latest accolade</a></h4>
                                    <p>Jhon  |  2 hours ago</p>
                                </div>
                            </div>
                            <!-- Single -->
                            <div class="most-recent-single">
                                <div class="most-recent-images">
                                    <img src="assets/img/gallery/most_recent2.png" alt="">
                                </div>
                                <div class="most-recent-capt">
                                    <h4><a href="latest_news.html">Most Beautiful Things to Do in Sidney with Your BF</a></h4>
                                    <p>Jhon  |  3 hours ago</p>
                                </div>
                            </div>
                            <!-- Single -->
                            <div class="most-recent-single">
                                <div class="most-recent-images">
                                    <img src="assets/img/gallery/most_recent2.png" alt="">
                                </div>
                                <div class="most-recent-capt">
                                    <h4><a href="latest_news.html">Most Beautiful Things to Do in Sidney with Your BF</a></h4>
                                    <p>Jhon  |  3 hours ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="whats-news-wrapper">
                            <!-- Heading & Nav Button -->
                            <div class="row justify-content-between align-items-end mb-15">
                                <div class="col-xl">
                                    <div class="section-tittle mb-30">
                                        <h3>Lịch sử phương Tây</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab content -->
                            <div class="row">
                                <div class="col-12">
                                    <!-- Nav Card -->
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- card one -->
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                @foreach($post_view_top as $item)
                                                    <div class="col-xl-6 col-lg-12">
                                                        <div class="whats-news-single mb-40 mb-40">
                                                            <div class="whates-img">
                                                                <img src="{{ $item->thumbnail }}" style="width: 320px;height: 218px" alt="">
                                                            </div>
                                                            <div class="whates-caption">
                                                                <h4><a href="{{ url("single",['post'=>$item->slug]) }}">{{ $item->title }}</a></h4>
                                                                <span>by {{ $item->User->name }}   -   {{ $item->created_at->toDateString() }}</span>
                                                                <p>{{\Illuminate\Support\Str::limit($item->body , 100 ,'...') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <!-- Right single caption -->

                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        @foreach($posts_trending as $item)
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20">
                                                                    <div class="whats-right-img">
                                                                        <img src="{{ $item->thumbnail }}" style="width: 124px;height: 104px" alt="">
                                                                    </div>
                                                                    <div class="whats-right-cap">
                                                                        <h4><a href="{{ url("single",['post'=>$item->slug]) }}">{{ $item->title }}</a></h4>
                                                                        <p>by {{ $item->User->name }}   -  {{ $item->created_at->toDateString() }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card two -->
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                <div class="col-xl-6">
                                                    <div class="whats-news-single mb-40">
                                                        <div class="whates-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="#">Secretart for Economic Air
                                                                    plane that looks like</a></h4>
                                                            <span>by Alice cloe   -   Jun 19, 2020</span>
                                                            <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right single caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorg">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorr">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card three -->
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                <div class="col-xl-6">
                                                    <div class="whats-news-single mb-40">
                                                        <div class="whates-img">
                                                            <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="#">Secretart for Economic Air
                                                                    plane that looks like</a></h4>
                                                            <span>by Alice cloe   -   Jun 19, 2020</span>
                                                            <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right single caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorg">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorr">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card fure -->
                                        <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                <div class="col-xl-6">
                                                    <div class="whats-news-single mb-40">
                                                        <div class="whates-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="#">Secretart for Economic Air
                                                                    plane that looks like</a></h4>
                                                            <span>by Alice cloe   -   Jun 19, 2020</span>
                                                            <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right single caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorg">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorr">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card Five -->
                                        <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                <div class="col-xl-6">
                                                    <div class="whats-news-single mb-40">
                                                        <div class="whates-img">
                                                            <img src="assets/img/gallery/whats_news_details1.png" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="#">Secretart for Economic Air
                                                                    plane that looks like</a></h4>
                                                            <span>by Alice cloe   -   Jun 19, 2020</span>
                                                            <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right single caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorg">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorr">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Nav Card -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="whats-news-wrapper">
                            <!-- Heading & Nav Button -->
                            <div class="row justify-content-between align-items-end mb-15">
                                <div class="col-xl">
                                    <div class="section-tittle mb-30">
                                        <h3>Lịch sử Tổng hợp</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab content -->
                            <div class="row">
                                <div class="col-12">
                                    <!-- Nav Card -->
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- card one -->
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                @foreach($post_view_top as $item)
                                                    <div class="col-xl-6 col-lg-12">
                                                        <div class="whats-news-single mb-40 mb-40">
                                                            <div class="whates-img">
                                                                <img src="{{ $item->thumbnail }}" style="width: 320px;height: 218px" alt="">
                                                            </div>
                                                            <div class="whates-caption">
                                                                <h4><a href="{{ url("single",['post'=>$item->slug]) }}">{{ $item->title }}</a></h4>
                                                                <span>by {{ $item->User->name }}   -   {{ $item->created_at->toDateString() }}</span>
                                                                <p>{{\Illuminate\Support\Str::limit($item->body , 100 ,'...') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <!-- Right single caption -->

                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        @foreach($posts_trending as $item)
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20">
                                                                    <div class="whats-right-img">
                                                                        <img src="{{ $item->thumbnail }}" style="width: 124px;height: 104px" alt="">
                                                                    </div>
                                                                    <div class="whats-right-cap">
                                                                        <h4><a href="{{ url("single",['post'=>$item->slug]) }}">{{ $item->title }}</a></h4>
                                                                        <p>by {{ $item->User->name }}   -  {{ $item->created_at->toDateString() }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card two -->
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                <div class="col-xl-6">
                                                    <div class="whats-news-single mb-40">
                                                        <div class="whates-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="#">Secretart for Economic Air
                                                                    plane that looks like</a></h4>
                                                            <span>by Alice cloe   -   Jun 19, 2020</span>
                                                            <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right single caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorg">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorr">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card three -->
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                <div class="col-xl-6">
                                                    <div class="whats-news-single mb-40">
                                                        <div class="whates-img">
                                                            <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="#">Secretart for Economic Air
                                                                    plane that looks like</a></h4>
                                                            <span>by Alice cloe   -   Jun 19, 2020</span>
                                                            <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right single caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorg">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorr">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card fure -->
                                        <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                <div class="col-xl-6">
                                                    <div class="whats-news-single mb-40">
                                                        <div class="whates-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="#">Secretart for Economic Air
                                                                    plane that looks like</a></h4>
                                                            <span>by Alice cloe   -   Jun 19, 2020</span>
                                                            <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right single caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorg">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorr">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card Five -->
                                        <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                <div class="col-xl-6">
                                                    <div class="whats-news-single mb-40">
                                                        <div class="whates-img">
                                                            <img src="assets/img/gallery/whats_news_details1.png" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="#">Secretart for Economic Air
                                                                    plane that looks like</a></h4>
                                                            <span>by Alice cloe   -   Jun 19, 2020</span>
                                                            <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right single caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <!-- single -->
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorb">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorg">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                    <span class="colorr">FASHION</span>
                                                                    <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                                    <p>Jun 19, 2020</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Nav Card -->
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- Whats New End -->

        <!--   Weekly3-News start -->
        <div class="weekly3-news-area pt-80 pb-130">
            <div class="container">
                <div class="weekly3-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-wrapper">
                                <!-- Slider -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="weekly3-news-active dot-style d-flex">
                                            <div class="weekly3-single">
                                                <div class="weekly3-img">
                                                    <img src="assets/img/gallery/weekly2News1.png" alt="">
                                                </div>
                                                <div class="weekly3-caption">
                                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                    <p>19 Jan 2020</p>
                                                </div>
                                            </div>
                                            <div class="weekly3-single">
                                                <div class="weekly3-img">
                                                    <img src="assets/img/gallery/weekly2News2.png" alt="">
                                                </div>
                                                <div class="weekly3-caption">
                                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                    <p>19 Jan 2020</p>
                                                </div>
                                            </div>
                                            <div class="weekly3-single">
                                                <div class="weekly3-img">
                                                    <img src="assets/img/gallery/weekly2News3.png" alt="">
                                                </div>
                                                <div class="weekly3-caption">
                                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                    <p>19 Jan 2020</p>
                                                </div>
                                            </div>
                                            <div class="weekly3-single">
                                                <div class="weekly3-img">
                                                    <img src="assets/img/gallery/weekly2News4.png" alt="">
                                                </div>
                                                <div class="weekly3-caption">
                                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                    <p>19 Jan 2020</p>
                                                </div>
                                            </div>
                                            <div class="weekly3-single">
                                                <div class="weekly3-img">
                                                    <img src="assets/img/gallery/weekly2News2.png" alt="">
                                                </div>
                                                <div class="weekly3-caption">
                                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                    <p>19 Jan 2020</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->
        <!-- banner-last Start -->
        <div class="banner-area gray-bg pt-90 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10">
                        <div class="banner-one">
                            <img src="assets/img/gallery/body_card3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner-last End -->
    </main>
@endsection
