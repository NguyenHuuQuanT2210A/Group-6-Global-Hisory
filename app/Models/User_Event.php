<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_Event extends Model
{
    use HasFactory;
    protected $table = "user_events";
    protected $fillable = ['user_id','event_id','name','slug','email','tel','address','confirm'];
    use SoftDeletes;

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function event()
    {
        return $this->hasMany(Event::class);
    }

}
