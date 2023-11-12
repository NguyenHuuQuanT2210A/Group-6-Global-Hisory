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
                <div class="ibox-title">Data Table</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
{{--                        <th>ID</th>--}}
                        <th>Title</th>
                        <th>User Name</th>
                        <th>View</th>
                        <th>Like</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
{{--                        <th>ID</th>--}}
                        <th>Title</th>
                        <th>User Name</th>
                        <th>View</th>
                        <th>Like</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($posts as $item)
                        <tr>
{{--                            <td>#{{$loop->index+1}}</td>--}}
                            <td>{{$item->title}}</td>
                            <td>{{$item->User->name}}</td>
                            <td>{{$item->view_count}}</td>
                            @php
                                $comments = \App\Models\Comment::where("post_id",$item->id)->get();
                                $likes = \App\Models\Like::where("post_id",$item->id)->get();
                            @endphp
                            <td>{{ count($likes) }}</td>
                            <td>{{ count($comments) }}</td>
                            <td>{!! $item->getApprove() !!}</td>
                            <td>
                                <a href="{{url("admin/post/post_detail",['post'=>$item->slug])}}" class="btn btn-outline-info">Xem Chi Tiết</a>
                                {{--                                    <form action="{{url("admin/post/unapproved_list",['post'=>$item->id])}}" method="POST">--}}
                                {{--                                        @csrf--}}
                                {{--                                        <button onclick="return confirm('Chắc chắn không muốn duyệt Blog này?: {{$item->name}}')" class="btn btn-outline-danger" type="submit">Unapproved</button>--}}
                                {{--                                    </form>--}}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $posts->links("pagination::bootstrap-5") }}
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
