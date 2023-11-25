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
                <div class="ibox-title">Participants Event</div>
                <div>
                    <form action="{{url("/admin/event/user_event")}}" method="get">
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
                    <thead >
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Address</th>
                        <th>Event</th>
                        <th>User</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user_event as $item)
                        <tr>
                            <td>#{{$loop->index+1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->tel}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->name_event}}</td>
                            <td>{{$item->user->name}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                    {!! $user_event->links("pagination::bootstrap-5") !!}
                </div>
            </div>
        </div>
    </div>
@endsection
