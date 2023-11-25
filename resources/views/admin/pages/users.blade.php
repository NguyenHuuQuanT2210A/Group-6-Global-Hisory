@extends("admin.layouts.app")
@section("content")
    <div class="page-heading">
        <h1 class="page-title">User Table</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">User</div>
                <div>
                    <form action="{{url("/admin/user")}}" method="get">
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
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $item)
                        <tr>
                            <td>#{{$loop->index+1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                    {!! $users->links("pagination::bootstrap-5") !!}
                </div>
            </div>
        </div>
    </div>
@endsection
