@extends("user.layouts.app")
@section("before_css")
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->
@endsection
@section("after_css")
    <style>
        #reply-delete-btn {
            cursor: pointer;
        }
    </style>
@endsection
@section ("content")

    <div class="navigation-top">
        <div class="d-sm-flex justify-content-between text-center">

            <p class="like-info"><span class="align-middle"><a
                        href="{{ url("post/like",[$post->id]) }}">
                                        <i style="color: #c5c5c5" class="fa fa-heart"></i>
                                    </a></span>

                @foreach($likes_latest as $item)
                    @if(count($likes) == 1)
                        {{$item->user->name}} Liked
                    @elseif(count($likes) > 1)
                        {{$item->user->name}} and {{ count($likes) -1}} people like this
                    @endif
                @endforeach
            </p>
            <div class="col-sm-4 text-center my-2 my-sm-0">
                <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
            </div>
            <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fab fa-behance"></i></a></li>
            </ul>
        </div>
        <div class="navigation-area">
            <div class="row">
                <div
                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                    <div class="thumb">
                        <a href="#">
                            <img class="img-fluid" src="assets/img/post/preview.png" alt="">
                        </a>
                    </div>
                    <div class="arrow">
                        <a href="#">
                            <span class="lnr text-white ti-arrow-left"></span>
                        </a>
                    </div>
                    <div class="detials">
                        <p>Prev Post</p>
                        <a href="#">
                            <h4>Space The Final Frontier</h4>
                        </a>
                    </div>
                </div>
                <div
                    class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                    <div class="detials">
                        <p>Next Post</p>
                        <a href="#">
                            <h4>Telescopes 101</h4>
                        </a>
                    </div>
                    <div class="arrow">
                        <a href="#">
                            <span class="lnr text-white ti-arrow-right"></span>
                        </a>
                    </div>
                    <div class="thumb">
                        <a href="#">
                            <img class="img-fluid" src="assets/img/post/next.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ \Illuminate\Support\Facades\Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>


    <div>
        <div class="form-group">
            <form action="{{ url('post/comment',[$post->id]) }}" method="post">
                @csrf
                <textarea name="comment" id="comment" class="form-control" cols="20"
                          rows="3" placeholder="Enter comment here..."></textarea>
                <button type="submit" class="btn btn-info btn-sm mt-3" style="float: right; margin-bottom: 20px">
                    Comment
                </button>
            </form>
        </div>
    </div>


    @if(count($cmts) > 0)
        <div class="comments-area" id="comment-section">
            <h4>{{ count($cmts) }} Comments</h4>
            @foreach($cmts as $item)
                <div class="comment-list">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb">
                                <img src="assets/img/comment/comment_1.png" alt="">
                            </div>
                            <div class="desc">
                                <p class="comment">
                                    {{ $item->comment }}
                                </p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <h5>
                                            <a href="#">{{ $item->user->name }}</a>
                                        </h5>
                                        <p class="date">{{ date('m d Y', strtotime($item->user->created_at)) }}</p>
                                        <span class="btn-reply text-uppercase" style="cursor:pointer;">Reply</span>
                                        <form action="{{ url("comment/reply/delete",[$item->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div style="">
                                                                        <span><button type="submit"
                                                                                      id="reply-delete-btn"><i
                                                                                    class="fas fa-trash text-danger"></i></button></span>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group comment-reply-div">
                        <form action="{{ url('comment/reply',[$item->id,$post->id]) }}" method="post">
                            @csrf
                            <textarea name="comment" id="comment" class="form-control" cols="20"
                                      rows="3" placeholder="Enter comment here..."></textarea>
                            <button type="submit" class="btn btn-info btn-sm mt-3" style="float: right; margin-bottom: 20px">
                                Reply
                            </button>
                        </form>
                    </div>


                    @if($item->parent_id == 0)
                        <div class="ml-5">

                            @php
                                $cmt_reply = \App\Models\Comment::where("parent_id",$item->id)->get();
                            @endphp
                            @foreach($cmt_reply as $reply)
                                <form action="{{ url("comment/reply/delete",[$reply->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="comment-list">
                                        <div class="single-comment justify-content-between d-flex" style="width: 100%;margin-top: 20px">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <img src="assets/img/comment/comment_1.png" alt="">
                                                </div>
                                                <div class="desc">
                                                    <div class="comment" style="display: flex">
                                                        <input type="hidden" name="reply_id"
                                                               value="{{ $reply->id }}">
                                                        <div>
                                                            <p style="margin-bottom: 0">{{ $reply->comment }}</p>
                                                        </div>

                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <h5>
                                                                <a href="javascript: void(0)">{{$reply->user->name}}</a>
                                                            </h5>
                                                            <p class="date">
                                                                Posted {{ date('m d Y', strtotime($reply->user->created_at)) }}</p>
                                                            <span class="btn-reply text-uppercase"
                                                                  style="cursor:pointer;">Reply</span>
                                                            <span><button type="submit"
                                                                          id="reply-delete-btn"><i
                                                                        class="fas fa-trash text-danger"></i></button></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="form-group comment-reply-div" style="margin-top: 10px">
                                    <form action="{{ url('comment/reply/reply',[$reply->id,$post->id]) }}"
                                          method="post">
                                        @csrf
                                        <textarea name="comment" id="comment" class="form-control" cols="20"
                                                  rows="3" placeholder="Enter comment here..."></textarea>
                                        <button type="submit" class="btn btn-info btn-sm mt-3"
                                                style="float: right;margin-bottom: 20px"> Reply
                                        </button>
                                    </form>
                                </div>

                                @if($reply->parent_id > 0)
                                    <div class="ml-3">
                                        @php
                                            $cmt_reply_reply = \App\Models\Comment::where("parent_id",$reply->id)->get();
                                        @endphp
                                        @foreach($cmt_reply_reply as $reply_reply)
                                            <form action="{{ url("comment/reply/delete",[$reply_reply->id]) }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="comment-list">
                                                    <div class="single-comment justify-content-between d-flex" style="width: 100%;margin-top: 20px">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb">
                                                                <img src="assets/img/comment/comment_1.png"
                                                                     alt="">
                                                            </div>
                                                            <div class="desc">
                                                                <div class="comment" style="display: flex">
                                                                    <input type="hidden" name="reply_id"
                                                                           value="{{ $reply_reply->id }}">
                                                                    <div>
                                                                        <p style="margin-bottom: 0">{{ $reply_reply->comment }}</p>
                                                                    </div>

                                                                </div>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <h5>
                                                                            <a href="javascript: void(0)">{{$reply_reply->user->name}}</a>
                                                                        </h5>
                                                                        <p class="date">
                                                                            Posted {{ date('m d Y', strtotime($reply_reply->user->created_at)) }}</p>
                                                                        <span class="btn-reply text-uppercase"
                                                                              style="cursor:pointer;">Reply</span>
                                                                        <span><button type="submit"
                                                                                      id="reply-delete-btn"><i
                                                                                    class="fas fa-trash text-danger"></i></button></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="form-group comment-reply-div" style="margin-top: 10px">
                                                <form
                                                    action="{{ url('comment/reply/reply',[$reply->id,$post->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <textarea style="word-wrap: break-word;" name="comment" id="comment" class="form-control"
                                                              cols="20" rows="3"
                                                              placeholder="Enter comment here..."></textarea>
                                                    <button type="submit" class="btn btn-info btn-sm mt-3"
                                                            style="float: right;margin-bottom: 20px"> Reply
                                                    </button>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

    @else
        <h5 style="position: relative; top: 65px">Hay tro thanh nguoi comment dau tien</h5>
        @endif

        </div>
        @include("user.layouts.sidebar_post")
        </div>
        </div>
        </section>

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
                                            @foreach($latestPosts as $item)
                                                <div class="weekly3-single">
                                                    <div class="weekly3-img">
                                                        <img src="{{ $item->thumbnail }}" style="width: 270px;height: 173px"
                                                             alt="">
                                                    </div>
                                                    <div class="weekly3-caption">
                                                        <h4>
                                                            <a href="{{ url("single",['post'=>$item->slug]) }}">{{ $item->title }}</a>
                                                        </h4>
                                                        <p>{{ $item->created_at->toDateString() }}</p>
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

        @endsection

        @section("after_js")
            <script>
                $('.comment-reply-div').hide();

                $(document).ready(function () {
                    $('.btn-reply').click(function () {
                        // $(this).next('.comment-reply-div').toggle('swing');
                        $('.comment-reply-div').toggle('swing');
                    });
                });
            </script>
            <script>
                $('html, body').animate({
                    scrollTop: $("#comment-section").offset().top
                }, 2000);
            </script>
        @endsection
