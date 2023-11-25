@extends("user.layouts.app")
@section("after_css")
    <style>
        .social-icons li{
            margin: 0 8px;
        }
        .cmt-btn{
            float: right;padding: 10px 35px;background-color: white;color: #ccc;margin: 12px 10px 0 0;border-radius: 3px;border: 1px solid #ccc;
        }
        .cmt-btn:hover{
            background-color: red;
            color: #f1f1f1;
        }
    </style>
@endsection

@section ("content")
    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url({{ $blog->thumbnail }});">
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

                <a href="{{ url("blog/") }}" class="txt27">
                    Blog
                </a>

                <span class="txt29 m-l-10 m-r-10">/</span>
                <span class="txt29">
					{{ $blog->title }}
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
{{--                                <a href="{{ url("blog/single",["blog"=>$blog->slug]) }}">--}}
                                    <img style="width: 820px;border-radius: 10px;max-height: 600px" src="{{ $blog->thumbnail }}" alt="IMG-BLOG">
{{--                                </a>--}}

                                <div class="date-blo4 flex-col-c-m">
									<span class="txt30 m-b-4">
										{{ date('m', strtotime($blog->created_at)) }}
									</span>

                                    <span class="txt31">
										{{ date('D Y', strtotime($blog->created_at)) }}
									</span>
                                </div>
                            </div>

                            <!-- - -->
                            <div class="text-blo4 p-t-33">
                                <h4 class="p-b-16">
                                    <a href="{{ url("blog/single",["blog"=>$blog->slug]) }}" class="tit9">{{ $blog->title }}</a>
                                </h4>

                                <div class="txt32 flex-w p-b-24">
									<span>
										by Admin
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                    <span>
										{{ date('m D, Y', strtotime($blog->user->created_at)) }}
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                    <span>
										{{ $blog->category->name }}, {{ $blog->tag->name }}
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                    <span>
                                        @php
                                        $cmt_blog = \App\Models\CommentBlog::where("blog_id",$blog->id)->where("parent_id",0)->count();
                                        @endphp
										{{ $cmt_blog }} Comment
									</span>
                                </div>

                                <p>
                                    {{ $blog->body }}
                                </p>
                            </div>
                        </div>

                        <div class="navigation-top">
                            <div class="d-sm-flex justify-content-between text-center">
                                <p class="like-info">
                                    <span class="align-middle">
{{--                                        <a href="{{ url("blog/like",[$blog->id]) }}">--}}
{{--                                                    @php--}}
{{--                                                        $you_like = false;--}}
{{--                                                    @endphp--}}
{{--                                            @foreach($like_blogs as $item)--}}
{{--                                                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->id == $item->user_id)--}}
{{--                                                    @php--}}
{{--                                                        $you_like = true;--}}
{{--                                                    @endphp--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                            @if(count($like_blogs) > 0)--}}
{{--                                                @if($you_like)--}}
{{--                                                    <i class="fa-solid fa-heart" style="color: red;"></i>--}}
{{--                                                @else--}}
{{--                                                    <i class="fa-solid fa-heart" style="color: #868e96;"></i>--}}
{{--                                                @endif--}}
{{--                                            @else--}}
{{--                                                <i class="fa-solid fa-heart" style="color: #868e96;"></i>--}}
{{--                                            @endif--}}
{{--                                                </a>--}}


                                    @php
                                        $you_like = false;
                                    @endphp

                                        @foreach($like_blogs as $item)
                                            @if(\Illuminate\Support\Facades\Auth::check() &&  \Illuminate\Support\Facades\Auth::user()->id == $item->user_id)
                                                @php
                                                    $you_like = true;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @if(count($like_blogs) == 1)
                                            @if($you_like)
                                                <a href="{{ url("blog/like",[$blog->id]) }}">
                                        <i style="color: red" class="fa fa-heart"></i>
                                         </a>
                                                You liked
                                            @else
                                                <a href="{{ url("blog/like",[$blog->id]) }}">
                                        <i style="color: #c5c5c5" class="fa fa-heart"></i>
                                         </a>
                                                {{$like_blogs[0]->user->name}} liked
                                            @endif
                                        @elseif(count($like_blogs) > 1)
                                            @if($you_like)
                                                <a href="{{ url("blog/like",[$blog->id]) }}">
                                        <i style="color: red" class="fa fa-heart"></i>
                                         </a>
                                                You and {{ count($like_blogs) -1}} people like this
                                            @else
                                                <a href="{{ url("blog/like",[$blog->id]) }}">
                                        <i style="color: #c5c5c5" class="fa fa-heart"></i>
                                         </a>
                                                {{$like_blogs[0]->user->name}} and {{ count($like_blogs) -1}} people like this
                                            @endif
                                        @else
                                            <a href="{{ url("blog/like",[$blog->id]) }}">
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

                        <div class="cmt" style="margin-top: 10px">
                            <form action="{{ url('blog/post/comment',[$blog->id]) }}" method="post">
                                @csrf
                                <h4 style="padding: 5px 0 7px 0;"><b>Comment</b></h4>
                                <div><textarea name="comment" id="editor" class="form-control" rows="5"></textarea>
                                </div>
                                <div>
                                    <button type="submit" class="cmt-btn" >Submit</button>
                                </div>
                            </form>
                        </div>


                        @if(count($cmts) > 0)
                            <div style="margin-top: 100px"><h4 style="padding: 0 0 2px 10px;"><b>{{ count($cmts) }} Comment</b></h4></div>
                            <div style="border-top:1px solid rgba(0,0,0,.15) !important;border-radius:.25rem;">
                                @foreach($cmts as $cmt)
                                    <div class="comment-container" style="padding: 20px 0 0 10px">
                                        <div class="media forum-item">
                                            <a href="javascript:void(0)" class="card-link">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                                <small class="d-block text-center text-muted">Newbie</small>
                                            </a>
                                            <div class="media-body ml-3">
                                                <a href="javascript:void(0)" class="text-secondary">{{ $cmt->user->name }}</a>
                                                <small class="text-muted ml-2">
                                                        <?php
                                                        $created_at = $cmt->created_at;
                                                        $time_diff = \Illuminate\Support\Carbon::parse($created_at)->diffInSeconds();
                                                        $display_format = '';
                                                        if ($time_diff == 0) {
                                                            $display_format = 'now';
                                                        } elseif ($time_diff < 60) {
                                                            $display_format = $time_diff . ' second ago';
                                                        } elseif ($time_diff < 3600) {
                                                            $display_format = \Illuminate\Support\Carbon::parse($created_at)->diffInMinutes() . ' minute ago';
                                                        } elseif ($time_diff < 86400) {
                                                            $display_format = \Illuminate\Support\Carbon::parse($created_at)->diffInHours() . ' hour ago';
                                                        } elseif ($time_diff < 31536000) {
                                                            $display_format = \Illuminate\Support\Carbon::parse($created_at)->diffInDays() . ' day ago';
                                                        } else {
                                                            $display_format = $created_at;
                                                        }
                                                        echo $display_format;
                                                        ?>
                                                </small>
                                                <div class="mt-2 font-size-sm">
                                                    {{ $cmt->comment }}
                                                </div>

                                                <div class="text-muted small" style="margin: 5px 0">
                                                    <span style="margin: 0 5px">

                                                        @php
                                                            $like_cmts = \App\Models\LikeCommentBlog::where('like_cmt_blog',1)->where("blog_id",$blog->id)->where("comment_id",$cmt->id)->get();
                                                        @endphp

                                                        <a href="{{ url("blog/comment/like",["blog"=>$blog->id,"commentBlog"=>$cmt->id]) }}">
                                                            @php
                                                                $you_like_cmt = false;
                                                            @endphp
                                                            @foreach($like_cmts as $like_cmt)
                                                                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->id == $like_cmt->user_id)
                                                                    @php
                                                                        $you_like_cmt = true;
                                                                    @endphp
                                                                @endif
                                                            @endforeach

                                                            @if(count($like_cmts) > 0)
                                                                @if($you_like_cmt)
                                                                    <i class="fa-solid fa-heart" style="color: red;"></i>
                                                                @else
                                                                    <i class="fa-solid fa-heart" style="color: #868e96;"></i>
                                                                @endif
                                                            @else
                                                                <i class="fa-solid fa-heart" style="color: #868e96;"></i>
                                                            @endif
                                                </a>

                                                {{ count($like_cmts) }}

                                                    </span>
{{--                                                    <span><i class="far fa-comment ml-2"></i> 3</span>--}}
                                                    <span class="btn-reply" style="margin-left: 10px;cursor: pointer">Reply</span>
                                                    <div class="comment-reply-div" style="position: relative;right: 45px;width: 790px;">
                                                        <div  style="display: flex;padding-left: 10px;margin-top: 5px" >
                                                            <a href="javascript:void(0)" class="card-link">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                                                <small class="d-block text-center text-muted">Newbie</small>
                                                            </a>
                                                            <div class="media-body ml-3">
                                                                <div class="form-group">
                                                                    <form action="{{ url('blog/comment/reply',[$cmt->id,$blog->id]) }}" method="post">
                                                                        @csrf
                                                                        <textarea name="comment" id="comment" class="form-control" cols="20"
                                                                                  rows="3" placeholder="Enter reply here..."></textarea>
                                                                        <button type="submit" class="cmt-btn" style="float: right; margin-bottom: 10px">
                                                                            Reply
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>


                                        @if($cmt->parent_id == 0)
                                            @php
                                                $cmt_reply = \App\Models\CommentBlog::where("parent_id",$cmt->id)->get();
                                            @endphp
                                            @foreach($cmt_reply as $reply)
                                                <div class="media forum-item" style="margin-top: 10px;padding-left: 30px">
                                                    <a href="javascript:void(0)" class="card-link">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                                        <small class="d-block text-center text-muted">Newbie</small>
                                                    </a>
                                                    <div class="media-body ml-3">
                                                        <a href="javascript:void(0)" class="text-secondary">{{ $reply->user->name }}</a>
                                                        <small class="text-muted ml-2">
                                                                <?php
                                                                $created_at = $reply->created_at;
                                                                $time_diff = \Illuminate\Support\Carbon::parse($created_at)->diffInSeconds();
                                                                $display_format = '';
                                                                if ($time_diff == 0) {
                                                                    $display_format = 'now';
                                                                } elseif ($time_diff < 60) {
                                                                    $display_format = $time_diff . ' second ago';
                                                                } elseif ($time_diff < 3600) {
                                                                    $display_format = \Illuminate\Support\Carbon::parse($created_at)->diffInMinutes() . ' minute ago';
                                                                } elseif ($time_diff < 86400) {
                                                                    $display_format = \Illuminate\Support\Carbon::parse($created_at)->diffInHours() . ' hour ago';
                                                                } elseif ($time_diff < 31536000) {
                                                                    $display_format = \Illuminate\Support\Carbon::parse($created_at)->diffInDays() . ' day ago';
                                                                } else {
                                                                    $display_format = $created_at;
                                                                }
                                                                echo $display_format;
                                                                ?>
                                                        </small>
                                                        <div class="mt-2 font-size-sm">
                                                            {{ $reply->comment }}
                                                        </div>

                                                        <div class="text-muted small" style="margin: 5px 0">
                                                            <span style="margin: 0 5px">
                                                        @php
                                                            $like_cmt_replies = \App\Models\LikeCommentBlog::where('like_cmt_blog',1)->where("blog_id",$blog->id)->where("comment_id",$reply->id)->get();
                                                        @endphp

                                                        <a href="{{ url("blog/comment/like",["blog"=>$blog->id,"comment"=>$reply->id]) }}">
                                                             @php
                                                                 $you_like_cmt_reply = false;
                                                             @endphp
                                                            @foreach($like_cmt_replies as $like_cmt_reply)
                                                                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->id == $like_cmt_reply->user_id)
                                                                    @php
                                                                        $you_like_cmt_reply = true;
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                            @if(count($like_cmt_replies) > 0)
                                                                @if($you_like_cmt_reply)
                                                                    <i class="fa-solid fa-heart" style="color: red;"></i>
                                                                @else
                                                                    <i class="fa-solid fa-heart" style="color: #868e96;"></i>
                                                                @endif
                                                            @else
                                                                <i class="fa-solid fa-heart" style="color: #868e96;"></i>
                                                            @endif
                                                </a>

                                                {{ count($like_cmt_replies) }}
                                                    </span>
{{--                                                            <span><i class="far fa-comment ml-2"></i> 3</span>--}}
                                                            <span class="btn-reply"  style="margin-left: 10px;cursor: pointer">Reply</span>
                                                            <div class="comment-reply-div" style="position: relative;right: 55px;width: 770px;">
                                                                <div  style="display: flex;padding-left: 20px;margin-top: 5px" >
                                                                    <a href="javascript:void(0)" class="card-link">
                                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                                                        <small class="d-block text-center text-muted">Newbie</small>
                                                                    </a>
                                                                    <div class="media-body ml-3">
                                                                        <div class="form-group">
                                                                            <form action="{{ url('blog/comment/reply/reply',[$reply->id,$blog->id]) }}" method="post">
                                                                                @csrf
                                                                                <textarea name="comment" id="comment" class="form-control" cols="20"
                                                                                          rows="3" placeholder="Enter reply here..."></textarea>
                                                                                <button type="submit" class="cmt-btn" style="float: right; margin-bottom: 10px">
                                                                                    Reply
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if($reply->parent_id > 0)
                                                    @php
                                                        $cmt_reply_reply = \App\Models\CommentBlog::where("parent_id",$reply->id)->get();
                                                    @endphp
                                                    @foreach($cmt_reply_reply as $reply_reply)
                                                        <div class="media forum-item" style="margin-top: 10px;padding-left: 60px">
                                                            <a href="javascript:void(0)" class="card-link">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                                                <small class="d-block text-center text-muted">Newbie</small>
                                                            </a>
                                                            <div class="media-body ml-3">
                                                                <a href="javascript:void(0)" class="text-secondary">{{ $reply_reply->user->name }}</a>
                                                                <small class="text-muted ml-2">
                                                                        <?php
                                                                        $created_at = $reply_reply->created_at;
                                                                        $time_diff = \Illuminate\Support\Carbon::parse($created_at)->diffInSeconds();
                                                                        $display_format = '';
                                                                        if ($time_diff == 0) {
                                                                            $display_format = 'now';
                                                                        } elseif ($time_diff < 60) {
                                                                            $display_format = $time_diff . ' second ago';
                                                                        } elseif ($time_diff < 3600) {
                                                                            $display_format = \Illuminate\Support\Carbon::parse($created_at)->diffInMinutes() . ' minute ago';
                                                                        } elseif ($time_diff < 86400) {
                                                                            $display_format = \Illuminate\Support\Carbon::parse($created_at)->diffInHours() . ' hour ago';
                                                                        } elseif ($time_diff < 31536000) {
                                                                            $display_format = \Illuminate\Support\Carbon::parse($created_at)->diffInDays() . ' day ago';
                                                                        } else {
                                                                            $display_format = $created_at;
                                                                        }
                                                                        echo $display_format;
                                                                        ?>
                                                                </small>
                                                                <div class="mt-2 font-size-sm">
                                                                    {{$reply_reply->comment}}
                                                                </div>

                                                                <div class="text-muted small" style="margin: 5px 0">
                                                                    <span style="margin: 0 5px">
                                                        @php
                                                            $like_cmt_reply_replies = \App\Models\LikeCommentBlog::where('like_cmt_blog',1)->where("blog_id",$blog->id)->where("comment_id",$reply_reply->id)->get();
                                                        @endphp

                                                        <a href="{{ url("blog/comment/like",["blog"=>$blog->id,"comment"=>$reply_reply->id]) }}">
                                                            @php
                                                                $you_like_cmt_reply_reply = false;
                                                            @endphp
                                                            @foreach($like_cmt_reply_replies as $like_cmt_reply_reply)
                                                                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->id == $like_cmt_reply_reply->user_id)
                                                                    @php
                                                                        $you_like_cmt_reply_reply = true;
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                            @if(count($like_cmt_reply_replies) > 0)
                                                                @if($you_like_cmt_reply_reply)
                                                                    <i class="fa-solid fa-heart" style="color: red;"></i>
                                                                @else
                                                                    <i class="fa-solid fa-heart" style="color: #868e96;"></i>
                                                                @endif
                                                            @else
                                                                <i class="fa-solid fa-heart" style="color: #868e96;"></i>
                                                            @endif
                                                </a>

                                                {{ count($like_cmt_reply_replies) }}
                                                    </span>
{{--                                                                    <span><i class="far fa-comment ml-2"></i> 3</span>--}}
                                                                    <span class="btn-reply"  style="margin-left: 10px;cursor: pointer;">Reply</span>
                                                                    <div class="comment-reply-div" style="position: relative;right: 85px;width: 770px;">
                                                                        <div  style="display: flex;padding-left: 20px;margin-top: 5px" >
                                                                            <a href="javascript:void(0)" class="card-link">
                                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                                                                <small class="d-block text-center text-muted">Newbie</small>
                                                                            </a>
                                                                            <div class="media-body ml-3">
                                                                                <div class="form-group">
                                                                                    <form action="{{ url('blog/comment/reply/reply',[$reply->id,$blog->id]) }}" method="post">
                                                                                        @csrf
                                                                                        <textarea name="comment" id="comment" class="form-control" cols="20"
                                                                                                  rows="3" placeholder="Enter reply here..."></textarea>
                                                                                        <button type="submit" class="cmt-btn" style="float: right; margin-bottom: 10px">
                                                                                            Reply
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    @endforeach
                                                @endif


                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <h5 style="position: relative; top: 65px">Be the first to comment!</h5>
                        @endif
                    </div>

                </div>



                  {{--       sidebar         --}}
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
                  {{--       endsidebar         --}}
            </div>
        </div>
    </section>
@endsection

@section("after_js")
    <script>
        $('.comment-reply-div').hide();

        $(document).ready(function () {
            $('.btn-reply').click(function () {
                $(this).siblings('.comment-reply-div').toggle('swing');
                // $('.comment-reply-div').toggle('swing');
            });
        });
    </script>
    <script>
        $('html, body').animate({
            scrollTop: $("#comment-section").offset().top
        }, 2000);
    </script>
@endsection
