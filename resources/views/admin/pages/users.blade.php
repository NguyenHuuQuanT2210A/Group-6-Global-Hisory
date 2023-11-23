@extends("admin.layouts.app")
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="card-tools">
                        <form action="{{url("/admin/user")}}" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;float:left">
                                <input value="{{app("request")->input("search")}}" type="text" name="search"
                                       class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $item)
                            <tr>
                                <td>#{{$loop->index+1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                {{--                                <td>--}}
                                {{--                                    <a href="{{url("admin/product/edit",['product'=>$item->id])}}" class="btn btn-outline-info">Sửa</a>--}}
                                {{--                                    <form action="{{url("admin/product/delete",['product'=>$item->id])}}" method="POST">--}}
                                {{--                                        @csrf--}}
                                {{--                                        @method("DELETE")--}}
                                {{--                                        <button onclick="return confirm('Chắc chắn muốn xoá sản phẩm: {{$item->name}}')" class="btn btn-outline-danger" type="submit">Delete</button>--}}
                                {{--                                    </form>--}}
                                {{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $users->links("pagination::bootstrap-5") !!}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
