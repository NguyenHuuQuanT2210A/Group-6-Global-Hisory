@extends("user.layouts.app")

@section("after_css")

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script src="ckefinder/ckefinder.js"></script>
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
@endsection
@section("content")

    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/footer-6.jpg);">
        <h2 class="tit6 t-center">
            Edit Post
        </h2>
    </section>


    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">

                    <form action="{{url("forum/edit_post",["post"=>$post->id])}}" method="post" enctype="multipart/form-data">
                        <div class="card-body" style="border:1px solid rgba(0,0,0,.15) ;border-radius:.25rem;">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" value="{{ $post->title }}" name="title" class="form-control"
                                       placeholder="Enter Title">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <div class="input-group-icon mt-10">
                                    <div class="form-select" id="default-select">
                                        <select name="category_id" >
                                            <option value="">Category</option>
                                            @foreach($categories as $item)
                                                <option @if($item->id==$post->category_id) selected
                                                        @endif value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Tag</label>
                                <div class="input-group-icon mt-10">
                                    <div class="form-select" id="default-select">
                                        <select class="select2Tags" multiple="multiple" name="tag_id[]">
                                            <option value="">Tag</option>
                                            @foreach($tags as $tag)
                                                <option @if(in_array($tag->name, $post->tag_id)) selected="selected"
                                                        @endif value="{{$tag->name}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Body</label>
                                <textarea name="body" id="editor" class="form-control" rows="3">{{ $post->body }}</textarea>

                            </div>
                        </div>
                        <div>
                            <button type="submit" class="submit-post" >Update Post</button>
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
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                ckfinder: {
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                    resourceType: 'Images,Videos',
                    multiple: true,
                    // mediaEmbed: {
                    //     previewsInData: true
                    // }
                },
                // toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
            } )
            .catch( function( error ) {
                console.error( error );
            } );
    </script>

    <script>
        document.querySelectorAll( 'oembed[url]' ).forEach( element => {
            // Create the <a href="..." class="embedly-card"></a> element that Embedly uses
            // to discover the media.
            const anchor = document.createElement( 'a' );

            anchor.setAttribute( 'href', element.getAttribute( 'url' ) );
            anchor.className = 'embedly-card';

            element.appendChild( anchor );
        } );
    </script>

    <script>
        $(".select2Tags").each(function(index, element) {
            $(this).select2({
                tags: true,
                width: "100%" // just for stack-snippet to show properly
            });
        });

    </script>

@endsection

