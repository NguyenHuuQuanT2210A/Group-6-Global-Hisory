<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createPost()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
