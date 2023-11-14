@extends("admin.layouts.app")
@section("after_css")
    <link href="html/dist/assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />

@endsection
@section("content")
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
                <div class="ibox-title"><a href="{{ url("admin/event/create") }}">Create New Event</a></div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Thumbnail</th>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th>Views</th>
                        <th>Qty Register</th>
                        <th>Qty Registered</th>
                        <th>Status</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Thumbnail</th>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th>Views</th>
                        <th>Qty Register</th>
                        <th>Qty Registered</th>
                        <th>Status</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($events as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td><img width="100" src="{{$item->thumbnail}}" /></td>
                            <td>{!! $item->date_from !!}</td>
                            <td>{{$item->date_to}}</td>
                            <td>{{$item->view_count}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{ $item->qty_registered }}</td>
                            <td>{!! $item->getStatus() !!}</td>
                            <td>{{$item->address}}</td>
                            <td>
                                <a href="{{url("admin/event/edit",['event'=>$item->id])}}" class="btn btn-outline-info">Edit</a>
                                <form action="{{url("admin/event/delete",['event'=>$item->id])}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button style="cursor: pointer" onclick="return confirm('Chắc chắn muốn xoá Event này?: {{$item->name}}')" class="btn btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $events->links("pagination::bootstrap-5") }}
            </div>
        </div>
    </div>
@endsection
@section("after_js")
    <script src="html/dist/assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
    </script>
@endsection
