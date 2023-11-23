<?php

namespace App\Http\Controllers\Interact;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CommentBlog;
use App\Models\LikeCommentBlog;
use Illuminate\Support\Facades\Auth;

class LikeCommentBlogController extends Controller
{
    public function likeCommentBlog(Blog $blog, CommentBlog $commentBlog)
    {

        $likes = LikeCommentBlog::all();
        foreach ($likes as $item){
            if ($item->user_id == Auth::user()->id && $item->like_cmt_blog == 1 && $item->blog_id == $blog->id && $item->comment_id == $commentBlog->id){
                $item->update([
                    'like_cmt_blog' => false
                ]);
                $commentBlog->update([
                    'count_like_cmt' => $commentBlog->decrement('count_like_cmt')
                ]);
                return back();
            }elseif ($item->user_id == Auth::user()->id && $item->like_cmt_blog == 0 && $item->blog_id == $blog->id && $item->comment_id == $commentBlog->id){
                $item->update([
                    'like_cmt_blog' => true
                ]);
                $commentBlog->update([
                    'count_like_cmt' => $commentBlog->increment('count_like_cmt')
                ]);
                return back();
            }
        }
//        dd($likes);
        LikeCommentBlog::create([
            'user_id' => Auth::user()->id,
            'blog_id' => $blog->id,
            'comment_id' => $commentBlog->id,
            'like_cmt_blog' => true
        ]);
        $commentBlog->update([
            'count_like_cmt' => $commentBlog->increment('count_like_cmt')
        ]);

        return back();
    }
}
