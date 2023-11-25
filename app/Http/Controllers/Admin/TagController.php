<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::Search($request)->orderByDesc("id")->paginate(10);
        return view("admin.pages.tag.tag",['tags'=>$tags]);
    }

    public function create()
    {
        return view("admin.pages.tag.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|min:6",
            "description" => "required"
        ]);
        try{
            Tag::create([
                "name"=>$request->get("name"),
                "slug"=> Str::slug($request->get("name")),
                "description" => $request->get("description")
            ]);
            Toastr::success("Created Tag Successfully!","Success!");
            return redirect()->to("/admin/tag");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function edit(Tag $tag){
        $tags = Tag::all();
        return view("admin.pages.tag.edit",compact('tag','tags'));
    }

    public function update(Tag $tag,Request $request){
        $request->validate([
            "name"=>"required|min:6",
            "description" => "required"
        ]);
        try {
            $tag->update([
                "name"=>$request->get("name"),
                "slug"=> Str::slug($request->get("name")),
                "description" => $request->get("description")
            ]);
            Toastr::success("Updated Tag Successfully!","Success!");
            return redirect()->to("/admin/tag");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete(Tag $tag){
        try {
            $tag->delete();
            Toastr::success("Deleted Tag Successfully!","Success!");
            return redirect()->to("/admin/tag");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
