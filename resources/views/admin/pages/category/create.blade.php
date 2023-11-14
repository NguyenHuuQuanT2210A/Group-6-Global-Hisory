@extends("admin.layouts.app")

@section('content')
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
            </div>
            <div class="ibox-body">
                <form action="{{url("admin/category/create")}}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category">Ten Danh Muc</label>
                            <input type="text" name="name" value="{{old("name")}}" class="form-control"  placeholder="Enter Name" required>
                        </div>
                        {{--            <div class="form-group">--}}
                        {{--                <label >Danh Muc</label>--}}
                        {{--                <select name="parent_id" class="form-control">--}}
                        {{--                    <option value="0">Choose category Parent</option>--}}
                        {{--                    @foreach($categories as $item)--}}
                        {{--                        <option value="{{$item->id}}">{{$item->name}}</option>--}}
                        {{--                    @endforeach--}}
                        {{--                </select>--}}
                        {{--            </div>--}}

                    </div>

                    <div class="card-footer">
                        <button style="cursor: pointer" type="submit" class="btn btn-primary">Create Category</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>

@endsection
