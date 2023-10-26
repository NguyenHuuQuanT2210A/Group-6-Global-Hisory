@extends("admin.layouts.app")

@section('content')
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
            <button type="submit" class="btn btn-primary">Tao Danh muc</button>
        </div>
        @csrf
    </form>
@endsection
