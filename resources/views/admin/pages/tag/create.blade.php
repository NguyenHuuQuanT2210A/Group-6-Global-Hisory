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
                <div class="ibox-title">Create New Tag</div>
            </div>
            <div class="ibox-body">
                <form action="{{url("admin/tag/create")}}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tag">Name</label>
                            <input type="text" name="name" value="{{old("name")}}" class="form-control"
                                   placeholder="Enter Name" required>
                            @error("name")
                            <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{old("description")}}</textarea>
                            @error("description")
                            <p class="text-danger" style="margin: 5px 0 0 10px"><i>{{ $message }}</i></p>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button style="cursor: pointer" type="submit" class="btn btn-primary">Create Tag</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>

@endsection
