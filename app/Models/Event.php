<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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


    public function getStatus()
    {
        switch ($this->status){
            case self::NOT_FULL: return "<span class='text-secondary'>Còn Chỗ</span>";
            case self::FULL: return "<span class='text-info'>Hết chỗ</span>";
        }
    }

}
