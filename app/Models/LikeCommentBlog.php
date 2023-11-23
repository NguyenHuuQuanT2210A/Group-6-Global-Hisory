<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LikeCommentBlog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "like_comment_blogs";
    protected $fillable = ['user_id','blog_id', 'comment_id', 'like_cmt_blog'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
    public function commentBlog()
    {
        return $this->hasMany(CommentBlog::class);
    }
}
