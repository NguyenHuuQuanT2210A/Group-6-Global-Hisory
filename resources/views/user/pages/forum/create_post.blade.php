@extends("user.layouts.app")
@section("after_css")
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <style>
        .submit-post{
            float: right;
            margin: 20px 20px;
            padding: 12px 25px;
            background-color: gainsboro;
            border-radius: 3px;
        }
        .submit-post:hover{
            background-color: #9f9595;
            color: white;
        }
    </style>

    <script async charset="utf-8" src="https://cdn.embedly.com/widgets/platform.js"></script>
    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->
@endsection
@section("content")
    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(https://assets-global.website-files.com/6048aaba41858510b17e1809/607474d55c073509225d156e_6048aaba418585fbbf7e1d13_forums.jpeg);">
        <h2 class="tit6 t-center">
            Create Post
        </h2>
    </section>
    <div class="container-fluid pb-4 pt-4 paddding" style="position: relative">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">

                    <form action="{{url("forum/create_post")}}" method="post" enctype="multipart/form-data">
                        <div class="card-body" style="border:1px solid rgba(0,0,0,.15) ;border-radius:.25rem;">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" value="{{old("title")}}" name="title" class="form-control"
                                       placeholder="Enter Title">
                                @error("title")
                                <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <div class="input-group-icon mt-10">
                                        <select name="category_id" class="form-select select2Category" id="default-select">
                                            <option value="">Category</option>
                                            @foreach($categories as $item)
                                                <option @if($item->id==old("category_id")) selected
                                                        @endif value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                @error("category_id")
                                <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tag</label>
                                <div class="input-group-icon mt-10">
                                        <select class="select2Tags form-select initial-width" id="default-select" multiple="multiple" name="tag_id[]">

                                            @foreach($tags as $tag)
                                                <option @if($tag->name==old("tag_id")) selected="selected"
                                                        @endif value="{{$tag->name}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                @error("tag_id")
                                <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                                @enderror
                            </div>
                                <div class="form-group">
                            <label>Body</label>
                                        <textarea name="body" id="summernote" class="form-control" rows="3">{!! old("body") !!}</textarea>
                                    @error("body")
                                    <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                                    @enderror
                                </div>
                        </div>
                        <div>
                            <button type="submit" class="submit-post" >Create Post</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("after_js")

<script>
    $(".select2Tags").each(function(index, element) {
        $(this).select2({
            tags: true,
            width: "100%"
        });
        $(".initial-width").next(".select2-container").find(".select2-selection").css("border-radius", "4px");
        $(".initial-width").next(".select2-container").find(".select2-selection").css("border", "1px solid #d9d9d9");
        $(".select2Category").select2({
            tags: true,
        });
        $(".select2Category").next(".select2-container").find(".select2-selection").css("height", "38px");
    });
</script>
lllllllllll
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Summernote JS - CDN Link -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $("#summernote").summernote();
        $('.dropdown-toggle').dropdown();
    });
</script>
@endsection

