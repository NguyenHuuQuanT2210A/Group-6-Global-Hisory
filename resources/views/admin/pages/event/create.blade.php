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
    <form action="{{url("admin/event/create")}}" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="event">Name Event</label>
                <input type="text" name="name" value="{{old("name")}}" class="form-control"  placeholder="Enter Name" required>
            </div>

            <div class="form-group">
                <label for="thumbnail">Thumbnail Title</label>
                <input type="file" name="thumbnail"  class="form-control" id="upload" required>
                <div  id="image_show" >
                    {{old("thumbnail")}}
                </div>
                <input type="hidden"  id="thumb">
            </div>

            <div class="form-group">
                <div style="margin-right: 15px;display: inline-block">
                <label for="date" >From Date : </label>
                <input type="date" value="{{old("date_from")}}" name="date_from" id="date" placeholder="yyyy-mm-dd" required>
                </div>
                <div style="display: inline-block">
                <label for="date" >To Date : </label>
                <input type="date" value="{{old("date_to")}}" name="date_to" id="date" placeholder="yyyy-mm-dd" required>
                </div>
            </div>

            <div class="form-group">
                <label>Qty Register</label>
                <input type="number" value="{{old("qty")}}" name="qty" class="form-control"  placeholder="Qty" required>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" value="{{old("address")}}" name="address" class="form-control"  placeholder="Address" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" row="5" required>{{old("description")}}</textarea>
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create Event</button>
        </div>
        @csrf
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
