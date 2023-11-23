<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Event;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {
//        return dd($request);
        $datee = Carbon::today();
        $date = Carbon::today()->subDays(7);
//        $view_top = Post::where('created_at','>=',$date)->get();

        //        Post::update([
//            "date_now"=>$date,
//        ]);

        $categories = Category::all();
        $posts = Post::where("is_approved", 1)->orderByDesc("created_at")->paginate(4);
        $blog_trending = Blog::orderByDesc("view_count")->limit(3)->get();
        $post_view_top = Post::where("is_approved", 1)->orderBy("created_at")->limit(1)->get();
        $post_slider = Post::where("is_approved", 1)->orderBy("created_at")->limit(3)->get();
        $post_slider_row = Post::where("is_approved", 1)->orderByDesc("created_at")->limit(3)->get();

        $event_features = Event::orderByDesc("id")->limit(5)->get();

        $events_hot = Event::orderByDesc("qty_registered")->limit(3)->get();
        return view("user.pages.home",compact("categories","posts","blog_trending","post_view_top","post_slider","post_slider_row","event_features","events_hot"));
    }


    public function aboutUs()
    {
        return view("user.pages.about_us");
    }
    public function contact()
    {
        return view("user.pages.contact");
    }
}
