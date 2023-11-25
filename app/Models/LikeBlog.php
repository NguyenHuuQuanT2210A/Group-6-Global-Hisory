<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LikeBlog extends Model
{
    use HasFactory;
    protected $table = "like_blogs";
    protected $fillable = ['user_id','blog_id', 'like'];
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
