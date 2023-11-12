@extends("admin.layouts.app")
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
{{--                    <h3 class="card-title"><a href="{{url("admin/event/create")}}">Create New Event</a> </h3>--}}
                    <div class="card-tools">
                        <form action="{{url("/admin/user")}}" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;float:left">
                                <input value="{{app("request")->input("search")}}" type="text" name="search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>User Name</th>
                            <th>View</th>
                            <th>Like</th>
                            <th>Comment</th>
                            <th>Approve</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if(count($unapproved) > 0)
                        @foreach($unapproved as $item)
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
                                    <a href="{{url("admin/post/post_detail",['post'=>$item->slug])}}" class="btn btn-outline-info">Xem Chi Tiết</a>
{{--                                    <form action="{{url("admin/post/unapproved_unapproved",['post'=>$item->id])}}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <button onclick="return confirm('Chắc chắn không muốn duyệt Blog này?: {{$item->name}}')" class="btn btn-outline-danger" type="submit">Unapproved</button>--}}
{{--                                    </form>--}}
                                </td>

                            </tr>
                        @endforeach
                        @endif
                        </tbody>

                    </table>
                    {!! $unapproved->links("pagination::bootstrap-5") !!}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
