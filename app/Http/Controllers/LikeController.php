<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
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
                return back();
            }elseif ($item->user_id == Auth::user()->id && $item->like == 0 && $item->post_id == $post->id){
                $item->update([
                    'like' => true
                ]);
                return back();
            }
        }
//        dd($likes);
        Like::create([
           'user_id' => Auth::user()->id,
           'post_id' => $post->id,
           'like' => true
        ]);


        return back();
    }
}
