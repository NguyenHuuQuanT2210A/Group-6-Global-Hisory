@extends("admin.layouts.app")
@section("after_css")
    <style>
        #pointer {
            cursor: pointer;
        }
    </style>
@endsection

@section("content")
    <div class="page-heading">
        <h1 class="page-title">Post Detail</h1>
    </div>
    <div style="margin-top: 10px;padding-bottom: 50px">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">{{ $post->title }}</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <h2 style="text-align: center;font-weight: bold;padding-bottom: 10px;">{{ $post->title }}</h2>
                <div style="display: flex">
                    <span>Category : </span>
                    <p style="padding-left: 5px">{{ $post->category->name }}</p>
                </div>

                <div style="display: flex">
                    <span>Tags : </span>
                    @foreach($post->tag_id as $tag)
                        <p style="padding: 0 5px 0 5px">{{ $tag }}</p>
                    @endforeach
                </div>
                <p>{!! $post->body !!}</p>
            </div>
        </div>

        <div style="float: right">
            <form action="{{url("admin/post/approved_post",['post'=>$post->slug])}}" method="POST"
                  style="display: inline-block;margin-left: 10px">
                @csrf
                <button @disabled(!$can_approved) class="btn btn-outline-success" id="pointer" type="submit">Approved
                </button>
            </form>

            <form action="{{url("admin/post/unapproved_post",['post'=>$post->slug])}}" method="POST"
                  style="display: inline-block;margin-left: 10px">
                @csrf
                <button @disabled(!$can_approved) onclick="return confirm('Chắc chắn không muốn duyệt Post này?')"
                        class="btn btn-outline-warning" id="pointer" type="submit">Unapproved
                </button>
            </form>

            {{--            <form action="{{url("admin/post/delete",['post'=>$post->id])}}" method="POST" style="display: inline-block;margin-left: 10px">--}}
            {{--                @csrf--}}
            {{--                @method("DELETE")--}}
            {{--                <button  onclick="return confirm('Chắc chắn muốn xóa Post này?')" class="btn btn-outline-danger" id="pointer" type="submit">Xóa</button>--}}
            {{--            </form>--}}
        </div>

    </div>
@endsection
@section("after_js")

@endsection
