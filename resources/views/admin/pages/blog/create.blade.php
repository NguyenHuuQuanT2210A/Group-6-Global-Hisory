@extends("admin.layouts.app")
@section("after_css")
    <link href="html/dist/assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="html/dist/assets/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" />
    <link href="html/dist/assets/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="html/dist/assets/vendors/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" />

    <link href="html/dist/assets/vendors/summernote/dist/summernote.css" rel="stylesheet" />
    <link href="html/dist/assets/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" />
@endsection
@section('content')
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
                <div class="ibox-title">Create New Blog</div>
            </div>
            <div class="ibox-body">
                <form action="{{url("admin/blog/create")}}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category">Title</label>
                            <input type="text" name="title" value="{{old("title")}}" class="form-control"  placeholder="Enter Title" required>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Thumbnail Title</label>
                            <input type="file" name="thumbnail" class="form-control" id="upload">
                            <div id="image_show">
                                {{old("thumbnail")}}
                            </div>
                            <input type="hidden" id="thumb">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Category</label>
                            <select class="form-control select2_demo_1" name="category_id">
                                <option value="">Category</option>
                                @foreach($categories as $item)
                                    <option @if($item->id==old("category_id")) selected
                                            @endif value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Tag</label>
                            <select class="form-control select2_demo_1" multiple="" name="tag_id">
                                @foreach($tags as $tag)
                                    <option @if($tag->id==old("tag_id")) selected="selected"
                                            @endif value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="summernote"></label>
                        <textarea id="summernote" name="body" data-plugin="summernote" data-air-mode="true">{{ old("body") }}</textarea>

                    </div>

                    <div class="card-footer">
                        <button style="cursor: pointer" type="submit" class="btn btn-primary">Create Blog</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>

@endsection
@section("after_js")
    <script src="html/dist/assets/vendors/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="html/dist/assets/vendors/jquery-knob/dist/jquery.knob.min.js" type="text/javascript"></script>
    <script src="html/dist/assets/vendors/moment/min/moment.min.js" type="text/javascript"></script>
    <script src="html/dist/assets/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="html/dist/assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="html/dist/assets/vendors/jquery-minicolors/jquery.minicolors.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="html/dist/assets/js/scripts/form-plugins.js" type="text/javascript"></script>

    <script src="html/dist/assets/vendors/summernote/dist/summernote.min.js" type="text/javascript"></script>
    <script src="html/dist/assets/vendors/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('#summernote').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });
    </script>
@endsection
