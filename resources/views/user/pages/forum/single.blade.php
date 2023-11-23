@extends("user.layouts.app")
@section("after_css")
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />--}}
    <link rel="stylesheet" href="css/style.css" />
    <style>
        .tag-box{
            padding: 10px 0;
            margin: 10px 0;
            /*display: flex;*/
        }

        .tag-box span a{
            display: inline-block;
            padding: 2px 12px;
            margin: 4px 3px;
            border: 1px solid #b9b9b9;
            border-radius: 20px;
            background-color: #ff8282;
            color: #f1f1f1;
        }
        .tag-box span a:hover{
            background-color: red;
            color: white;
        }


        .cmt-btn{
            float: right;padding: 10px 35px;background-color: white;color: #ccc;margin: 12px 10px 0 0;border-radius: 3px;border: 1px solid #ccc;
        }
        .cmt-btn:hover{
            background-color: red;
            color: #f1f1f1;
        }
        .edit-area{
            position: absolute;right: 0;
            display: flex;
        }
        .edit-area a{
            margin-right: 10px;
            font-size: 1em;
            padding-top: 1px;
        }

        .share{
            position: relative;
            margin-right: 10px;
            font-size: 1em;
            padding-top: 3px;
        }

        .share-with {
            position: absolute;
            display: flex;
            border: 1px solid #b1aaaa;
            border-radius: 2px;
            background-color: #e0e0e0;
            top: 30px;
            right: 0;
            width: 200px;
            height: 35px;
        }

        .triangle{
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 10px solid #e0e0e0;
            position: absolute;
            top: -10px;
            transform: translateX(60%);
            right: 25px;
        }
        .triangle::before{
            content: "";
            position: absolute;
            top: -2px;
            bottom: -8px;
            border-left: 1px solid #b1aaaa;
            border-top-left-radius: 1px;
            border-bottom-right-radius: 1px;
        }
        .triangle::after{
            content: "";
            position: absolute;
            top: -2px;
            bottom: -8px;
            border-left: 1px solid #b1aaaa;
            border-top-right-radius: 1px;
            border-bottom-left-radius: 1px;
        }
        .triangle::before {
            transform: translateY(36%) rotate(27deg) translateX(-3px);
        }

        .triangle::after {
            transform:translateY(22%) translateX(2px) rotate(-27deg);
        }
        .share-with a{
            width: 100%;
            margin-top: auto;
            margin-bottom: auto;
        }
        .edit-area .delete{
            margin-right: 10px;
            color: #868e96;
            padding-top: 3px;
        }
        .edit-area .edit:hover{
            cursor: pointer;
            color: blue;
        }
        .edit-area .delete:hover{
            cursor: pointer;
            color: red;
        }
        .edit-area .share:hover{
            cursor: pointer;
            color: black;
        }

        .fa-heart:hover{
            cursor: pointer;
            color: red !important;
            /*background-color: red;*/
        }
    </style>
@endsection

