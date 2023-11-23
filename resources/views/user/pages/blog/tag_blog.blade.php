@extends("user.layouts.app")
@section ("content")

    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-03.jpg);">
        <h2 class="tit6 t-center">
            Blog
        </h2>
    </section>


    <!-- Content page -->
    <section>
        <div class="bread-crumb bo5-b p-t-17 p-b-17">
            <div class="container">
                <a href="{{ url("/") }}" class="txt27">
                    Home
                </a>

                <span class="txt29 m-l-10 m-r-10">/</span>

                <span class="txt29">
					Blog
				</span>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="p-t-80 p-b-124 bo5-r h-full p-r-50 p-r-0-md bo-none-md">
                        <!-- Block4 -->
                        @foreach($blog_tag as $item)
                            <div class="blo4 p-b-63">
                                <div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
                                    <a href="{{ url("blog/single",["blog"=>$item->slug]) }}">
                                        <img src="{{ $item->thumbnail }}" alt="IMG-BLOG">
                                    </a>

                                    <div class="date-blo4 flex-col-c-m">
									<span class="txt30 m-b-4">
										{{ date('m', strtotime($item->created_at)) }}
									</span>

                                        <span class="txt31">
										{{ date('D Y', strtotime($item->created_at)) }}
									</span>
                                    </div>
                                </div>

                                <div class="text-blo4 p-t-33">
                                    <h4 class="p-b-16">
                                        <a href="{{ url("blog/single",["blog"=>$item->slug]) }}" class="tit9">{{ $item->title }}</a>
                                    </h4>

                                    <div class="txt32 flex-w p-b-24">
									<span>
										by Admin
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                        <span>
										{{ date('m D, Y', strtotime($item->user->created_at)) }}
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                        <span>
										{{ $item->category->name }}, {{ $item->tag->name }}
										<span class="m-r-6 m-l-4">|</span>
									</span>

{{--                                        <span>--}}
{{--										8 Comments--}}
{{--									</span>--}}
                                    </div>

                                    <p>
                                        {{\Illuminate\Support\Str::limit($item->body , 200 ,'...') }}
                                    </p>

                                    <a href="{{ url("blog/single",["blog"=>$item->slug]) }}" class="dis-block txt4 m-t-30">
                                        Continue Reading
                                        <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        {!! $blog_tag->links("pagination::bootstrap-4") !!}
                    </div>
                </div>

                <div class="col-md-4 col-lg-3">
                    <div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">
                        <!-- Search -->
                        <div class="search-sidebar2 size12 bo2 pos-relative">
                            <input class="input-search-sidebar2 txt10 p-l-20 p-r-55" type="text" name="search" placeholder="Search">
                            <button class="btn-search-sidebar2 flex-c-m ti-search trans-0-4"></button>
                        </div>

                        <!-- Categories -->
                        <div class="categories">
                            <h4 class="txt33 bo5-b p-b-35 p-t-58">
                                Categories
                            </h4>

                            <ul>
                                @foreach($categories as $item)
                                    <li class="bo5-b p-t-8 p-b-8">
                                        <a href="{{ url("blog/category",["category"=>$item->slug]) }}" class="txt27">
                                            {{ $item->name }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <!-- Most Popular -->
                        <div class="popular">
                            <h4 class="txt33 p-b-35 p-t-58">
                                Most popular
                            </h4>

                            <ul>
                                @foreach($blog_popular as $item)
                                    <li class="flex-w m-b-25">
                                        <div class="size16 bo-rad-10 wrap-pic-w of-hidden m-r-18">
                                            <a href="{{ url("blog/single",["blog"=>$item->slug]) }}">
                                                <img src="{{ $item->thumbnail }}" style="width: 70px;height: 70px" alt="IMG-BLOG">
                                            </a>
                                        </div>

                                        <div class="size28">
                                            <a href="{{ url("blog/single",["blog"=>$item->slug]) }}" class="dis-block txt28 m-b-8">
                                                {{ $item->title }}
                                            </a>

                                            <span class="txt14">
											{{ date('m D, Y', strtotime($item->user->created_at)) }}
										</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                        <!-- Archive -->
                        <div class="archive">
                            <h4 class="txt33 p-b-20 p-t-43">
                                Tags
                            </h4>

                            <ul>
                                @foreach($tags as $item)
                                    <li class="flex-sb-m p-t-8 p-b-8">
                                        <a href="{{ url("blog/tag",["tag"=>$item->slug]) }}" class="txt27">
                                            {{ $item->name }}
                                        </a>

                                        <span class="txt29">
										({{ count($item->blog) }})
									</span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
