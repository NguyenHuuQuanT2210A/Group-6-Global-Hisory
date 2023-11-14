<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentBlog extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'blog_id','comment','parent_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
