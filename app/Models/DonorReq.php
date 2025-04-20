<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonorReq extends Model
{
    protected $fillable=[
    'name','email','phone',
    'bloodgroup','date','messsage',
    'status','user_id'];
}
