<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable=['name','phone','start_date','end_date','address','totaldonor','image','status','is_approved','user_id'];
    protected $table = "events";
    public function user(){
        return $this->belongsTo(User::class);
    }
}