@section("content")
    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/footer-2.jpg);">
        <h2 class="tit6 t-center">
            Post
        </h2>
    </section>
    <div class="container" style="margin-top: 100px; margin-bottom: 100px; max-width: 1250px;">
        <div class="main-body p-0">
            <div class="inner-wrapper">
                <div class="single-post" style="width: 820px">
                    <!-- Forum Detail -->
                    <div class="inner-main-body p-2 p-sm-3">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="media forum-item">
                                    <a href="javascript:void(0)" class="card-link">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                        <small class="d-block text-center text-muted">Newbie</small>
                                    </a>
                                    <div class="media-body ml-3">
                                        <a href="javascript:void(0)" class="text-secondary">{{ $post->user->name }}</a>
                                        <small class="text-muted ml-2">{{ $post->user->created_at }}</small>
                                        <h4 class="mt-1"><b>{{ $post->title }}</b></h4>
                                        <div class="mt-3 font-size-sm">
                                            {!! $post->body !!}
                                        </div>

                                        <div class="tag-box">
                                            <span>Tags : </span>
                                            @foreach($post->tag_id as $tag)
                                                <span style="display: inline-block"><a href="{{ url("forum/tag",["tag"=>\Illuminate\Support\Str::slug($tag)]) }}">{{ $tag }}</a></span>
                                            @endforeach
                                        </div>

                                        <div style="padding: 10px 0">
                                        <div class="text-muted small" style="position: relative;display: flex">
                                            <div style="position: absolute;left: 0">
                                            <span style="margin: 0 5px">
                                                <a href="{{ url("forum/post/like",["post"=>$post->id]) }}">
                                                    @php
                                                        $you_like = false;
                                                    @endphp
                                                    @foreach($likes as $item)
                                                        @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->id == $item->user_id)
                                                            @php
                                                                $you_like = true;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    @if(count($likes) > 0)
                                                        @if($you_like)
                                                            <i class="fa-solid fa-heart" style="color: red;"></i>
                                                        @else
                                                            <i class="fa-solid fa-heart" style="color: #868e96;"></i>
                                                        @endif
                                                    @else
                                                        <i class="fa-solid fa-heart" style="color: #868e96;"></i>
                                                    @endif
                                                </a>

                                                {{ count($likes) }}</span>
                                            <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> {{ $post->view_count }}</span>
                                            <span><i class="far fa-comment ml-2"></i> {{  count($cmts) }}</span>
                                            </div>
                                            <div class="edit-area" >
                                                @if(Auth::check() && $post->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                                                <a href="{{ url("forum/edit_post",["post"=>$post->slug]) }}" class="edit">
                                                    <i class="fa-regular fa-pen-to-square" style="color: blue;"></i>
                                                Edit
                                                </a>
                                                    <form  action="{{ url("forum/delete_post",["post"=>$post->id]) }}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="delete" onclick="return confirm('Chắc chắn muốn xoá Post này?')"  type="submit"><i class="fa-solid fa-trash" style="color: red;"></i> Delete</button>
                                                    </form>
                                                @endif
                                                <div class="share">
{{--                                                    <input type="text" id="share-url" value="{{ $url }}" class="url-link" readonly>--}}
                                                    <i class="fa-solid fa-share-from-square" style="color: black;"></i>
                                                    Share
                                                </div>
                                                    <div class="share-with">
                                                        <span class="triangle"></span>
                                                        <a id="shareWithFacebook"><i class="fa-brands fa-instagram m-l-21" aria-hidden="true"></i></a>
                                                        <a href=""><i class="fa-brands fa-facebook-f m-l-21" aria-hidden="true"></i></a>
                                                        <a href=""><i class="fa-brands fa-twitter m-l-21" aria-hidden="true"></i></a>
                                                    </div>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="cmt" style="margin-top: 10px">
                                            <form action="{{ url('forum/post/comment',[$post->id]) }}" method="post">
                                                @csrf
                                            <h4 style="padding: 5px 0 7px 0;"><b>Comment</b></h4>
                                            <div><textarea name="comment" id="editor" class="form-control" rows="5"></textarea>
                                            </div>
                                            <div>
                                                <button type="submit" class="cmt-btn" >Submit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @if(count($cmts) > 0)
                                <div style="border-top:1px solid rgba(0,0,0,.15) !important;border-radius:.25rem;margin: 50px 0 0 60px">
                                    @foreach($cmts as $cmt)
                                    <div class="comment-container" style="padding-left: 10px;padding-top: 10px">
                                        <div class="media forum-item">
                                            <a href="javascript:void(0)" class="card-link">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                                <small class="d-block text-center text-muted">Newbie</small>
                                            </a>
                                            <div class="media-body ml-3">
                                                <a href="javascript:void(0)" class="text-secondary">{{ $cmt->user->name }}</a>
                                                <small class="text-muted ml-2">{{ $cmt->created_at }}</small>
                                                <div class="mt-2 font-size-sm">
                                                    {{ $cmt->comment }}
                                                </div>

                                                <div class="text-muted small" style="margin: 5px 0">
                                                    <span style="margin: 0 5px">

                                                        @php
                                                            $like_cmts = \App\Models\LikeComment::where('like_cmt_post',1)->where("post_id",$post->id)->where("comment_id",$cmt->id)->get();
                                                        @endphp

                                                        <a href="{{ url("forum/post/comment/like",["post"=>$post->id,"comment"=>$cmt->id]) }}">
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
                                                    <div class="comment-reply-div" style="position: relative;right: 45px;width: 665px;">
                                                        <div  style="display: flex;padding-left: 10px;margin-top: 5px" >
                                                            <a href="javascript:void(0)" class="card-link">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                                                <small class="d-block text-center text-muted">Newbie</small>
                                                            </a>
                                                            <div class="media-body ml-3">
                                                                <div class="form-group">
                                                                    <form action="{{ url('forum/comment/reply',[$cmt->id,$post->id]) }}" method="post">
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
                                                $cmt_reply = \App\Models\Comment::where("parent_id",$cmt->id)->get();
                                            @endphp
                                            @foreach($cmt_reply as $reply)
                                         <div class="media forum-item" style="padding-left: 30px">
                                            <a href="javascript:void(0)" class="card-link">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                                <small class="d-block text-center text-muted">Newbie</small>
                                            </a>
                                            <div class="media-body ml-3">
                                                <a href="javascript:void(0)" class="text-secondary">{{ $reply->user->name }}</a>
                                                <small class="text-muted ml-2">{{ $reply->created_at }}</small>
                                                <div class="mt-2 font-size-sm">
                                                    {{ $reply->comment }}
                                                </div>

                                                <div class="text-muted small" style="margin: 5px 0">
                                                    <span style="margin: 0 5px">
                                                        @php
                                                            $like_cmt_replies = \App\Models\LikeComment::where('like_cmt_post',1)->where("post_id",$post->id)->where("comment_id",$reply->id)->get();
                                                        @endphp

                                                        <a href="{{ url("forum/post/comment/like",["post"=>$post->id,"comment"=>$reply->id]) }}">
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
{{--                                                    <span><i class="far fa-comment ml-2"></i> 3</span>--}}
                                                    <span class="btn-reply"  style="margin-left: 10px;cursor: pointer">Reply</span>
                                                    <div class="comment-reply-div" style="position: relative;right: 55px;width: 645px;">
                                                        <div  style="display: flex;padding-left: 20px;margin-top: 5px" >
                                                            <a href="javascript:void(0)" class="card-link">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                                                <small class="d-block text-center text-muted">Newbie</small>
                                                            </a>
                                                            <div class="media-body ml-3">
                                                                <div class="form-group">
                                                                    <form action="{{ url('forum/comment/reply/reply',[$reply->id,$post->id]) }}" method="post">
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
                                                        $cmt_reply_reply = \App\Models\Comment::where("parent_id",$reply->id)->get();
                                                    @endphp
                                                    @foreach($cmt_reply_reply as $reply_reply)
                                         <div class="media forum-item" style="padding-left: 60px">
                                            <a href="javascript:void(0)" class="card-link">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                                <small class="d-block text-center text-muted">Newbie</small>
                                            </a>
                                            <div class="media-body ml-3">
                                                <a href="javascript:void(0)" class="text-secondary">{{ $reply_reply->user->name }}</a>
                                                <small class="text-muted ml-2">{{ $reply_reply->created_at }}</small>
                                                <div class="mt-2 font-size-sm">
                                                    {{$reply_reply->comment}}
                                                </div>

                                                <div class="text-muted small" style="margin: 5px 0">
                                                    <span style="margin: 0 5px">
                                                        @php
                                                            $like_cmt_reply_replies = \App\Models\LikeComment::where('like_cmt_post',1)->where("post_id",$post->id)->where("comment_id",$reply_reply->id)->get();
                                                        @endphp

                                                        <a href="{{ url("forum/post/comment/like",["post"=>$post->id,"comment"=>$reply_reply->id]) }}">
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
{{--                                                    <span><i class="far fa-comment ml-2"></i> 3</span>--}}
                                                    <span class="btn-reply"  style="margin-left: 10px;cursor: pointer;">Reply</span>
                                                    <div class="comment-reply-div" style="position: relative;right: 55px;width: 615px;">
                                                        <div  style="display: flex;padding-left: 20px;margin-top: 5px" >
                                                            <a href="javascript:void(0)" class="card-link">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" width="50" alt="User" />
                                                                <small class="d-block text-center text-muted">Newbie</small>
                                                            </a>
                                                            <div class="media-body ml-3">
                                                                <div class="form-group">
                                                                    <form action="{{ url('forum/comment/reply/reply',[$reply->id,$post->id]) }}" method="post">
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
                    <!-- /Forum Detail -->
                </div>
            </div>
                <div class="sb-right">
                    <!-- Inner sidebar body -->
                    <div style="padding: 10px 0 0 10px">
                        <div style="margin: 15px 0;padding: 20px 0;border-top: 2px solid #b9b9b9">
                            <h4 style="margin: 5px 0 12px 10px;display: block;"><b>Category</b></h4>
                            <ul class="list-category">
                                @foreach($categories as $item)
                                    @php
                                        $post_categories = \App\Models\Post::where("category_id",$item->id)->where("is_approved",1)->get();
                                    @endphp
                                    <li><a href="{{ url("forum/category",["category"=>$item->slug]) }}" >{{ $item->name }} ({{ $post_categories->count() }})  </a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div style="margin: 15px 0;padding: 20px 0;border-top: 2px solid #b9b9b9">
                            <h4 style="margin: 5px 0 20px 10px;display: block;"><b >Tags Related</b></h4>
                            <ul class="list-tag">
                                @foreach($tags as $tag)
                                    <li><a href="{{ url("forum/tag",["tag"=>$tag->slug]) }}" >{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div style="margin: 15px 0;padding: 20px 10px;border-top: 2px solid #b9b9b9">
                            <div >
                                <div style="padding: 8px 5px;background-color: white;margin-bottom: 5px;">
                                    <h4 ><b >Post Related</b></h4>
                                </div>

                                <ul class="post-related">
                                    @foreach($post_related as $item)
                                        <li>
                                            <a href="#">{{ $item->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div style="margin: 15px 0;padding: 20px 10px;border-top: 2px solid #b9b9b9">
                            <div >
                                <div style="padding: 8px 5px;background-color: white;margin-bottom: 5px;">
                                    <h4 ><b >Post Latest</b></h4>
                                </div>

                                <ul class="post-related">
                                    @foreach($post_new as $item)
                                        <li>
                                            <a href="#">{{ $item->title }}</a>
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
    </div>
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
                $('.share-with').hide();

                $(document).ready(function () {
                    $('.share').click(function () {
                        $(this).siblings('.share-with').toggle();
                    });
                });
            </script>

            <script>
                let copiedLink = '';
                $(document).ready(function (){
                    copiedLink = $('#share_url').val();

                    $('#shareWithFacebook').click(function (){
                        alert('123');
                       window.open('https://www.facebook.com/sharer/sharer.php?u=' + copiedLink);
                    });
                });
            </script>


{{--            <script>--}}
{{--                $('html, body').animate({--}}
{{--                    scrollTop: $("#comment-section").offset().top--}}
{{--                }, 2000);--}}
{{--            </script>--}}
@endsection
