<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::Search($request)->paginate(10);
        return view("admin.pages.category.category",['categories'=>$categories]);
    }


    public function create()
    {
        return view("admin.pages.category.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|min:6",
        ]);
        try{
            Category::create([
                "name"=>$request->get("name"),
                "slug"=> Str::slug($request->get("name")),
            ]);
            return redirect()->to("/admin/category")->with("success","Successfully");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }


    public function edit(Category $category){
        $categories = Category::all();
        return view("admin.pages.category.edit",compact('category','categories'));
    }


    public function update(Category $category,Request $request){
        $request->validate([
            "name"=>"required|min:6",
        ]);
        try {
            $category->update([
                "name"=>$request->get("name"),
                "slug"=> Str::slug($request->get("name")),
            ]);
            return redirect()->to("/admin/category")->with("success","Successfully");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }


    public function delete(Category $category){
        try {
            $category->delete();
            return redirect()->to("/admin/category")->with("success","Successfully");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

}
