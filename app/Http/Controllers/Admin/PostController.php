<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function listPost(Request $request)
    {
        $categories = Category::all();
        $tags = Tag::all();
//        $search = $request->get("search");

        $posts = Post::Search($request)
            ->Category($request)
            ->Tag($request)
            ->Status($request)
            ->orderByDesc("id")
            ->paginate(10);
        return view("admin.pages.post.list_post",compact("posts","categories","tags"));
    }

    public function postDetail(Post $post)
    {
        $can_approved = false;
        if ($post->is_approved == 0 || $post->is_approved == 2){
            $can_approved = true;
        }
        return view("admin.pages.post.post_detail",compact("post","can_approved"));
    }

    public function postDetailApproved(Post $post)
    {
        try {
            $post->update([
                "is_approved"=> Post::APPROVED,
            ]);
            Toastr::success("Post Approved!","success");
            return redirect()->to("/admin/post");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

    public function postDetailUnapproved(Post $post)
    {
        try {
            $post->update([
                "is_approved"=> Post::UNAPPROVED,
            ]);
            Toastr::success("Post Unapproved!","success");
            return redirect()->to("/admin/post/");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete(Post $post)
    {
        try {
            $post->delete();
            Toastr::success("Deleted Post Success!","success");
            return redirect()->to("/admin/post/");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
