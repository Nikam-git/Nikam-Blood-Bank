<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodReq extends Model
{
    protected $fillable=[
        'email',
        'phone',
        'bloodgroup',
        'date',
        'message',
        'status',
        'amount',
        'user_id',
        'is_approved'
    ];
    protected $table = 'blood_requests';
    public function user(){
        return $this->belongsTo(User::class);
    }
}
