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

//    public function comments()
//    {
//        return $this->belongsTo(Comment::class);
//    }

    public function scopeSearch($query,$request){
        if($request->has("search")&& $request->get("search") != ""){
            $search = $request->get("search");
            $query->where("name","like","%$search%")
                ->orWhere("slug","like","%$search%");
        }
        return $query;
    }
}
