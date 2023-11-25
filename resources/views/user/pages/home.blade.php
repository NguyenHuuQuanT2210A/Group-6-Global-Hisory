@extends("user.layouts.app")

@section("content")
    <body class="animsition">
    <!-- Slide1 -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1" style="background-image: url(https://images.baodantoc.vn/uploads/2022/Th%C3%A1ng%204/Ng%C3%A0y_28/Anh/untitled%20folder/3_Hand_Luggage_Only.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Welcome to
						</span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            global history
                        </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                            <!-- Button1 -->
                            <a href="{{ url("forum") }}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                explore forum
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item-slick1 item3-slick1" style="background-image: url(https://tuhoctiengtrung.vn/wp-content/uploads/2018/10/hinh-anh-nhung-thang-canh-dep-nhat-trung-quoc-khien-ban-ngo-ngang-4.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
							Welcome to
						</span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                            global history
                        </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
                            <!-- Button1 -->
                            <a href="{{ url("forum") }}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                explore forum
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item-slick1 item2-slick1" style="background-image: url(https://vcdn1-kinhdoanh.vnecdn.net/2019/04/17/rome-3550739.jpg?w=680&h=0&q=100&dpr=2&fit=crop&s=XPGnHCCeRaWXuxNVnsAxcg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							Welcome to
						</span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                            global history
                        </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
                            <!-- Button1 -->
                            <a href="{{ url("forum") }}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                explore forum
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="wrap-slick1-dots"></div>
        </div>
    </section>

    <!-- Welcome -->
    <section class="section-welcome bg1-pattern p-t-120 p-b-105">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-t-45 p-b-30">
                    <div class="wrap-text-welcome t-center">
						<span class="tit2 t-center">
							global history
						</span>

                        <h3 class="tit3 t-center m-b-35 m-t-5">
                            Welcome
                        </h3>

                        <p class="t-center m-b-22 size3 m-l-r-auto">
                            Global History is a website dedicated to world history, offering readers the opportunity to explore and learn about the history of the world. The website provides diverse information on important events
                        </p>

                        <a href="{{url("about_us")}} " class="txt4">
                            Our Story
                            <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 p-b-30">
                    <div class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto">
                        <img src="https://www.worldhistorymaps.info/wp-content/uploads/2021/03/historical-world-globe.jpg" alt="IMG-OUR">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro -->
    <section class="section-intro">
        <div class="header-intro parallax100 t-center p-t-135 p-b-158" style="background-image: url(https://globalcapitalism.history.ox.ac.uk/sites/default/files/styles/listing_landscape_image/public/globalcapitalism/images/media/storck_harbour_scene.jpg?itok=Xu_h7kfK);">
			<span class="tit2 p-l-15 p-r-15">
				Discover
			</span>

            <h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
                great articles
            </h3>
        </div>

        <div class="content-intro bg-white p-t-77 p-b-133">
            <div class="container">
                <div class="row">
                    @foreach($blog_trending as $item)
                    <div class="col-md-4 p-t-30">
                        <!-- Block1 -->
                        <div class="blo1">
                            <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                                <a href="{{ url("blog/single",["blog"=>$item->slug]) }}"><img src="{{ $item->thumbnail }}" style=" height: 246px;" alt="IMG-INTRO"></a>
                            </div>

                            <div class="wrap-text-blo1 p-t-35">
                                <a href="{{ url("blog/single",["blog"=>$item->slug]) }}">
                                    <h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                        {{\Illuminate\Support\Str::limit($item->title , 20 ,'...') }}
                                    </h4></a>
                                <p class="m-b-20">
                                    {!! \Illuminate\Support\Str::limit($item->body , 100 ,'...') !!}
                                </p>

                                <a href="{{ url("blog/single",["blog"=>$item->slug]) }}" class="txt4">
                                    Learn More
                                    <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <!-- Our menu -->
    <section class="section-ourmenu bg2-pattern p-t-115 p-b-120">
        <div class="container">
            <div class="title-section-ourmenu t-center m-b-22">
				<span class="tit2 t-center">
					Discover
				</span>

                <h3 class="tit5 t-center m-t-2">
                    categories
                </h3>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @php
                        $category_blog1 = \App\Models\Category::where("id",1)->get();
                        $category_blog2 = \App\Models\Category::where("id",2)->get();
                        $category_blog3 = \App\Models\Category::where("id",3)->get();
                        $category_blog4 = \App\Models\Category::where("id",4)->get();
                        $category_blog5 = \App\Models\Category::where("id",5)->get();
                        $category_blog6 = \App\Models\Category::where("id",6)->get();
                        $category_blog7 = \App\Models\Category::where("id",7)->get();
                        @endphp
                        @foreach($category_blog1 as $item)
                        <div class="col-sm-6">
                            <!-- Item our menu -->
                            <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                                <img src="https://www.fine-art-bender.com/images/european-art-history-statue.jpg" alt="IMG-MENU">

                                <!-- Button2 -->
                                <a href="{{ url("blog/category",["category"=>$item->slug]) }}" class="btn2 flex-c-m txt5 ab-c-m size6">
                                    {{ $item->name }}
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @foreach($category_blog2 as $item)
                        <div class="col-sm-6">
                            <!-- Item our menu -->
                            <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                                <img src="https://study.com/cimages/course-image/history-100-western-civilization-from-prehistory-to-post-wwii_748915_large.jpeg" alt="IMG-MENU" style="height: 246.66px">

                                <!-- Button2 -->
                                <a href="{{ url("blog/category",["category"=>$item->slug]) }}" class="btn2 flex-c-m txt5 ab-c-m size6">
                                    {{ $item->name }}
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @foreach($category_blog3 as $item)
                        <div class="col-12">
                            <!-- Item our menu -->
                            <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                                <img src="https://mrimhotep.org/wp-content/uploads/2018/08/1abaVd1918F97QaKBc1J68g-copie.jpeg" alt="IMG-MENU">

                                <!-- Button2 -->
                                <a href="{{ url("blog/category",["category"=>$item->slug]) }}" class="btn2 flex-c-m txt5 ab-c-m size6">
                                    {{ $item->name }}
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        @foreach($category_blog4 as $item)
                        <div class="col-12">
                            <!-- Item our menu -->
                            <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                                <img src="https://liondecor.vn/wp-content/uploads/2022/12/lich-su-hoa-ky-1.jpg" alt="IMG-MENU">

                                <!-- Button2 -->
                                <a href="{{ url("blog/category",["category"=>$item->slug]) }}" class="btn2 flex-c-m txt5 ab-c-m size7">
                                    {{ $item->name }}
                                </a>
                            </div>
                        </div>
                        @endforeach
                            @foreach($category_blog5 as $item)
                        <div class="col-12">
                            <!-- Item our menu -->
                            <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                                <img src="https://aseanvietnam.vn/uploads/images/image_750x_62f237cca303a.jpg" alt="IMG-MENU" style="height: 183px">

                                <!-- Button2 -->
                                <a href="{{ url("blog/category",["category"=>$item->slug]) }}" class="btn2 flex-c-m txt5 ab-c-m size8">
                                    {{ $item->name }}
                                </a>
                            </div>
                        </div>
                            @endforeach
                                @foreach($category_blog6 as $item)
                        <div class="col-12">
                            <!-- Item our menu -->
                            <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                                <img src="https://static.independent.co.uk/2022/03/28/12/newFile-4.jpg?quality=75&width=1200&auto=webp" alt="IMG-MENU" style="height: 183px">

                                <!-- Button2 -->
                                <a href="{{ url("blog/category",["category"=>$item->slug]) }}" class="btn2 flex-c-m txt5 ab-c-m size9">
                                    {{ $item->name }}
                                </a>
                            </div>
                        </div>
                                @endforeach
                                    @foreach($category_blog7 as $item)
                        <div class="col-12">
                            <!-- Item our menu -->
                            <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                                <img src="https://static.independent.co.uk/2022/03/28/12/newFile-4.jpg?quality=75&width=1200&auto=webp" alt="IMG-MENU" style="height: 183px">

                                <!-- Button2 -->
                                <a href="{{ url("blog/category",["category"=>$item->slug]) }}" class="btn2 flex-c-m txt5 ab-c-m size9">
                                    {{ $item->name }}
                                </a>
                            </div>
                        </div>
                                    @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- Event -->
    <section class="section-event">
        <div class="wrap-slick2">
            <div class="slick2">

                @foreach($events_hot as $item)
                <div class="item-slick2 item2-slick2" style="background-image: url(https://dynamic-media-cdn.tripadvisor.com/media/photo-o/19/5b/18/01/national-museum-of-african.jpg?w=1200&h=-1&s=1);">
                    <div class="wrap-content-slide2 p-t-115 p-b-208">
                        <div class="container">
                            <!-- - -->
                            <div class="title-event t-center m-b-52">
								<span class="tit2 p-l-15 p-r-15">
									Upcomming
								</span>

                                <h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
                                    Events
                                </h3>
                            </div>

                            <!-- Block2 -->
                            <div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false" data-appear="fadeInDown">
                                <!-- Pic block2 -->
                                <a href="{{ url("event/single",["event"=>$item->slug]) }}" class="wrap-pic-blo2 bg2-blo2" style="background-image: url({{ $item->thumbnail }});">
                                    <div class="time-event size10 txt6 effect1">
										<span class="txt-effect1 flex-c-m">
											08:00 PM Tuesday - 21 November 2018
										</span>
                                    </div>
                                </a>

                                <!-- Text block2 -->
                                <div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
                                    <h4 class="tit7 t-center m-b-10">
                                        {{ $item->name }}
                                    </h4>

                                    <p class="t-center">
                                        {{ $item->description }}
                                    </p>

                                    <div class="flex-sa-m flex-w w-full m-t-40">
                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 days">
												25
											</span>

                                            <span class="dis-block t-center txt8">
												Days
											</span>
                                        </div>

                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 hours">
												12
											</span>

                                            <span class="dis-block t-center txt8">
												Hours
											</span>
                                        </div>

                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 minutes">
												59
											</span>

                                            <span class="dis-block t-center txt8">
												Minutes
											</span>
                                        </div>

                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 seconds">
												56
											</span>

                                            <span class="dis-block t-center txt8">
												Seconds
											</span>
                                        </div>
                                    </div>

                                    <a href="{{ url("event/single",["event"=>$item->slug]) }}" class="txt4 m-t-40">
                                        View Details
                                        <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>

            <div class="wrap-slick2-dots"></div>
        </div>
    </section>


    <!-- Review -->
    <section class="section-review p-t-115">
        <!-- - -->
        <div class="title-review t-center m-b-2">
			<span class="tit2 p-l-15 p-r-15">
				Customers Say
			</span>

            <h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
                Review
            </h3>
        </div>

        <!-- - -->
        <div class="wrap-slick3">
            <div class="slick3">
                <div class="item-slick3 item1-slick3">
                    <div class="wrap-content-slide3 p-b-50 p-t-50">
                        <div class="container">
                            <div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false" data-appear="zoomIn">
                                <img src="https://p16-sign-sg.tiktokcdn.com/aweme/720x720/tos-alisg-avt-0068/c4f15f4a6505a3587ab349addb537ef2.jpeg?x-expires=1699354800&x-signature=7opJCFdxekzIvy%2B9Vpmieov1eYw%3D" alt="IGM-AVATAR">
                            </div>

                            <div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
                                <p class="t-center txt12 size15 m-l-r-auto">
                                    “This website is very useful and interesting. I feel very satisfied about it. I will support and follow the website more. Thank you for giving me an interesting experience ”
                                </p>

                                <div class="star-review fs-18 color0 flex-c-m m-t-12">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                </div>

                                <div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
                                    Xuan Dan ˗ Viet Nam
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick3 item2-slick3">
                    <div class="wrap-content-slide3 p-b-50 p-t-50">
                        <div class="container">
                            <div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false" data-appear="zoomIn">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/43/Donald_Trump_%2853066688047%29_%28cropped%29.jpg/1200px-Donald_Trump_%2853066688047%29_%28cropped%29.jpg" alt="IGM-AVATAR">
                            </div>

                            <div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
                                <p class="t-center txt12 size15 m-l-r-auto">
                                    “This website is very useful and interesting. I feel very satisfied about it. I will support and follow the website more. Thank you for giving me an interesting experience ”
                                </p>

                                <div class="star-review fs-18 color0 flex-c-m m-t-12">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                </div>

                                <div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
                                    donald trump ˗ american
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick3 item3-slick3">
                    <div class="wrap-content-slide3 p-b-50 p-t-50">
                        <div class="container">
                            <div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false" data-appear="zoomIn">
                                <img src="https://kenh14cdn.com/thumb_w/660/203336854389633024/2023/7/8/photo-9-16888099662661094157342.jpg" alt="IGM-AVATAR">
                            </div>

                            <div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
                                <p class="t-center txt12 size15 m-l-r-auto">
                                    “This website is very useful and interesting. I feel very satisfied about it. I will support and follow the website more. Thank you for giving me an interesting experience ”
                                </p>

                                <div class="star-review fs-18 color0 flex-c-m m-t-12">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                </div>

                                <div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
                                    linda ˗ Spain
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="wrap-slick3-dots m-t-30"></div>
        </div>
    </section>

    </body>

@endsection
