<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CommentBlog;
use App\Models\Event;
use App\Models\LikeBlog;
use App\Models\LikeCommentBlog;
use App\Models\Post;
use App\Models\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $search = $request->get("search");
        $category_id = $request->get("category_id");
        $tag_id = $request->get("tag_id");


        $blogs = Blog::Search($request)
            ->Category($request)
            ->Tag($request)
            ->orderByDesc("id")
            ->paginate(10);
        return view("admin.pages.blog.blog",compact("blogs","categories","tags"));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("admin.pages.blog.create",compact("categories","tags"));
    }


    public function store(Request $request)
    {
        $request->validate([
            "thumbnail"=>"required|mimes:png,jpg,jpeg,gif|mimetypes:image/jpeg,image/png,image/jpg",
            "title"=>"required|min:6",
            "category_id" =>"required",
            "tag_id" =>"required",
            "body"=>"required",
        ]);
        try{
        $thumbnail = null;
        if ($request->hasFile("thumbnail")) {
            $path = public_path("uploads/blogs");
            $file = $request->file("thumbnail");
            $file_name = Str::random(5).time().Str::random(5).".".$file->getClientOriginalExtension(); //$file->getClientOriginalName() lay anh goc tu may cua minh len
            $file->move($path, $file_name);
            $thumbnail = "/uploads/blogs/" . $file_name;
        }
        Blog::create([
            "thumbnail"=> $thumbnail,
            "title"=>$request->get("title"),
            "slug"=> Str::slug($request->get("title")),
            "category_id"=>$request->get("category_id"),
            "tag_id"=>$request->get("tag_id"),
            "user_id"=>Auth::user()->id,
            "body"=>$request->get("body"),
        ]);
        Toastr::success("Created Blog Success!","success");
        return redirect()->to("admin/blog");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

    public function blogDetail(Blog $blog)
    {
        return view("admin.pages.blog.blog_detail",compact("blog"));
    }

    public function edit(Blog $blog){
        $categories = Category::all();
        $tags = Tag::all();
        return view("admin.pages.blog.edit",compact("blog","categories","tags"));
    }


    public function update(Blog $blog,Request $request){
        $request->validate([
            "thumbnail"=>"nullable|mimes:png,jpg,jpeg,gif|mimetypes:image/jpeg,image/png,image/jpg",
            "title"=>"required|min:6",
            "category_id" =>"required",
            "tag_id" =>"required",
            "body"=>"required",
        ]);
        try{
        $thumbnail = $blog->thumbnail;

            if ($request->hasFile("thumbnail")) {
                $path = public_path("uploads/blogs");
                $file = $request->file("thumbnail");
                $file_name = Str::random(5).time().Str::random(5).".".$file->getClientOriginalExtension(); //$file->getClientOriginalName() lay anh goc tu may cua minh len
                $file->move($path, $file_name);
                $thumbnail = "/uploads/blogs/" . $file_name;
            }
        $blog->update([
                "thumbnail"=> $thumbnail,
            "title"=>$request->get("title"),
            "slug"=> Str::slug($request->get("title")),
            "category_id"=>$request->get("category_id"),
            "tag_id"=>$request->get("tag_id"),
            "user_id"=>Auth::user()->id,
            "body"=>$request->get("body"),
        ]);
            Toastr::success("Updated Blog Success!","success");
        return redirect()->to("admin/blog");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }


    public function delete(Blog $blog){
        try {
            $blog->delete();
            Toastr::success("Deleted Blog Success!","success");
            return redirect()->to("admin/blog");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

}
