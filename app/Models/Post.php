<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title', 'slug', 'body','category_id', 'tag_id', 'user_id', 'is_approved','created_at', 'updated_at', 'deleted_at'];
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

    public function scopeSearchPost($query,$request){
        if($request->has("post_id")&& $request->get("post_id") != ""){
            $post_id = $request->get("post_id");
            if ($post_id == "0"){
                $query->orderByDesc("id");
            }elseif ($post_id == "1") {
                $query->orderByDesc("view_count");
            }elseif ($post_id == "2") {
                $query->orderByDesc("count_like");
            }elseif ($post_id == "3") {
                $query->orderByDesc("count_comment");
            }elseif ($post_id == "4") {
                $query->where("count_comment","=",0)->get();
            }
        }
        return $query;
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
        if($request->has("tag_id")&& $request->get("tag_id") != ""){
            $tag_id = $request->get("tag_id");
            $query->where("tag_id","like","%$tag_id%");
        }
//        dd($query);
        return $query;
    }
    public function scopeCreatedAt($query, $request)
    {
        if ($request->has("date_from") && $request->has("date_to")) {
            if ($request->get("date_from") != "" && $request->get("date_to") != ""){
                    $fromDate = Carbon::createFromFormat('Y-m-d', $request->get("date_from"))->startOfDay();
                    $fromDateEnd = Carbon::createFromFormat('Y-m-d', $request->get("date_from"))->endOfDay();
                    $toDate = Carbon::createFromFormat('Y-m-d', $request->get("date_to"))->endOfDay();
                    $toDateStart = Carbon::createFromFormat('Y-m-d', $request->get("date_to"))->startOfDay();
                if ($fromDate->greaterThan($toDate)) {
                    $query->whereBetween("created_at", [$toDateStart, $fromDateEnd]);
                } else {
                    $query->whereBetween("created_at", [$fromDate, $toDate]);
                }
            } elseif ($request->get("date_from") != "" && $request->get("date_to") == ""){
                $date = Carbon::createFromFormat('Y-m-d', $request->get("date_from"))->toDateString();
                $fromDate = Carbon::parse($date)->startOfDay();
                $toDate = Carbon::parse($date)->endOfDay();
                $query->whereBetween("created_at", [$fromDate, $toDate]);
            } elseif ($request->get("date_from") == "" && $request->get("date_to") != ""){
                $date = Carbon::createFromFormat('Y-m-d', $request->get("date_to"))->toDateString();
                $fromDate = Carbon::parse($date)->startOfDay();
                $toDate = Carbon::parse($date)->endOfDay();
                $query->whereBetween("created_at", [$fromDate, $toDate]);
            }
        }
        return $query;
    }

    public function scopeStatus($query, $request){
        if($request->has("status")&& $request->get("status") != "") {
            $status = $request->get("status");
            if ($status == "1") {
                $query->where("is_approved",0)->orderByDesc("id");
            } elseif ($status == "2") {
                $query->where("is_approved",1)->orderByDesc("id");
            }elseif ($status == "3") {
                $query->where("is_approved",2)->orderByDesc("id");
            }
        }
    }


    public function getApprove()
    {
        switch ($this->is_approved){
            case self::PENDING: return "<span class='text-secondary'>Chưa Duyệt</span>";
            case self::APPROVED: return "<span class='text-success'>Đã Duyệt</span>";
            case self::UNAPPROVED: return "<span class='text-danger'>Không Duyệt</span>";
        }
    }
}
