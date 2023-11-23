@extends("user.layouts.app")
@section("after_css")
    <style>
        .social-icons li{
            margin: 0 8px;
        }
        .event-details li span{
            font-family: Roboto, sans-serif;
            font-weight: 400;
            font-size: 15px;
            line-height: 1.7;
            color: #666666;
        }
        .input-css{
            height: 50px;
            margin-bottom: 30px;
        }
    </style>
@endsection


@section ("content")
    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url({{ $event->thumbnail }});">
        <h2 class="tit6 t-center">
            {{ $event->name }}
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

                <a href="{{ url("event/") }}" class="txt27">
                    Event
                </a>

                <span class="txt29 m-l-10 m-r-10">/</span>
                <span class="txt29">
					{{ $event->name }}
				</span>
            </div>
        </div>

        <div class="container">
            <div class="row ">
                <div class="col-md-8 col-lg-9">
                    <div class="p-t-80 p-b-124 bo5-r p-r-50 h-full p-r-0-md bo-none-md">
                        <!-- Block4 -->
                        <div class="blo4 p-b-63">
                            <!-- - -->
                            <div class="bo-rad-10 pos-relative">
{{--                                <a href="{{ url("event/single",["event"=>$event->slug]) }}">--}}
                                    <img style="width: 820px;border-radius: 10px;max-height: 600px" src="{{ $event->thumbnail }}" alt="IMG-BLOG">
{{--                                </a>--}}

                                <div class="date-blo4 flex-col-c-m">
									<span class="txt30 m-b-4">
										{{ date('m', strtotime($event->created_at)) }}
									</span>

                                    <span class="txt31">
										{{ date('D Y', strtotime($event->created_at)) }}
									</span>
                                </div>
                            </div>

                            <!-- - -->
                            <div class="text-blo4 p-t-33">
                                <h4 class="p-b-16">
                                    <a href="{{ url("event/single",["event"=>$event->slug]) }}" class="tit9">{{ $event->name }}</a>
                                </h4>

                                <div class="txt32 flex-w p-b-24">
									<span>
										by Admin
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                    <span>
										{{ date('m D, Y', strtotime($event->created_at)) }}
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                    <span>
										{{ $event->category->name }}, {{ $event->tag->name }}
{{--										<span class="m-r-6 m-l-4">|</span>--}}
									</span>

