<?php

namespace App\Http\Controllers\Interact;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function postComment(Request  $request, Post $post)
    {
        if ($request->comment == ''){
            Toastr::error("Vui long nhap comment!","Error!");
            return redirect()->back();
        }
            Comment::create([
                'post_id' => $post->id,
                'user_id' => Auth::user()->id,
                'comment' => $request->comment
            ]);
        $post->update([
            'count_comment' => $post->increment('count_comment')
        ]);
        Toastr::success("Comment added successfully!","Success");
        return  back();
    }

    public function postCommentReply(Request $request, Comment $comment, Post $post)
    {
        $comment_reply = $request->comment;
        if ($comment_reply == ''){
            Toastr::error("Vui long nhap comment reply!","Error!");
            return redirect()->back();
        }
            Comment::create([
                'parent_id' => $comment->id,
                'user_id' =>Auth::user()->id,
                'comment' =>$comment_reply,
                'post_id' =>$post->id
            ]);
        Toastr::success("Comment reply added successfully!","Success");
        return back();
    }

    public function deleteCommentReply(Request $request, Comment $comment)
    {
        $delte_cmt = Comment::where('parent_id',$comment->id)->get();

        foreach ($delte_cmt as $item){
            $cmt_reply = Comment::where('parent_id',$item->id)->get();
            foreach ($cmt_reply as $reply){
                $reply->delete();
            }
                $item->delete();
        }
        $comment->delete();
        Toastr::success("Comment reply deleted successfully!","Success");
        return back();
    }
}
