<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">

                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="{{ $event->thumbnail }}" style="width: 750px;height: 375px"
                             alt="">
                    </div>
                    <div class="blog_details">
                        <h2>{{ $event->name }}.
                        </h2>
                        <ul class="">
                            {{--                                <li><a href="#"><i class="fa fa-user"></i> {{ $event->Category->name }}</a></li>--}}
                            <li><span>Date: {{$event->date_from}} - {{$event->date_to}}</span></li>
                            <li>
                                <span>Number of people participated: {{ $event->qty_registered }}/{{ $event->qty }} </span>
                            </li>
                            <li><span>Address : {{ $event->address }}</span></li>
                        </ul>
                        <p class="excert">
                            {{ $event->description }}
                        </p>
                    </div>
                </div>

                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><span class="align-middle">
                                    <a href="{{ url("event/like",[$event->id]) }}">
                                        <i style="color: #c5c5c5" class="fa fa-heart"></i>
                                    </a>
                                </span>
                            @foreach($likes_events_latest as $item)
                                @if(count($like_events) == 1)
                                    @if(\Illuminate\Support\Facades\Auth::user()->id == $item->user_id)
                                        You Liked
                                    @else
                                        {{$item->user->name}} Liked
                                    @endif
                                @elseif(count($like_events) > 1)
                                    @if(\Illuminate\Support\Facades\Auth::user()->id == $item->user_id)
                                        You and {{ count($like_events) -1}} people like this
                                    @else
                                        {{$item->user->name}} and {{ count($like_events) -1}} people like this
                                    @endif
                                @endif
                            @endforeach

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

                @if($event->status == 1)
                    <h4>Đã hết lượt Đăng Ký</h4>
                    <div hidden>
                        <form action="{{ url("event/register",["event"=>$event->id]) }}" method="post">
                            @csrf
                            <div style="width: 100%">
                                <label for="inputName" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control"
                                       value="{{ old("name") }}"
                                       placeholder="Enter Name">
                            </div>
                            <div>
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control"
                                       value="{{ old("email") }}"
                                       placeholder="Enter Email">
                            </div>
                            <div>
                                <label for="inputAddress" class="form-label">Address</label>
                                <input name="address" type="text" class="form-control" value="{{ old("address") }}"
                                       placeholder="Address">
                            </div>
                            <div>
                                <label for="inputTel" class="form-label">Tel</label>
                                <input name="tel" type="text" class="form-control" value="{{ old("tel") }}"
                                       placeholder="Tel">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Resgister Now</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div>
                        <form action="{{ url("event/register",["event"=>$event->id]) }}" method="post">
                            @csrf
                            <div style="width: 100%">
                                <label for="inputName" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control"
                                       value="{{ old("name") }}"
                                       placeholder="Enter Name">
                            </div>
                            <div>
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control"
                                       value="{{ old("email") }}"
                                       placeholder="Enter Email">
                            </div>
                            <div>
                                <label for="inputAddress" class="form-label">Address</label>
                                <input name="address" type="text" class="form-control" value="{{ old("address") }}"
                                       placeholder="Address">
                            </div>
                            <div>
                                <label for="inputTel" class="form-label">Tel</label>
                                <input name="tel" type="text" class="form-control" value="{{ old("tel") }}"
                                       placeholder="Tel">
                            </div>

                            <div style="margin-top: 15px; float: right">
                                <button type="submit" class="btn btn-primary">Resgister Now</button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
            <div class="sb-right">
                <!-- Inner sidebar header -->
                <div class="inner-sidebar-header" style="padding-bottom: 5px">
                    <span class="inner-sidebar-content"><a href="{{ url("create_post") }}">NEW DISCUSSION</a></span>
                </div>
                <!-- /Inner sidebar header -->

                <!-- Inner sidebar body -->
                <div style="padding: 10px 0 0 10px">
                    <div style="margin: 15px 0;padding: 20px 0;border-top: 2px solid #b9b9b9">
                        <h4 style="margin: 5px 0 12px 10px;display: block;"><b>Category</b></h4>
                        <ul class="list-category">
                            @foreach($categories as $item)
                                <li><a href="{{ url("forum/category",["category"=>$item->slug]) }}" >{{ $item->name }} ({{ $item->count() }})</a></li>

                            @endforeach
                        </ul>
                    </div>

                    <div style="margin: 15px 0;padding: 20px 0;border-top: 2px solid #b9b9b9">
                        <h4 style="margin: 5px 0 20px 10px;display: block;"><b >Tags Related</b></h4>
                        <ul class="list-tag">
                            @foreach($tags as $tag)
                                <li><a href="{{ url("forum/tag",["category"=>$tag->slug]) }}" >{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div style="margin: 15px 0;padding: 20px 10px;border-top: 2px solid #b9b9b9">
                        <div >
                            <div style="padding: 8px 5px;background-color: white;margin-bottom: 5px;">
                                <h4 ><b >Event Related</b></h4>
                            </div>

                            <ul class="post-related">
                                @foreach($event_related as $item)
                                    <li>
                                        <a href="{{ url("event/blog",['event'=>$item->slug]) }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div style="margin: 15px 0;padding: 20px 10px;border-top: 2px solid #b9b9b9">
                        <div >
                            <div style="padding: 8px 5px;background-color: white;margin-bottom: 5px;">
                                <h4 ><b >Event Latest</b></h4>
                            </div>

                            <ul class="post-related">
                                @foreach($event_latest as $item)
                                    <li>
                                        <a href="{{ url("event/blog",['event'=>$item->slug]) }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Inner sidebar body -->
            </div>
        </div>
    </div>
</section>
