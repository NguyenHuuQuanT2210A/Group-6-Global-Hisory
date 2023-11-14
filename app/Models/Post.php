<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title', 'slug', 'body','category_id', 'tag_id', 'user_id', 'is_approved'];
    protected $casts=['tag_id'=>'array'];

    const PENDING = 0;
    const APPROVED = 1;
    const UNAPPROVED = 2;
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
    public function like()
    {
        return $this->belongsTo(Like::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
    public function likeComment()
    {
        return $this->belongsTo(LikeComment::class);
    }
    public function scopeSearch($query,$request){
        if($request->has("search")&& $request->get("search") != ""){
            $search = $request->get("search");
            $query->where("name","like","%$search%")
                ->orWhere("slug","like","%$search%");
        }
        return $query;
    }

//    public function getApprove()
//    {
//        return $this->is_approved?"<span class='text-success'>Đã Duyệt</span>"
//            : "<span class='text-secondary'> Chưa Duyệt</span>";
//    }
    public function getApprove()
    {
        switch ($this->is_approved){
            case self::PENDING: return "<span class='text-secondary'>Chưa Duyệt</span>";
            case self::APPROVED: return "<span class='text-success'>Đã Duyệt</span>";
            case self::UNAPPROVED: return "<span class='text-danger'>Không Duyệt</span>";
        }
    }




}
