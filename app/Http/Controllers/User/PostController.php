<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\LikeComment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use SebastianBergmann\Diff\Exception;
use Brian2694\Toastr\Facades\Toastr;

class PostController extends Controller
{

    public function forum(Request $request)
    {
        $categories = Category::all();
        $tags = Tag::all();

        $posts = Post::Search($request)
            ->SearchPost($request)
            ->CreatedAt($request)
            ->where("is_approved",1 )
            ->orderByDesc("id")
            ->paginate(15);
        foreach ($posts as $item){
            $count = Comment::where("post_id",$item->id)->where("parent_id",0)->count();
             $item->count_comment = $count;
             $item->save();
        }
        $post_related = Post::where("is_approved", 1)->orderBy("created_at")->limit(5)->get();
        $post_new = Post::where("is_approved", 1)->orderByDesc("created_at")->limit(5)->get();
        return view("user.pages.forum.index",compact("categories","tags","posts","post_related","post_new"));
    }

    public function forumCategory(Category $category, Request $request)
    {

        $posts = Post::Search($request)
            ->SearchPost($request)
            ->CreatedAt($request)
            ->where("category_id",$category->id)
            ->where("is_approved",1 )
            ->orderByDesc("id")
            ->paginate(15);
        foreach ($posts as $item){
            $count = Comment::where("post_id",$item->id)->where("parent_id",0)->count();
            $item->count_comment = $count;
            $item->save();
        }
        $categories = Category::all();
        $tags = Tag::all();
        $post_related = Post::where("is_approved", 1)->orderBy("created_at")->limit(5)->get();
        $post_new = Post::where("is_approved", 1)->orderByDesc("created_at")->limit(5)->get();
        return view("user.pages.forum.forum_category",compact("category","categories","tags","posts","post_related","post_new"));
    }
    public function forumTag(Tag $tag, Request $request)
    {
        $posts = Post::Search($request)
            ->SearchPost($request)
            ->CreatedAt($request)
            ->whereJsonContains('tag_id', $tag->name)
            ->where("is_approved",1 )
            ->orderByDesc("id")
            ->paginate(15);
        foreach ($posts as $item){
            $count = Comment::where("post_id",$item->id)->where("parent_id",0)->count();
            $item->count_comment = $count;
            $item->save();
        }
        $categories = Category::all();
        $tags = Tag::all();
        $post_related = Post::where("is_approved", 1)->orderBy("id")->limit(5)->get();
        $post_new = Post::where("is_approved", 1)->orderByDesc("created_at")->limit(5)->get();
        return view("user.pages.forum.forum_tag",compact("tag","categories","tags","posts","post_related","post_new"));
    }

    public function createPost()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post_related = Post::where("is_approved", 1)->orderBy("id")->limit(5)->get();
        $post_new = Post::where("is_approved", 1)->orderByDesc("id")->limit(5)->get();
        return view("user.pages.forum.create_post",compact("categories","tags","post_related","post_new"));
    }

    public function createPostStore(Request $request)
    {

        $request->validate([
            "title"=>"required",
            "category_id" =>"required ",
            "tag_id" =>"required",
            "body"=>"required",
        ]);
        try{
            Post::create([
                "title"=>$request->get("title"),
                "slug"=> Str::slug($request->get("title")),
                "category_id"=>$request->get("category_id"),
                "tag_id"=>$request->get("tag_id"),
                "user_id"=>Auth::user()->id,
                "body"=>$request->get("body"),
            ]);
            Toastr::success("The post has been sent to admin, please wait for a response!","Success!");
            return redirect()->to("forum/");
        }catch (\Exception $errors){
            return redirect()->back()->withErrors($errors->getMessage());
        }
    }

    public function editPost(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("user.pages.forum.edit_post",compact("post","categories","tags"));
    }

    public function updatePost(Request $request, Post $post)
    {
        $request->validate([
            "title"=>"required",
            "category_id" =>"required",
            "tag_id" =>"required",
            "body"=>"required",
        ]);
        try{
        $post->update([
            "title"=>$request->get("title"),
            "slug"=> Str::slug($request->get("title")),
            "category_id"=>$request->get("category_id"),
            "tag_id"=>$request->get("tag_id"),
            "user_id"=>Auth::user()->id,
            "body"=>$request->get("body"),
        ]);
            Toastr::success("Post updated successfully!","Success!");
        return redirect()->to("forum/");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    public function deletePost(Post $post)
    {
        $post->delete();
        Toastr::success("Deleted post successfully!","Success!");
        return redirect()->to("forum/");
    }

    public function singlePost(Post $post, Request $request)
    {
        $likes = Like::where('like',1)->where("post_id",$post->id)->get();
        $likes_latest = Like::where('like',1)->orderByDesc('id')->limit(1)->get();
        $categories = Category::all();
        $tags = Tag::all();
        $viewed_post = Session::get('viewed_post', []);
        if (!in_array($post->id, $viewed_post)) {
            $post->update([
                "view_count" =>$post->increment('view_count')
            ]);

            Session::push('viewed_post', $post->id);
        }

        $cmts = Comment::where('post_id',$post->id)
            ->where('parent_id',0)->get();
        $url = $request->url();
        $post_related = Post::where("is_approved", 1)->orderBy("id")->limit(5)->get();
        $post_new = Post::where("is_approved", 1)->orderByDesc("id")->limit(5)->get();
        return view("user.pages.forum.single",compact("post","categories","tags","post_related","post_new","cmts","likes","likes_latest","url"));
    }
}
