@extends("user.layouts.app")
@section("after_css")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
@endsection
@section("content")

    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(https://assets-global.website-files.com/6048aaba41858510b17e1809/607474d55c073509225d156e_6048aaba418585fbbf7e1d13_forums.jpeg);">
        <h2 class="tit6 t-center">
            Forum
        </h2>
    </section>

    <div class="container" style="margin-top: 100px; margin-bottom: 100px; max-width: 1250px;">
        <div class="main-body p-0">
            <div class="inner-wrapper">

                <!-- Inner main -->
                <div class="inner-main">
                    <!-- Inner main header -->
                    <div class="inner-main-header">
                        <form action="{{url("/forum/tag",["tag"=>$tag->slug])}}" method="get">
                            <div class="input-group input-group-sm mr-2" style="width: 160px; float:left">
                                <select name="post_id" data-value="post_id" class="form-control">
                                    <option @if(app("request")->input("post_id") == "0") selected="selected" @endif value="0">Latest</option>
                                    <option @if(app("request")->input("post_id") == "1") selected="selected" @endif value="1">Popular</option>
                                    <option @if(app("request")->input("post_id") == "2") selected="selected" @endif value="2">Likest</option>
                                    <option @if(app("request")->input("post_id") == "3") selected="selected" @endif value="3">Most Comment</option>
                                    <option @if(app("request")->input("post_id") == "4") selected="selected" @endif value="4">No Comment</option>
                                </select>
                            </div>
                            <div class="input-group input-group-sm mr-2" style="width: 200px; float:left; height: 32px">
                                <input value="{{app("request")->input("date_from")}}" class="form-control" type="date" name="date_from" placeholder="Date"/>
                            </div>
                            <div class="input-group input-group-sm mr-2" style="width: 200px; float:left; height: 32px">
                                <input value="{{app("request")->input("date_to")}}" class="form-control" type="date" name="date_to" placeholder="Date"/>
                            </div>

                            <div class="input-group input-group-sm" style="width: 200px;float:left; height: 32px">
                                <input value="{{app("request")->input("search")}}" type="text" name="search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append" style="border-right: 1px solid #ccc;border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; border-top-right-radius: 2px;border-bottom-right-radius: 2px">
                                    <button type="submit" class="btn btn-default" style="padding-bottom: 0">
                                        <i class="fas fa-search" style="color: #938e8e"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /Inner main header -->
                    <!-- Inner main body -->
                    <!-- Forum List -->
                    <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                        @foreach($posts as $item)
                            <div class="card mb-2">
                                <div class="card-body p-2 p-sm-3">
                                    <div class="media forum-item">
                                        <div>
                                            <span><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-circle" width="53"  alt="User" /></span>
                                            <small class="d-block text-center" style="padding-right: 15px;padding-top: 4px;color: #666666;">Newbie</small>
                                        </div>
                                        <div class="media-body">
                                            <span><a style="font-size: 16px" href="{{ url("forum/single",["post"=>$item->slug]) }}" class="text-body"><b>{{ $item->title }}</b></a></span>
                                            <p class="text-secondary">
                                                @php
                                                    $body = $item->body;
                                                    $body = strip_tags($body, '<p>');
                                                    $body = preg_replace('/\s+/', ' ', $body);
                                                    $body = preg_replace('/\s*$/m', '</p>', $body);
                                                    $body = preg_replace('/^(.*)$/m', '<p>$1</p>', $body);
                                                    $limitedBody = \Illuminate\Support\Str::limit($body, 100);
                                                @endphp
                                                {!! \Illuminate\Support\Str::limit($body , 100 ,'...') !!}
                                            </p>
                                            <p class="text-muted"><a href="javascript:void(0)" style="font-size: 15px"><b>{{ $item->user->name }}</b></a>
                                                @php
                                                    $count_like = \App\Models\Like::where("like",1)->where("post_id",$item->id)->count();
                                                    $count_cmt = \App\Models\Comment::where("post_id",$item->id)->where('parent_id',0)->count();

                                                @endphp
                                                <span style="margin: 0 5px"><i class="far fa-heart"></i> {{ $count_like }}</span>
                                                <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> {{ $item->view_count }}</span>
                                                <span><i class="far fa-comment ml-2"></i> {{ $count_cmt }}</span>
                                                <span class="text-secondary font-weight-bold" style="padding-left: 5px;font-size: 15px">
                                            <?php
                                                        $created_at = $item->created_at;
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
                                        </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                        <div style="float: right">
                        {!! $posts->links("pagination::bootstrap-4") !!}
                        </div>
                    </div>
                    <!-- /Forum List -->
                    <!-- /Inner main body -->
                </div>
                <!-- /Inner main -->
                <div class="sb-right">
                    <!-- Inner sidebar header -->
                    <div class="inner-sidebar-header" style="padding-bottom: 5px">
                        <span class="inner-sidebar-content"><a href="{{ url("forum/create_post") }}">NEW DISCUSSION</a></span>
                    </div>
                    <!-- /Inner sidebar header -->
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
