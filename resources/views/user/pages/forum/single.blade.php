@extends("user.layouts.app")
@section("after_css")
    <link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/post.css" />
@endsection

@section("content")
    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(https://assets-global.website-files.com/6048aaba41858510b17e1809/607474d55c073509225d156e_6048aaba418585fbbf7e1d13_forums.jpeg);">
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
                                        <small class="text-muted ml-2">
                                            <?php
                                            $created_at = $post->created_at;
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
                                                    <i class="fa-solid fa-share-from-square" style="color: black;"></i>
                                                    Share
                                                </div>
                                                    <div class="share-with">
                                                        <span class="triangle"></span>
                                                        <a href="javascript:void(0)"><i class="fa-brands fa-instagram m-l-21" aria-hidden="true"></i></a>
                                                        <a href="javascript:void(0)"><i class="fa-brands fa-facebook-f m-l-21" aria-hidden="true"></i></a>
                                                        <a href="javascript:void(0)"><i class="fa-brands fa-twitter m-l-21" aria-hidden="true"></i></a>
                                                    </div>
                                            </div>
                                        </div>
                                        </div>

                                        @if(count($cmts) == 0)
                                        <div class="cmt" style="margin-top: 30px">
                                            <form action="{{ url('forum/post/comment',["post"=>$post->id]) }}" method="post">
                                                @csrf

                                            <div><textarea name="comment" id="editor" class="form-control" rows="5" placeholder="Enter comment here..."></textarea>
                                            </div>
                                            <div>
                                                <button type="submit" class="cmt-btn">Submit</button>
                                            </div>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                </div>


                                @if(count($cmts) == 0)
                                    <h5 style="position: relative; top: 65px">Be the first to comment!</h5>
                                @else
                                    <h5 style="margin: 35px 0 3px 65px"><b>{{ count($cmts)  }} Comment</b></h5>
                                    <div style="margin-left: 70px">

                                        @foreach($cmts as $cmt)
                                            <div class="comment-container" style="padding-left: 10px;padding-top: 10px">
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
                                                                            <span class="btn-reply"  style="margin-left: 10px;cursor: pointer;">Reply</span>
                                                                            <div class="comment-reply-div" style="position: relative;right: 64px;width: 615px;">
                                                                                <div  style="display: flex;margin-top: 5px" >
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
                                    <div class="cmt" style="margin-top: 30px;padding-left: 65px">
                                        <form action="{{ url('forum/post/comment',["post"=>$post->id]) }}" method="post">
                                            @csrf
                                            <div><textarea name="comment" id="editor" class="form-control" rows="5" placeholder="Enter comment here..."></textarea>
                                            </div>
                                            <div>
                                                <button type="submit" class="cmt-btn">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                @endif

                        </div>
                    </div>
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
                                            <a href="{{ url("forum/single",["post"=>$item->slug]) }}">{{ $item->title }}</a>
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
                                            <a href="{{ url("forum/single",["post"=>$item->slug]) }}">{{ $item->title }}</a>
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
@endsection
