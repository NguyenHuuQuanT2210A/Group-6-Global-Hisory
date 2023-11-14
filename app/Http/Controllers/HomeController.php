<?php

namespace App\Http\Controllers;

use App\Events\CreateNewUserEvent;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Like;
use App\Models\LikeEvent;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPUnit\Framework\Constraint\Count;
use function Laravel\Prompts\alert;

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
