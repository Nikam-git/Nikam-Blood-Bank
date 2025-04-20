<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joined_events extends Model
{
    protected $fillable = [
        'event_id',
        'user_id'
    ];
    protected $table = "joined_events";
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function events(){
        return $this->belongsTo(Events::class);
    }
}
