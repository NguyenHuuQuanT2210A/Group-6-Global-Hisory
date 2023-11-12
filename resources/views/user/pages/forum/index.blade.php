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
                    <a class="nav-link nav-icon rounded-circle nav-link-faded mr-3 d-md-none" href="#" data-toggle="inner-sidebar"><i class="material-icons">arrow_forward_ios</i></a>
                    <select class="custom-select custom-select-sm w-auto mr-1">
                        <option selected="">Latest</option>
                        <option value="1">Popular</option>
                        <option value="3">Solved</option>
                        <option value="3">Unsolved</option>
                        <option value="3">No Replies Yet</option>
                    </select>
                    <span class="input-icon input-icon-sm ml-auto w-auto">
                    <input type="text" class="form-control form-control-sm bg-gray-200 border-gray-200 shadow-none mb-4 mt-4" placeholder="Search forum" />
                </span>
                </div>
                <!-- /Inner main header -->

                <!-- Inner main body -->

                <!-- Forum List -->
                <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                    @foreach($posts as $item)
                    <div class="card mb-2">
                        <div class="card-body p-2 p-sm-3">
                            <div class="media forum-item">
                                <a href="#" data-toggle="collapse" data-target=".forum-content"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-circle" width="60"  alt="User" /></a>
                                <div class="media-body">
                                    <span><a style="font-size: 17px" href="{{ url("forum/single",["post"=>$item->slug]) }}" class="text-body"><b>{{ $item->title }}</b></a></span>
                                    <p class="text-secondary">
                                        @php
                                            $body = $item->body; // Nội dung body
                                        // Tìm kiếm vị trí của hình ảnh trong nội dung
                                        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $body, $matches, PREG_OFFSET_CAPTURE);
                                        if ($matches && $matches[0][1] < 100) {
                                        // Nếu hình ảnh xuất hiện trong 100 ký tự đầu tiên,
                                            // loại bỏ nó khỏi nội dung trước khi áp dụng giới hạn ký tự
                                            $body = \Illuminate\Support\Str::replaceFirst($matches[0][0], '', $body);
                                            }
                                        @endphp
                                        {!! \Illuminate\Support\Str::limit($body , 100 ,'...') !!}
                                    </p>
                                    <p class="text-muted" style="text-align: left"><a href="javascript:void(0)"><b>{{ $item->user->name }}</b></a>
                                        @php
                                            $count_like = \App\Models\Like::where("like",1)->where("post_id",$item->id)->count();
                                            $count_cmt = \App\Models\Comment::where("post_id",$item->id)->where('parent_id',0)->count();

                                        @endphp
                                        <span style="margin: 0 5px"><i class="far fa-heart"></i> {{ $count_cmt }}</span>
                                        <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> {{ $item->view_count }}</span>
                                        <span><i class="far fa-comment ml-2"></i> {{ $count_cmt }}</span>
                                        <span class="text-secondary font-weight-bold" style="padding-left: 5px;">{{ $item->created_at }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    @endforeach
                        {!! $posts->links("pagination::bootstrap-4") !!}
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
