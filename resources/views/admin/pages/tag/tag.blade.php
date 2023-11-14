@extends("admin.layouts.app")
@section("after_css")
    <link href="html/dist/assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />

@endsection
@section("content")
    <div class="page-heading">
        <h1 class="page-title">DataTables</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title"><a href="{{ url("admin/tag/create") }}">Create New Tag</a></div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        {{--                        <th>ID</th>--}}
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        {{--                        <th>ID</th>--}}
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($tags as $item)
                        <tr>
                            {{--                            <td>#{{$loop->index+1}}</td>--}}
                            <td>{{$item->name}}</td>
                            <td>{!! $item->description !!}</td>
                            <td>
                                <a href="{{url("admin/tag/edit",['category'=>$item->id])}}" class="btn btn-outline-info">Sửa</a>
                                <form action="{{url("admin/tag/delete",['category'=>$item->id])}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button style="cursor: pointer" onclick="return confirm('Chắc chắn muốn xoá Tag này? ' +
                                         'Nếu bạn xóa sẽ bị mất hết dữ liệu liên quan đến Tag này, bạn vẫn đồng ý chứ?')" class="btn btn-outline-danger" type="submit">
                                        Delete</button>
                                </form>
                                {{--                                    <a href="{{url("admin/category/child_category",['category'=>$item->id])}}" class="btn btn-outline-info">Create New Child Category</a>--}}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $tags->links("pagination::bootstrap-5") }}
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
