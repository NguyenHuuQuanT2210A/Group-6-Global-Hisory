<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\LikeBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeBlogController extends Controller
{
    public function likeBlog(Blog $blog)
    {
        $like_blogs = LikeBlog::all();
        foreach ($like_blogs as $item){
            if ($item->user_id == Auth::user()->id && $item->like == 1 && $item->blog_id == $blog->id){
                $item->update([
                    'like' => false
                ]);
                return back();
            }elseif ($item->user_id == Auth::user()->id && $item->like == 0 && $item->blog_id == $blog->id){
                $item->update([
                    'like' => true
                ]);
                return back();
            }

        }
        LikeBlog::create([
            'user_id' => Auth::user()->id,
            'blog_id' => $blog->id,
            'like' => true
        ]);

        return back();
    }
}
