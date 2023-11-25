@extends("admin.layouts.app")
@section('content')
    <div class="page-heading">
        <h1 class="page-title">Create Category</h1>
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
                            <input type="text" name="name" value="{{old("name")}}" class="form-control"
                                   placeholder="Enter Name" required>
                            @error("name")
                            <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                            @enderror
                        </div>
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
