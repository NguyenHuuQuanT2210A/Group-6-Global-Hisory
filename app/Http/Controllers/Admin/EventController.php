<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CommentBlog;
use App\Models\Event;
use App\Models\LikeEvent;
use App\Models\Tag;
use App\Models\User_Event;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $search = $request->get("search");
        $category_id = $request->get("category_id");
        $tag_id = $request->get("tag_id");
        $date_from = $request->get("date_from");
        $date_to = $request->get("date_to");

        $events = Event::Search($request)
            ->Category($request)
            ->Tag($request)
            ->Date($request)
            ->Status($request)
            ->orderByDesc("id")
            ->paginate(10);
        return view("admin.pages.event.event",compact("events","categories","tags"));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("admin.pages.event.create",compact("categories","tags"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "thumbnail"=>"required|mimes:png,jpg,jpeg,gif|mimetypes:image/jpeg,image/png,image/jpg",
            "name"=>"required|min:6",
            "date_from"=>"required",
            "date_to"=>'required|after:date_from',
            "qty" => "required",
            "address" => "required|min:6",
            "description" => "required|min:6",
            "category_id" => "required",
            "tag_id" =>"required",
        ]);
        try{
            $thumbnail = null;
            if ($request->hasFile("thumbnail")) {
                $path = public_path("uploads/events");
                $file = $request->file("thumbnail");
                $file_name = Str::random(5).time().Str::random(5).".".$file->getClientOriginalExtension(); //$file->getClientOriginalName() lay anh goc tu may cua minh len
                $file->move($path, $file_name);
                $thumbnail = "/uploads/events/" . $file_name;
            }
            $d = Event::create([
                "thumbnail"=> $thumbnail,
                "name"=>$request->get("name"),
                "slug"=> Str::slug($request->get("name")),
                "date_from"=>$request->get('date_from'),
                "date_to"=>$request->get('date_to'),
                "qty"=>$request->get("qty"),
                "address"=>$request->get("address"),
                "description"=>$request->get("description"),
                "category_id" => $request->get("category_id"),
                "tag_id" => $request->get("tag_id"),
            ]);
            Toastr::success("Created Event Successfully!","success");
            return redirect()->to("admin/event/");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

    public function edit(Event $event ){
        $categories = Category::all();
        $tags = Tag::all();
        return view("admin.pages.event.edit",compact('event',"categories","tags"));
    }

    public function update(Event $event,Request $request){
        $request->validate([
            "thumbnail"=>"nullable|mimes:png,jpg,jpeg,gif|mimetypes:image/jpeg,image/png,image/jpg",
            "name"=>"required|min:6",
            "date_from"=>"required",
            "date_to"=>"required|date|after:date_from",
            "qty" => "required",
            "address" => "required",
            "description" => "required",
            "category_id" => "required",
            "tag_id" =>"required",
        ]);
        try {
            $thumbnail = $event->thumbnail;
            // xu ly upload file
            if($request->hasFile("thumbnail")) {
                $path = public_path("uploads/events");
                $file = $request->file("thumbnail");
                $file_name = Str::random(5) . time() . Str::random(5) . "." . $file->getClientOriginalExtension();
                $file->move($path, $file_name);
                $thumbnail = "/uploads/events/" . $file_name;
            }
            $event->update([
                "thumbnail"=> $thumbnail,
                "name"=>$request->get("name"),
                "slug"=> Str::slug($request->get("name")),
                "date_from"=>$request->get("date_from"),
                "date_to"=>$request->get("date_to"),
                "qty"=>$request->get("qty"),
                "address"=>$request->get("address"),
                "description"=>$request->get("description"),
                "category_id" => $request->get("category_id"),
                "tag_id" => $request->get("tag_id"),
            ]);
            Toastr::success("Updated Event Successfully!","success");
            return redirect()->to("/admin/event");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete(Event $event){
        try {
            $event->delete();
            Toastr::success("Deleted Event Successfully!","success");
            return redirect()->to("/admin/event");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function userEvent(Request $request)
    {
        $user_event = User_Event::Search($request)->orderByDesc("id")->paginate(10);
        return view("admin.pages.event.user_event",compact("user_event"));
    }
}
