<?php

namespace App\Http\Controllers\Interact;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likePost(Post $post)
    {
        $likes = Like::all();
        foreach ($likes as $item){
            if ($item->user_id == Auth::user()->id && $item->like == 1 && $item->post_id == $post->id){
                $item->update([
                    'like' => false
                ]);
                $post->update([
                   'count_like' => $post->decrement('count_like')
                ]);
                return back();
            }elseif ($item->user_id == Auth::user()->id && $item->like == 0 && $item->post_id == $post->id){
                $item->update([
                    'like' => true
                ]);
                $post->update([
                    'count_like' => $post->increment('count_like')
                ]);

                return back();
            }
        }
        Like::create([
           'user_id' => Auth::user()->id,
           'post_id' => $post->id,
           'like' => true
        ]);
        $post->update([
            'count_like' => $post->increment('count_like')
        ]);
        return back();
    }
}
