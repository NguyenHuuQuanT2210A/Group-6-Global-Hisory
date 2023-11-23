<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['thumbnail',
        'name',
        'slug',
        'date_from',
        'date_to',
        'qty',
        'qty_registered',
        'status',
        'address',
        'description',
        'category_id',
        'tag_id',
        'user_id'
    ];

    const NOT_FULL = 0;
    const FULL = 1;


    public function user()
    {
        // nhieu vs nhieu
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
    public function user_event()
    {
        return $this->hasMany(User_Event::class);
    }
    public function scopeSearch($query,$request){
        if($request->has("search")&& $request->get("search") != ""){
            $search = $request->get("search");
            $query->where("name","like","%$search%")
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

    public function scopeDate($query, $request)
    {
        if ($request->has("date_from") && $request->has("date_to")) {
            if ($request->get("date_from") != "" && $request->get("date_to") != ""){
//                $fromDate = Carbon::createFromFormat('Y-m-d', $request->get("date_from"))->startOfDay();
//                $toDate = Carbon::createFromFormat('Y-m-d', $request->get("date_to"))->endOfDay();
                $date_from = $request->get("date_from");
                $date_to = $request->get("date_to");

                $query->where(function ($query) use ($date_from, $date_to) {
                    $query->whereBetween("date_from", [$date_from, $date_to])
                        ->whereBetween("date_to", [$date_from, $date_to]);
                });
//                dd($query->get());
            } elseif ($request->get("date_from") != "" && $request->get("date_to") == ""){
                $date_from = Carbon::createFromFormat('Y-m-d', $request->get("date_from"))->startOfDay();
                $query->where("date_from",">=",$date_from);
            } elseif ($request->get("date_from") == "" && $request->get("date_to") != ""){
                $date_to = Carbon::createFromFormat('Y-m-d', $request->get("date_to"))->endOfDay();
                $query->where("date_to","<=",$date_to);
            }
        }

        return $query;
    }
    public function scopeStatus($query, $request){
        if($request->has("status")&& $request->get("status") != "") {
            $status = $request->get("status");
            if ($status == "1") {
                $query->where("status",1)->orderByDesc("id");
            } elseif ($status == "2") {
                $query->where("status",0)->orderByDesc("id");
            }
        }
    }

    public function getStatus()
    {
        switch ($this->status){
            case self::NOT_FULL: return "<span class='text-secondary'>Còn Chỗ</span>";
            case self::FULL: return "<span class='text-info'>Hết chỗ</span>";
        }
    }

}
