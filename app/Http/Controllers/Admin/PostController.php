<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function listPost(Request $request)
    {
        $search = $request->get("search");
        $posts = Post::orderByDesc("id")->Search($request)->paginate(10);
        return view("admin.pages.post.list_post",compact("posts"));
    }

    public function postDetail(Post $post)
    {
        $can_approved = false;
        if ($post->is_approved == 0 || $post->is_approved == 2 || $post->is_approved == 1){
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
            return redirect()->to("/admin/post/")->with("success","Successfully");
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
            return redirect()->to("/admin/post/")->with("success","Successfully");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete(Post $post)
    {
        try {
            $post->delete();
            return redirect()->to("/admin/post/")->with("success","Successfully");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
