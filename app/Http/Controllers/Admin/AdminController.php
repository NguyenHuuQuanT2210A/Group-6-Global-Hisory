<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Event;
use App\Models\Post;
use App\Models\User;
use App\Models\User_Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = User::all();
        $category = Category::all();
        $post = Post::all();
        $event = Event::all();
        $user_event = User_Event::all();
        $blog = Blog::all();

        return view("admin.pages.dashboard",compact([
            'user',
            'category',
            'post' ,
            'event',
            'blog',
            'user_event'
        ]));
    }
    public function user(Request $request )
    {
        $search = $request->get("search");

        $users = User::Search($request)->paginate(10);


        return view("admin.pages.users",compact("users"));
    }


    public  function category(Request $request )
    {
        $search = $request->get("search");

        $category = Category::Search($request)->paginate(10);

        return view("admin.pages.category.category",compact("category"));

    }



}
