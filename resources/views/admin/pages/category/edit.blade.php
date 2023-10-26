@extends("admin.layouts.app")
@section("content")
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url("admin/category/edit",['category'=>$category->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="card-body">
                <div class="form-group">
                    <label for="category">Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control"  placeholder="Enter Name" required>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Sửa category</button>
            </div>
        </form>
    </div>
@endsection
