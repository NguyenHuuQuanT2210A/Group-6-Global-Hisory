<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentBlog extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'blog_id','comment','parent_id'];
    use SoftDeletes;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
