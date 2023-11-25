<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_Event extends Model
{
    use HasFactory;
    protected $table = "user_events";
    protected $fillable = ['user_id','event_id','name','slug','email','tel','address','name_event'];
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function scopeSearch($query,$request){
        if($request->has("search")&& $request->get("search") != ""){
            $search = $request->get("search");
            $query->where("name_event","like","%$search%")
                ->orWhere("name","like","%$search%");
        }
        return $query;
    }
}
