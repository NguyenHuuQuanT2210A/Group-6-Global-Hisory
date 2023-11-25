@extends("admin.layouts.app")
@section("content")
    <div class="page-heading">
        <h1 class="page-title">Event Table</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title"><a href="{{ url("admin/event/create") }}">Create New Event</a></div>
                <div>
                <form action="{{url("/admin/event")}}" method="get">
                    <div class="input-group input-group-sm mr-2" style="width: 150px; float:left">
                        <select name="category_id" class="form-control" style="height: 33px !important;">
                            <option value="0">Filter by category</option>
                            @foreach($categories as $item)
                                <option @if($item->id==app("request")->input("category_id")) selected="selected" @endif
                                value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-sm mr-2" style="width: 150px; float:left">
                        <select  name="tag_id" class="form-control" style="height: 33px !important;">
                            <option value="">Filter by tag</option>
                            @foreach($tags as $tag)
                                <option @if($tag->id==app("request")->input("tag_id")) selected="selected" @endif
                                value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-sm mr-2" style="width: 150px; float:left; height: 33px">
                        <input value="{{app("request")->input("date_from")}}" class="form-control" type="date" name="date_from" placeholder="Date"/>
                    </div>
                    <div class="input-group input-group-sm mr-2" style="width: 150px; float:left; height: 33px">
                        <input value="{{app("request")->input("date_to")}}" class="form-control" type="date" name="date_to" placeholder="Date"/>
                    </div>
                    <div class="input-group input-group-sm mr-2" style="width: 140px; float:left;">
                        <select name="status" data-value="status" class="form-control" style="height: 33px !important;">
                            <option @if(app("request")->input("status") == "0") selected="selected" @endif value="0">Status</option>
                            <option @if(app("request")->input("status") == "1") selected="selected" @endif value="1">Full</option>
                            <option @if(app("request")->input("status") == "2") selected="selected" @endif value="2">Not Full</option>
                        </select>
                    </div>

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
                    <tbody>
                    @foreach($events as $item)
                        <tr>
                            <td>#{{$loop->index+1}}</td>
                            <td>{{$item->name}}</td>
                            <td><img width="100" src="{{$item->thumbnail}}"/></td>
                            <td>{{ date('d-M-Y H:i:s', strtotime($item->date_from)) }}</td>
                            <td>{{ date('d-M-Y H:i:s', strtotime($item->date_to)) }}</td>
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
                                    <button style="cursor: pointer"
                                            onclick="return confirm('Chắc chắn muốn xoá Event này?')"
                                            class="btn btn-outline-danger" type="submit">Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                {!! $events->links("pagination::bootstrap-5") !!}
                </div>
            </div>
        </div>
    </div>
@endsection
