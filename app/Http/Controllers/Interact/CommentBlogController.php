<?php

namespace App\Http\Controllers\Interact;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CommentBlog;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentBlogController extends Controller
{
    public function postComment(Request  $request, Blog $blog)
    {

//        dd($request);

//        $request->validate([
//            'comment' => 'required'
//        ]);
        if ($request->comment == ''){
            return back()->with('error','Vui long nhap comment');
        }
        CommentBlog::create([
            'blog_id' => $blog->id,
            'user_id' => Auth::user()->id,
            'comment' => $request->comment
        ]);
        $blog->update([
            'count_comment' => $blog->increment('count_like')
        ]);
//        $request->session()->flash('success','Comment added successfully.');
        Toastr::success("Comment added successfully!","Success");

        return  back();
    }

    public function postCommentReply(Request $request, CommentBlog $commentBlog, Blog $blog)
    {
        $comment_reply = $request->comment;

//        dd($request);
//        try {
        CommentBlog::create([
            'parent_id' => $commentBlog->id,
            'user_id' =>Auth::user()->id,
            'comment' =>$comment_reply,
            'blog_id' =>$blog->id
        ]);
//        }catch (\Exception $ex){
//            return back()->withErrors($ex->getMessage());
//        }

//        $cmts_reply = Comment::where('parent_id',$comment->id)->get();
//        dd($cmts_reply);
        Toastr::success("Comment reply added successfully!","Success");
//        $request->session()->flash('success','Comment reply added successfully');

        return back();
    }


    public function deleteCommentReply(Request $request, CommentBlog $commentBlog)
    {
        $delete_cmt = CommentBlog::where('parent_id',$commentBlog->id)->get();

        foreach ($delete_cmt as $item){
            $cmt_reply = CommentBlog::where('parent_id',$item->id)->get();
            foreach ($cmt_reply as $reply){
                $reply->delete();
            }
            $item->delete();
        }
        $commentBlog->delete();
        Toastr::success("Comment reply deleted successfully","Success");
//        $request->session()->flash('success','Comment reply deleted successfully');

        return back();

    }
}
