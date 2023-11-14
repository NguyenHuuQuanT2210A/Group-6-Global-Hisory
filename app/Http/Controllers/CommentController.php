<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function postComment(Request  $request, Post $post)
    {

//        dd($request);

        $request->validate([
            'comment' => 'required'
        ]);
            if ($request->comment == ''){
                return back()->withErrors('Vui long nhap comment');
            }
            Comment::create([
                'post_id' => $post->id,
                'user_id' => Auth::user()->id,
                'comment' => $request->comment
            ]);
            $request->session()->flash('alert-success','Comment added successfully.');


        return  back();
    }

    public function postCommentReply(Request $request, Comment $comment, Post $post)
    {
        $comment_reply = $request->comment;

//        dd($request);
//        try {
            $result = Comment::create([
                'parent_id' => $comment->id,
                'user_id' =>Auth::user()->id,
                'comment' =>$comment_reply,
                'post_id' =>$post->id
            ]);
//        }catch (\Exception $ex){
//            return back()->withErrors($ex->getMessage());
//        }

//        $cmts_reply = Comment::where('parent_id',$comment->id)->get();
//        dd($cmts_reply);

        $request->session()->flash('alert-success','Comment reply added successfully');

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
        $request->session()->flash('alert-success','Comment reply deleted successfully');

        return back();

    }


}
