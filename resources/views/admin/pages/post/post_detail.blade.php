@extends("admin.layouts.app")
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">View Post Detail</h3>
                    <div class="card-tools">
                        <form action="{{url("/admin/post/post_detail")}}" method="get">
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
                    <div>
{{--                        <div>--}}
{{--                            <img src="{{ $post->thumbnail }}" alt="Anh">--}}
{{--                        </div>--}}
                        <div>
                            {{ $post->title }}
                        </div>
                        <div>
                            {!! $post->body !!}
                        </div>

                        <div style="float: right; margin: 10px 10px 10px 0px">

                            <form  action="{{url("admin/post/post_detail",['post'=>$post->slug])}}" method="POST" style="display: inline-block;margin-left: 10px">
                                @csrf
                                <button  @disabled(!$can_approved) class="btn btn-outline-success " type="submit">Duyệt</button>
                            </form>

                            <form action="{{url("admin/post/unapproved_list",['post'=>$post->id])}}" method="POST" style="display: inline-block;margin-left: 10px">
                                @csrf
                                <button @disabled(!$can_approved) onclick="return confirm('Chắc chắn không muốn duyệt Blog này?: {{$post->name}}')" class="btn btn-outline-warning" type="submit">Unapproved</button>
                            </form>

                            <form action="{{url("admin/post/delete",['post'=>$post->id])}}" method="POST" style="display: inline-block;margin-left: 10px">
                                @csrf
                                @method("DELETE")
                                <button onclick="return confirm('Chắc chắn muốn xóa Blog này?: {{$post->name}}')" class="btn btn-outline-danger" type="submit">Delete</button>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
