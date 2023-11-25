@extends("admin.layouts.app")
@section("after_css")
    <link href="html/dist/assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="html/dist/assets/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet"/>
    <link href="html/dist/assets/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet"/>
    <link href="html/dist/assets/vendors/jquery-minicolors/jquery.minicolors.css" rel="stylesheet"/>

    <link href="html/dist/assets/vendors/summernote/dist/summernote.css" rel="stylesheet"/>
    <link href="html/dist/assets/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="page-heading">
        <h1 class="page-title">Create Event</h1>
    </div>


    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Create New Event</div>
            </div>
            <div class="ibox-body">
                <form action="{{url("admin/event/create")}}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="event">Name</label>
                            <input type="text" name="name" value="{{old("name")}}" class="form-control"
                                   placeholder="Enter Name" required>
                            @error("name")
                            <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" name="thumbnail" value="{{old("thumbnail")}}" class="form-control" id="upload" required>
                            <div id="image_show">
                                {{old("thumbnail")}}
                            </div>
                            <input type="hidden" value="{{old("thumbnail")}}" id="thumb">
                            @error("thumbnail")
                            <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                            @enderror
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
                            @error("category_id")
                            <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Tag</label>
                            <select class="form-control select2_demo_1" name="tag_id">
                                <option value="">Tag</option>
                                @foreach($tags as $item)
                                    <option @if($item->id==old("tag_id")) selected
                                            @endif value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error("tag_id")
                            <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div style="margin-right: 15px;display: inline-block">
                                <label for="date">From Date : </label>
                                <input type="datetime-local" value="{{old("date_from")}}" name="date_from" id="date"
                                       placeholder="yyyy-mm-dd" required>
                                @error("date_from")
                                <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                                @enderror
                            </div>
                            <div style="display: inline-block">
                                <label for="date">To Date : </label>
                                <input type="datetime-local" value="{{old("date_to")}}" name="date_to" id="date"
                                       placeholder="yyyy-mm-dd" required>
                                @error("date_to")
                                <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Qty Register</label>
                            <input type="number" value="{{old("qty")}}" name="qty" class="form-control"
                                   placeholder="Qty" required>
                            @error("qty")
                            <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" value="{{old("address")}}" name="address" class="form-control"
                                   placeholder="Address" required>
                            @error("address")
                            <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" row="5"
                                      required>{{old("description")}}</textarea>
                            @error("description")
                            <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button style="cursor: pointer" type="submit" class="btn btn-primary">Create Event</button>
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
    <script src="html/dist/assets/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"
            type="text/javascript"></script>
    <script src="html/dist/assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js"
            type="text/javascript"></script>
    <script src="html/dist/assets/vendors/jquery-minicolors/jquery.minicolors.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="html/dist/assets/js/scripts/form-plugins.js" type="text/javascript"></script>

    <script src="html/dist/assets/vendors/summernote/dist/summernote.min.js" type="text/javascript"></script>
    <script src="html/dist/assets/vendors/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('#summernote').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });
    </script>
@endsection
