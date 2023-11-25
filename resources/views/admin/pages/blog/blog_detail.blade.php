@extends("admin.layouts.app")
@section("after_css")

@endsection

@section("content")
    <div class="page-heading">
        <h1 class="page-title">Blog Detail</h1>
    </div>
    <div style="margin-top: 10px;padding-bottom: 50px">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">{{ $blog->title }}</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <h2 style="text-align: center;font-weight: bold;padding-bottom: 10px;">{{ $blog->title }}</h2>
                <p style="text-align: center"><img src="{{ $blog->thumbnail }}" alt="Anh {{ $blog->title }}"></p>
                <div style="display: flex">
                    <span><b>Category : </b></span>
                <p style="margin-left: 5px">{{ $blog->category->name }}</p>
                </div>
                <div style="display: flex">
                    <span ><b>Tag : </b></span>
                    <p style="margin-left: 5px">{{ $blog->tag->name }}</p>
                </div>
                <div>
                    <span><b>Body : </b></span>
                    <p>{!! $blog->body !!}</p>
                </div>

            </div>
        </div>

        <div style="float: right">
            <span>
            <a style="cursor: pointer" href="{{ url("admin/blog/edit",["blog"=>$blog->slug]) }}"
               class="btn btn-outline-warning">Edit</a>
            </span>
            <form action="{{url("admin/blog/delete",['blog'=>$blog->id])}}" method="POST"
                  style="display: inline-block;margin-left: 10px">
                @csrf
                @method("DELETE")
                <button onclick="return confirm('Chắc chắn muốn xóa Blog này?')" class="btn btn-outline-danger"
                        style="cursor: pointer" type="submit">Delete
                </button>
            </form>
        </div>

    </div>
@endsection
@section("after_js")

@endsection
