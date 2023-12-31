<?php

namespace App\Http\Controllers;

use App\Events\CreateNewUserEvent;
use App\Models\Category;
use App\Models\Event;
use App\Models\LikeEvent;
use App\Models\Tag;
use App\Models\User_Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function event(Request $request)
    {
        $events = Event::orderByDesc("created_at")->Search($request)->paginate(6);
        return view("user.pages.event.event",compact("events"));
    }
    public function blogEvent(Event $event)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $like_events = LikeEvent::where('like',1)->get();
        $likes_events_latest = LikeEvent::where('like',1)->orderByDesc('id')->limit(1)->get();

        $viewed_event = Session::get('viewed_event', []);
        if (!in_array($event->id, $viewed_event)) {
            $event->increment('view_count');
            Session::push('viewed_event', $event->id);
        }

        $event_popular = Event::orderByDesc("view_count")->paginate(5);
        $event_latest = Event::orderByDesc("created_at")->paginate(4);
        return view("user.pages.event.blog_event",compact("categories","tags","event","event_popular","event_latest","like_events","likes_events_latest"));

    }

    public function registerEvent(Event $event, Request $request)
    {
//        $rq_id = $request->ip();
        $user = User_Event::all();
        foreach ($user as $items) {
            if (($event->id == $items->event_id) && ($items->user_id == Auth::user()->id)) {
                return redirect()->back()->withErrors("Mỗi tài khoản chỉ được phép đăng ký một lần!");
            }
        }
        $request->validate([
            "name" =>"required",
            "email" =>"required",
            "tel" => "required",
            "address" =>"required"
        ]);

        $user_registered = User_Event::create([
            "name" => $request->get("name"),
            "slug" => Str::slug($request->get("name")),
            "email" => $request->get("email"),
            "tel" => $request->get("tel"),
            "address" => $request->get("address"),
            "user_id" => Auth::user()->id,
            "event_id" => $event->id
        ]);
        $count = User_Event::where('event_id', $event->id)->count();
        $event->update([
            "qty_registered" => $count,
        ]);
        if ($event->qty == $event->qty_registered){
            $event->update([
                "status" => Event::FULL,
            ]);
        }
        event(new CreateNewUserEvent(($user_registered)));
        return redirect("/");
    }
}
