<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LikeComment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "like_comments";
    protected $fillable = ['user_id','post_id', 'comment_id', 'like_cmt_post'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
