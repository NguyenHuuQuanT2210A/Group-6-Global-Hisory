@extends("user.layouts.app")

@section("after_css")
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
@endsection
@section("content")

    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">

                    <form action="{{url("create_blog")}}" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail Title</label>
                                <input type="file" name="thumbnail" class="form-control" id="upload">
                                <div id="image_show">
                                    {{old("thumbnail")}}
                                </div>
                                <input type="hidden" id="thumb">
                            </div>

                            <div class="form-group">
                                <div>Title</div>
                                <input type="text" value="{{old("title")}}" name="title" class="form-control"
                                       placeholder="Enter Title">
                            </div>

                            <div class="form-group">
                                <span>Category</span>
                                <div class="input-group-icon mt-10">
                                    <div class="form-select" id="default-select">
                                        <select name="category_id">
                                            <option value="">Category</option>
                                            @foreach($categories as $item)
                                                <option @if($item->id==old("category_id")) selected
                                                        @endif value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            {{--                                <div class="form-group">--}}
                            <div>Body</div>
                            <textarea name="body" id="editor" class="form-control"
                                      style="height: 300px">{{old("body")}}</textarea>

                            {{--                                </div>--}}

                        </div>

                        <div class="button-group-area mt-10" style="margin-left: 20px">
                            <button type="submit" class="genric-btn danger-border circle">Create Blog</button>
                        </div>
                        @csrf
                    </form>
                </div>


                @include("user.layouts.sidebar_post")

            </div>
        </div>

    </div>
@endsection

@section("after_js")
    <script>
        CKEDITOR.replace('editor', {
            filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
            filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
        });
    </script>

{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create( document.querySelector( '#editor' ) )--}}
{{--            .catch( error => {--}}
{{--                console.error( error );--}}
{{--            } );--}}
{{--    </script>--}}
@endsection

