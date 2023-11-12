@extends("user.layouts.app")

@section("after_css")

{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>--}}


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

{{--    <script async charset="utf-8" src="https://cdn.embedly.com/widgets/platform.js"></script>--}}

    <!-- Bootstrap 5 CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->

@endsection
@section("content")

    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/footer-6.jpg);">
        <h2 class="tit6 t-center">
            Create Post
        </h2>
    </section>


    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">

                    <form action="{{url("forum/create_post")}}" method="post" enctype="multipart/form-data">
                        <div class="card-body" style="border:1px solid rgba(0,0,0,.15) ;border-radius:.25rem;">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" value="{{old("title")}}" name="title" class="form-control"
                                       placeholder="Enter Title">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <div class="input-group-icon mt-10">
{{--                                    <div class="form-select" id="default-select">--}}
                                        <select name="category_id" class="form-select" id="default-select">
                                            <option value="">Category</option>
                                            @foreach($categories as $item)
                                                <option @if($item->id==old("category_id")) selected
                                                        @endif value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
{{--                                    </div>--}}
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Tag</label>
                                <div class="input-group-icon mt-10">
{{--                                    <div class="form-select" id="default-select">--}}
                                        <select class="select2Tags form-select initial-width" id="default-select" multiple="multiple" name="tag_id[]">
                                            <option value="">Tag</option>
                                            @foreach($tags as $tag)
                                                <option @if($tag->name==old("tag_id")) selected="selected"
                                                        @endif value="{{$tag->name}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
{{--                                    </div>--}}
                                </div>
                            </div>
                                <div class="form-group">
                            <label>Body</label>
                                        <textarea name="body" id="summernote" class="form-control" rows="3">{{old("body")}}</textarea>

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
            width: "100%" // just for stack-snippet to show properly
        });
        $(".initial-width").next(".select2-container").find(".select2-selection").css("border-radius", "10px");
    });

</script>

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