{{--                                    <span>--}}
{{--										8 Comments--}}
{{--									</span>--}}
                                </div>

                                <div style="padding-bottom: 20px;margin-bottom: 20px;border-bottom: 1px solid #B9B9B9">
                                    <ul class="event-details">
                                        <li><span>Date From: {{ date('d-M-Y H:i:s', strtotime($event->date_from)) }}</span></li>
                                        <li><span>Date To: {{ date('d-M-Y H:i:s', strtotime($event->date_to)) }}</span></li>
                                        <li>
                                            <span>Number of people participated: {{ $event->qty_registered }}/{{ $event->qty }} </span>
                                        </li>
                                        <li><span>Address : {{ $event->address }}</span></li>
                                    </ul>
                                </div>

                                <p>
                                    {{ $event->description }}
                                </p>
                            </div>
                        </div>

                        <div class="navigation-top">
                            <div class="d-sm-flex justify-content-between text-center">
                                <p class="like-info"><span class="align-middle">

                                    @php
                                        $you_like = false;
                                    @endphp

                                    @foreach($like_events as $item)
                                        @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->id == $item->user_id)
                                            @php
                                                $you_like = true;
                                            @endphp
                                        @endif
                                    @endforeach

                                        @if(count($like_events) == 1)
                                            @if($you_like)
                                                <a href="{{ url("event/like",[$event->id]) }}">
                                        <i style="color: red" class="fa fa-heart"></i>
                                         </a>
                                                You liked
                                            @else
                                                <a href="{{ url("event/like",[$event->id]) }}">
                                        <i style="color: #c5c5c5" class="fa fa-heart"></i>
                                         </a>
                                                {{$like_events[0]->user->name}} liked
                                            @endif
                                        @elseif(count($like_events) > 1)
                                            @if($you_like)
                                                <a href="{{ url("event/like",[$event->id]) }}">
                                        <i style="color: red" class="fa fa-heart"></i>
                                         </a>
                                                You and {{ count($like_events) -1}} people like this
                                            @else
                                                <a href="{{ url("event/like",[$event->id]) }}">
                                        <i style="color: #c5c5c5" class="fa fa-heart"></i>
                                         </a>
                                                {{$like_events[0]->user->name}} and {{ count($like_events) -1}} people like this
                                            @endif
                                        @else
                                            <a href="{{ url("event/like",[$event->id]) }}">
                                        <i style="color: #c5c5c5" class="fa fa-heart"></i>
                                         </a>
                                            No one has liked this yet.
                                        @endif
                                    </span>

                                </p>
                                <div class="col-sm-4 text-center my-2 my-sm-0">
                                    <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                                </div>
                                <ul class="social-icons" style="display: flex">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>



                        <div style="padding-top: 20px;margin-top: 35px;border-top: 1px solid #B9B9B9;">
                        @if($event->status == 1)
                            <h4 class="txt33 p-b-14">
                                Registration is over!
                            </h4>
                        @else

                        <form class="leave-comment p-t-10" action="{{ url("event/register",["event"=>$event->id]) }}" method="post">
                            @csrf
                            <h4 class="txt33 p-b-14">
                                Register To Participate Now!
                            </h4>
                            <p>
                                Your email address will not be published. Required fields are marked *
                            </p>

                            <div class="bo2 bo-rad-10 m-t-3 m-b-20 input-css" >
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" value="{{ old("name") }}" name="name"  placeholder="Name *">
                                @error("name")
                                <p class="text-danger" style="margin: 3px 0 0 10px"><i>{{ $message }}</i></p>
                                @enderror
                            </div>

                            <div class="bo2 bo-rad-10 m-t-3 m-b-20 input-css" >
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" value="{{ old("email") }}" name="email"  placeholder="Email *">
                                @error("email")
                                <p class="text-danger" style="margin: 3px 0 0 10px"><i>{{ $message }}</i></p>
                                @enderror
                            </div>

                            <div class="bo2 bo-rad-10 m-t-3 m-b-20 input-css" >
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" value="{{ old("tel") }}" name="tel"  placeholder="Phone *">
                                @error("tel")
                                <p class="text-danger" style="margin: 3px 0 0 10px"><i>{{ $message }}</i></p>
                                @enderror
                            </div>

                            <div class="bo2 bo-rad-10 m-t-3 m-b-20 input-css" >
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" value="{{ old("address") }}" name="address"  placeholder="Address *">
                                @error("address")
                                <p class="text-danger" style="margin: 3px 0 0 10px"><i>{{ $message }}</i></p>
                                @enderror
                            </div>

                            <!-- Button3 -->
                            <button type="submit" class="btn3 flex-c-m size31 txt11 trans-0-4" style="margin-top: 5px;float: right">
                                Register
                            </button>
                        </form>
                        @endif
                        </div>

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
                                        <a href="{{ url("event/category",["category"=>$item->slug]) }}" class="txt27">
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
                                @foreach($event_popular as $item)
                                    <li class="flex-w m-b-25">
                                        <div class="size16 bo-rad-10 wrap-pic-w of-hidden m-r-18">
                                            <a href="{{ url("event/single",["event"=>$item->slug]) }}">
                                                <img src="{{ $item->thumbnail }}" style="width: 70px;height: 70px" alt="IMG-BLOG">
                                            </a>
                                        </div>

                                        <div class="size28">
                                            <a href="{{ url("event/single",["event"=>$item->slug]) }}" class="dis-block txt28 m-b-8">
                                                {{ $item->name }}
                                            </a>

                                            <span class="txt14">
											{{ date('m D, Y', strtotime($item->created_at)) }}
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
                                        <a href="{{ url("event/tag",["tag"=>$item->slug]) }}" class="txt27">
                                            {{ $item->name }}
                                        </a>

                                        <span class="txt29">
										({{ count($item->event) }})
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

