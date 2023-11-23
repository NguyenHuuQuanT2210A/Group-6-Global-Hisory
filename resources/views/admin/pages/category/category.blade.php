@extends("admin.layouts.app")

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
                <div class="ibox-title"><a href="{{ url("admin/category/create") }}">Create New Category</a></div>
                <div>
                    <form action="{{url("/admin/category")}}" method="get">
                        <div class="input-group input-group-sm" style="width: 150px;float:left">
                            <input value="{{app("request")->input("search")}}" type="text" name="search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button style="cursor: pointer" type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ibox-body" style="padding-bottom: 50px;">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $item)
                        <tr>
                            <td>#{{$loop->index+1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->slug}}</td>
                            <td>
                                <a href="{{url("admin/category/edit",['category'=>$item->id])}}"
                                   class="btn btn-outline-info">Edit</a>
                                <form action="{{url("admin/category/delete",['category'=>$item->id])}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button style="cursor: pointer" onclick="return confirm('Chắc chắn muốn xoá Category này? '
                                         // 'Nếu bạn xóa sẽ bị mất hết dữ liệu liên quan đến Category này, bạn vẫn đồng ý chứ?' +
                                         )" class="btn btn-outline-danger" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                {!! $categories->links("pagination::bootstrap-5") !!}
                </div>
            </div>
        </div>

    </div>
@endsection

