<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['thumbnail','title', 'slug', 'body','category_id', 'tag_id', 'user_id'];
//    protected $casts=['tag_id'=>'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
//    public function like()
//    {
//        return $this->belongsTo(Like::class);
//    }

    public function commentBlog()
    {
        return $this->belongsTo(CommentBlog::class);
    }

    public function scopeSearch($query,$request){
        if($request->has("search")&& $request->get("search") != ""){
            $search = $request->get("search");
            $query->where("title","like","%$search%")
                ->orWhere("slug","like","%$search%");
        }
        return $query;
    }

    public function scopeCategory($query,$request){
        if($request->has("category_id")&& $request->get("category_id") != 0){
            $category_id = $request->get("category_id");
            $query->where("category_id",$category_id);
        }
        return $query;
    }

    public function scopeTag($query,$request){
        if($request->has("tag_id") && $request->get("tag_id") != ""){
            $tag_id = $request->get("tag_id");
            $query->where("tag_id",$tag_id);
        }
        return $query;
    }
}
