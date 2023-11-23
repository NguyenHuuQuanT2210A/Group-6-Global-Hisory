<?php

namespace App\Http\Controllers\Interact;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\LikeComment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeCommentController extends Controller
{
    public function likeCommentPost(Post $post, Comment $comment)
    {

        $likes_cmt = LikeComment::all();
        foreach ($likes_cmt as $item){
            if ($item->user_id == Auth::user()->id && $item->like_cmt_post == 1 && $item->post_id == $post->id && $item->comment_id == $comment->id){
                $item->update([
                    'like_cmt_post' => false
                ]);
//                $comment->update([
//                    'count_like_cmt' => $comment->decrement('count_like_cmt')
//                ]);


                return back();
            }elseif ($item->user_id == Auth::user()->id && $item->like_cmt_post == 0 && $item->post_id == $post->id && $item->comment_id == $comment->id){
                $item->update([
                    'like_cmt_post' => true
                ]);
//                $comment->update([
//                    'count_like_cmt' => $comment->increment('count_like_cmt')
//                ]);
                return back();
            }
        }
//        dd($likes);
        LikeComment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'comment_id' => $comment->id,
            'like_cmt_post' => true
        ]);
//        $comment->update([
//            'count_like_cmt' => $comment->increment('count_like_cmt')
//        ]);

        return back();
    }
}
