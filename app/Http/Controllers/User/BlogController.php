<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CommentBlog;
use App\Models\LikeBlog;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function blog()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $blogs = Blog::orderByDesc("id")->paginate(5);
        $blog_popular = Blog::orderByDesc("view_count")->limit(5)->get();
        return view("user.pages.blog.blog",compact("categories","blogs","tags","blog_popular"));
    }

    public function categoryBlog(Request $request, Category $category)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $blog_category = Blog::where("category_id",$category->id)->orderByDesc("created_at")->paginate(5);
        $blog_popular = Blog::orderByDesc("view_count")->limit(5)->get();
        return view("user.pages.blog.category_blog",compact("category","categories","tags","blog_category","blog_popular"));
    }

    public function tagBlog(Request $request,Tag $tag)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $blog_tag = Blog::where("tag_id",$tag->id)->orderByDesc("created_at")->paginate(5);
        $blog_popular = Blog::orderByDesc("view_count")->limit(5)->get();
        return view("user.pages.blog.tag_blog",compact("tag","categories","tags","blog_tag","blog_popular"));
    }

    public function blogDetail(Blog $blog)
    {
        $like_blogs = LikeBlog::where('like',1)->where("blog_id",$blog->id)->get();
        $categories = Category::all();
        $tags = Tag::all();

        $viewed_blog = Session::get('viewed_blog', []);
        if (!in_array($blog->id, $viewed_blog)) {
            $blog->increment('view_count');
            Session::push('viewed_blog', $blog->id);
        }
        $cmts = CommentBlog::where('blog_id',$blog->id)
            ->where('parent_id',0)->get();
        $blog_popular = Blog::orderByDesc("view_count")->limit(5)->get();
        $blog_related = Blog::orderBy("created_at")->limit(5)->get();
        $blog_new = Blog::orderByDesc("created_at")->limit(5)->get();
        return view("user.pages.blog.single",compact("blog","like_blogs","categories","tags","cmts","blog_popular","blog_related","blog_new"));
    }
}
