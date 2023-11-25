@extends("admin.layouts.app")
@section("content")
    <div class="page-heading">
        <h1 class="page-title">Post Table</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head" >
                <div class="ibox-title">Post</div>
                <div>
                    <form action="{{url("/admin/post")}}" method="get">
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
                                    <option @if($tag->name==app("request")->input("tag_id")) selected="selected" @endif
                                    value="{{$tag->name}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-sm mr-2" style="width: 140px; float:left;">
                            <select name="status" data-value="status" class="form-control" style="height: 33px !important;">
                                <option @if(app("request")->input("status") == "0") selected="selected" @endif value="0">Status</option>
                                <option @if(app("request")->input("status") == "1") selected="selected" @endif value="1">Pending</option>
                                <option @if(app("request")->input("status") == "2") selected="selected" @endif value="2">Approved</option>
                                <option @if(app("request")->input("status") == "3") selected="selected" @endif value="3">Unapproved</option>
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
                        <th>User Name</th>
                        <th>View</th>
                        <th>Like</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $item)
                        <tr>
                            <td>#{{$loop->index+1}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->User->name}}</td>
                            <td>{{$item->view_count}}</td>
                            @php
                                $comments = \App\Models\Comment::where("post_id",$item->id)->get();
                                $likes = \App\Models\Like::where("post_id",$item->id)->get();
                            @endphp
                            <td>{{ count($likes) }}</td>
                            <td>{{ count($comments) }}</td>
                            <td>{!! $item->getApprove() !!}</td>
                            <td>
                                <a href="{{url("admin/post/post_detail",['post'=>$item->slug])}}"
                                   class="btn btn-outline-info">Xem Chi Tiết</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                    {{ $posts->links("pagination::bootstrap-5") }}
                </div>
            </div>
        </div>
    </div>
@endsection

