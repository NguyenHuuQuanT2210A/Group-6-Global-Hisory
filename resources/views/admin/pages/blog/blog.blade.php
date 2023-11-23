@extends("admin.layouts.app")

@section("content")

    <div class="page-heading">
        <h1 class="page-title">DataTables</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">DataTables</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title"><a href="{{ url("admin/blog/create") }}">Create New Blog</a></div>
                <div>
                    <form action="{{url("/admin/blog")}}" method="get">
                        <div class="input-group input-group-sm mr-2" style="width: 150px; float:left">
                            <select name="category_id" class="form-control" style="height: 33px !important;">
                                <option value="0">Filter by category</option>
                                @foreach($categories as $item)
                                    <option @if($item->id==app("request")->input("category_id")) selected="selected" @endif
                                    value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-sm mr-2" style="width: 150px; float:left">
                            <select  name="tag_id" class="form-control" style="height: 33px !important;">
                                <option value="">Filter by tag</option>
                                @foreach($tags as $tag)
                                    <option @if($tag->id==app("request")->input("tag_id")) selected="selected" @endif
                                    value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group input-group-sm" style="width: 150px;float:left">
                            <input value="{{app("request")->input("search")}}" type="text" name="search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button style="cursor: pointer" type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ibox-body" style="padding-bottom: 50px;">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>View</th>
                        <th>Like</th>
                        <th>Comment</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $item)
                        <tr>
                            <td>#{{$loop->index+1}}</td>
                            <td>{{$item->title}}</td>
                            <td><img width="100" src="{{$item->thumbnail}}"/></td>
                            <td>{{$item->view_count}}</td>
                            @php
                                $comments = \App\Models\CommentBlog::where("blog_id",$item->id)->get();
                                $likes = \App\Models\LikeBlog::where("blog_id",$item->id)->get();
                            @endphp
                            <td>{{ count($likes) }}</td>
                            <td>{{ count($comments) }}</td>
                            <td>
                                <a href="{{url("admin/blog/blog_detail",['blog'=>$item->slug])}}"
                                   class="btn btn-outline-info">Xem Chi Tiết</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                {!! $blogs->links("pagination::bootstrap-5") !!}
                </div>
            </div>
        </div>
    </div>
@endsection

