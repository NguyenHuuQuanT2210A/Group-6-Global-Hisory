@extends("admin.layouts.app")
@section("content")
    <div class="page-heading">
        <h1 class="page-title">Edit Category</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Edit</div>
            </div>
            <div class="ibox-body">
                <form action="{{url("admin/category/edit",['category'=>$category->id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category">Name</label>
                            <input type="text" name="name" value="{{$category->name}}" class="form-control"
                                   placeholder="Enter Name" required>
                            @error("name")
                            <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                            @enderror
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button style="cursor: pointer" type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
