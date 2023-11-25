<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "categories";
    protected $primaryKey = "id";
    protected $fillable =
        [
            "name",
            "slug",
        ];

    public function scopeSearch($query,$request){
        if($request->has("search")&& $request->get("search") != ""){
            $search = $request->get("search");
            $query->where("name","like","%$search%")
                ->orWhere("slug","like","%$search%");
        }
        return $query;
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
    public function event()
    {
        return $this->hasMany(Event::class);
    }

}
