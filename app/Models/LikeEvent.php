<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LikeEvent extends Model
{
    use HasFactory;
    protected $table = "like_events";
    protected $fillable = ['user_id','event_id', 'like'];
    use SoftDeletes;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
