@extends("admin.layouts.app")
@section("after_css")
    <script>
        $( function() {
            $( "#datepicker" ).datepicker({

            });
        } );
    </script>
@endsection
@section('content')
    <form action="{{url("admin/event/edit",[$event->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="card-body">
            <div class="form-group">
                <label for="event">Name Event</label>
                <input type="text" name="name" value="{{$event->name}}" class="form-control"  placeholder="Enter Name" required>
            </div>

            <div class="form-group">
                <label for="thumbnail">Thumbnail Title</label>
                <input value="{{$event->thumbnail}}" type="file" name="thumbnail"  class="form-control" id="upload">
                <div  id="image_show" >
                    <input type="text" value="{{$event->thumbnail}}">
                </div>
                <input  type="hidden"  id="thumb">
            </div>

            <div class="form-group">
                <div style="margin-right: 15px;display: inline-block">
                    <label for="date" >From Date : </label>
                    <input type="date" value="{{$event->date_from}}" name="date_from" id="date" placeholder="yyyy-mm-dd" required>
                    <input type="text" value="{{$event->date_from}}">
                </div>
                <div style="display: inline-block">
                    <label for="date" >To Date : </label>
                    <input type="date" value="{{$event->date_to}}" name="date_to" id="date" placeholder="yyyy-mm-dd" required>
                    <input type="text" value="{{$event->date_to}}">
                </div>
            </div>

            <div class="form-group">
                <label>Qty Register</label>
                <input type="" value="{{$event->qty}}" name="qty" class="form-control"  placeholder="Qty" required>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" value="{{$event->address}}" name="address" class="form-control"  placeholder="Address" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" row="5" required>{{$event->description}}</textarea>
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit Event</button>
        </div>

    </form>
@endsection

@section("after_js")
    <script>

        flatpickr( "input[type=date] " );
        // config = {
        //     EnableTime : true ,
        //     dateFormat : 'Ymd H:i' ,
        // }
        // Flatpickr( "input[type=datetime-local]" , config);
    </script>
@endsection
