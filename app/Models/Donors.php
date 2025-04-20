<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donors extends Model
{
    protected $fillable=['name','phone','address','bloodgroup','amountofblood','image','to_user_id','donor_id'];
    protected $table="donors";
    public function user() {
        return $this->belongsTo(User::class, 'donor_id');
    }

    public function receiver() {
        return $this->belongsTo(User::class, 'to_user_id');
    }

}
